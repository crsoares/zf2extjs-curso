<?php

namespace SONApi\PostProcessor;

use JMS\Serializer\Serializer;

class AbstractPostProcessor
{
    protected $serializer;
    
    protected $_vars = null;
    
    protected $_response = null;
    
    public function __construct(\Zend\Http\Response $response, $vars = null, Serializer $serializer)
    {
        $this->_vars = $vars;
        $this->_response = $response;
        $this->serializer = $serializer;
    }
    
    public function getResponse(){
        return $this->_response;
    }
    
    abstract public function process();
}
