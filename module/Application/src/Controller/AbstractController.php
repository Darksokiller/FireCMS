<?php
namespace Application\Controller;

// use Laminas\Db\TableGateway\TableGatewayInterface as TableGatewayInterface;
// use Laminas\Mvc\Application as Application;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\Session;
// use Laminas\Session\Container as SessionContainer;
use Laminas\Mvc\Exception;
use Laminas\Mvc\MvcEvent;
use Laminas\View\Model\ViewModel;
use Laminas\Authentication\AuthenticationService as AuthService;
use User\Model\UserTable as Table;
use User\Model\User as User;

abstract class AbstractController extends AbstractActionController
{
    
    public $baseUrl;
    
    public $authService;
    
    public $user;
    
    public $table;
    
    public $acl;
    
    public $authenticated = false;
    
    public $systemMessage = null;
    
    public $messageType = null;
    
    public $config;
    
    public $appSettings;
    
    protected $action;
    
    protected $sessionContainer;
    
    public function onDispatch(MvcEvent $e)
    {
        $this->baseUrl = $this->getRequest()->getBasePath();
        $this->authService = new AuthService();
        $sm = $e->getApplication()->getServiceManager();
        //$settings = $sm->get('Application\Model\SettingsTableGateway');
        $this->appSettings = $sm->get('FirecmsSettings');
        //var_dump($this->appSettings);
        $pluginManager = $sm->get('ControllerPluginManager');
        //var_dump($pluginManager);
        $fm = $pluginManager->get('FlashMessenger');
        //var_dump($fm);
        //var_dump(get_parent_class(get_called_class()));
        
        $table = $sm->get('User\Model\UserTable');
        //var_dump($table->fetchAll());
        $this->acl = $sm->get('Application\Permissions\PermissionsManager');
        $this->acl = $this->acl->getAcl();
        $this->view = new ViewModel();
        $this->view->setVariable('appSettings', $this->appSettings);
        $this->layout()->appSettings = $this->appSettings;
        
        //var_dump($sm->get('Application\Controller\Plugin\CreateHttpForbiddenModel'));
        
        switch ($this->authService->hasIdentity()) {
            case true :
                $this->authenticated = true;
                $this->user = $table->getUserByEmail($this->authService->getIdentity());
                break;
            default:
                $user = new User();
                $this->user = $user->exchangeArray([
                    'userName' => 'Guest',
                    'role' => 'guest'
                ]);
                break;
        }
        
        //var_dump($this->user);
        $this->user->password = null;
        $this->view->user = $this->user;
        $this->view->acl = $this->acl;
        $this->action = $this->params()->fromRoute('action');
        $this->layout()->acl = $this->acl;
        $this->layout()->user = $this->user;
        $this->layout()->authenticated = $this->authenticated;
        $this->layout()->systemMessage = $this->systemMessage;
        $this->layout()->messageType = $this->messageType;
        //$this->layout()->userName = $this->user->userName;
        $this->_init();
        return parent::onDispatch($e);
    }
    
    public function _init()
    {
        return $this;
    }
    
}