<?php
namespace User\Controller;

use Application\Controller\AbstractController;
use User\Model\UserTable;

class ProfileController extends AbstractController
{
    protected $profileTable;
    public function __construct(UserTable $table)
    {
        $this->table = $table;
    }
    public function _init()
    {
        // var_dump($this->getEvent()->getApplication()->getServiceManager());
        $sm = $this->getEvent()->getApplication()->getServiceManager();
        $this->profileTable = $sm->get('User\Model\ProfileTable');
        // var_dump($this->profileTable);
        
        if(!$this->authenticated)
        {
            $this->redirect()->toUrl('/user/login');
        }
        //parent::_init();
    }
    public function viewAction()
    {
        $userId = (int) $this->params()->fromRoute('id');
        
        switch(is_int($userId) && $userId !== 0) {
            case true:
                $user = $this->table->fetchUserById($userId);
                break;
            default:
                $user = $this->user;
                break;
        }
        // set the user in the profileTable
        $this->profileTable->setUser($user);
        $pData = $this->profileTable->fetchById($user->id);
        $this->view->setVariable('data', $pData);
        //var_dump($pData);
        return $this->view;
    }
}