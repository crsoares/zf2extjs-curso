<?php

namespace Helloworld\Form;

use Zend\Form\Form;

class SingUp extends Form 
{
    public function __construct()
    {
        parent::__construct("SingUp");
        $this->setAttribute('action', '/sayhello');
        $this->setAttribute('method', 'post');
        //$this->setInputFilter(new SingUpFilter());
        
        $this->add(array(
            'type' => 'Helloworld\Form\UserFieldset',
            'options' => array(
                'use_as_base_fieldset' => true
            )
        ));
        
        /*$this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Add'
            )
        ));*/
        
        /*$this->add(array(
            'name' => 'name',
            'attributes' => array(
                'type' => 'text',
                'id' => 'name'
            ),
            'options' => array(
                'id' => 'name',
                'label' => 'Seu nome'
            )
        ));
        
        $this->add(array(
            'name' => 'email',
            'attributes' => array(
                'type' => 'email',
            ),
            'options' => array(
                'id' => 'email',
                'label' => 'Seu email'
            )
        ));*/
        
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Adicionar'
            )
        ));
        
        /*$this->add(array(
            'name' => 'age',
            'type' => 'Zend\Form\Element\Number',
            'attributes' => array(
                'id' => 'age',
                'min' => 18,
                'max' => 99,
                'step' => 1
            ),
            'options' => array(
                'label' => 'Qual e a sua idade?'
            )
        ));*/
    }
}
