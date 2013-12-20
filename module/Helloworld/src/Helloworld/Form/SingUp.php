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
        $this->setInputFilter(new SingUpFilter());
        
        $this->add(array(
            'name' => 'name',
            'attributes' => array(
                'type' => 'Text',
            ),
            'options' => array(
                'label' => 'Seu nome'
            )
        ));
        
        $this->add(array(
            'name' => 'email',
            'attributes' => array(
                'type' => 'email',
            ),
            'options' => array(
                'label' => 'Seu email'
            )
        ));
        
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Adicionar'
            )
        ));
    }
}
