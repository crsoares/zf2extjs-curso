<?php

namespace SONCursos;

/**
 * @ORM\Entity
 * @ORM\Table(name="faturas")
 */
class Fatura
{
    const STATUS_PENDENTE = 0;
    const STATUS_AUTORIZADO = 1;
    
    protected $id;
    protected $status;
    protected $pagamento;
    protected $valor;
    protected $cursos;
    protected $user;
    protected $created;
    protected $updated;
}
