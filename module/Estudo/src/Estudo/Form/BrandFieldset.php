<?php

namespace Estudo\Form;

use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Stdlib\Hydrator\ClassMethods as ClassMethodsHydrator;

use Estudo\Entity\Brand;

class BrandFieldset extends Fieldset implements InputFilterProviderInterface
{
    public function __construct()
    {
        parent::__construct('brand');
        $this->setHydrator(new ClassMethodsHydrator(false))
             ->setObject(new Brand());
        
        $this->add(array(
            'name' => 'name',
            'options' =>array(
                'label' => 'Nome da marca'
            ),
            'attributes' => array(
                'required' => 'required'
            )
        ));
        
        $this->add(array(
            'name' => 'url',
            'type' => 'Zend\Form\Element\Url',
            'options' => array(
                'label' => 'Site da marca'
            ),
            'attributes' => array(
                'required' => 'required'
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
