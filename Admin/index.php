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
      case 'donhang':
        require_once('./controllers/DonhangController015.php');
        $controller_obj = new DonhangController015();
        switch ($act) {
          case 'list':
            $controller_obj->list();
            break;
          case 'detail':
            $controller_obj->detail();
            break;
          case 'browse_bill':
            $controller_obj->browse_bill();
            break;
          case 'filter_browse':
            $controller_obj->filter_browse();
            break;
          case 'filter_not_browse':
            $controller_obj->filter_not_browse();
            break;
          case 'delete':
            $controller_obj->delete();
            break;
          case 'export_invoice':
            $controller_obj->export_invoice();
            break;
          default:
            $controller_obj->list();
            break;
        }
        break;
      case 'nguoidung':
      require_once('./controllers/NguoiDungController015.php');
      $controller_obj = new NguoiDungController();
      switch ($act) {
        case 'list':
          $controller_obj->list();
          break;
        case 'edit':
          $controller_obj->edit();
          break;
        case 'update':
          $controller_obj->update();
          break;
        case 'delete':
          $controller_obj->delete();
          break;
        default:
          $controller_obj->list();
          break;
        }
        break;
        default:
          header('location: ?mod=list');
          break;
      }
}else{
  header('location: ../');
}?>