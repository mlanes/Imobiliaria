<?php

require_once 'Core/Controller.php';

class AcessoController extends Controller
{
    private $controller = 'Acesso';
    private $view;

    public function __construct()
    {
        parent::__construct();
        $this->Acesso = parent::loadModel("Acesso");
    }

    public function index($param)
    {
        $acessos = $this->Acesso->list();
        $count = $this->Acesso->countItems();
        require_once parent::loadView($this->controller, $this->view);
    }

    public function setView($a)
    {
        $this->view = $a;
    }

    public function login()
    {
    }
    
    public function logout()
    {
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
    }

    public function enable(array $param)
    {
    }
}
