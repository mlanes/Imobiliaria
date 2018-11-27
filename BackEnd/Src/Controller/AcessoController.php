<?php

// require_once 'Core/Controller.php';

use Core\Controller;

class AcessoController extends Controller
{
    private $controller = 'Acesso';
    private $view;

    public function __construct()
    {
        parent::__construct();
        $this->Acesso = parent::loadModel("Acesso");
        session_start();
    }

    public function index($param)
    {
        $acessos = $this->Acesso->list();
        $count = $this->Acesso->countItems();
        $bootstrapHelper = parent::loadHelper("Bootstrap");
        $styleHelper = parent::loadHelper("Style");
        $linkHelper = parent::loadHelper("Link");
        require_once parent::loadView($this->controller, $this->view);
    }

    public function setView($a)
    {
        $this->view = $a;
    }

    public function login()
    {
        $login = isset($_POST['login']) ? trim($_POST['login']) : null;
        $password = isset($_POST['password']) ? trim($_POST['password']) : null;

        if ($login != null && $password != null) {
            $this->Acesso->nm_login = $login;
            $this->Acesso->nm_password = $password;
            if ($this->Acesso->login()) {
                $_SESSION['login'] = $login;
                $this->redirectUrl();
            } else {
                echo 'Usuário ou senha inválidos.';
                require_once parent::loadView($this->controller, $this->view);
            }
            exit;
        } else {
            if (empty($_SESSION)) {
                require_once parent::loadView($this->controller, $this->view);
            } else {
                $this->redirectUrl(' ');
            }
        }
    }
    
    public function logout()
    {
        $this->Acesso->logout();
        $this->redirectUrl($this->controller . '/login');
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
        $cd_acesso = $param[0];
        if ($cd_acesso != "") {
            $this->Acesso->cd_acesso = $cd_acesso;
            $this->Acesso->disable();
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
        $cd_acesso = $param[0];
        if ($cd_acesso != "") {
            $this->Acesso->cd_acesso = $cd_acesso;
            $this->Acesso->enable();
            $this->redirectUrl();
            exit;
        } else {
            echo 'É necessário um código';
            $this->redirectUrl();
            exit;
        }
    }
}
