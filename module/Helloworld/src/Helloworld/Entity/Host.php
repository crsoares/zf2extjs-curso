<?php

namespace Helloworld\Entity;

class Host
{
    protected $ip;
    protected $hostname;
    
    public function getHostname()
    {
        return $this->hotname;
    }
    
    public function getIp()
    {
        return $this->ip;
    }
}
