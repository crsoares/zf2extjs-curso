<?php

namespace Helloworld\Form;

use Zend\Form\Form;

class Login extends Form 
{
    public function __construct()
    {
        parent::__construct('login');
        $this->setAttribute('action', '/login');
        $this->setAttribute('method', 'post');
        $this->setInputFilter(new LoginFilter());
        
        $this->add(array(
            'name' => 'username',
            'attributes' => array(
                'type' => 'text'
            ),
            'options' => array(
                'label' => 'Nome de usuario:'
            )
        ));
        
        $this->add(array(
            'name' => 'password',
            'attributes' => array(
                'type' => 'password'
            ),
            'options' => array(
                'label' => 'Senha:'
            )
        ));
        
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Entrar'
            )
        ));
    }
}
