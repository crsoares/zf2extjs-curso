<?php

namespace Estudo\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="category")
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $name;
    
    /**
     * @ORM\ManyToOne(targetEntity="Estudo\Entity\Product", inversedBy="categories", cascade={"persist"})
     * @ORM\JoinColumn(name="products_id", referencedColumnName="id")
     */
    protected $products;
    
    public function getId()
    {
        return $this->id;
    }
    
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function setProducts($products)
    {
        $this->products = $products;
        return $this;
    }
    
    public function getProducts()
    {
        return $this->products;
    }
}
