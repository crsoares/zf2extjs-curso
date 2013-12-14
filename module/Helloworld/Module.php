<?php

namespace Helloworld;

use Zend\ModuleManager\ModuleManager;
use Zend\ModuleManager\ModuleEvent;
//use Helloworld\View\Helper\DisplayCurrentDate;

class Module
{
    public function init(ModuleManager $moduleManager)
    {
        /*$moduleManager->getEventManager()
                      ->attach(
                           ModuleEvent::EVENT_LOAD_MODULES_POST,
                           array($this, 'onModulesPost')
                        );*/
        $sharedEvents = $moduleManager->getEventManager()
                                      ->getSharedManager();
        $sharedEvents->attach(
                    __NAMESPACE__,
                    'dispatch',
                    function($e) {
                        $controller = $e->getTarget();
                        //$controller->layout('layout/helloWorldLayout');
                    },
                    100
                );
    }
    
    public function onModulesPost()
    {
        //die('Módulos carregados!');
    }
    
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
    
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__
                )
            )
        );
    }
    
    /*public function getServiceConfig()
    {
        return array(
            'factories' => array(
            'greetingService' => 'Helloworld\Service\GreetingServiceFactory'
        ),
            'invokables' => array(
                'greetingService' => 'Helloworld\Service\GreetingService'
            )
        );
    }*/
    public function getViewHelperConfig()
    {
        return array(
            'invokables' => array(
                'displayCurrentDate' => 'Helloworld\View\Helper\DisplayCurrentDate'
            )
        );
    }
    
    public function getControllerPluginConfig()
    {
        return array(
            'invokables' => array(
                'currentDate' => 'Helloworld\Controller\Plugin\CurrentDate'
            )
        );
    }
}