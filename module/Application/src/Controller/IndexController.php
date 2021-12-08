<?php

declare(strict_types=1);

namespace Application\Controller;

use Application\Controller\AbstractController;
use Laminas\View\Model\ViewModel;

class IndexController extends AbstractController
{
    public function indexAction()
    {
        
        return $this->view;
        
        //return new ViewModel();
    }
    
    public function forbiddenAction()
    {
        $response = $this->getResponse();
        $response->setStatusCode(403);
        
        return new ViewModel();
    }
    
}
