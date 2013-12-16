<?php

namespace Helloworld\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Helloworld\Service\GreetingService;

class IndexController extends AbstractActionController 
{
    private $greetingService;
    //private $eventManager;
    
    public function indexAction()
    {
        $adapter = $this->getServiceLocator()
                        ->get('Zend\Db\Adapter\Adapter');
        $mapper = new \Helloworld\Mapper\Host($adapter);
        $host = $mapper->findById('127.0.0.1');
        //echo $host->getIp();die;
        print_r($host->current());die;
        $widget = $this->forward()
                       ->dispatch('Helloworld\Controller\Widget');
        $greeting = $this->greetingService->getGreeting();
        $page = new ViewModel(array(
            'greeting' => $greeting,
            'data' => $this->currentDate()
        ));
        
        $page->addChild($widget, 'widgetContent');
        return $page;
    }
    
    public function setGreetingService(GreetingService $greetingService)
    {
        $this->greetingService = $greetingService;
    }
}
