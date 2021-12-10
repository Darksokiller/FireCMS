<?php
namespace Application\Utilities;
use Application\Permissions\PermissionsManager;
use Application\Model\SettingsTable;
use User\Model\User as User;
use Laminas\Mail\Message;
use Laminas\Mail\Transport\Smtp;
use Laminas\Mail\Transport\SmtpOptions;
use Laminas\Permissions\Acl\Resource\ResourceInterface;
use Laminas\EventManager\EventManager;
use Laminas\EventManager\EventManagerAwareInterface;
use Laminas\EventManager\EventManagerInterface;
use Laminas\EventManager\SharedEventManagerInterface;

/**
 *
 * @author Evan Alexander
 *
 */
class Mailer implements ResourceInterface, EventManagerAwareInterface
{
    private $acl;
    protected $events;
    protected $appSettings;
    protected $resourceId = 'mailService';
    public $message;
    public $user;
    // TODO - Insert your code here
    
    /**
     */
    public function __construct()
    {
        //var_dump($container);
        // TODO - Insert your code here
    }
    public function send($userId = 0, $message, $sendTo)
    {
        
    }
    
    public function setEventManager(EventManagerInterface $events)
    {
        $events->setIdentifiers([
            __CLASS__,
            get_class($this),
        ]);
        $this->events = $events;
    }
    
    public function getEventManager()
    {
        if (! $this->events) {
            $this->setEventManager(new EventManager());
        }
        return $this->events;
    }
    
    public function getResourceId()
    {
        return $this->resourceId;
    }
    
}