<?php

namespace SONUser\Entity;

use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository 
{
    public function findByEmailAndPassword($email, $password)
    {
        /** @var $user \SONUser\Entity\User */
        $user = $this->findOneByEmail($email);
        if($user) {
            $hashSenha = $user->encryptPassword($password);
            
            if($hashSenha == $user->getPassword()) {
                return $user;
            }
        }
        
        return;
    }
}
