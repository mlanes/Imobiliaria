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
        return '<link rel="stylesheet" href="http://' . HOSTNAME . '/Imobiliaria/Front/style/style.css">';
    }
}
