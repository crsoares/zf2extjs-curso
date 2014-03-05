<?php

namespace SONApi\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;

class UserController extends AbstractRestfulController 
{
    public function getList()
    {
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        
        $users = $em->getRepository('SONUser\Entity\User')->findAll();
        
        return $users;
    }
    
    public function get($id)
    {
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $users = $em->getRepository('SONUser\Entity\User')->find($id);
        
        if($users) {
            return $users;
        }
        
        $this->getResponse()->setStatusCode(404);
        return $this->getResponse();
    }
    
    public function create($data)
    {
        $serviceUser = $this->getServiceLocator()->get('SONUser\Service\User');
        $user = $serviceUser->save($data);
        
        if($user) {
            return $user;
        } else {
            return ['error' => 'Erro durante a inclusão'];
        }
    }
    
    public function update($id, $data)
    {
        $userService = $this->getServiceLocator()->get('SONUser\Service\User');
        $data['id'] = $id;
        
        $user = $userService->save($data);
        
        if($user) {
            return $user;
        } else {
            return ['error' => 'Erro durante a alteração'];
        }
    }
    
    public function delete($id)
    {
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $entity = $em->getReference('SONUser\Entity\User', $id);
        
        $em->remove();
        $em->flush();
        
        return ['success' => true];
    }
}
