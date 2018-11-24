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
        $nm_primeiro = isset($_POST['nm_primeiro']) ? $_POST['nm_primeiro'] : null;
        $nm_meio = isset($_POST['nm_meio']) ? $_POST['nm_meio'] : null;
        $nm_ultimo = isset($_POST['nm_ultimo']) ? $_POST['nm_ultimo'] : null;
        $dt_nascimento = isset($_POST['dt_nascimento']) ? $_POST['dt_nascimento'] : null;
        $cd_cpf = isset($_POST['cd_cpf']) ? $_POST['cd_cpf'] : null;

        $ic_status = isset($_POST['ic_status']) ? $_POST['ic_status'] : null;
        $cd_categoria = isset($_POST['cd_categoria']) ? $_POST['cd_categoria'] : null;
        $cd_creci = isset($_POST['cd_creci']) ? $_POST['cd_creci'] : null;

        $this->CategoriaFuncionario = parent::loadModel("CategoriaFuncionario");
        $categorias = $this->CategoriaFuncionario->list();

        if ($nm_primeiro != null && $nm_meio != null && $nm_ultimo != null && $dt_nascimento != null
            && $cd_cpf != null && $ic_status != null && $cd_categoria != null) {
            $this->Pessoa = parent::loadModel("Pessoa");
            $this->Pessoa->nm_primeiro = $nm_primeiro;
            $this->Pessoa->nm_meio = $nm_meio;
            $this->Pessoa->nm_ultimo = $nm_ultimo;
            $this->Pessoa->dt_nascimento = $dt_nascimento;
            $this->Pessoa->dt_criado = date("Y-m-d H:i:s");
            $this->Pessoa->dt_editado = date("Y-m-d H:i:s");
            $this->Pessoa->cd_cpf = $cd_cpf;
            $this->Pessoa->insert();

            $cd_pessoa = $this->Pessoa->lastId;

            $this->Funcionario->ic_status = $ic_status;
            $this->Funcionario->cd_categoria = $cd_categoria;
            $this->Funcionario->cd_creci = $cd_creci;
            $this->Funcionario->cd_pessoa = $cd_pessoa;
            $this->Funcionario->insert();
            $this->redirectUrl($this->controller);
            exit;
        } else {
            // echo 'Preencha todos os campos';
            // $this->redirectUrl();
            // exit;
        }

        require_once parent::loadView($this->controller, $this->view);
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
