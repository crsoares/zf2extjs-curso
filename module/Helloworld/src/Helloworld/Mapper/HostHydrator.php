<?php

namespace Helloworld\Mapper;

use Zend\Stdlib\Hydrator\Reflection;
use Helloworld\Entity\Host as HostEntity;

class HostHydrator extends Reflection
{
    public function hydrate(array $data, $object)
    {
        if(!$object instanceof HostEntity) {
            throw new InvalidArgumentException('$object deve ser uma instância de Helloworld\Entity\Host');
        }
        $data = $this->mapField('workstation', 'hostname', $data);
        return parent::hydrate($data, $object);
    }
    
    public function extract($object)
    {
        if(!$object instanceof HostEntity) {
            throw new InvalidArgumentException('$object deve ser uma instância de Helloworld\Mapper\Host');
        }
        $data = parent::extract($object);
        $data = $this->mapField('hostname', 'workstation', $data);
        return $data;
    }
    
    protected function mapField($keyFrom, $keyTo, array $array)
    {
        $array[$keyTo] = $array[$keyFrom];
        unset($array[$keyFrom]);
        return $array;
    }
}
