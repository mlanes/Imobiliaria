<?php

class Controller
{

    public function loadModel($modelName) {
        $modelName .= 'Model';
        require_once "Model/" . $modelName . ".php";
        return new $modelName();
    }

    public function loadView($folderName, $viewName) {
        $file = "View/" . ucfirst($folderName) . "/" . $viewName . '.php';
        return $file;
    }

}
