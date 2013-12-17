<?php

namespace Helloworld\Entity;

class Host
{
    protected $id;
    protected $ip;
    protected $hostname;
    
    public function getId()
    {
        return $this->id;
    }
    
    public function setHostname($hostname)
    {
        $this->hostname = $hostname;
    }
    
    public function getHostname()
    {
        return $this->hotname;
    }
    
    public function setIp($ip)
    {
        $this->ip = $ip;
    }
    
    public function getIp()
    {
        return $this->ip;
    }
}
