<?php

use Core\Helper;

class BootstrapHelper extends Helper
{
    public function __construct()
    {
        parent::__construct();
    }

    public function css()
    {
        return '<link rel="stylesheet" href="http://' . HOSTNAME . '/Imobiliaria/BackEnd/Web/style/bootstrap.min.css">';
    }
}
