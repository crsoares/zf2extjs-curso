<?php

namespace Users\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class UserManagerController extends AbstractActionController 
{
    public function indexAction()
    {
        $userTable = $this->getServiceLocator()->get('UserTable');
        $viewModel = new ViewModel(array(
            'users' => $userTable->fetchAll()
        ));
        return $viewModel;
    }
    
    public function editAction()
    {
        $userTable = $this->getServiceLocator()->get('UserTable');
        $user = $userTable->getUser($this->params()->fromRoute('id'));
        $form = $this->getServiceLocator()->get('UserEditForm');
        //print_r($user);die;
        $form->bind($user);
        $viewModel = new ViewModel(array(
            'form' => $form,
            'user_id' => $this->params()->fromRoute('id')
        ));
        return $viewModel;
    }
    
    public function processAction()
    {
        //Obter ID do usuário a partir de POST
        $post = $this->request->getPost();
        $userTable = $this->getServiceLocator()->get('UserTable');
        //Entidade Carrega Usuário
        $user = $userTable->getUser($post->id);
        //Entidade de usuário Bind ao Formulário
        $form = $this->getServiceLocator()->get('UserEditForm');
        $form->bind($user);
        $form->setData($post);
        //Salve usuário
        $this->getServiceLocator()
             ->get('UserTable')
             ->saveUser($user);
    }
    
    public function deleteAction()
    {
        $this->getServiceLocator()
             ->get('UserTable')
             ->deleteUser($this->params()->fromRoute('id'));
    }
}
