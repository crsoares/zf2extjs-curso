<?php

namespace SONCursos\Service;

use Doctrine\ORM\EntityManager;

use Zend\Stdlib\Hydrator\ClassMethods;

use SONCursos\Entity\Curso as CursoEntity;

class Curso
{
    private $em;
    
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    
    public function save(array $data)
    {
        if($data['id']) {
            $entity = $this->em->getReference('SONCursos\Entity\Curso', $data['id']);
        }else {
            $entity = new CursoEntity();
        }
        (new ClassMethods)->hydrate($data, $entity);
        
        $this->em->persist($entity);
        $this->em->flush();
        
        return $entity;
    }
}
