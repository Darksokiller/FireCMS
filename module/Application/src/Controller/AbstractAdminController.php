<?php
namespace Application\Controller;

use Application\Controller\AbstractController;
use Laminas\Permissions\Acl\Resource\ResourceInterface;

abstract class AbstractAdminController extends AbstractController implements ResourceInterface
{
    protected $resourceId = 'admin';
    /**
     * {@inheritDoc}
     * @see \Laminas\Permissions\Acl\Resource\ResourceInterface::getResourceId()
     */
    public function getResourceId()
    {
        // TODO Auto-generated method stub
        return $this->resourceId;
    }
    
    public function _init()
    {
        //parent::_init();
        if(!$this->acl->isAllowed($this->user, $this, 'admin.access'))
        {
            $this->messageType = 'warning';
            // $this->flashMessenger()->addWarningMessage('You do not have sufficient privileges to access the requested area.');
            $this->redirect()->toRoute('forbidden');
        }
        $adminParent = 'Application\Controller\AbstractAdminController';
        switch ($adminParent === get_parent_class(get_called_class())) {
            case true:
                $this->layout('layout/admin');
                break;
            default:
                
                break;
        }
        return parent::_init();
    }
}
