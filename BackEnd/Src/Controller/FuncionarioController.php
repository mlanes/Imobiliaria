<?php

require_once 'Core/Controller.php';

class FuncionarioController extends Controller
{
    private $controller = 'Funcionario';
    private $view;

    public function __construct()
    {
        parent::__construct();
        $this->Funcionario = parent::loadModel("Funcionario");
    }

    public function index($param)
    {
        $funcionarios = $this->Funcionario->list();
        $this->CategoriaFuncionario = parent::loadModel("CategoriaFuncionario");
        $count = $this->Funcionario->countItems();
        require_once parent::loadView($this->controller, $this->view);
    }

    public function setView($a)
    {
        $this->view = $a;
    }

    public function add()
    {
    }

    public function edit(array $param)
    {
    }

    public function view(array $param)
    {
    }

    public function disable(array $param)
    {
    }

    public function enable(array $param)
    {
    }
}
