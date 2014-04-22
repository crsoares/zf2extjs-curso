<?php

namespace Jquery\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
	public function indexAction()
	{
		$request = $this->getRequest();
		$response = $this->getResponse();
		if($request->isPost()) {
			//echo 'akiii';die;
			$data = $request->getPost();
			$view_param = array('nome' => $data['nome']);
			//$view_param = array('nome' => 'Crysthiano');
			$viewModel = new ViewModel($view_param);
			$viewModel->setTemplate('jquery/index/index.phtml');

			$html = $this->getServiceLocator()->get('ViewRenderer')->render($viewModel);
			//$viewModel->setTerminal(true);
			$response->setContent($html);

			return $response;
		}else {
			return new ViewModel();
		}
	}
}