<?php

namespace Teste\Entity;

use Zend\Form\Annotation as FORM;

/** 
 * @FORM\Hydrator("Zend\Stdlib\Hydrator\ObjectProperty")
 * @FORM\Name("Student")	
 */
class Student
{
	/**
	 * @FORM\Type("Zend\Form\Element\Text")
	 * @FORM\Required({"required":"true"})
	 * @FORM\Filter({"name":"StripTags"})
	 * @FORM\Filter({"name":"StringToUpper"})
	 * @FORM\Validator({"name":"StringLength", "options":{"min":"5"}})
	 * @FORM\Options({"label":"Digite o codigo:"})
	 */
	public $id;

	/**
	 * @FORM\Type("Zend\Form\Element\Text")
	 * @FORM\Required({"required":"true"})
	 * @FORM\Filter({"name":"StripTags"})
	 * @FORM\Validator({"name":"StringLength", "options":{"min":"1"}})
	 * @FORM\Options({"label":"Digite o nome:"})
	 */
	public $name;

	/**
	 * @FORM\Type("Zend\Form\Element\Radio")
	 * @FORM\Required({"required":"true"})
	 * @FORM\Filter({"name":"StripTags"})
	 * @FORM\Options({"label":"Sexo:", "value_options":{"1":"Masculino","2":"Feminino"}})
	 * @FORM\Validator({"name":"InArray", "options":{"haystack":{"1","2"},"messages":{"notInArray":{"Sexo não é valido"}}}})
	 * @FORM\Attributes({"value":"1"})
	 */
	public $sexo;

	/**
	 * @FORM\Type("Zend\Form\Element\Select")
	 * @FORM\Required({"required":"true"})
	 * @FORM\Filter({"name":"StripTags"})
	 * @FORM\Options({"label":"Class:", "value_options":{"0":"Selecione uma classe","1":"A","2":"B"}})
	 * @FORM\Attributes({"value":"0"})
	 */
	public $classe;

	/**
	 * @FORM\Type("Zend\Form\Element\Submit")
	 * @FORM\Attributes({"value":"submit"})
	 */
	public $submit;
}