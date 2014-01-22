<?php

namespace SONCursos\Service;

use Doctrine\ORM\EntityManager;

use SONCursos\Entity\Matricula as MatriculaEntity;

use SONCursos\Entity\Fatura;

class Matricula
{
    private $em;
    
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    
    public function isMatriculado($curso, $user)
    {
        $repoMatricula = $this->em->getRepository('SONCursos\Entity\Matricula');
        $buscaMatriculado = $repoMatricula->findBy(array('curso' => $curso, 'user' => $user));
        
        if($buscaMatriculado) {
            return true;
        }
    }
    
    public function matricular(Fatura $fatura)
    {
        $user = $fatura->getUser();
        $curso = $fatura->getCursos();
        
        $matriculas = array();
        foreach($cursos as $curso) {
            if(!$this->isMatricula($curso, $user)) {
                $matricula = new MatriculaEntity($curso, $user);
                $matricula->setFatura($fatura);
                
                $this->em->persist($matricula);
                $this->em->flush();
                
                $matriculas[] = $matricula;
            }
            
            return $matriculas;
        }
    }
}
