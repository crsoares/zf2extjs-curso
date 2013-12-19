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
        /*
         * Validadores
         */
        $validator = new \Zend\Validator\Isbn();
        $validator->setMessage(
                    "Um valor string ou inteiro deve ser dada!",
                    \Zend\Validator\Isbn::INVALID
                );
        
        if($validator->isValid("12,13")) {
            echo "passou";
        }else {
            foreach($validator->getMessages() as $messageId => $message) {
                echo $message;
            }
        }
        /*$host = $this->getServiceLocator()
                     ->get('Helloworld\Mapper\Host')
                     ->findById('127.0.0.1');
        $host = $host->current();
        $host->setHostname('my-mac');
        $this->getServiceLocator()
             ->get('Helloworld\Mapper\Host')
             ->updateEntity($host);die;*/
        
        $newEntity = new \Helloworld\Entity\Host();
        $newEntity->setHostname('crysthiano teste');
        $newEntity->setIp('192.168.1.1');
        
        $this->getServiceLocator()
             ->get('Helloworld\Mapper\Host')
             ->insert($newEntity);die;
        
        //echo $host->getIp();die;
        //print_r($host);die;
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
