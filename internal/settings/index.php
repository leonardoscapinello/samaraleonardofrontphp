<?php

$postdata = file_get_contents("php://input");

if (!isset($_SESSION)) {
    session_start();
}


require_once("import.constants.php");
require_once("import.functions.php");
require_once("import.class.php");

require_once(DIRNAME . "../vendor/autoload.php");

/* MINIFYING ========================*/

use MatthiasMullie\Minify;

$minifierCSS = new Minify\CSS();
$minifierJS = new Minify\JS();
