<?php
$act = isset($_GET['act']) ? $_GET['act'] : "home";
switch ($act) {
    case 'home':
        require_once("home/home.php");
        break;
    case 'taikhoan':
        $act = isset($_GET['xuli']) ? $_GET['xuli'] : "login";
        require_once("login/login.php");
        break;
    case 'detail':
        require_once("productdetail/productdetail.php");
        break;
    case 'shop':
        require_once("shop/shop.php");
        break;
    default:
        require_once("error.php");
        break;
}
