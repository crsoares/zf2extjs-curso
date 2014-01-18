<?php

namespace SONCursos\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use SONCursos\Entity\Fatura;

class LoadFatura extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $user1 = $this->getReference('user1');
        $user2 = $this->getReference('user2');
        
        $curso1 = $this->getReference('curso1');
        $curso2 = $this->getReference('curso2');
        $curso3 = $this->getReference('curso3');
        
        $fatura = new Fatura();
        $fatura->setUser($user1)
               ->addCursos($curso1)
               ->addCursos($curso2)
               ->setValor($curso1->getValor()+$curso2->getValor())
               ->setPagamento(new \DateTime('tomorrow'))
               ->setStatus(1);
        
        $manager->persist($fatura);
        $this->addReference('fatura1', $fatura);
        
        $fatura = new Fatura();
        $fatura->setUser($user2)
               ->addCursos($curso3)
               ->setValor($curso3->getValor())
               ->setStatus(0);
        
        $manager->persist($fatura);
        $this->addReference('fatura2', $fatura);
        
        $manager->flush();
    }
    
    public function getOrder()
    {
        return 30;
    }
}
