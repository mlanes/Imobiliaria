<?php

use Core\Controller;
use Auth\Auth;

class CategoriaImovelController extends Controller
{
    private $controller = 'CategoriaImovel';

    public function __construct()
    {
        // Herdando Construct
        parent::__construct();
        $this->CategoriaImovel = parent::loadModel("CategoriaImovel");
    }

    public function index()
    {
        // Instanciando a classe
        $auth = new Auth();
        
        // Verificando se o usuário está logado
        if ($auth->verifyAuthenticated()) {
            $categoriasImovel = $this->CategoriaImovel->list();
            $count = $this->CategoriaImovel->countItems();
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

    public function disable(array $param)
    {
        // Instanciando a classe
        $auth = new Auth();
        
        // Verificando se o usuário está logado
        if ($auth->verifyAuthenticated()) {
            $cd_categoria_imovel = $param[0];
            if (!empty($cd_categoria_imovel)) {
                $this->CategoriaImovel->cd_categoria_imovel = $cd_categoria_imovel;
                $this->CategoriaImovel->disable();
                $this->redirectUrl();
                exit;
            }

            $this->redirectUrl();
            exit;
        }

        // Redirecionando para o login
        $this->redirectUrl(' ');
        exit;
    }

    public function enable(array $param)
    {
        // Instanciando a classe
        $auth = new Auth();
        
        // Verificando se o usuário está logado
        if ($auth->verifyAuthenticated()) {
            $cd_categoria_imovel = $param[0];
            if (!empty($cd_categoria_imovel)) {
                $this->CategoriaImovel->cd_categoria_imovel = $cd_categoria_imovel;
                $this->CategoriaImovel->enable();
                $this->redirectUrl();
                exit;
            }

            $this->redirectUrl();
            exit;
        }

        // Redirecionando para o login
        $this->redirectUrl(' ');
        exit;
    }
}