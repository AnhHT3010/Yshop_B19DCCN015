<?php
session_start();
$act = isset($_GET['act']) ? $_GET['act'] : "home";
switch ($act) {
    case 'home':
        require_once("controllers/HomeController.php");
        $list_homecontroller = new HomeController();
        $list_homecontroller->list();
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
                        echo "dangnhap";
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
    default:
        require_once("controllers/HomeController.php");
        $list_homecontroller = new HomeController();
        $list_homecontroller->list();
        break;
}
