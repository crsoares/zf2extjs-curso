<?php

namespace Users\Form;

use Zend\Form\Form;

class RegisterForm extends Form 
{
    public function __construct()
    {
        parent::__construct('Register');
        $this->setAttribute('method', 'post');
        $this->setAttribute('enctype', 'multipart/form-data');
        
        $this->add(array(
            'name' => 'name',
            'attributes' => array(
                'type' => 'text'
            ),
            'options' => array(
                'label' => 'Nome completo'
            )
        ));
        
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
                            \Zend\Validator\EmailAddress::INVALID_FORMAT => 'Formato de endereço de e-mail é inválido'
                        )
                    )
                )
            )
        ));
        
        $this->add(array(
            'name' => 'password',
            'attributes' => array(
                'type' => 'password'
            ),
            'options' => array(
                'label' => 'Senha'
            )
        ));
        
        $this->add(array(
            'name' => 'confirm_password',
            'attributes' => array(
                'type' => 'password'
            ),
            'options' => array(
                'label' => 'Confirmar Senha'
            )
        ));
        
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Salvar'
            )
        ));
    }
}
