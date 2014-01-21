<?php

namespace SONCursos\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;

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
     * @ORM\Column(type="smallint")
     */
    protected $status;
    
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $pagamento;
    
    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
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
     * @Gedmo\Timestampable(on="create")
     */
    protected $created;
    
    /**
     * @ORM\Column(type="datetime")
     * @Gedmo\Timestampable(on="update")
     */
    protected $updated;
    
    public function __construct()
    {
        $this->status = self::STATUS_PENDENTE;
        $this->user = new ArrayCollection();
    }
    
    public function getId() {
        return $this->id;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getPagamento() {
        return $this->pagamento;
    }

    public function getValor() {
        return $this->valor;
    }

    public function getCursos() {
        return $this->cursos;
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

    public function setStatus($status) {
        $this->status = $status;
        return $this;
    }

    public function setPagamento($pagamento) {
        $this->pagamento = $pagamento;
        return $this;
    }

    public function setValor($valor) {
        $this->valor = $valor;
        return $this;
    }

    public function addCursos($cursos) {
        $this->cursos[] = $cursos;
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


}
