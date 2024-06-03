<?php

declare(strict_types=1);

namespace Familiares\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

use Laminas\Db\Adapter\Adapter;
use Familiares\Model\Table\FamiliaresTable;
use Familiares\Form\Familiares\FamiliaresForm;
use RuntimeException;

class FamiliaresController extends AbstractActionController
{
    private $adapter;
    private $familiaresTable;
    public function __construct(Adapter $adapter, FamiliaresTable $familiaresTable)
    {
        $this->adapter = $adapter;
        $this->familiaresTable = $familiaresTable;
    }

    public function indexAction()
    {
        $obj = $this->familiaresTable->listarTodosFamilias();
        $page = (int) $this->params()->fromQuery('page', 1); # sorry i forgot this line..
        $page = ($page < 1) ? 1 : $page;
        return new ViewModel(['familias' => $obj]);
        //return new ViewModel();
    }

    public function addfamiliarAction()
    {
        $formFamiliar = new FamiliaresForm();
        $request = $this->getRequest();
        $id = (int) $this->params()->fromRoute('id', 0);
        if ($request->isPost()) {
            $formData = $request->getPost()->toArray();
            $formFamiliar->setData($formData);
            if ($formFamiliar->isValid()) {
                try {
                    $data = $formFamiliar->getData();                    
                    $this->familiaresTable->guardar($data);
                    $this->flashMessenger()->addSuccessMessage('Los datos se han Guardado con Exito');
                    return $this->redirect()->toRoute('familiares');
                } catch (RuntimeException $exception) {
                    $this->flashMessenger()->addErrorMessage($exception->getMessage());
                    return $this->redirect()->refresh(); # refresh this page to view errors
                }
            }
        }
        return new ViewModel(['form' => $formFamiliar,'id' => $id]);
    }
}
