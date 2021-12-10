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


/**
 * RegisterController
 *
 * @author Joey Smith
 * @version 1.0 Alpha 1.0
 */
class RegisterController extends AbstractController
{
    public $table;
    public function __construct(UserTable $table)
    {
        $this->table = $table;
        $this->table->setEventManager($this->getEventManager());
        //var_dump($this->table);
    }
    /**
     * The default action - show the home page
     */
    public function indexAction()
    {
        $events = $this->getEventManager();
        $sm = $this->getEvent()->getApplication()->getServiceManager();
        $logger = $sm->get('Laminas\Log\Logger');
        $mailer = $sm->get('Application\Utilities\Mailer');
        //$mailer->setEventManager($events);
        //var_dump($mailer);
        $logger->info('test message', ['userId' => $this->user->id]);
        $mailer->send($this->user->id, 'this is a test registration email', 'someuser@domain.com');
        
        if($this->appSettings->disableRegistration) {
            return $this->view;
        }
        $form = new UserForm();
        $form->get('submit')->setValue('Add');
        
        $request = $this->getRequest();
        
        if (! $request->isPost()) {
            // Initial page load, send them the form
            return $this->view->setVariable('form', $form);
        }
        // if weve made it to here then its a post request
        $post = $request->getPost();
        // we have to have a new one of these so we can hydrate it and call the dbadapter for the validators
        $user = new User();
        $user->setDbAdapter($this->table->getAdapter());
        $form->setInputFilter($user->getInputFilter());
        $form->setData($request->getPost());
        // Is the posted form data valid? if not send them the form back and the problems
        // reported by the filters and validators
        if (! $form->isValid()) {
            return ['form' => $form];
        }
        // at this point the form has posted and were ready to kick this off
        $now = new \DateTime();
        // set the time zone to central this will need replaced by a setting from the settings table
        //$now->setTimezone(new \DateTimeZone('America/Chicago'));
        // time format is 02/13/1975
        $now->format($this->appSettings->timeFormat);
        
        /**
         *
         * smtp-relay.gmail.com on port 587.
         */
        //$post['email'] = 'shelleyworsham@gmail.com';
        $message = new Message();
        $message->addTo($post['email']);
        // This email must match the connection_config key in the options below
        $message->addFrom($this->appSettings->smtpSenderAddress);
        $message->setSubject($this->appSettings->siteName . ' account verification');
        $message->setBody("Please click the link below to verify your account");
        
        $transport = new SmtpTransport();
        
        $options   = new SmtpOptions([
            'name' => 'fireevolve.com',
            'host' => 'smtp-relay.gmail.com',
            'port' => '587',
            'connection_class'  => 'login',
            'connection_config' => [
                'username' => $this->appSettings->smtpSenderAddress,
                'password' => $this->appSettings->smtpSenderPasswd,
                'ssl' => 'tls',
            ],
        ]);
        $transport->setOptions($options);
        $transport->send($message);
        
        
        
        
        //$user->exchangeArray($form->getData());
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