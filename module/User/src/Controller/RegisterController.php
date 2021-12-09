<?php
namespace User\Controller;

use Application\Controller\AbstractController;
use User\Form\UserForm;
use User\Form\LoginForm;
use User\Form\RegistrationForm;
use User\Model\User;
use User\Model\UserTable;
use Laminas\Mail\Message;
use Laminas\Mail\Transport\Smtp as SmtpTransport;
use Laminas\Mail\Transport\SmtpOptions;
use Laminas\Validator\Db\NoRecordExists as Validator;
use Application\Utilities\Mailer;
use Application\Event\LogEvents;

class RegisterController extends AbstractController
{
    public $table;
    public function __construct(UserTable $table)
    {
        $this->table = $table;
        $this->table->setEventManager($this->getEventManager());
    }
    
    public function indexAction() 
    {
        $events = $this->getEventManager();
        $sm = $this->getEvent()->getApplication()->getServiceManager();
        $logger = $sm->get('Laminas\Log\Logger');
        $mailer = $sm->get('Application\Utilties\Mailer');
        $logger->info('test message', ['userId' => $this->user->id]);
        $mailer->send($this->user->id, 'this is a test registration email', 'someuser@domain.com');
        
        if ($this->appSettings->disableRegistration) {
            return $this->view;
        }
        $form = new UserForm();
        $form->get('submit')->setValue('Add');
        
        $request = $this->getRequest();
        
        if (! $request->isPost()) {
            return $this->view->setVariale('form', $form);
        }
        
        $post = $request->getPost();
        
        $user = new User();
        $user->setDbAdapter($this->table->getAdapter());
        $form->setInputFilter($user->getInputFilter());
        $form->setData($request->getPost());
        
        if (! $form->isValid()) {
            return ['form' => $form];
        }
        
        $now->format($this->appSettings->timeFormat);
        
        $message = new Message();
        $message->addTo($post['email']);
        
        $message->addFrom($this->appSettings->smtpSenderAddress);
        $message->setSubject($this->appSettings->siteName . ' account verification');
        $message->setBody("Please click the link below to verify your account");
        
        $transport = new SmtpTransport();
        
        $options   = new SmtpOptions([
            'name' => 'fireevolve.com',
            'host' => 'smtp-relay.gmail.com',
            'port' => '587',
            'connection_class'  =>'login',
            'connection_config' => [
                'username' => $this->appSettings->smtpSenderAddress,
                'password' => $this->appSettings->smtpSenderPasswd,
                'ssl' => 'tls',
            ],
        ]);
        $transport->setOptions($options);
        $transport->send($message);
        
        
        
        $user = new User($form->getData());
        $this->table->save($user);
        return $this->redirect()->toRoute('user');
    }
    
    public function verifyAction()
    {
        $mailer = $this->getEvent()->getApplication()->getServiceManager()->get('Application\Utilities\Mailer');
        $token = $this->params('token');
    }
}