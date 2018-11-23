<?php

require_once 'Core/Controller.php';

class DefaultController extends Controller
{
    private $controller = 'Default';
    private $view;

    public function __construct()
    {
        parent::__construct();
    }

    public function setView($a)
    {
        $this->view = $a;
    }

    public function dashboard()
    {
        echo "Dashboard";
    }

    public function notfound($folderName, $fileName)
    {
        require_once parent::loadView($folderName, $fileName);
    }
}
