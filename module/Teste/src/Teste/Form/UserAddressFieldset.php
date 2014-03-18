<?php

namespace Teste\Form;

use Zend\Form\Fieldset;

class UserAddressFieldset extends Fieldset
{
	public function __construct()
	{
		parent::__construct('userAddress');
		$this->setHydrator(new \Zend\Stdlib\Hydrator\Reflection());
		$this->setObject(new \Teste\Entity\UserAddress());

		$this->add(array(
			'name' => 'street',
			'attributes' => array(
				'type' => 'text',
			),
			'options' => array(
				'label' => 'rua:'
			),
		));

		$this->add(array(
			'name' => 'streetNumber',
			'attributes' => array(
				'type' => 'text',
			),
			'options' => array(
				'label' => 'numero da rua:'
			)
		));

		$this->add(array(
			'name' => 'zipcode',
			'attributes' => array(
				'type' => 'text',
			),
			'options' => array(
				'label' => 'Seu CEP::'
			)
		));

		$this->add(array(
			'name' => 'city',
			'attributes' => array(
				'type' => 'text',
			),
			'options' => array(
				'label' => 'Cidade:'
			)
		));
	}
}