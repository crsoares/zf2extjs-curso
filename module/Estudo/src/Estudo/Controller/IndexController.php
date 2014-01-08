<?php

namespace Estudo\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Estudo\Form\CreateProduct;
use Estudo\Entity\Product;

class IndexController extends AbstractActionController 
{
    public function indexAction()
    {
        $form = new CreateProduct();
        $product = new Product();
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        //$product = $this->getServiceLocator()->get('Estudo\Entity\Product');
        $form->bind($product);
        
        if($this->request->isPost()) {
            $form->setData($this->request->getPost());
            
            if($form->isValid()) {
                $em->persist($product);
                $em->flush();die;
                var_dump($product);
                
            }
        }
        
        return new ViewModel(array('form' => $form));
    }
}