<?php
if (!$session->isLogged()) {
    header("location: " . LOGIN_PAGE);
    die;
}