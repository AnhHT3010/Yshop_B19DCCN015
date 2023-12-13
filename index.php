<?php
session_start();
$act = isset($_GET['act']) ? $_GET['act'] : "home";
switch ($act) {
    case 'home':
        if((isset($_SESSION['isLogin_Admin']) && $_SESSION['isLogin_Admin'] == true)) {
            header('Location: Admin');
        }else{
            require_once("Client/controllers/HomeController015.php");
            $list_homecontroller = new HomeController015();
            $list_homecontroller->list();
        }
        break;
    case 'taikhoan':
        $act = isset($_GET['xuli']) ? $_GET['xuli'] : 'taikhoan';
        require_once('Client/controllers/LoginController015.php');
        $controller_obj = new LoginContronler();
        if ((isset($_SESSION['isLogin']) && $_SESSION['isLogin'] == true)) {
            switch ($act) {
                case 'dangxuat':
                    $controller_obj->dangxuat();
                    break;
                case 'account':
                    $controller_obj->account();
                    break;
                case 'huydonhang':
                    $controller_obj->huydonhang();
                    break;
                default:
                    header('location: ?act=error');
                    break;
            }
            break;
        } else {
            switch ($act) {
                case 'login':
                    echo "login";
                    $controller_obj->login();
                    break;
                case 'dangnhap':
                    $controller_obj->login_action();
                    break;
                case 'dangky':
                    echo "dangky";
                    $controller_obj->dangky();
                    break;
                default:
                    $controller_obj->login();
                    break;
            }
            break;
        }
    case 'detail':
        require_once("Client/controllers/ProductDetailController.php");
        $detailControllor = new ProductDetailController();
        $detailControllor->show_detail();
        break;
    case 'shop':
        require_once('Client/controllers/ShopController015.php');
        $shopController = new ShopController015();
        $shopController->list();
        break;
    case 'checkout':
        $act = isset($_GET['xuli']) ? $_GET['xuli'] : "list";
        require_once('Client/controllers/CheckoutController015.php');
        $controller_obj = new CheckoutController015();
        switch ($act) {
            case 'list':
                $controller_obj->list_order();
                break;
            case 'save':
                $controller_obj->save();
                break;
            default:
                $controller_obj->list_order();
                break;
        }
        break;
    case 'cart':
        if (isset($_SESSION['login']['MaND'])) {
            $act = isset($_GET['xuli']) ? $_GET['xuli'] : "list";
            require_once('Client/controllers/CartController015.php');
            $controller_obj = new CartController015();
            switch ($act) {
                case 'list':
                    $controller_obj->list_cart();
                    break;
                case 'add':
                    $controller_obj->add_cart();
                    break;
                case 'update':
                    $controller_obj->increase_cart();
                    break;
                case 'delete':
                    $controller_obj->reduce_cart();
                    break;
                case 'deleteAll':
                    $controller_obj->deleteall_cart();
                    break;
                    // case 'addwishlist':
                    //     $controller_obj->addwishlist();
                default:
                    $controller_obj->list_cart();
                    break;
                } 
        } else {
            header('location: account');
        }
    default:
        require_once("Client/controllers/HomeController015.php");
        $list_homecontroller = new HomeController015();
        $list_homecontroller->list();
        break;
}