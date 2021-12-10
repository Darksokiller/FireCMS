<?php
namespace User\Controller;

use Application\Controller\AbstractAdminController;
use User\Model\UserTable;

class AdminCotroller extends AbstractAdminController
{
    public function __construct(UserTable $table)
    {
        $this->table = $table;
    }
    
    public function indexAction()
    {
        
    }
}