<?php

// Pegar url que fez o request
// var_dump($_SERVER["HTTP_REFERER"]);

require_once "../Config/App.php";
require_once "autoload.php";

if (DISPLAY_ERRORS == true) {
    ini_set( 'display_errors', TRUE );
    error_reporting( E_ALL | E_STRICT );
}

date_default_timezone_set(DATE_TIMEZONE);

use Core\Mvc;

$mvc = new Mvc();
