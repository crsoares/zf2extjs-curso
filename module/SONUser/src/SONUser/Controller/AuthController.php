<?php

namespace SONUser\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Storage\Session as SessionStorage;

use SONUser\Form\Login as LoginForm;

class AuthController extends AbstractActionController 
{
    public function indexAction()
    {
        $form = new LoginForm();
        $error = false;
        
        $request = $this->getRequest();
        if($request->isPost()) {
            $form->setData($request->getPost());
            if($form->isValid()) {
                $data = $form->getData();
                
                $auth = new AuthenticationService();
                $sessionStorage = new SessionStorage();
                
                $auth->setStorage($sessionStorage);
                
                $authAdapter = $this->getServiceLocator()->get('SONUser\Auth\Adapter');
                $authAdapter->setUsername($data['email'])
                            ->setPassword($data['password']);
                
                $result = $auth->authenticate($authAdapter);
                
                if($result->isValid()) {
                    $sessionStorage->write($auth->getIdentity()['user'], null);
                    return $this->redirect()->toRoute('sonuser-admin', array('controller' => 'users'));
                }else {
                    $error = true;
                }
            }
        }
        return new ViewModel(array(
                    'form' => $form,
                    'error' => $error
                ));
    }
}
