<?php

require_once "Core/Helper.php";

class BootstrapHelper extends Helper
{
    public function __construct()
    {
        parent::__construct();
    }

    public function css()
    {
        return '<link rel="stylesheet" href="../../Front/node_modules/bootstrap/dist/css/bootstrap.min.css">';
    }
}
