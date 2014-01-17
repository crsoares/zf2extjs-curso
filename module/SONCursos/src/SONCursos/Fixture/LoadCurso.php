<?php

namespace SONCursos;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\Doctrine;
use Doctrine\Common\Persistence\ObjectManager;

use SONCursos\Entity\Curso;

class LoadCurso extends AbstractFixture
{
    public function load(ObjectManager $manager)
    {
        $curso = new Curso();
        $curso->setNome('PHP Avançado')
              ->setValor('99.99');
        
        $manager->persist($curso);
        $manager->flush();
    }
}
