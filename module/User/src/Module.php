<?php
namespace User;

use Laminas\ModuleManager\Feature\ConfigProviderInterface;
use Laminas\Db\Adapter\AdapterInterface;
use Laminas\Db\ResultSet\ResultSet;
use Laminas\Db\TableGateway\TableGateway;
use Laminas\View\Model\ModelInterface;

class Module implements ConfigProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
    
    public function getServiceConfig()
    {
        return [
            'factories' => [
                Model\UserTable::class => function ($container) {
                    $tableGateway = $container->get(Model\UserTableGateway::class);
                    return new Model\UserTable($tableGateway);
                },
                
                Model\UserTableGateway::class => function ($container) {
                    $dbAdapter = $container ->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\User());
                    return new TableGateway('user', $dbAdapter, null, $resultSetPrototype);
                },
                
                Model\ProfileTable::class => function ($container) {
                    $tableGateway = $container->get(Model\ProfileTableGateway::class);
                    return new Model\ProfileTable($tableGateway);
                },
                
                Model\ProfileTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Profile());
                    return new TableGateway('user_profile', $dbAdapter, null, $resultSetPrototype);
                }
                
                ],
                ];
    }
    
    public function getControllerConfig()
    {
        return [
            'factories' => [
                Controller\UserController::class => function($container) {
                    return new Controller\UserController(
                        $container->get(Model\UserTable::class)
                        );
                },
                Controller\ProfileController::class => function($container) {
                    return new Controller\ProfileController(
                        $container->get(Model\UserTable::class)
                        );
                },   
                ],
                ];
    }
}