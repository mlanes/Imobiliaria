<?php

require_once 'Core/Controller.php';

class DefaultController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function notfound($folderName, $fileName)
    {
        require_once parent::loadView($folderName, $fileName);
    }
}
