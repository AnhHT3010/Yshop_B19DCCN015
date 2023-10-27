<?php
$act = isset($_GET['act']) ? $_GET['act'] : "home";
switch ($act) {
    case 'home':
        require_once("home/home.php");
        break;
    default:
        require_once("error.php");
        break;
}
