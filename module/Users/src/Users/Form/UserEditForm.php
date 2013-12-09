<?php

namespace Users\Form;

use Zend\Form\Form;

class UserEditForm extends Form 
{
    public function __construct()
    {
        parent::__construct('Editar usuario');
        $this->setAttribute('method', 'post');
        $this->setAttribute('enctype', 'multipart/form-data');
        
        $this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type' => 'hidden'
            )
        ));
    }
}
