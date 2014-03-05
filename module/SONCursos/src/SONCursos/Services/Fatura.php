<?php

namespace SONCursos\Service;

use Doctrine\ORM\EntityManager;

use SONUser\Entity\User;
use SONCursos\Entity\Curso;
use SONCursos\Entity\Fatura as FaturaEntity;

use SONCursos\Service\Matricula as MatriculaService;

class Fatura
{
    private $em;
    
    private $matriculaService;
    
    public function __construct(EntityManager $em, MatriculaService $matriculaService) 
    {
        $this->em = $em;
        $this->matriculaService = $matriculaService;
    }
    
    public function create($user, array $cursos)
    {
        if(!$user instanceof User) {
            $user = $this->em->getReference('SONUser\Entity\Curso', $user);
        }
        
        $fatura = new FaturaEntity();
        $fatura->setUser($user);
        
        $total = 0;
        
        foreach($cursos as $curso) {
            if(!$curso instanceof Curso) {
                $curso = $this->em->getRepository('SONCursos\Entity\Curso')->find($curso);
            }
            
            if($this->matriculaService->isMatriculado($curso, $user)) {
                throw new \InvalidArgumentException(
                            sprintf("Usuario ja matriculado no curso %s", $curso->getNome())    
                        );
            }
            
            $fatura->addCurso($curso);
            $total += $curso->getValor();
        }
        
        $fatura->setValor($total);
        
        $this->em->persist($fatura);
        $this->em->flush();
        
        return $fatura;
    }
    
    public function save($fatura, $status) 
    {
        if(!$fatura instanceof FaturaEntity) {
            $fatura = $this->em->getReference('SONCursos\Entity\Fatura', $fatura);
        }
        
        if($status == $fatura::STATUS_AUTORIZADO) {
            $fatura->setStatus($fatura::STATUS_AUTORIZADO);
            $this->matriculaService->matricular($fatura);
        }
        
        $this->em->persist($fatura);
        $this->em->flush();
    }
}
