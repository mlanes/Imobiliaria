<?php
//
// function autoloadClasses($pClassName) {
//     $dir = str_replace('\\', '/', $pClassName . ".php");
//     $dir = str_replace('Src/', '', $dir);
//     require_once ($dir);
// }
// spl_autoload_register("autoloadClasses");

require_once "../Config/App.php";
require_once ("Core/Mvc.php");

$mvc = new Mvc();
