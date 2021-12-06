<?php
namespace User\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use User\Model\UserTable;
use Laminas\View\Model\ViewModel;
use User\Form\UserForm;
use User\Model\User;

class UserController extends AbstractActionController
{
    
    public function __construct(UserTable $table)
    {
        $this->table = $table;
    }
    
    public function _init($config = ['Some\Class\name::class' => 'SomeObject']) {
        parent::_init($config);
    }
    
    public function indexAction()
    {
       return new ViewModel([
           'users' => $this->table->fetchAll(),
       ]); 
       
       return $this->view;
    }
    
    public function addAction()
    {
        $form = new UserForm();
        $form->get('submit')->setValue('Add');
        
        $request = $this->getRequest();
        
        if (! $request->isPost()) {
            return ['form' => $form];
        }
        
        $post = $request->getPost();
        
        if ($post['password'] !== $post['conf_password'])
        {
            return ['form' => $form];
        }
        
        $user = new User();
        $form->setInputFilter($user->getInputFilter());
        $form->setData($request->getPost());
        if (! $form->isValid()) {
            return ['form' => $form];
        }
        
        $user->exchangeArray($form->getData());
        $this->table->saveUser($user);
        return $this->redirect()->toRoute('user');
    }
    
    public function editAction()
    {
        
    }
    
    public function deleteAction()
    {
        
    }
    
    public function logoutAction()
    {
        
    }
    
    public function loginAction()
    {
        
    }
    
}