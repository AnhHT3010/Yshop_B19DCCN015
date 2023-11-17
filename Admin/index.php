<?php
session_start();
if (isset($_SESSION['isLogin_Admin']) && $_SESSION['isLogin_Admin'] == true) {
    $mod = isset($_GET['mod']) ? $_GET['mod'] : "login";
    $act = isset($_GET['act']) ? $_GET['act'] : "admin";
    switch ($mod) {
      case 'login':
        require_once('./controllers/LoginController015.php');
        $controller_obj = new LoginController015();
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
        require_once('./controllers/DanhmucController015.php');
        $controller_obj = new DanhmucController015();
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
      case 'thuonghieu':
        require_once('./controllers/ThuongHieuController015.php');
        $controller_obj = new ThuongHieuController015();
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
      case 'sanpham':
        require_once('./controllers/SanphamController015.php');
        $controller_obj = new SanphamController015();
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
      case 'taikhoan':
        require_once('./controllers/LoginController015.php');
        $controller_obj = new LoginController015();
        switch ($act) {
          case 'dangxuat':
            $controller_obj->dangxuat();
            break;
          default:
            header('location: ?act=error');
            break;
        }
        break;
      default:
        header('location: ?mod=login');
        break;
      }
}else{
  header('location: ../');
}?>