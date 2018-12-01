<?php

use Core\Controller;
use Validate\Funcionario\Add as Add;
use Validate\Sanitize;

class FuncionarioController extends Controller
{
    private $controller = 'Funcionario';

    public function __construct()
    {
        // Herdando Construct
        parent::__construct();
        $this->Funcionario = parent::loadModel("Funcionario");
    }

    public function index()
    {
        // Pegando dados
        $funcionarios = $this->Funcionario->list();

        // Carregando Model
        $this->CategoriaFuncionario = parent::loadModel("CategoriaFuncionario");

        // Pegando contagem de total de itens
        $count = $this->Funcionario->countItems();

        // Caregando Helpers
        $bootstrapHelper = parent::loadHelper("Bootstrap");
        $styleHelper = parent::loadHelper("Style");
        $linkHelper = parent::loadHelper("Link");

        // Carregando View
        require_once parent::loadView($this->controller, $this->currentAction);
    }

    public function add()
    {
        // Chamando Validação
        $funcionarioValidate = new Add();
        $funcionarioValidate->validate();

        // Pegando Dados da requisição de forma dinâmica e automática
        $sanitized = new Sanitize();
        $data = $sanitized->sanitized();

        // Carregando Model
        $this->CategoriaFuncionario = parent::loadModel("CategoriaFuncionario");

        // Pegando dados
        $categorias = $this->CategoriaFuncionario->list();
        $categoriasOption = [];
        foreach ($categorias as $categoria) {
            $option = null;
            $value = $categoria->cd_categoria;
            $text = $categoria->nm_categoria;
            $option["value"] = $value;
            $option["text"] = $text;
            $categoriasOption[] = $option;
        }

        // Verificando erro de Validação
        if (!$funcionarioValidate->hasErrors()) {
            // Carregando Model
            $this->Pessoa = parent::loadModel("Pessoa");

            $this->Pessoa->nm_primeiro = $data->nm_primeiro;
            $this->Pessoa->nm_meio = $data->nm_meio;
            $this->Pessoa->nm_ultimo = $data->nm_ultimo;
            $this->Pessoa->dt_nascimento = $data->dt_nascimento;
            $this->Pessoa->dt_criado = date("Y-m-d H:i:s");
            $this->Pessoa->dt_editado = date("Y-m-d H:i:s");
            $this->Pessoa->cd_cpf = $data->cd_cpf;
            $this->Pessoa->insert();

            $cd_pessoa = $this->Pessoa->lastId;
            
            $this->Funcionario->setIcStatus($data->ic_status);
            $this->Funcionario->cd_categoria = $data->cd_categoria;
            $this->Funcionario->cd_creci = $data->cd_creci;
            $this->Funcionario->cd_pessoa = $cd_pessoa;
            $this->Funcionario->insert();

            // Redirecionando para a action index
            $this->redirectUrl($this->controller);
            exit;
        }

        // Caregando Helpers
        $bootstrapHelper = parent::loadHelper("Bootstrap");
        $styleHelper = parent::loadHelper("Style");
        $linkHelper = parent::loadHelper("Link");
        $formHelper = parent::loadHelper("Form");

        // Carregando View
        require_once parent::loadView($this->controller, $this->currentAction);
    }

