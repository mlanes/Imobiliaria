<?php

use Core\Helper;

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
