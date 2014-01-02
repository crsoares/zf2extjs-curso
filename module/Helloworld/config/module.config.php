<?php

namespace Helloworld;

return array(
    'di' => array(
        'allowed_controllers' => array(
            'helloworld-index-controller'
        ),
        'definition' => array(
            'class' => array(
                'Helloworld\Service\GreetingService' => array(
                    'setLoggingService' => array(
                        'required' => true
                    )
                ),
                'Helloworld\Controller\IndexController' => array(
                    'setGreetingService' => array(
                        'required' => true
                    )
                )
            )
        ),
        'instance' => array(
            'preferences' => array(
                'Helloworld\Service\LoggingServiceInterface'
                                => 'Helloworld\Service\LoggingService'
            ),
            'Helloworld\Service\LoggingService' => array(
                'parameters' => array(
                    'logfile' => __DIR__ . '/../../../data/log.txt'
                )
            ),
            'alias' => array(
                'helloworld-index-controller'
                            => 'Helloworld\Controller\IndexController'
            )
        )
    ),
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
                        //'controller' => 'Helloworld\Controller\Index',
                        'controller' => 'helloworld-index-controller',
                        'action' => 'index'
                    )
                )
            ),
            'login' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/login',
                    'defaults' => array(
                        'controller' => 'Helloworld\Controller\Auth',
                        'action' => 'login'
                    )
                )
            )
        )
    ),
    'controllers' => array(
        'factories' => array(
            /*'Helloworld\Controller\Index' => function($serviceLocator){
                $ctr = new \Helloworld\Controller\IndexController();
                $ctr->setGreetingService(
                            $serviceLocator->getServiceLocator()
                                           ->get('greetingService')
                        );
                return $ctr;
            }*/
            //'Helloworld\Controller\Index' => 'Helloworld\Controller\IndexControllerFactory'
            'Helloworld\Controller\Auth' => 'Helloworld\Controller\AuthControllerFactory'
        ),
        'invokables' => array(
            //'Helloworld\Controller\Index' => 'Helloworld\Controller\IndexController',
            'Helloworld\Controller\Widget' => 'Helloworld\Controller\WidgetController'
        )
    ),
    'service_manager' => array(
        'factories' => array(
            //'greetingService' => 'Helloworld\Service\GreetingServiceFactory',
            'Zend\Db\Adapter\Adapter' => function($sm) {
                $config = $sm->get('Config');
                //$dbParams = $config['dbParams'];
                
                return new Zend\Db\Adapter\Adapter(array(
                   'driver' => 'Pdo_Mysql',
                    'database' => 'foo',
                    'username' => 'root',
                    'password' => ''
                ));
                
                /*return new Zend\Db\Adapter\Adapter(array(
                    'driver' => 'pdo',
                    'dsn' => 'mysql:dbname=' . $dbParams['database'] . ';host=' . $dbParams['hostname'],
                    'database' => $dbParams['databse'],
                    'username' => $dbParams['username'],
                    'password' => $dbParams['password'],
                    'hostname' => $dbParams['hotname']
                ));*/
            },
            'AuthServiceFactory' => 'Helloworld\Service\AuthServiceFactory',
            'Helloworld\Service\AuthService' => function($sm) {
                $authServiceFactory = $sm->get('AuthServiceFactory');
                return $authServiceFactory;
            },
            'Helloworld\Mapper\Host' => function($sm) {
                return new \Helloworld\Mapper\Host($sm->get('Zend\Db\Adapter\Adapter'));
            }        
        ),
        /*'invokables' => array(
            //'greetingService' => 'Helloworld\Service\GreetingService',
            'loggingService' => 'Helloworld\Service\LoggingService'
        )*/
    ),
    /*'view_helpers' => array(
        'invokables' => array(
            'displayCurrentDate' => 'Helloworld\View\Helper\DisplayCurrentDate'
        )
    ),*/
    'asset_manager' => array(
        'resolver_configs' => array(
            'paths' => array(
                'Helloworld' => __DIR__ . '/../public'
            )
        )
    )            
       
);

