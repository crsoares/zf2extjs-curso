<?php

namespace SONUser;

use Zend\ModuleManager\ModuleManager;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Storage\Session as SessionStorage;

use SONUser\Service\User as UserService;

class Module
{
    public function init(ModuleManager $moduleManager)
    {
        $sharedEvents = $moduleManager->getEventManager()->getSharedManager();
        $sharedEvents->attach(
                    'Zend\Mvc\Controller\AbstractActionController',
                    MvcEvent::EVENT_DISPATCH,
                    array($this, 'mvcPreDispatch'),
                    90
                );
    }
    
    public function mvcPreDispatch($e)
    {
        $auth = new AuthenticationService();
        $auth->setStorage(new SessionStorage());
        
        $controller = $e->getTarget();
        
        $matcheRoute = $controller->getEvent()
                                  ->getRouteMatch()
                                  ->getMatchedRouteName();
        
        if(!$auth->getIdentity() and $matcheRoute == 'sonuser-admin') {
            return $controller->redirect()->toRoute('sonuser-auth');
        }
    }
    
    public function getConfig()
    {
        return include __DIR__ . "/config/module.config.php";
    }
    
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                )
            )
        );
    }
    
    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'SONUser\Service\User' => function($sm) {
                    $em = $sm->get('Doctrine\ORM\EntityManager');
                    return new UserService($em);
                },
                'SONUser\Auth\Adapter' => function($sm) {
                    $em = $sm->get('Doctrine\ORM\EntityManager');
                    return new Auth\Adapter($em);
                }
            )
        );
    }
}
