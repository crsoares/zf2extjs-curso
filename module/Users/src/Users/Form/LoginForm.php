<?php

namespace Users\Form;

use Zend\Form\Form;

class LoginForm extends Form
{
    public function __construct()
    {
        parent::__construct('Login');
        $this->setAttribute('method', 'post');
        $this->setAttribute('enctype', 'multipath/form-data');
        
        $this->add(array(
            'name' => 'email',
            'attributes' => array(
                'type' => 'email'
            ),
            'options' => array(
                'label' => 'Email'
            ),
            'attributes' => array(
                'required' => 'required'
            ),
            'filters' => array(
                array('name' => 'StringTrim')
            ),
            'validators' => array(
                array(
                    'name' => 'EmailAddress',
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\EmailAddress::INVALID_FORMAT => 'Formato de endere�o de e-mail � inv�lido'
                        )
                    )
                )
            )
        ));
        
        $this->add(array(
            'name' => 'password',
            'attributes' => array(
                'type' => 'password',
                'required' => 'required'
            ),
            'options' => array(
                'label' => 'Password'
            ),
            'validators' => array(
                'messages' => 'Compo de preenchimento obrigatorio'
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
