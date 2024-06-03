<?php

declare(strict_types=1);

namespace Clientes\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class ClientesController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }

}
