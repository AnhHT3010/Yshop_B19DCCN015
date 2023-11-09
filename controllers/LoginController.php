<?php
require_once("models/login.php");
class LoginContronler
{
    var $login_model;
    function __construct()
    {
        $this->login_model = new login();
    }
    function login()
    {
        $data_categories = $this->login_model->categories();
        $data_brands = array();
        for ($i = 1; $i <= count($data_categories); $i++) {
            $data_brands[$i] = $this->login_model->brands($i);
        }
        require_once("views/index.php");
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
            'Email' => "",
            'DiaChi'  =>   "",
            'Quan'  =>   "",
            'Phuong'  =>   "",
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
        $id = $_SESSION['login']['MaND'];
        $data = $this->login_model->account();
        require_once('views/index.php');
    }
    function dangxuat()
    {
        $this->login_model->logout();
    }
}