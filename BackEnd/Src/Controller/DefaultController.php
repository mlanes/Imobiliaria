<?php

use Core\Controller;

class DefaultController extends Controller
{
    private $controller = 'Default';

    public function __construct()
    {
        // Herdando Construct
        parent::__construct();
    }

    public function dashboard()
    {
        // Caregando Helpers
        $bootstrapHelper = parent::loadHelper("Bootstrap");
        $styleHelper = parent::loadHelper("Style");
        $linkHelper = parent::loadHelper("Link");

        // Carregando View
        require_once parent::loadView($this->controller, $this->currentAction);
    }

    public function notfound($folderName, $fileName)
    {
        // Carregando View
        require_once parent::loadView($folderName, $fileName);
    }
}
