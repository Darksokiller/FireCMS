<?php
declare(strict_types=1);

namespace Application;
use Laminas\Db\Adapter\AdapterInterface;
use Laminas\Db\Adapter\Adapter as dbAdapter;
use Laminas\ServiceManager\Factory\InvokableFactory;
use Laminas\Session;
use Laminas\View\HelperPluginManager;
use Laminas\Mvc\ModuleRouteListener;
use Laminas\Mvc\MvcEvent;
use Laminas\Session\SessionManager;
use Laminas\Session\Config\SessionConfig;
use Laminas\Session\Container;
use Laminas\Session\Validator;
use Laminas\Permissions\Acl\Acl;
use Application\Permissions\PermissionsManager;
use Application\Model\SettingsTable;
use Laminas\Mvc\Application;
use Laminas\Db\TableGateway\TableGateway;
use Laminas\Db\RowGateway\Feature\FeatureSet;
use Laminas\Db\ResultSet\ResultSet;
use Application\Model\Setting;
use Laminas\Db\TableGateway\Feature\RowGatewayFeature;
use Application\Utilities\Mailer;
use Laminas\Log\Logger;
use Laminas\Log\Filter\Priority;
use Laminas\Log\LoggerAbstractServiceFactory;
use Laminas\Log\Writer\Db;
use Laminas\Log\Writer\FirePhp;
use Laminas\Log\Formatter\Db as DbFormatter;
use Laminas\Log\Formatter\Json;
use Laminas\Log\Formatter\FirePhp as FireBugformatter;
use Laminas\EventManager\SharedEventManager;
use Laminas\EventManager\Event;
use Application\Event\LogEvents;
use Laminas\Config\Config;

class Module
{
    public function getConfig(): array
    {
        /** @var array $config */
        $config = include __DIR__ . '/../config/module.config.php';
        return $config;
    }
    
    
    public function onBootstrap($e)
    {
        $this->bootstrapSettings($e);
        $this->bootstrapSession($e);
        $this->bootstrapLogging($e);
    }
    public function bootstrapSettings($e)
    {
        $sm = $e->getApplication()->getServiceManager();
        $settings = $sm->get('Application\Model\SettingsTableGateway');
        $handler = new Config($settings->fetchall());
        $sm->setService('FirecmsSettings', $handler);
        //date_default_timezone_set($handler->timeZone);
    }
    /*
     * @var $e Laminas\\Mvc\Event
     */
    public function bootstrapLogging($e)
    {
        $sm = $e->getapplication()->getServiceManager();
        $settings = $sm->get('FirecmsSettings');
        $config = $sm->get('config');
        
        $writer = new Db(new dbAdapter($config['db']), 'log');
        $firePhpWriter = new FirePhp();
        $debugFilter = new Priority(Logger::DEBUG);
        $firePhpWriter->addFilter($debugFilter);
        if($settings->enableFirebugDebug)
        {
            $writer->addFilter($debugFilter);
        }
        
        
        $dbFormatter = new DbFormatter();
        $dbFormatter->setDateTimeFormat($settings->timeFormat);
        
        $writer->setFormatter($dbFormatter);
        
        $logger = $sm->get('Laminas\Log\Logger');
        $logger->addWriter($writer);
        $logger->addWriter($firePhpWriter);
        Logger::registerErrorHandler($logger);
        
    }
    public function bootstrapSession($e)
    {
        $serviceManager = $e->getApplication()->getServiceManager();
        $session = $serviceManager->get(SessionManager::class);
        
        try {
            $session->start();
            $container = new Session\Container('initialized');
            //var_dump($container);
        } catch (\Laminas\Session\Exception\RuntimeException $e) {
            //session has expired
            return;
        }
        
        //let’s check if our session is not already created (for the guest or user)
        if (isset($container->init)) {
            return;
        }
        
        //new session creation
        $request = $serviceManager->get('Request');
        $session->regenerateId(true);
        $container->init = 1;
        $container->remoteAddr = $request->getServer()->get('REMOTE_ADDR');
        $container->httpUserAgent = $request->getServer()->get('HTTP_USER_AGENT');
        $config = $serviceManager->get('Config');
        $sessionConfig = $config['session'];
        // var_dump($config);
        $chain = $session->getValidatorChain();
        
        foreach ($sessionConfig['validators'] as $validator) {
            switch ($validator) {
                case Validator\HttpUserAgent::class:
                    $validator = new $validator($container->httpUserAgent);
                    break;
                case Validator\RemoteAddr::class:
                    $validator = new $validator($container->remoteAddr);
                    break;
                default:
                    $validator = new $validator();
            }
            $chain->attach('session.validate', array($validator, 'isValid'));
        }
    }
    public function getServiceConfig()
    {
        return [
            SessionManager::class => function ($container) {
                $config = $container->get('config');
                $session = $config['session'];
                $sessionConfig = new $session['config']['class']();
                $sessionConfig->setOptions($session['config']['options']);
                $sessionManager = new Session\SessionManager(
                    \User\Model\UsersSessionConfig::class,
                    new $session['storage'](),
                    null
                    );
                \Laminas\Session\Container::setDefaultManager($sessionManager);
                
                return $sessionManager;
            },
            Application\Permissions\PermissionsManager::class => function($container) {
                return new Application\Permissions\PermissionsManager(new Acl());
            },
            'factories' => [
                Model\SettingsTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    //$resultSetPrototype = new ResultSet();
                    //$resultSetPrototype->setArrayObjectPrototype(new Model\Setting());
                    return new SettingsTable(new TableGateway('settings', $dbAdapter, new RowGatewayFeature('id')));
                },
                //                 Utilities\Mailer::class => function($container) {
                //                     $mailer = new Mailer($container->get('SharedEventManager'));
                //                     $mailer->setEventManager($container->get('EventManager'));
                //                     return $mailer;
                //                 },
                ],
                ];
    }
    
}