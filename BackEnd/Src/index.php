<?php
//
// function autoloadClasses($pClassName) {
//     $dir = str_replace('\\', '/', $pClassName . ".php");
//     $dir = str_replace('Src/', '', $dir);
//     require_once ($dir);
// }
// spl_autoload_register("autoloadClasses");

ini_set( 'display_errors', TRUE );
error_reporting( E_ALL | E_STRICT );


// Pegar url que fez o request
// var_dump($_SERVER["HTTP_REFERER"]);

require_once "../Config/App.php";
require_once ("Core/Mvc.php");

$mvc = new Mvc();
