<?php
session_start();
$act = isset($_GET['act']) ? $_GET['act'] : "home";
switch ($act) {
    case 'login':
        require_once("views/login.php");
        break;
    default:
        require_once("views/home.php");
        break;
}
