<?php

namespace Core;

class Mvc
{
    private $controller;
    private $action;
    private $param;
    private static $not_found = 'Notfound';
    private static $debug = false;

    public function __construct()
    {
        $this->getUrl();

        if (self::$debug == true) {
            $this->debugging();
        }

        $controllerDir = "Controller/" . $this->controller . ".php";

        if (file_exists($controllerDir)) {
            require_once($controllerDir);

            if (!class_exists($this->controller)) {
                $this->notFound();
                return;
            } else {
                $this->controller = new $this->controller();

                if (method_exists($this->controller, $this->action)) {
                    $this->controller->setAction($this->action);
                    $this->controller->{$this->action}($this->param);
                } else {
                    $this->notFound();
                }
            }
        } else {
            $this->notFound();
        }
    }

    public function notFound()
    {
        $this->controller = self::$not_found . 'Controller';
        $controllerDir = "Controller/" . $this->controller . ".php";
        if (!isset($this->action)) {
            $this->action = 'index';
        }
        if (!isset($this->param)) {
            $this->param = '';
        }
        if (file_exists($controllerDir)) {
            require_once($controllerDir);
            $this->controller = new $this->controller();
            $this->controller->setAction($this->action);
            $this->controller->{$this->action}($this->param);
            exit;
        }
    }

    public function getUrl()
    {
        if (isset($_GET["path"])) {
            $p = explode("/", $_GET["path"]);

            $countParams = count($p);
            
            $this->param = [];

            for ($i = 0; $i < $countParams; $i++) {
                if ($i == 0) {
                    $this->controller = ucfirst($p[$i] . 'Controller');
                } elseif ($i == 1) {
                    $this->action = strtolower($p[$i]);
                } else {
                    $this->param[] = $p[$i];
                }
            }
            if ($this->action == null) {
                $this->action = 'index';
            }
            if ($this->param == null) {
                $this->param[] = "";
            }
        } else {
            $this->controller = 'DefaultController';
            $this->action = 'dashboard';
            $this->param = null;
        }
    }

    public function debugging()
    {
        echo '<p>Controller: ' . $this->controller . '</p>';
        echo '<p>Action: ' . $this->action . '</p>';
        echo '<p>Params: ';
        var_dump($this->param);
        echo '</p>';
    }
}
