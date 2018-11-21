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
        $categoriasFuncionario = $this->CategoriaFuncionario->list();
        $count = $this->CategoriaFuncionario->countItems();
        require_once parent::loadView($this->controller, $this->view);
    }

    public function setView($a)
    {
        $this->view = $a;
    }

    public function add()
    {
        $nm_categoria = isset($_POST['nm_categoria']) ? $_POST['nm_categoria'] : null;
        $ic_status = isset($_POST['ic_status']) ? $_POST['ic_status'] : null;
        $nm_sigla = isset($_POST['nm_sigla']) ? $_POST['nm_sigla'] : null;

        if ($nm_categoria != null && $ic_status != null && $nm_sigla != null) {
            $this->CategoriaFuncionario->nm_categoria = $nm_categoria;
            $this->CategoriaFuncionario->ic_status = $ic_status;
            $this->CategoriaFuncionario->nm_sigla = $nm_sigla;
            $this->CategoriaFuncionario->insert();
            $this->redirectUrl($this->controller);
            exit;
        } else {
            echo 'Dados Inválidos';
        }

        require_once parent::loadView($this->controller, $this->view);
    }

    public function edit(array $param)
    {
    }

    public function view(array $param)
    {
        $param1 = $param[0];
        if ($param1 != "") {
            $this->CategoriaFuncionario->cd_categoria = $param1;
            $categoriaFuncionario = $this->CategoriaFuncionario->select()[0];
        } else {
            echo 'É necessário um código';
        }

        require_once parent::loadView($this->controller, $this->view);
    }

    public function disable(array $param)
    {
        $param1 = $param[0];
        if ($param1 != "") {
            $this->CategoriaFuncionario->cd_categoria = $param1;
            $categoriasFuncionario = $this->CategoriaFuncionario->disable();
            $this->redirectUrl();
            exit;
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
            $this->redirectUrl();
            exit;
        } else {
            echo 'É necessário um código';
        }
    }
}
