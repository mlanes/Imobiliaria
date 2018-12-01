<?php

use Core\Controller;

class NotfoundController extends Controller
{
    private $controller = 'Notfound';

    public function __construct()
    {
        // Herdando Construct
        parent::__construct();
    }

    public function index($param)
    {
        // Caregando Helpers
        $bootstrapHelper = parent::loadHelper("Bootstrap");
        $styleHelper = parent::loadHelper("Style");
        $linkHelper = parent::loadHelper("Link");

        // Carregando View
        require_once parent::loadView($this->controller, $this->currentAction);
    }
}