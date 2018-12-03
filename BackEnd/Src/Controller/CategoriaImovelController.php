<?php

use Core\Controller;
use Validate\CategoriaImovel\Add as Add;
use Validate\Sanitize;
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

    public function add()
    {
        // Instanciando a classe
        $auth = new Auth();
        
        // Verificando se o usuário está logado
        if ($auth->verifyAuthenticated()) {
            // Chamando Validação
            $catValidate = new Add();
            $catValidate->validate();

            // Pegando Dados da requisição de forma dinâmica e automática
            $sanitized = new Sanitize();
            $data = $sanitized->sanitized();

            // Verificando erro de Validação
            if (!$catValidate->hasErrors()) {
                $this->CategoriaImovel->nm_categoria_imovel = $data->nm_categoria_imovel;
                $this->CategoriaImovel->setIcStatus($data->ic_status);
                $this->CategoriaImovel->insert();

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
            $cd_categoria = $param[0];

            // Verificando se o código está preechido
            if (!empty($cd_categoria)) {
                // Chamando Validação
                $catValidate = new Add();
                $catValidate->validate();

                // Pegando Dados da requisição de forma dinâmica e automática
                $sanitized = new Sanitize();
                $data = $sanitized->sanitized();

                // Definindo Código
                $this->CategoriaImovel->cd_categoria_imovel = $cd_categoria;

                // Buscando Dados
                $categoriaImovel = $this->CategoriaImovel->select();

                // Formatando Status para formulário
                if ($categoriaImovel->ic_status == 1) {
                    $ic_status = 'enable';
                } else {
                    $ic_status = 'disable';
                }

                // Verificando erro de Validação
                if (!$catValidate->hasErrors()) {
                    $this->CategoriaImovel->nm_categoria_imovel = $data->nm_categoria_imovel;
                    $this->CategoriaImovel->setIcStatus($data->ic_status);
                    $this->CategoriaImovel->update();

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
            $cd_categoria = $param[0];

            // Verificando se o código está preechido
            if (!empty($cd_categoria)) {
                // Chamando Validação
                $catValidate = new Add();
                $catValidate->validate();

                // Pegando Dados da requisição de forma dinâmica e automática
                $sanitized = new Sanitize();
                $data = $sanitized->sanitized();

                // Definindo Código
                $this->CategoriaImovel->cd_categoria_imovel = $cd_categoria;

                // Buscando Dados
                $categoriaImovel = $this->CategoriaImovel->select();

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
        $this->redirectUrl('Acesso/Login');
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
        $this->redirectUrl('Acesso/Login');
        exit;
    }
}
