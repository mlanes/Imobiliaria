<?php

namespace Core;

abstract class Controller
{
    protected $reffer;
    protected $currentAction;

    public function __construct()
    {
        session_start();
    }

    private function getReffer()
    {
        $this->reffer = $_SERVER["HTTP_REFERER"];
    }

    public function redirectUrl(String $url = null)
    {
        if ($url != null) {
            header("Location: " . HOME_URL . $url);
        } else {
            $this->getReffer();
            header("Location: " . $this->reffer);
        }
    }

    public function loadModel($modelName)
    {
        $modelName .= 'Model';
        require_once "Model/" . $modelName . ".php";
        return new $modelName();
    }

    public function loadView($folderName, $viewName)
    {
        $file = "View/" . ucfirst($folderName) . "/" . $viewName . '.php';
        return $file;
    }

    public function loadHelper($helperName)
    {
        $helperName .= 'Helper';
        require_once "Helper/" . $helperName . ".php";
        return new $helperName();
    }

    public function setAction($a)
    {
        $this->currentAction = $a;
    }

}
