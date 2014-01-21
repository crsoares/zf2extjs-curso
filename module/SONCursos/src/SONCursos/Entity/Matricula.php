<?php

namespace SONCursos\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity;
 * @ORM\Table(name="matriculas")
 */
class Matricula
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="SONCursos\Entity\Curso", inversedBy="matriculas")
     */
    protected $curso;
    
    /**
     * @ORM\ManyToOne(targetEntity="SONUser\Entity\User")
     */
    protected $user;
    
    /**
     * @ORM\ManyToOne(targetEntity="SONCursos\Entity\Fatura")
     * @ORM\JoinColumn(name="fatura_id", referencedColumnName="id")
     */
    protected $fatura;
    
    /**
     * @ORM\Column(type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    protected $created;
    
    /**
     * @ORM\Column(type="datetime")
     * @Gedmo\Timestampable(on="update")
     */
    protected $updated;
    
    public function __construct($curso, $user)
    {
        $this->curso = $curso;
        $this->user = $user;
    }
    
    public function getId() {
        return $this->id;
    }

    public function getCurso() {
        return $this->curso;
    }

    public function getUser() {
        return $this->user;
    }

    public function getCreated() {
        return $this->created;
    }

    public function getUpdated() {
        return $this->updated;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setCurso($curso) {
        $this->curso = $curso;
        return $this;
    }

    public function setUser($user) {
        $this->user = $user;
        return $this;
    }
    
    public function setCreated($created) {
        $this->created = $created;
        return $this;
    }

    public function setUpdated($updated) {
        $this->updated = $updated;
        return $this;
    }

    public function getFatura() {
        return $this->fatura;
    }

    public function setFatura($fatura) {
        $this->fatura = $fatura;
        return $this;
    }


    
}
