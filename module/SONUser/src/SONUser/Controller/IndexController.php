<?php

namespace SONUser\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        /** @var $em \Doctrine\ORM\EntityManager */
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $users = $em->getRepository('SONUser\Entity\User')->findAll();
        return new ViewModel(array('users' => $users));
    }
}
