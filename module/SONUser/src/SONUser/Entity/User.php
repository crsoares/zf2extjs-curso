<?php

namespace SONUser\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $nome;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $email;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $password;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $salt;
    
    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $active;
    
    /**
     * @ORM\Column(type="string", name="activation_key")
     */
    protected $activationKey;
    
    /**
     * @ORM\Column(type="string", name="token")
     */
    protected $token;
    
    /**
     * @ORM\Column(type="datetime", name="created_at")
     */
    protected $createdAt;
    
    /**
     * @ORM\Column(type="datetime", name="updated_at")
     */
    protected $updatedAt;
    
    public function __construct()
    {
        $this->salt = base_convert(sha1(uniqid(mt_rand(), true)), 16, 36);
        $this->createdAt = new \Datetime("now");
        $this->updatedAt = new \Datetime("now");
        $this->activationKey = shar1($this->email.$this->salt);
        $this->token = base_convert(sha1(uniqid(mt_rand(), true)), 16, 36);
        
    }
    
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setNome($nome) {
        $this->nome = $nome;
        return $this;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }
    
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }
    
    public function getPassword()
    {
        return $this->password;
    }
    
    public function setSalt($salt)
    {
        $this->salt = $salt;
        return $this;
    }
    
    public function getSalt()
    {
        return $this->salt;
    }
    
    public function setActive($active)
    {
        $this->active = $active;
        return $this;
    }
    
    public function getActive()
    {
        return $this->active;
    }
    
    public function setActivationKey($activationKey)
    {
        $this->activationKey = $activationKey;
        return $this;
    }
    
    public function getActivationKey()
    {
        return $this->activationKey;
    }
    
    public function setToken($token)
    {
        $this->token = $token;
        return $this;
    }
    
    public function getToken()
    {
        return $this->token;
    }
    
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }
    
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
    
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
    
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }


}
