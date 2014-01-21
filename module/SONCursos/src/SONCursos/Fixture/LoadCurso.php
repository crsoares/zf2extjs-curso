<?php

namespace SONCursos;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use SONCursos\Entity\Curso;

class LoadCurso extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $curso = new Curso();
        $curso->setNome('PHP Avançado')
              ->setValor('99.99');
        
        $manager->persist($curso);
        $this->addReference('curso1', $curso);
        
        $curso2 = new Curso();
        $curso2->setNome('Extjs')
                ->setValor('199.99');
        
        $manager->persist($curso2);
        $this->addReference('curso2', $curso2);
        
        $curso3 = new Curso();
        $curso3->setNome('ZF2')
               ->setValor('200.00');
        
        $manager->persist($curso3);
        $this->addReference('curso3', $curso3);
        
        $manager->flush();
    }
    
    public function getOrder()
    {
        return 10;
    }
}
