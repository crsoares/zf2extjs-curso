<?php

namespace Teste\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Zend\Form\Annotation\AnnotationBuilder;
use Teste\Entity\Student;

use Teste\Form\SignUp;

class IndexController extends AbstractActionController
{
	public function indexAction()
	{
		$form = new SignUp();
		//$form->setHydrator(new \Zend\Stdlib\Hydrator\Reflection());
		$form->bind(new \Teste\Entity\User());

		if($this->getRequest()->isPost()) {
			$form->setData($this->getRequest()->getPost());

			if($form->isValid()) {
				var_dump($form->getData());die;
			}else {
				return new ViewModel(array('form' => $form));
			}
		}else {
			return new ViewModel(array('form' => $form));
		}
	}

	public function newAction()
	{
		$student = new Student();
		$builder = new AnnotationBuilder();
		$form = $builder->createForm($student);
		if($this->getRequest()->isPost()) {
			$form->bind($student);
			$form->setData($this->getRequest()->getPost());

			if($form->isValid()) {
				print_r($form->getData());
			}
		}

		return array('form' => $form);
	}

	public function filterAction()
	{
		$form = $this->getServiceLocator()
			         ->get('FormElementManager')
			         ->get('SampleForm');

		if($this->getRequest()->isPost()) {
			$form->setData($this->getRequest()->getPost());
			if($form->isValid()) {
				echo "Forma Great! É válido";
			}
		}

		$viewmodel = new ViewModel;
		$viewmodel->setVariable('form', $form);

		return $viewmodel;
	}
}