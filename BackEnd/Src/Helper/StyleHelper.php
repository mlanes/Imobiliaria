<?php

require_once "Core/Helper.php";

class StyleHelper extends Helper
{
    public function __construct()
    {
        parent::__construct();
    }

    public function css()
    {
        return '<link rel="stylesheet" href="../../Front/style/style.css">';
    }
}
