<?php

namespace SONUser\Service;

use Doctrine\ORM\EntityManager;

use Zend\Stdlib\Hydrator\ClassMethods;

use SONUser\Entity\User as UserEntity;

class User 
{
    /**
     *
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;
    
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    public function insert(array $data)
    {
        $entity = new UserEntity();
        
        (new ClassMethods)->hydrate($data, $entity);
        
        /**
         * A linha acima subistitue esse codigo comentado
         */
        /*$entity->setNome($data['nome'])
             ->setEmail($data['email'])
             ->setPassword($data['password'])
             ->setActive(true);*/

        $this->em->persist($entity);
        $this->em->flush();
        
        return $entity;
    }
    
    public function update(array $data)
    {
        $entity = $this->em->getReference('SONUser\Entity\User', $data['id']);
        
        (new ClassMethods)->hydrate($data, $entity);
        
        $this->em->persist($entity);
        $this->em->flush();
        
        return $entity;
    }
    
    public function delete($id)
    {
        $entity = $this->em->getReference('SONUser\Entity\User', $id);
        $this->em->remove($entity);
        $this->em->flush();
        
        return $id;
    }
}
