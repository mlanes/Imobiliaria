<?php

use Core\Controller;
use Validate\Proprietario\Add as Add;
use Validate\Sanitize;
use Auth\Auth;

class ProprietarioController extends Controller
{
    private $controller = 'Proprietario';

    public function __construct()
    {
        // Herdando Construct
        parent::__construct();
        $this->Proprietario = parent::loadModel("Proprietario");
    }

    public function index()
    {
        // Instanciando a classe
        $auth = new Auth();
        
        // Verificando se o usuário está logado
        if ($auth->verifyAuthenticated()) {
            // Pegando dados
            $proprietarios = $this->Proprietario->list();

            // Pegando contagem de total de itens
            $count = $this->Proprietario->countItems();

            // Caregando Helpers
            $bootstrapHelper = parent::loadHelper("Bootstrap");
            $styleHelper = parent::loadHelper("Style");
            $linkHelper = parent::loadHelper("Link");

            // Carregando View
            require_once parent::loadView($this->controller, $this->currentAction);
            exit;
        }

        // Redirecionando para o login
        $this->redirectUrl('Acesso/Login');
        exit;
    }

    public function add()
    {
        // Instanciando a classe
        $auth = new Auth();
        
        // Verificando se o usuário está logado
        if ($auth->verifyAuthenticated()) {
            // Chamando Validação
            $proprietarioValidate = new Add();
            $proprietarioValidate->validate();

            // Pegando Dados da requisição de forma dinâmica e automática
            $sanitized = new Sanitize();
            $data = $sanitized->sanitized();

            // Verificando erro de Validação
            if (!$proprietarioValidate->hasErrors()) {
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

                $this->Proprietario->setIcStatus($data->ic_status);
                $this->Proprietario->cd_pessoa = $cd_pessoa;
                $this->Proprietario->insert();
                
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

        // Redirecionando para o login
        $this->redirectUrl('Acesso/Login');
        exit;
    }
    public function edit(array $param)
    {
        // Instanciando a classe
        $auth = new Auth();
        
        // Verificando se o usuário está logado
        if ($auth->verifyAuthenticated()) {
            // Pegando valor do parâmetro
            $cd_proprietario = $param[0];

            // Verificando se o código está preechido
            if (!empty($cd_proprietario)) {
                // Chamando Validação
                $proprietarioValidate = new Add();
                $proprietarioValidate->validate();

                // Pegando Dados da requisição de forma dinâmica e automática
                $sanitized = new Sanitize();
                $data = $sanitized->sanitized();

                // Definindo Código
                $this->Proprietario->cd_proprietario = $cd_proprietario;

                // Buscando Dados
                $proprietario = $this->Proprietario->select();

                // Formatando Status para formulário
                if ($proprietario->ic_status == 1) {
                    $ic_status = 'enable';
                } else {
                    $ic_status = 'disable';
                }

                // Verificando erro de Validação
                if (!$proprietarioValidate->hasErrors()) {
                    // Carregando Model
                    $this->Pessoa = parent::loadModel("Pessoa");

                    $this->Proprietario->setIcStatus($data->ic_status);
                    $proprietario = $this->Proprietario->select();
                    $cd_pessoa = $proprietario->cd_pessoa;
                    $this->Proprietario->cd_pessoa = $cd_pessoa;
                    $this->Proprietario->update();

                    $this->Pessoa->cd_pessoa = $cd_pessoa;
                    $this->Pessoa->nm_primeiro = $data->nm_primeiro;
                    $this->Pessoa->nm_meio = $data->nm_meio;
                    $this->Pessoa->nm_ultimo = $data->nm_ultimo;
                    $this->Pessoa->dt_nascimento = $data->dt_nascimento;
                    $this->Pessoa->dt_criado = $proprietario->dt_criado;
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

        // Redirecionando para o login
        $this->redirectUrl('Acesso/Login');
        exit;
    }

    public function view(array $param)
    {
        // Instanciando a classe
        $auth = new Auth();
        
        // Verificando se o usuário está logado
        if ($auth->verifyAuthenticated()) {
            // Pegando valor do parâmetro
            $cd_proprietario = $param[0];

            // Verificando se o código está preechido
            if ($cd_proprietario != "") {
                // Definindo Código
                $this->Proprietario->cd_proprietario = $cd_proprietario;

                // Buscando Dados
                $proprietario = $this->Proprietario->select();

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
        
        // Redirecionando para o login
        $this->redirectUrl('Acesso/Login');
        exit;
    }

    public function disable(array $param)
    {
        // Instanciando a classe
        $auth = new Auth();
        
        // Verificando se o usuário está logado
        if ($auth->verifyAuthenticated()) {
            // Pegando valor do parâmetro
            $cd_proprietario = $param[0];

            // Verificando se o código está preechido
            if (!empty($cd_proprietario)) {
                // Definindo Código
                $this->Proprietario->cd_proprietario = $cd_proprietario;

                // Desabilitando unidade
                $this->Proprietario->disable();
                $this->redirectUrl();
                exit;
            }

            $this->redirectUrl();
            exit;
        }

        // Redirecionando para o login
        $this->redirectUrl('Acesso/Login');
        exit;
    }

    public function enable(array $param)
    {
        // Instanciando a classe
        $auth = new Auth();
        
        // Verificando se o usuário está logado
        if ($auth->verifyAuthenticated()) {
            // Pegando valor do parâmetro
            $cd_proprietario = $param[0];

            // Verificando se o código está preechido
            if (!empty($cd_proprietario)) {
                // Definindo Código
                $this->Proprietario->cd_proprietario = $cd_proprietario;

                // Habilitando unidade
                $this->Proprietario->enable();
                $this->redirectUrl();
                exit;
            }

            $this->redirectUrl();
            exit;
        }

        // Redirecionando para o login
        $this->redirectUrl('Acesso/Login');
        exit;
    }
}