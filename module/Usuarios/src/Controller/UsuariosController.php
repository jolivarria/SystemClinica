<?php

declare(strict_types=1);

namespace Usuarios\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class UsuariosController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }
    public function loginAction()
    {
        return new ViewModel();
    }

}
