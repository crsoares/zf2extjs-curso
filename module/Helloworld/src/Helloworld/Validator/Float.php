<?php

namespace Helloworld\Validator;

use Zend\Validator\AbstractValidator;

class Float extends AbstractValidator
{
    const FLOAT = "float";
    
    protected $messageTemplates = array(
        self::FLOAT => "'%value%' não é um valor float."
    );
    
    public function isValid($value)
    {
        $this->setValue($value);
        
        if(!is_float($value)) {
            $this->error(self::FLOAT);
            return false;
        }
        
        return true;
    }
}
