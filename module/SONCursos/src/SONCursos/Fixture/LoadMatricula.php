<?php

namespace SONCursos\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use SONCursos\Entity\Matricula;

class LoadMatricula extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $user1 = $this->getReference('user1');
        $user2 = $this->getReference('user2');
        
        $curso1 = $this->getReference('curso1');
        $curso2 = $this->getReference('curso2');
        $curso3 = $this->getReference('curso3');
        
        $fatura1 = $this->getReference('fatura1');
        $fatura2 = $this->getReference('fatura2');
        
        $matricula = new Matricula($curso1, $user1);
        $matricula->setFatura($fatura1);
        $manager->persist($matricula);
        
        $matricula2 = new Matricula($curso2, $user2);
        $matricula2->setFatura($fatura2);
        $manager->persist($matricula2);
        
        $manager->flush();
    }
    
    public function getOrder()
    {
        return 40;
    }
}
