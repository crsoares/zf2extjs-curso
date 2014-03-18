<?php

namespace Teste\Validator;

use Zend\Validator\AbstractValidator;

class Special extends AbstractValidator
{
	const NOTSPECIAL = 'NOTSPECIAL';

	protected $messageTemplates = array(
		self::NOTSPECIAL => 'Valor deve pelo menos um caractere especial.'
	);

	public function __construct(array $options = array())
	{
		parent::__construct();
	}

	public function isValid($value)
	{
		$this->setValue($value);

		$special = preg_match('#[\W]{1,}#', $value);

		if(!$special) {
			$this->error(self::NOTSPECIAL);
			return false;
		}

		return true;
	}
}