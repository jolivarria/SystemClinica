<?php

declare(strict_types=1);

namespace Traslados\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

use Laminas\Db\Adapter\Adapter;
use Traslados\Model\Table\TrasladosTable;

use RuntimeException;

class TrasladosController extends AbstractActionController
{
    private $adapter;
    private $trasladosTable;
    
    public function __construct(Adapter $adapter, TrasladosTable $trasladosTable)
    {
        $this->adapter = $adapter;
        $this->trasladosTable = $trasladosTable;
    }

    public function indexAction()
    {
        $obj = $this->trasladosTable->listarTodos();
        $page = (int) $this->params()->fromQuery('page', 1); # sorry i forgot this line..
        $page = ($page < 1) ? 1 : $page;
        return new ViewModel(['traslados' => $obj]);
        //return new ViewModel();*/
    }
    
}
