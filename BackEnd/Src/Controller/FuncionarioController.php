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
        $cd_funcionario = $param[0];
        if ($cd_funcionario != "") {
            $this->Funcionario->cd_funcionario = $cd_funcionario;
            $this->CategoriaFuncionario = parent::loadModel("CategoriaFuncionario");
            $funcionario = $this->Funcionario->select();
            $this->CategoriaFuncionario->cd_categoria = $funcionario->cd_categoria;
            $categoria = $this->CategoriaFuncionario->select();
            $nm_categoria = $categoria->nm_categoria;
        } else {
            echo 'É necessário um código';
            $this->redirectUrl();
            exit;
        }

        require_once parent::loadView($this->controller, $this->view);
    }

    public function disable(array $param)
    {
        $cd_funcionario = $param[0];
        if ($cd_funcionario != "") {
            $this->Funcionario->cd_funcionario = $cd_funcionario;
            $this->Funcionario->disable();
            $this->redirectUrl();
            exit;
        } else {
            echo 'É necessário um código';
            $this->redirectUrl();
            exit;
        }
    }

    public function enable(array $param)
    {
        $cd_funcionario = $param[0];
        if ($cd_funcionario != "") {
            $this->Funcionario->cd_funcionario = $cd_funcionario;
            $this->Funcionario->enable();
            $this->redirectUrl();
            exit;
        } else {
            echo 'É necessário um código';
            $this->redirectUrl();
            exit;
        }
    }
}
