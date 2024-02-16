<?php
require_once("Client/models/login.php");
require_once("Client/models/cart.php");
class LoginContronler
{
    var $login_model;
    var $cart_model;
    function __construct()
    {
        $this->login_model = new login();
        $this->cart_model = new Cart();
    }
    function login()
    {
        $data_categories = $this->login_model->categories();
        $data_brands = array();
        for ($i = 0; $i < count($data_categories); $i++) {
            $idDM = $data_categories[$i]['MaDM'];
            $data_brands[$i] = $this->login_model->brands($idDM);
        }
        if (isset($_SESSION['id_ND']) && $_SESSION['id_ND'] && !empty($_SESSION['id_ND'])) {
            $data_cart = $this->cart_model->detail_cart_item($_SESSION['id_ND']);
        }
        require_once("Client/views/index.php");
    }
    function dangky()
    {
        $check1 = 0; # Kiểm tra tài khoản đã tồn tại chưa ?
        $check2 = 0; # Kiểm tra việc xác nhận mật khẩu có trùng không ?
        $data_check = $this->login_model->check_account();
        foreach ($data_check as $value) {
            if ($value['Email'] == $_POST['Email'] || $value['TaiKhoan'] == $_POST['TaiKhoan']) {
                $check1 = 1;
            }
        }

        if ($_POST['MatKhau'] != $_POST['check_password']) {
            $check2 = 1;
        }
        $TrangThai = 0;
        if (isset($_POST['TrangThai'])) {
            $TrangThai = $_POST['TrangThai'];
        }
        $data = array(
            'Ho' =>    $_POST['Ho'],
            'Ten'  =>  $_POST['Ten'],
            'GioiTinh' => "",
            'SDT' => "",
            'Email' => $_POST['Email'],
            'DiaChi'  =>   "",
            'Quan'  =>   "",
            'Tinh'  =>   "",
            'HinhAnh' => "",
            'TaiKhoan' => $_POST['TaiKhoan'],
            'MatKhau' => md5($_POST['MatKhau']),
            'MaQuyen' =>  '1',
            'TrangThai'  =>  $TrangThai
        );
        //  bảo vệ dữ liệu trước các loại tấn công chèn SQL (SQL injection)
        foreach ($data as $key => $value) {
            if (strpos($value, "'") != false) {
                $value = str_replace("'", "\'", $value);
                $data[$key] = $value;
            }
        }

        $this->login_model->dangky_action($data, $check1, $check2);
    }
    function login_action()
    {
        $taikhoan = $_POST['taikhoan'];
        $matkhau = md5($_POST['matkhau']);
        if (strpos($taikhoan, "'") != false) { //Tìm vị trí xuất hiện đầu tiên của một chuỗi con trong một chuỗi
            $taikhoan = str_replace("'", "\'", $taikhoan); //Thay thế tất cả các lần xuất hiện của chuỗi tìm kiếm bằng chuỗi thay thế
        }
        $data = array(
            'taikhoan' => $taikhoan,
            'matkhau' => $matkhau,
        );
        $this->login_model->login_action($data);
    }
    function account()
    {
        $data_categories = $this->login_model->categories();
        $data_brands = array();
        for ($i = 0; $i < count($data_categories); $i++) {
            $idDM = $data_categories[$i]['MaDM'];
            $data_brands[$i] = $this->login_model->brands($idDM);
        }
        if (isset($_SESSION['id_ND']) && $_SESSION['id_ND'] && !empty($_SESSION['id_ND'])) {
            $data_cart = $this->cart_model->detail_cart_item($_SESSION['id_ND']);
        }
        $data_profile = $this->login_model->account();
        $data_order = $this->login_model->order_data();
        if (isset($_GET['maHD'])) {
            $maHD = $_GET['maHD'];
            $data_order_detail = $this->login_model->getProductsByMaHD($maHD);
        }
        require_once('Client/views/index.php');
    }
    function huydonhang(){
        $data_categories = $this->login_model->categories();
        $data_brands = array();
        for ($i = 0; $i < count($data_categories); $i++) {
            $idDM = $data_categories[$i]['MaDM'];
            $data_brands[$i] = $this->login_model->brands($idDM);
        }
        if (isset($_SESSION['id_ND']) && $_SESSION['id_ND'] && !empty($_SESSION['id_ND'])) {
            $data_cart = $this->cart_model->detail_cart_item($_SESSION['id_ND']);
        }
        $data_profile = $this->login_model->account();
        $data_order = $this->login_model->order_data();
        if (isset($_GET['idHD'])) {
            $maHD = $_GET['idHD'];
            // cập nhật lại số lượng cho sản phẩm khi đơn hàng bị hủy
            $this->cart_model->increase_product_quatity($maHD);
            $data_maHD = array(
                'MaHD' => $_GET['idHD'],
                'TrangThai' => 2,
            );
            $this->login_model->cancelOrder($data_maHD);
        }
    }
    function dangxuat()
    {
        $this->login_model->logout();
    }
}