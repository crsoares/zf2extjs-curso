<?php

namespace Helloworld\Entity;

class UserAddress
{
    private $street;
    private $streetNumber;
    private $zipcode;
    private $city;
    
    public function setStreet($street)
    {
        $this->street = $street;
        return $this;
    }
    
    public function getStreet()
    {
        return $this->street;
    }
    
    public function setStreetNumber($streetNumber)
    {
        $this->streetNumber = $streetNumber;
        return $this;
    }
    
    public function getStreetNumber()
    {
        return $this->streetNumber;
    }
    
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;
        return $this;
    }
    
    public function getZipcode()
    {
        return $this->zipcode;
    }
    
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }
    
    public function getCity()
    {
        return $this->city;
    }
}
