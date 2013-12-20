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
                    'name' => 'EmailAddress'
                )
            )
        ));
        
        $this->add(array(
            'name' => 'name',
            'required' => true,
            'filters' => array(
                array(
                    'name' => 'StringTrim'
                )
            )
        ));
    }
}
