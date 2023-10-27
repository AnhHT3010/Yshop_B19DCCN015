<?php
session_start();
$act = isset($_GET['act']) ? $_GET['act'] : "home";
switch ($act) {
    case 'home':
        require_once("controllers/HomeController.php");
        $list_homecontroller = new HomeController();
        $list_homecontroller->list();
        break;
    default:
        require_once("controllers/HomeController.php");
        $list_homecontroller = new HomeController();
        $list_homecontroller->list();
        break;
}
