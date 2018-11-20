<?php

require_once 'Core/Controller.php';

class CategoriaFuncionarioController extends Controller
{

    private $view;

    public function __construct() {
        $this->CategoriaFuncionario = parent::loadModel("CategoriaFuncionario");
    }

    public function index($param) {

        $categoriasFuncionario = $this->CategoriaFuncionario->select();
        $count = $this->CategoriaFuncionario->countTotal();

        require_once parent::loadView('CategoriaFuncionario', $this->view);

    }

    public function setView($a) {
        $this->view = $a;
    }

}
