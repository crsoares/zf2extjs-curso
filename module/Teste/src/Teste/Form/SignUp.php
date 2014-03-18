<?php

namespace Teste\Form;

use Zend\Form\Form;

class SignUp extends Form
{
	public function __construct()
	{
		parent::__construct('signUp');
		$this->setAttribute('method', 'post');
		$this->setAttribute('action', '/form');
		//$this->setInputFilter(new SignUpFilter());

		$this->add(array(
			'name' => 'name',
			'attributes' => array(
				'type' => 'text',
				'id' => 'name',
			),
			'options' => array(
				'label' => 'Digite seu nome:',
				'id' => 'name'
			)
		));

		$this->add(array(
			'name' => 'email',
			'attributes' => array(
				'type' => 'email',
			),
			'options' => array(
				'label' => 'Digite seu email:',
				'id' => 'email',
			)
		));

		$this->add(array(
			'type' => 'Teste\Form\UserFieldset',
			'options' => array(
				'use_as_base_fieldset' => true,
			)
		));

		// $this->add(array(
		// 	'name' => 'age',
		// 	'type' => 'Zend\Form\Element\Number',
		// 	'attributes' => array(
		// 		'id' => 'age',
		// 		'min' => 18,
		// 		'max' => 99,
		// 		'step' => 1
		// 	),
		// 	'options' => array(
		// 		'label' => 'Qual é a sua idade?'
		// 	)
		// ));

		//$this->add(new UserFieldset());
		// $this->add(array(
		// 	'type' => 'Teste\Form\UserFieldset'
		// ));

		$this->add(array(
			'name' => 'submit',
			'attributes' => array(
				'type' => 'submit',
				'value' => 'Salvar',
			)
		));
	}
}