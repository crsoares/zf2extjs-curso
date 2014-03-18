<?php

namespace Teste\Form;

use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;

class UserFieldset extends Fieldset implements InputFilterProviderInterface
{
	public function __construct()
	{
		parent::__construct('user');
		$this->setHydrator(new \Zend\Stdlib\Hydrator\Reflection());
		$this->setObject(new \Teste\Entity\User());
		//$this->bind(new \Teste\Entity\User());

		$this->add(array(
			'name' => 'name',
			'attributes' => array(
				'type' => 'text',
				'id' => 'name'
			), 
			'options' => array(
				'id' => 'name',
				'label' => 'Digite o nome de Usuario:'
			)
		));

		$this->add(array(
			'name' => 'email',
			'attributes' => array(
				'type' => 'email'
			),
			'options' => array(
				'id' => 'email',
				'label' => 'Digite o email do usuario:'
			)
		));

		$this->add(array(
			'type' => 'Teste\Form\UserAddressFieldset'
		));
	}

	public function getInputFilterSpecification()
	{
		return array(
			'email' => array(
				'validators' => array(
					array(
						'name' => 'NotEmpty',
						'break_chain_on_failure' => true,
						'options' => array(
							'messages' => array(
								\Zend\Validator\NotEmpty::IS_EMPTY => 'Este Campo é de preenchimento obrigatorio.',
							)
						)
					),
					array(
						'name' => 'EmailAddress',
						'options' => array(
							'messages' => array(
								\Zend\Validator\EmailAddress::INVALID_FORMAT => 'Digite um endereço de email valido.'
							)
						)
					)
				)
			),
			'name' => array(
				'validators' => array(
					array(
						'name' => 'NotEmpty',
						'options' => array(
							'messages' => array(
								\Zend\Validator\NotEmpty::IS_EMPTY => 'Este campo é de preenchimento obrigatorio.'
							)
						)
					) 
				),
				'filters' => array(
					array(
						'name' => 'StringTrim'
					)
				)
			)
		);
	}
}