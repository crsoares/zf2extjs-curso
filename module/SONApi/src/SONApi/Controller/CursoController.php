<?php

namespace SONApi\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;

class CursoController extends AbstractRestfulController {
    
    public function getList()
    {
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $entity = $em->getRepository('SONCursos\Entity\Curso')->findAll();
        
        return $entity;
    }
    
    public function get($id)
    {
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $entity = $em->getRepository('SONCursos\Entity\Curso')->find($id);
        
        return $entity;
    }
    
    public function create($data)
    {
        $serviceCurso = $this->getServiceLocator()->get('SONCursos\Service\Curso');
        $curso = $serviceCurso->save($data);
        
        if($curso) {
            return $curso;
        } else {
            return ['error' => 'Erro durante a inclusão'];
        }
    }
    
    public function update($id, $data)
    {
        $serviceCurso = $this->getServiceLocator()->get('SONCurso\Service\Curso');
        $data['id'] = $id;
        
        $curso = $serviceCurso->save($data);
        
        if($curso) {
            return $curso;
        } else {
            return ['error' => 'Erro durante a alteração'];
        }
    }
    
    public function delete($id)
    {
        $em = $this->getServiceLocator()->get('Doctrine\ORM\Entity');
        $entity = $em->getReference('SONCursos\Entity\Curso', $id);
        
        $em->persist($entity);
        $em->flush();
        
        return ['success' => true];
    }
    
}
