<?php

namespace SONUser\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
//use Doctrine\Common\DataFixtures\Doctrine;
use Doctrine\Common\Persistence\ObjectManager;
use SONUser\Entity\User;

class LoadUser extends AbstractFixture 
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setNome('Crysthiano')
             ->setEmail('crysthiano@teste.com')
             ->setPassword(123)
             ->setActive(true);
        
        $manager->persist($user);
        
        $user2 = new User();
        $user2->setNome('Maria')
             ->setEmail('maria@teste.com')
             ->setPassword(1234)
             ->setActive(true);
        
        $manager->persist($user2);
        
        $manager->flush();
    }
}
