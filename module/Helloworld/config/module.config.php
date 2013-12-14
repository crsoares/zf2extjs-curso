<?php

namespace Helloworld;

return array(
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view'
        )
    ),
    'router' => array(
        'routes' => array(
            'sayhello' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/sayhello',
                    'defaults' => array(
                        'controller' => 'Helloworld\Controller\Index',
                        'action' => 'index'
                    )
                )
            )
        )
    ),
    'controllers' => array(
        'factories' => array(
            'Helloworld\Controller\Index' => function($serviceLocator){
                $ctr = new \Helloworld\Controller\IndexController();
                $ctr->setGreetingService(
                            $serviceLocator->getServiceLocator()
                                           ->get('greetingService')
                        );
                
                /*$ev = new \Helloworld\Event\MyGetGreetingEventListenerAggregate();
                
                $ctr->setTeste($ev);*/
                /*$ctr->setGreetingService(
                            $serviceLocator->get('greetingService')
                        );*/
                return $ctr;
            }
            //'Helloworld\Controller\Index' => 'Helloworld\Controller\IndexControllerFactory'
        ),
        'invokables' => array(
            //'Helloworld\Controller\Index' => 'Helloworld\Controller\IndexController',
            'Helloworld\Controller\Widget' => 'Helloworld\Controller\WidgetController'
        )
    ),
    'service_manager' => array(
        'factories' => array(
            'greetingService' => 'Helloworld\Service\GreetingServiceFactory'
        ),
        'invokables' => array(
            //'greetingService' => 'Helloworld\Service\GreetingService',
            'loggingService' => 'Helloworld\Service\LoggingService'
        )
    ),
    /*'view_helpers' => array(
        'invokables' => array(
            'displayCurrentDate' => 'Helloworld\View\Helper\DisplayCurrentDate'
        )
    )*/
);

