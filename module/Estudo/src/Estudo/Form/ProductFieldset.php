<?php

namespace Estudo\Form;

use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Stdlib\Hydrator\ClassMethods as ClassMethodsHydrator;

use Estudo\Entity\Product;

class ProductFieldset extends Fieldset implements InputFilterProviderInterface 
{
    public function __construct()
    {
        parent::__construct('product');
        $this->setHydrator(new ClassMethodsHydrator(false))
             ->setObject(new Product());
        
        $this->add(array(
            'name' => 'name',
            'options' => array(
                'label' => 'Nome do produto',
            ),
            'attributes' => array(
                'required' => 'required',
            )
        ));
        
        $this->add(array(
            'name' => 'price',
            'options' => array(
                'label' => 'Preço do produto'
            ),
            'attributes' => array(
                'required' => 'required',
            )
        ));
        
        $this->add(array(
            'name' => 'brand',
            'type' => 'Estudo\Form\BrandFieldset',
            'options' => array(
                'label' => 'Marca do produto'
            )
        ));
        
        $this->add(array(
            'name' => 'categories',
            'type' => 'Zend\Form\Element\Collection',
            'options' => array(
                'label' => 'Por favor, escolher categorias para este produto',
                'count' => 2,
                'should_create_template' => true,
                'allow_add' => true,
                'target_element' => array(
                    'type' => 'Estudo\Form\CategoryFieldset',
                )
            )
        ));
    }
    
    public function getInputFilterSpecification()
    {
        return array(
            'name' => array(
                'required' => true,
            ),
            'price' => array(
                'required' => true,
                'validators' => array(
                    array('name' => 'Float')
                )
            )
        );
    }
}