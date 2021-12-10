<?php
namespace Application\Events;

use Laminas\EventManager\EventInterface;
use Laminas\EventManager\EventManagerInterface;
use Laminas\EventManager\ListenerAggregateInterface;
use Laminas\EventManager\ListenerAggregateTrait;
use Laminas\Log\Logger;
use Laminas\Log\Processor\ReferenceId;
use User\Model\UserTable;
use PHPUnit\TextUI\XmlConfiguration\Logging\Logging;

class LogEvents implements ListenerAggregateInterface
{
    use ListenerAggregateTrait;
    
    private $log;
    private $proc;
    
    public function __construct(Logger $log)
    {
        $this->log = $log;
        $this->proc = new ReferenceId();
    }
    
    public function attach(EventManagerInterface $events, $priority = 1) 
    {
        $this->listeners[] = $events->attach('save', [$this, 'log']);
        $this->listeners[] = $events->attach('update', [$this, 'log']);
        $this->listeners[] = $events->attach('send', [$this, 'log']);
        $this->listeners[] = $events->attach('test', [$this, 'log']);
    }
    
    public function log(EventInterface $e)
    {
        
        $event  = $e->getName();
        $params = $e->getParams();
        if (!empty($params['userId']))
        {
            $this->proc->setReferenceId($params['userId']);
            $this->log->addProcessor($this->proc);
        }
        switch ($event) {
            case 'send':
                
                $extra['extra']['userId'] = $params['userId'];
                $this->log->log(Logger::INFO, $params);
                break;
            case 'save':
                die('save triggered');
                $extra['extra']['userId'] = $params['userId'];
                $this->log->log(Logger::INFO, $params->getArrayCopy());
                break;
            case 'update':
                $extra['extra']['userId'] = $params['userId'];
                $this->log->log(Logger::INFO, $params->getArrayCopy());
                break;
           default:
               break;
        }
    }

}