<?php

use Core\Controller;
use Auth\Auth;

class DefaultController extends Controller
{
    private $controller = 'Default';

    public function __construct()
    {
        // Herdando Construct
        parent::__construct();
    }

    public function dashboard()
    {
        // Instanciando a classe
        $auth = new Auth();

        // Verificando se o usuário está logado
        if ($auth->verifyAuthenticated()) {
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

    public function notfound($folderName, $fileName)
    {
        // Carregando View
        require_once parent::loadView($folderName, $fileName);
    }
}