    public function edit(array $param)
    {
        // Pegando valor do parâmetro
        $cd_funcionario = $param[0];

        // Verificando se o código está preechido
        if (!empty($cd_funcionario)) {

            // Chamando Validação
            $funcionarioValidate = new Add();
            $funcionarioValidate->validate();

            // Pegando Dados da requisição de forma dinâmica e automática
            $sanitized = new Sanitize();
            $data = $sanitized->sanitized();

            // Carregando Model
            $this->CategoriaFuncionario = parent::loadModel("CategoriaFuncionario");

            // Pegando dados
            $categorias = $this->CategoriaFuncionario->list();
            $categoriasOption = [];
            foreach ($categorias as $categoria) {
                $option = null;
                $value = $categoria->cd_categoria;
                $text = $categoria->nm_categoria;
                $option["value"] = $value;
                $option["text"] = $text;
                $categoriasOption[] = $option;
            }

            // Definindo Código
            $this->Funcionario->cd_funcionario = $cd_funcionario;

            // Buscando Dados
            $funcionario = $this->Funcionario->select();

            // Carregando Model
            $this->Pessoa = parent::loadModel("Pessoa");

            // Formatando Status para formulário
            if ($funcionario->ic_status == 1) {
                $ic_status = 'enable';
            } else {
                $ic_status = 'disable';
            }

            // Verificando erro de Validação
            if (!$funcionarioValidate->hasErrors()) {
                $this->Funcionario->setIcStatus($data->ic_status);
                $this->Funcionario->cd_categoria = $data->cd_categoria;
                $this->Funcionario->cd_creci = $data->cd_creci;
                $funcionario = $this->Funcionario->select();
                $cd_pessoa = $funcionario->cd_pessoa;
                $this->Funcionario->cd_pessoa = $cd_pessoa;
                $this->Funcionario->update();
                $this->Pessoa->cd_pessoa = $cd_pessoa;
                $this->Pessoa->nm_primeiro = $data->nm_primeiro;
                $this->Pessoa->nm_meio = $data->nm_meio;
                $this->Pessoa->nm_ultimo = $data->nm_ultimo;
                $this->Pessoa->dt_nascimento = $dt_nascimento;
                $this->Pessoa->dt_criado = $funcionario->dt_criado;
                $this->Pessoa->dt_editado = date("Y-m-d H:i:s");
                $this->Pessoa->cd_cpf = $data->cd_cpf;
                $this->Pessoa->update();

                // Redirecionando para a action index
                $this->redirectUrl($this->controller);
                exit;
            }
            // Caregando Helpers
            $bootstrapHelper = parent::loadHelper("Bootstrap");
            $styleHelper = parent::loadHelper("Style");
            $linkHelper = parent::loadHelper("Link");
            $formHelper = parent::loadHelper("Form");

            // Carregando View
            require_once parent::loadView($this->controller, $this->currentAction);
            exit;
        }

        $this->redirectUrl();
        exit;
    }

    public function view(array $param)
    {
        // Pegando valor do parâmetro
        $cd_funcionario = $param[0];

        // Verificando se o código está preechido
        if ($cd_funcionario != "") {
            // Definindo Código
            $this->Funcionario->cd_funcionario = $cd_funcionario;

            // Carregando Model
            $this->CategoriaFuncionario = parent::loadModel("CategoriaFuncionario");

            // Buscando Dados
            $funcionario = $this->Funcionario->select();

            // Definindo Código
            $this->CategoriaFuncionario->cd_categoria = $funcionario->cd_categoria;

            // Buscando Dados
            $categoria = $this->CategoriaFuncionario->select();
            $funcionario->nm_categoria = $categoria->nm_categoria;

            // Caregando Helpers
            $bootstrapHelper = parent::loadHelper("Bootstrap");
            $styleHelper = parent::loadHelper("Style");
            $linkHelper = parent::loadHelper("Link");

            // Carregando View
            require_once parent::loadView($this->controller, $this->currentAction);
            exit;
        }

        $this->redirectUrl();
        exit;
    }

    public function disable(array $param)
    {
        // Pegando valor do parâmetro
        $cd_funcionario = $param[0];

        // Verificando se o código está preechido
        if (!empty($cd_funcionario)) {
            // Definindo Código
            $this->Funcionario->cd_funcionario = $cd_funcionario;

            // Desabilitando unidade
            $this->Funcionario->disable();
            $this->redirectUrl();
            exit;
        }

        $this->redirectUrl();
        exit;
    }

    public function enable(array $param)
    {
        // Pegando valor do parâmetro
        $cd_funcionario = $param[0];

        // Verificando se o código está preechido
        if (!empty($cd_funcionario)) {
            // Definindo Código
            $this->Funcionario->cd_funcionario = $cd_funcionario;

            // Habilitando unidade
            $this->Funcionario->enable();
            $this->redirectUrl();
            exit;
        }

        $this->redirectUrl();
        exit;
    }
}
