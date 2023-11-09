<?php
session_start();
if (isset($_SESSION['isLogin_Admin']) && $_SESSION['isLogin_Admin'] == true) {
    $mod = isset($_GET['mod']) ? $_GET['mod'] : "login";
    $act = isset($_GET['act']) ? $_GET['act'] : "admin";
    switch ($mod) {
      case 'login':
        require_once('./controllers/LoginController.php');
        $controller_obj = new LoginController();
        switch ($act) {
          case 'admin':
            $controller_obj->admin();
            break;
          default:
            $controller_obj->admin();
            break;
        }
        break;
      case 'danhmuc':
        require_once('./controllers/DanhmucController.php');
        $controller_obj = new DanhmucController();
        switch ($act) {
          case 'list':
            $controller_obj->list();
            break;
          case 'add':
            $controller_obj->add();
            break;
          case 'store':
            $controller_obj->store();
            break;
          case 'detail':
            // $controller_obj->detail();
            break;
          case 'delete':
            $controller_obj->delete();
            break;
          case 'edit':
            $controller_obj->edit();
            break;
          case 'update':
            $controller_obj->update();
            break;
          default:
            $controller_obj->list();
            break;
        }
        break;
      default:
        header('location: ?mod=login');
        break;
    }
}?>