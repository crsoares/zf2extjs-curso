<?php

namespace Teste\Form;

use Zend\Form\Form;
use Zend\InputFilter\InputFilter;

class SignUpFilter extends InputFilter
{
	public function __construct()
	{
		$this->add(array(
			'name' => 'email',
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
							\Zend\Validator\EmailAddress::INVALID_FORMAT => 'Por favor insira um email válido.'
						)
					)
				)
			)
		));

		$this->add(array(
			'name' => 'name',
			'validators' => array(
				array(
					'name' => 'NotEmpty',
					'options' => array(
						'messages' => array(
							\Zend\Validator\NotEmpty::IS_EMPTY => 'Por favor, digite suas informações.'
						)
					)
				)
			),
			'filters' => array(
				array(
					'name' => 'StringTrim',
				)
			)
		));
	}
}