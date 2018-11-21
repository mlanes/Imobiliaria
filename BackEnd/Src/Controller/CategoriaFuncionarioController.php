<?php

require_once 'Core/Controller.php';

class CategoriaFuncionarioController extends Controller
{
    private $controller = 'CategoriaFuncionario';
    private $view;

    public function __construct()
    {
        parent::__construct();
        $this->CategoriaFuncionario = parent::loadModel("CategoriaFuncionario");
    }

    public function index($param)
    {
        $categoriasFuncionario = $this->CategoriaFuncionario->select();
        $count = $this->CategoriaFuncionario->countItems();

        require_once parent::loadView('CategoriaFuncionario', $this->view);
    }

    public function setView($a)
    {
        $this->view = $a;
    }

    public function disable(array $param)
    {
        $param1 = $param[0];
        if ($param1 != "") {
            $this->CategoriaFuncionario->cd_categoria = $param1;
            $categoriasFuncionario = $this->CategoriaFuncionario->disable();
            // header("Location: " . $this->reffer);
            $this->redirectUrl();
        } else {
            echo 'É necessário um código';
        }
    }

    public function enable(array $param)
    {
        $param1 = $param[0];
        if ($param1 != "") {
            $this->CategoriaFuncionario->cd_categoria = $param1;
            $categoriasFuncionario = $this->CategoriaFuncionario->enable();
            header("Location: " . $this->reffer);
            $this->redirectUrl();
        } else {
            echo 'É necessário um código';
        }
    }
}
