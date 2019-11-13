<?php
require_once(DIRNAME . "../class/Database.php");
require_once(DIRNAME . "../class/Charset.php");
require_once(DIRNAME . "../class/Modules.php");
require_once(DIRNAME . "../class/AccountSession.php");

$database = new Database();
$charset = new Charset();
$modules = new Modules();
$session = new AccountSession();
