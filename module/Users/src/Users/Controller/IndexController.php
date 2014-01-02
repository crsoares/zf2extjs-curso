<?php

namespace Users\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController 
{
    public function indexAction()
    {
        return new ViewModel();
    }
    
    public function registerAction()
    {
        $view = new ViewModel();
        $view->setTemplate('users/index/new-user');
        return $view;
    }
    
    public function loginAction()
    {
        $view = new ViewModel();
        $view->setTemplate('users/index/login');
        return $view;
    }
}
