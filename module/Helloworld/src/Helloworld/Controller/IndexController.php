<?php

namespace Helloworld\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController 
{
    private $greetingService;
    
    public function indexAction()
    {
        $greeting = $this->greetingService->getGreeting();
        return new ViewModel(array(
            'greeting' => $greeting
        ));
    }
    
    public function setGreetingService($greetingService)
    {
        $this->greetingService = $greetingService;
    }
}
