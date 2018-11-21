<?php

class Controller
{
    protected $reffer;

    public function __construct()
    {
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
}
