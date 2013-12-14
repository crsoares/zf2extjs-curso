<?php

namespace Helloworld\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class WidgetController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }
}
