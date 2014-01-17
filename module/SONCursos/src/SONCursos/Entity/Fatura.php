<?php

namespace SONCursos\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="faturas")
 */
class Fatura
{
    const STATUS_PENDENTE = 0;
    const STATUS_AUTORIZADO = 1;
    
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    protected $id;
    
    /**
     * @ORM\Column(type="integer")
     */
    protected $status;
    
    /**
     * @ORM\Column(type="datetime")
     */
    protected $pagamento;
    
    /**
     * @ORM\Column(type="decimal", precision=2, scale=1)
     */
    protected $valor;
    
    /**
     * @ORM\ManyToMany(targetEntity="SONCursos\Entity\Curso")
     * @ORM\JoinTable(name="faturas_cursos",
     *       joinColumns={@ORM\JoinColumn(name="fatura_id", referencedColumnName="id")},
     *       inverseJoinColumns={@ORM\JoinColumn(name="curso_id", referencedColumnName="id")})
     */
    protected $cursos;
    
    /**
     * @ORM\ManyToOne(targetEntity="SONUser\Entity\User")
     * @ORM\JoinColumn(name="user", referencedColumnName="id")
     */
    protected $user;
    
    /**
     * @ORM\Column(type="datetime")
     */
    protected $created;
    
    /**
     * @ORM\Column(type="datetime")
     */
    protected $updated;
    
    public function __construct()
    {
        $this->user = new ArrayCollection();
    }
}
