<?php

namespace SONCursos\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="cursos")
 */
class Curso
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $nome;
    
    /**
     * @ORM\Column(type="decimal", precision=2, scale=1)
     */
    protected $valor;
    
    public function getId()
    {
        return $this->id;
    }
    
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }
    
    public function getNome()
    {
        return $this->nome;
    }
    
    public function setValor($valor)
    {
        $this->valor = $valor;
        return $this;
    }
    
    public function getValor()
    {
        return $this->valor;
    }
}
