<?php

use Core\Controller;
use Validate\Imovel\Add as Add;
use Validate\Sanitize;
use Auth\Auth;

class ImovelController extends Controller
{
    private $controller = 'Imovel';

    public function __construct()
    {
        // Herdando Construct
        parent::__construct();
        $this->Imovel = parent::loadModel("Imovel");
    }

    public function index()
    {
        // Instanciando a classe
        $auth = new Auth();
        
        // Verificando se o usuário está logado
        if ($auth->verifyAuthenticated()) {
            // Pegando dados
            $imoveis = $this->Imovel->list();

            // Pegando contagem de total de itens
            $count = $this->Imovel->countItems();

            $this->CategoriaImovel = parent::loadModel("CategoriaImovel");
            $this->Proprietario = parent::loadModel("Proprietario");

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
            $imovelValidate = new Add();
            $imovelValidate->validate();

            // Pegando Dados da requisição de forma dinâmica e automática
            $sanitized = new Sanitize();
            $data = $sanitized->sanitized();

            // Carregando Model
            $this->Proprietario = parent::loadModel("Proprietario");

            // Pegando dados
            $proprietarios = $this->Proprietario->list();
            $proprietariosOption = [];
            foreach ($proprietarios as $proprietario) {
                $option = null;
                $value = $proprietario->cd_proprietario;
                $text = $proprietario->nm_primeiro . ' ' . $proprietario->nm_meio . ' ' . $proprietario->nm_ultimo;
                $option["value"] = $value;
                $option["text"] = $text;
                $proprietariosOption[] = $option;
            }

            // Carregando Model
            $this->CategoriaImovel = parent::loadModel("CategoriaImovel");

            // Pegando dados
            $categoriasImovel = $this->CategoriaImovel->list();
            $categoriasImovelOption = [];
            foreach ($categoriasImovel as $categoriaImovel) {
                $option = null;
                $value = $categoriaImovel->cd_categoria_imovel;
                $text = $categoriaImovel->nm_categoria_imovel;
                $option["value"] = $value;
                $option["text"] = $text;
                $categoriasImovelOption[] = $option;
            }


            // Verificando erro de Validação
            if (!$imovelValidate->hasErrors()) {
                $this->Imovel->setIcStatus($data->ic_status);
                $this->Imovel->qt_area_util = $data->qt_area_util;
                $this->Imovel->qt_area_util = $data->qt_area_util;
                $this->Imovel->qt_area_total = $data->qt_area_total;
                $this->Imovel->vl_preco = $data->vl_preco;
                $this->Imovel->ds_imovel = $data->ds_imovel;
                (isset($data->cd_latitude)) ? $this->Imovel->cd_latitude = $data->cd_latitude : $this->Imovel->cd_latitude = '' ;
                (isset($data->cd_longitude)) ? $this->Imovel->cd_longitude = $data->cd_longitude : $this->Imovel->cd_longitude = '' ;
                $this->Imovel->cd_proprietario = $data->cd_proprietario;
                $this->Imovel->cd_categoria_imovel = $data->cd_categoria_imovel;
                $this->Imovel->insert();

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
            $cd_imovel = $param[0];

            // Verificando se o código está preechido
            if (!empty($cd_imovel)) {
                // Chamando Validação
                $imovelValidate = new Add();
                $imovelValidate->validate();

                // Pegando Dados da requisição de forma dinâmica e automática
                $sanitized = new Sanitize();
                $data = $sanitized->sanitized();

                // Carregando Model
                $this->Proprietario = parent::loadModel("Proprietario");

                // Pegando dados
                $proprietarios = $this->Proprietario->list();
                $proprietariosOption = [];
                foreach ($proprietarios as $proprietario) {
                    $option = null;
                    $value = $proprietario->cd_proprietario;
                    $text = $proprietario->nm_primeiro . ' ' . $proprietario->nm_meio . ' ' . $proprietario->nm_ultimo;
                    $option["value"] = $value;
                    $option["text"] = $text;
                    $proprietariosOption[] = $option;
                }

                // Carregando Model
                $this->CategoriaImovel = parent::loadModel("CategoriaImovel");

                // Pegando dados
                $categoriasImovel = $this->CategoriaImovel->list();
                $categoriasImovelOption = [];
                foreach ($categoriasImovel as $categoriaImovel) {
                    $option = null;
                    $value = $categoriaImovel->cd_categoria_imovel;
                    $text = $categoriaImovel->nm_categoria_imovel;
                    $option["value"] = $value;
                    $option["text"] = $text;
                    $categoriasImovelOption[] = $option;
                }

                // Definindo Código
                $this->Imovel->cd_imovel = $cd_imovel;

                // Buscando Dados
                $imovel = $this->Imovel->select();

                // Formatando Status para formulário
                if ($imovel->ic_status == 1) {
                    $ic_status = 'enable';
                } else {
                    $ic_status = 'disable';
                }

                // Verificando erro de Validação
                if (!$imovelValidate->hasErrors()) {
                    $this->Imovel->setIcStatus($data->ic_status);
                    $this->Imovel->qt_area_util = $data->qt_area_util;
                    $this->Imovel->qt_area_util = $data->qt_area_util;
                    $this->Imovel->qt_area_total = $data->qt_area_total;
                    $this->Imovel->vl_preco = $data->vl_preco;
                    $this->Imovel->ds_imovel = $data->ds_imovel;
                    (isset($data->cd_latitude)) ? $this->Imovel->cd_latitude = $data->cd_latitude : $this->Imovel->cd_latitude = '' ;
                    (isset($data->cd_longitude)) ? $this->Imovel->cd_longitude = $data->cd_longitude : $this->Imovel->cd_longitude = '' ;
                    $this->Imovel->cd_proprietario = $data->cd_proprietario;
                    $this->Imovel->cd_categoria_imovel = $data->cd_categoria_imovel;
                    $this->Imovel->update();

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
            $cd_imovel = $param[0];

            // Verificando se o código está preechido
            if ($cd_imovel != "") {
                // Definindo Código
                $this->Imovel->cd_funcionario = $cd_imovel;

                // Carregando Model
                $this->CategoriaImovel = parent::loadModel("CategoriaImovel");
                $this->Proprietario = parent::loadModel("Proprietario");

                // Buscando Dados
                $imovel = $this->Imovel->select();

                // Definindo Código
                $this->CategoriaImovel->cd_categoria_imovel = $imovel->cd_categoria_imovel;
                $this->Proprietario->cd_proprietario = $imovel->cd_proprietario;

                // Buscando Dados
                $categoria = $this->CategoriaImovel->select();
                $nm_categoria = $categoria->nm_categoria_imovel;
                $proprietario = $this->Proprietario->select();
                $nm_proprietario = $proprietario->nm_primeiro . ' ' . $proprietario->nm_meio . ' ' . $proprietario->nm_ultimo;

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
            $cd_imovel = $param[0];

            // Verificando se o código está preechido
            if (!empty($cd_imovel)) {
                // Definindo Código
                echo $this->Imovel->cd_imovel = $cd_imovel;

                // Desabilitando unidade
                $this->Imovel->disable();
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
            $cd_imovel = $param[0];

            // Verificando se o código está preechido
            if (!empty($cd_imovel)) {
                // Definindo Código
                $this->Imovel->cd_imovel = $cd_imovel;

                // Habilitando unidade
                $this->Imovel->enable();
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
