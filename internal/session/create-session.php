<?php
require_once("../settings/index.php");
if (!$session->isLogged()) $login = $session->storeSession();
die;
?>