<?php

namespace Helloworld\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Helloworld\Form\SingUp;

use Helloworld\Service\GreetingService;

class IndexController extends AbstractActionController 
{
    private $greetingService;
    //private $eventManager;
    
    public function indexAction()
    {
        $form = new SingUp();
        if($this->getRequest()->isPost()) {
            $form->setData($this->getRequest()->getPost());
            
            if($form->isValid()) {
                var_dump($form->getData());
            }else {
                return new ViewModel(array(
                    'form' => $form
                ));
            }
        }else {
            return new ViewModel(array(
                'form' => $form
            ));
        }
        /*return new ViewModel(array(
            'form' => $form,
            'greeting' => $greeting,
            'data' => $this->currentDate()
        ));*/
    }
    
    public function setGreetingService(GreetingService $greetingService)
    {
        $this->greetingService = $greetingService;
    }
}
