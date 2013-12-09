<?php

namespace Users\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class LoginController extends AbstractActionController
{
    protected $authservice;
    
    public function indexAction()
    {
        $form = $this->getServiceLocator()->get('LoginForm');
        return new ViewModel(array(
            'form' => $form
        ));
    }
    
    public function processAction()
    {
        if(!$this->request->isPost()) {
            return $this->redirect()->toRoute(NULL, array(
                'controller' => 'login',
                'action' => 'index'
            ));
        }
        
        $post = $this->request->getPost();
        $form = $this->getServiceLocator()->get('LoginForm');
        
        $form->setData($post);
        if(!$form->isValid()) {
            $model = new ViewModel(array(
                'error' => true,
                'form' => $form
            ));
            $model->setTemplate('users/login/index');
            return $model;
        }else {
            $this->getAuthService()
                 ->getAdapter()
                 ->setIdentity($this->request->getPost('email'))
                 ->setCredential($this->request->getPost('password'));
            $result = $this->getAuthService()->authenticate();
            if($result->isValid()) {
                $this->getAuthService()
                     ->getStorage()
                     ->write($this->request->getPost('email'));
                return $this->redirect()->toRoute(NULL, array(
                    'controller' => 'login',
                    'action' => 'confirm'
                ));
            }else {
                $model = new ViewModel(array(
                    'error' => true,
                    'form' => $form
                ));
                $model->setTemplate('users/login/index');
                return $model;
            }
        }
    }
    
    public function confirmAction()
    {
        $user_email = $this->getAuthService()->getStorage()->read();
        $viewModel = new ViewModel(array(
            'user_email' => $user_email
        ));
        return $viewModel;
    }
    
    public function getAuthService()
    {
        if(!$this->authservice) {
            $this->authservice = $this->getServiceLocator()->get('AuthService');
        }
        return $this->authservice;
    }
}
