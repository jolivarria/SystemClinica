<?php

declare(strict_types=1);

namespace Pago\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }
    public function rescateAction()
    {
        return new ViewModel();
    }
    public function saveAction()
    {
        return new ViewModel();
    }
}
