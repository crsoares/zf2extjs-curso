<?php

namespace Helloworld\Event;

use Zend\EventManager\ListenerAggregateInterface;
use Zend\EventManager\EventManagerInterface;

class MyGetGreetingEventListenerAggregate implements ListenerAggregateInterface
{
    public function attach(EventManagerInterface $eventManager)
    {
        $eventManager->attach(
                    'getGreeting',
                    function($e) {
                        echo "evento disparado na class: " . $e->getTarget();
                        die;
                    }
                );
                
        $eventManager->attach(
                    'refreshGreeting',
                    function($e) {
                        echo 'outro evento disparado na classe: ' . $e->getTarget();
                    }
                );
    }
    
    public function detach(EventManagerInterface $eventManager)
    {
        $eventManager->detach($eventManager);
    }
}