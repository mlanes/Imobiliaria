<?php

class Mvc
{

    private $controller;
    private $action;
    private $param;
    private $not_found = 'notfound';
    private static $debug = false;

    public function __construct() {

        $this->getUrl();

        if (self::$debug == true) {
            $this->debugging();
        }

        $a = "Controller/" . $this->controller . ".php";

        if (file_exists($a)) {

            require_once ($a);

            if (!class_exists($this->controller)) {

                $this->notFound();
                return;

            } else {

                $this->controller = new $this->controller();
                if (method_exists($this->controller, $this->action)) {

                    $this->controller->setView($this->action);
                    $this->controller->{$this->action}($this->param);

                } else {

                    echo '<p>Método não encontrado</p>';

                }

            }

        }
        else {
            $this->notFound();
        }


    }

    public function notFound() {

        require_once("Controller/DefaultController.php");
        $controller = new DefaultController();
        $controller->notfound('Default', $this->not_found);

    }

    public function getUrl() {

        $p = explode("/", $_GET["path"]);
        for ($i = 0; $i < count($p); $i++) {
            if ($i == 0) {
                $this->controller = ucfirst($p[$i] . 'Controller');
            } else if ($i == 1) {
                $this->action = strtolower($p[$i]);
            } else {
                $this->param .= '/' . $p[$i];
            }
        }
        if ($this->action == null) {
            $this->action = 'index';
        }
        if ($this->param == null) {
            $this->param = null;
        }

    }

    public function debugging() {

        echo '<p>Controller: ' . $this->controller . '</p>';
        echo '<p>Action: ' . $this->action . '</p>';
        echo '<p>Params: ' . $this->param . '</p>';

    }

}
