<?php
$act = isset($_GET['act']) ? $_GET['act'] : "home";
switch ($act) {
    case 'home':
        require_once("home/home.php");
        break;
    case 'taikhoan':
        $act = isset($_GET['xuli']) ? $_GET['xuli'] : "login";
        if (isset($_SESSION['isLogin']) && $_SESSION['isLogin'] == true) {
            switch ($act) {
                case 'login':
                    require_once("login/login.php");
                    break;
                case 'account':
                    require_once("login/my-account.php");
                    break;
                default:
                    require_once("login/login.php");
                    break;
            }
        } else {
            switch ($act) {
                case 'login':
                    require_once("login/login.php");
                    break;
                default:
                    require_once("login/login.php");
                    break;
            }
            break;
        }
        break;
    case 'detail':
        require_once("productdetail/productdetail.php");
        break;
    case 'shop':
        require_once("shop/shop.php");
        break;
    case 'checkout':
        require_once("order/checkout.php");
        break;
    case 'cart':
        require_once("cart/cart.php");
        break;
    case 'personal':
        require_once("login/my-account.php");
        break;
    default:
        require_once("error.php");
        break;
}
