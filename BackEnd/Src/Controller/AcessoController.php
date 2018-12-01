<?php

use Core\Controller;
use Validate\Acesso\Login as LoginValidate;
use Validate\Sanitize;
use Auth\Auth;

class AcessoController extends Controller
{
    private $controller = 'Acesso';

    public function __construct()
    {
        // Herdando Construct
        parent::__construct();
        $this->Acesso = parent::loadModel("Acesso");
    }

    public function index()
    {
        // Instanciando a classe
        $auth = new Auth();
        
        // Verificando se o usuário está logado
        if ($auth->verifyAuthenticated()) {
            $acessos = $this->Acesso->list();
            $count = $this->Acesso->countItems();
            $bootstrapHelper = parent::loadHelper("Bootstrap");
            $styleHelper = parent::loadHelper("Style");
            $linkHelper = parent::loadHelper("Link");
            require_once parent::loadView($this->controller, $this->currentAction);
            exit;
        }

        // Redirecionando para o login
        $this->redirectUrl('Acesso/Login');
        exit;
    }

    public function login()
    {
        // Instanciando a classe
        $auth = new Auth();
        
        // Verificando se o usuário está logado
        if (!$auth->verifyAuthenticated()) {
            // Chamando Validação
            $loginValidate = new LoginValidate();
            $loginValidate->validate();

            if (!$loginValidate->hasErrors()) {
                // Pegando Dados da requisição de forma dinâmica e automática
                $sanitized = new Sanitize();
                $data = $sanitized->sanitized();

                // Atribuindo dados
                $this->Acesso->nm_login = $data->nm_login;
                $this->Acesso->nm_password = $data->nm_password;

                // Autenticando
                if ($this->Acesso->login()) {
                    // Gravando o nome do usuário na sessão
                    $_SESSION['login'] = $data->nm_login;

                    // Redirecionando
                    $this->redirectUrl();
                    exit;
                }
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

        // Redirecionando para o dashboard
        $this->redirectUrl(' ');
        exit;
    }
    
    public function logout()
    {
        $this->Acesso->logout();
        $this->redirectUrl($this->controller . '/login');
    }

    public function add()
    {
        // Instanciando a classe
        $auth = new Auth();
        
        // Verificando se o usuário está logado
        if (!$auth->verifyAuthenticated()) {
        }

        // Redirecionando para o dashboard
        $this->redirectUrl(' ');
        exit;
    }

    public function edit(array $param)
    {
        // Instanciando a classe
        $auth = new Auth();
        
        // Verificando se o usuário está logado
        if (!$auth->verifyAuthenticated()) {
        }

        // Redirecionando para o dashboard
        $this->redirectUrl(' ');
        exit;
    }

    public function view(array $param)
    {
        // Instanciando a classe
        $auth = new Auth();
        
        // Verificando se o usuário está logado
        if (!$auth->verifyAuthenticated()) {
        }

        // Redirecionando para o dashboard
        $this->redirectUrl(' ');
        exit;
    }

    public function disable(array $param)
    {
        // Instanciando a classe
        $auth = new Auth();
        
        // Verificando se o usuário está logado
        if (!$auth->verifyAuthenticated()) {
            $cd_acesso = $param[0];
            if (!empty($cd_acesso)) {
                $this->Acesso->cd_acesso = $cd_acesso;
                $this->Acesso->disable();
                $this->redirectUrl();
                exit;
            }
            echo 'É necessário um código';
            $this->redirectUrl();
            exit;
        }

        // Redirecionando para o dashboard
        $this->redirectUrl(' ');
        exit;
    }

    public function enable(array $param)
    {
        // Instanciando a classe
        $auth = new Auth();
        
        // Verificando se o usuário está logado
        if (!$auth->verifyAuthenticated()) {
            $cd_acesso = $param[0];
            if (!empty($cd_acesso)) {
                $this->Acesso->cd_acesso = $cd_acesso;
                $this->Acesso->enable();
                $this->redirectUrl();
                exit;
            }
            echo 'É necessário um código';
            $this->redirectUrl();
            exit;
        }

        // Redirecionando para o dashboard
        $this->redirectUrl(' ');
        exit;
    }
}
