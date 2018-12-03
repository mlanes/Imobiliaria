<?php

function autoloadClasses($pClassName) {
    $dir = str_replace('\\', '/', $pClassName . ".php");
    $dir = str_replace('Src/', '', $dir);
    require_once ($dir);
}
spl_autoload_register("autoloadClasses");