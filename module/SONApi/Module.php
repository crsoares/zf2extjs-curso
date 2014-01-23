<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace SONApi;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $moduleManager = $e->getApplication()->getServiceManager()->get('modulemanager');
        $sharedEvents = $moduleManager->getEventManager()->getSharedManager();
        
        $sharedEvents->attach(
                    'Zend\Mvc\Controller\AbstractRestfulController',
                    MvcEvent::EVENT_DISPATCH,
                    array($this, 'checkAuth'),
                    -50
                );
        
        $sharedEvents->attach(
                    'Zend\Mvc\Controller\AbstractRestfulController',
                    MvcEvent::EVENT_DISPATCH,
                    array($this, 'postProcess'),
                    -100
                );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
    
    public function checkAuth(MvcEvent $e)
    {
        $headers = $e->getRequest()->getHeaders()->toArray();
        
        if(!isset($headers['X-Son-Token'])) {
            return $e->getResponse()->setStatusCode(405);
        }
        
        $token = $headers['X-Son-Token'];
        $em = $e->getTarget()->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $result = $em->getRepository('SONUser\Entity\User')->findByToken($token);
        
        if(!$result) {
            return $e->getResponse()->setStatusCode(405);
        }
    }
    
    public function postProcess(MvcEvent $e)
    {
        $routeMatch = $e->getRouteMatch();
        $formatter = $routeMatch->getParam('formatter', false);
        
        $di = $e->getTarget()->getServiceLocator()->get('di');
        
        if($formatter !== false) {
            if($e->getResult() instanceof \Zend\View\Model\ViewModel) {
                if(is_array($e->getResult()->getVariables())) {
                    $vars = $e->getResult()->getVariables();
                } else {
                    $vars = null;
                }
            } else {
                $vars = $e->getResult();
            }
            
            $postProcessor = $di->get($formatter.'-pp', array(
                'response' => $e->getResponse(),
                'vars' => $vars,
                'serializer' => $e->getTarget()->getServiceLocator()->get('jms_serializer.serializer')
            ));
            
            $postProcessor->process();
            
            return $postProcessor->getResponse();
        }
        
        return null;
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
}
