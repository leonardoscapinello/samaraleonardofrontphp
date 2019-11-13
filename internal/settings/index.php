<?php

$postdata = file_get_contents("php://input");

if (!isset($_SESSION)) {
    session_start();
}

require_once("import.constants.php");
require_once("import.functions.php");
require_once("import.class.php");

