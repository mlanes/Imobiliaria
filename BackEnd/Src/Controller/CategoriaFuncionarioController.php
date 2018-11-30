<?php

use Core\Controller;
use Validate\CategoriaFuncionario\Add as Add;
use Validate\Sanitize;

class CategoriaFuncionarioController extends Controller
{
    private $controller = 'CategoriaFuncionario';

    public function __construct()
    {
        // Herdando Construct
        parent::__construct();
        $this->CategoriaFuncionario = parent::loadModel("CategoriaFuncionario");
    }

    public function index($param)
    {
        // Pegando dados
        $categoriasFuncionario = $this->CategoriaFuncionario->list();
        
        // Pegando contagem de total de itens
        $count = $this->CategoriaFuncionario->countItems();

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
        $catValidate = new Add();
        $catValidate->validate();

        // Pegando Dados da requisição de forma dinâmica e automática
        $sanitized = new Sanitize();
        $data = $sanitized->sanitized();
        
        // Verificando erro de Validação
        if (!$catValidate->hasErrors()) {
            $this->CategoriaFuncionario->nm_categoria = $data->nm_categoria;
            $this->CategoriaFuncionario->setIcStatus($data->ic_status);
            $this->CategoriaFuncionario->nm_sigla = $data->nm_sigla;
            $this->CategoriaFuncionario->insert();

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
            $this->CategoriaFuncionario->cd_categoria = $cd_categoria;

            // Buscando Dados
            $categoriaFuncionario = $this->CategoriaFuncionario->select();

            // Formatando Status para formulário
            if ($categoriaFuncionario->ic_status == 1) {
                $ic_status = 'enable';
            } else {
                $ic_status = 'disable';
            }

            // Verificando erro de Validação
            if (!$catValidate->hasErrors()) {
                $this->CategoriaFuncionario->cd_categoria = $cd_categoria;
                $this->CategoriaFuncionario->nm_categoria = $data->nm_categoria;
                $this->CategoriaFuncionario->setIcStatus($data->ic_status);
                $this->CategoriaFuncionario->nm_sigla = $data->nm_sigla;
                $this->CategoriaFuncionario->update();

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

        echo 'É necessário um código';
        $this->redirectUrl();
        exit;
    }

    public function view(array $param)
    {
        // Pegando valor do parâmetro
        $cd_categoria = $param[0];

        // Verificando se o código está preechido
        if (!empty($cd_categoria)) {
            // Definindo Código
            $this->CategoriaFuncionario->cd_categoria = $cd_categoria;

            // Buscando Dados
            $categoriaFuncionario = $this->CategoriaFuncionario->select();

            // Carregando View
            require_once parent::loadView($this->controller, $this->currentAction);
            exit;
        }

        echo 'É necessário um código';
        $this->redirectUrl();
        exit;
    }

    public function disable(array $param)
    {
        // Pegando valor do parâmetro
        $cd_categoria = $param[0];

        // Verificando se o código está preechido
        if (!empty($cd_categoria)) {
            // Definindo Código
            $this->CategoriaFuncionario->cd_categoria = $cd_categoria;

            // Desabilitando unidade
            $this->CategoriaFuncionario->disable();
            $this->redirectUrl();
            exit;
        }

        echo 'É necessário um código';
        $this->redirectUrl();
        exit;
    }

    public function enable(array $param)
    {
        // Pegando valor do parâmetro
        $cd_categoria = $param[0];

        // Verificando se o código está preechido
        if (!empty($cd_categoria)) {
            // Definindo Código
            $this->CategoriaFuncionario->cd_categoria = $cd_categoria;

            // Habilitando unidade
            $this->CategoriaFuncionario->enable();
            $this->redirectUrl();
            exit;
        }

        echo 'É necessário um código';
        $this->redirectUrl();
        exit;
    }
}
