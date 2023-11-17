<?php
session_start();
$act = isset($_GET['act']) ? $_GET['act'] : "home";
switch ($act) {
    case 'home':
        if((isset($_SESSION['isLogin_Admin']) && $_SESSION['isLogin_Admin'] == true)) {
            header('Location: Admin');
        }else{
            require_once("controllers/HomeController015.php");
            $list_homecontroller = new HomeController015();
            $list_homecontroller->list();
        }
        break;
    case 'taikhoan':
        $act = isset($_GET['xuli']) ? $_GET['xuli'] : 'taikhoan';
        require_once('controllers/LoginController015.php');
        $controller_obj = new LoginContronler();
        if ((isset($_SESSION['isLogin']) && $_SESSION['isLogin'] == true)) {
            switch ($act) {
                case 'dangxuat':
                    $controller_obj->dangxuat();
                    break;
                case 'account':
                    $controller_obj->account();
                    break;
                default:
                    header('location: ?act=error');
                    break;
            }
            break;
        } else {
            if ((isset($_SESSION['isLogin_Admin']) && $_SESSION['isLogin_Admin'] == true)) {
                switch ($act) {
                    case 'dangxuat':
                        $controller_obj->dangxuat();
                        break;
                    case 'account':
                        $controller_obj->account();
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
        }
    case 'detail':
        require_once("controllers/ProductDetailController.php");
        $detailControllor = new ProductDetailController();
        $detailControllor->show_detail();
        break;
    case 'shop':
        require_once('controllers/ShopController015.php');
        $shopController = new ShopController015();
        $shopController->list();
        break;
    case 'cart':
        $act = isset($_GET['xuli']) ? $_GET['xuli'] : "add";
        require_once('controllers/CartController015.php');
        $controller_obj = new CartController015();
        switch ($act) {
            case 'add':
                $controller_obj->add_cart();
                break;
            // case 'add':
            //     $controller_obj->add_cart();
            //     break;
            // case 'update':
            //     $controller_obj->update_cart();
            //     break;
            // case 'delete':
            //     $controller_obj->delete_cart();
            //     break;
            // case 'deleteAll':
            //     $controller_obj->deleteall_cart();
            //     break;
            // case 'addwishlist':
            //     $controller_obj->addwishlist();
            default:
                $controller_obj->add_cart();
                break;
        }
    default:
    require_once("controllers/HomeController015.php");
    $list_homecontroller = new HomeController015();
    $list_homecontroller->list();
    break;
}
