<?php

namespace SONUser\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use SONUser\Entity\User;

class LoadUser extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setNome('Crysthiano')
             ->setEmail('crysthiano@teste.com')
             ->setPassword(123)
             ->setActive(true);
        
        $manager->persist($user);
        $this->addReference('user1', $user);
        
        $user2 = new User();
        $user2->setNome('Maria')
             ->setEmail('maria@teste.com')
             ->setPassword(1234)
             ->setActive(true);
        
        $manager->persist($user2);
        $this->addReference('user2', $user2);
        
        $manager->flush();
    }
    
    public function getOrder()
    {
        return 1;
    }
}
