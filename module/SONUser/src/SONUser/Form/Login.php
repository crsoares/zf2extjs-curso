<?php

namespace SONUser\Form;

use Zend\Form\Form;

class Login extends Form 
{
    public function __construct()
    {
        parent::__construct('login');
        $this->setAttribute('method', 'post');
        
        $this->add(array(
            'name' => 'email',
            'options' => array(
                'type' => 'email',
                'label' => 'Email'
            ),
            'attributes' => array(
                'placeholder' => 'Entre com o email'
            )
        ));
        
        $this->add(array(
           'name' => 'password',
            'options' => array(
                'type' => 'password',
                'label' => 'Senha'
            ),
            'attributes' => array(
                'type' => 'password'
            )
        ));
        
        $this->add(array(
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => array(
                'value' => 'Login',
                'class' => 'btn-success'
            )
        ));
    }
}
