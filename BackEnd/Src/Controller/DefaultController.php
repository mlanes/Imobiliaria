<?php

require_once 'Core/Controller.php';

class DefaultController extends Controller
{
    private $controller = 'Default';
    private $view;

    public function __construct()
    {
        parent::__construct();
        session_start();
    }

    public function setView($a)
    {
        $this->view = $a;
    }

    public function dashboard()
    {
        $bootstrapHelper = parent::loadHelper("Bootstrap");
        $styleHelper = parent::loadHelper("Style");
        $linkHelper = parent::loadHelper("Link");
        require_once parent::loadView($this->controller, $this->view);
    }

    public function notfound($folderName, $fileName)
    {
        require_once parent::loadView($folderName, $fileName);
    }
}
