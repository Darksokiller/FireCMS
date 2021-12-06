<?php
namespace User\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use User\Model\UserTable;
use Laminas\View\Model\ViewModel;
use User\Form\UserForm;
use User\Model\User;
use User\Form\LoginForm;

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

        $id = (int) $this->params()->fromRoute('id', 0);
        
        if (0 === $id) {
            return $this->redirect()->toRoute('user', ['action' => 'add']);
        }
        
        try {
            $user = $this->table->getUser($id);
        } catch (\Exception $e) {
            return $this->redirect()->toRoute('user', ['action' => 'index']);
        }
        
        $form = new UserForm();
        $form->bind($user);
        $form->get('submit')->setAttribute('value', 'Edit');
        
        $request = $this->getRequest();
        $viewData = ['id' => $id, 'form' => $form];
        
        if (! $request->isPost()) {
            return $viewData;
        }
        
        $form->setInputFilter($user->getInputFilter());
        $form->setData($request->getPost());
        
        if (! $form->isValid()) {
            return $viewData;
        }
        
        try {
            $this->table->saveUser($user);
        } catch (\Exception $e) {
        }
        
        return $this->redirect()->toRoute('user', ['action' => 'index']);
    }
    
    public function deleteAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('user');
        }
        
        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost('del', 'No');
            
            if ($del == 'Yes') {
                $id = (int) $request->getPost('id');
                $this->table->deleteUser($id);
            }
            
            return $this->redirect()->toRoute('user');
            
        }
        
        return [
            'id' => $id,
            'user' => $this->table->getUser($id),
        ];
    }
    
    public function logoutAction()
    {
        
    }
    
    public function loginAction()
    {
        $form = new LoginForm();
        $form->get('submit')->setValue('Login');
        
        $request = $this->getRequest();
        if (!$request->isPost()) {
            return ['form' => $form];
        }
        
        $post = $request->getPost();
        
        $user = new User();
        
        $form->setInputFilter($user->getLoginFilter());
        $form->setData($request->getPost());
        
        if (! $form->isValid()) {
            return ['form' => $form];
        }
        
        $user->exchangeArray($form->getData());
        
        if ($this->table->login($user))
        {
            $this->flashMessenager()->addInfoMessage('Welcome back!!');
            $this->redirect()->toRoute('profile', ['id' => $user->id]);
        }
        
    }
    
}