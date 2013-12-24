<?php

namespace Helloworld\Form;

use Zend\Form\Form;
use Zend\InputFilter\InputFilter;

class SingUpFilter extends InputFilter 
{
    public function __construct()
    {
        $this->add(array(
            'name' => 'email',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'Por favor, digite suas informações.'
                        )
                    )
                ),
                array(
                    'name' => 'EmailAddress',
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\EmailAddress::INVALID_FORMAT => 'Por favor coloque um e-mail válido.'
                        )
                    )
                )
            )
        ));
        
        $this->add(array(
            'name' => 'name',
            //'required' => true,
            'filters' => array(
                array(
                    'name' => 'StringTrim'
                )
            ),
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'Por favor, digite suas informações.'
                        )
                    )
                )
            )
        ));
    }
}
