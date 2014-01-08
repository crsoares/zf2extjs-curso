<?php

namespace Estudo\Form;

use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Stdlib\Hydrator\ClassMethods as ClassMethodsHydrator;

use Estudo\Entity\Category;

class CategoryFieldset extends Fieldset implements InputFilterProviderInterface 
{
    public function __construct()
    {
        parent::__construct('category');
        $this->setHydrator(new ClassMethodsHydrator(false))
             ->setObject(new Category());
        
        $this->setLabel('Category');
        
        $this->add(array(
            'name' => 'name',
            'options' => array(
                'label' => 'Nome da categoria'
            ),
            'attributes' => array(
                'required' => 'required',
            )
        ));
    }
    
    public function getInputFilterSpecification()
    {
        return array(
            'name' => array(
                'required' => true,
            )
        );
    }
}
