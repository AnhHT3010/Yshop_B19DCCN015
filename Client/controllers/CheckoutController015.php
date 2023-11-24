<?php
require_once("Client/models/checkout.php");
require_once("Client/models/cart.php");
require_once("Client/models/login.php");
class CheckoutController015
{
    var $checkout_model;
    var $cart_model;
    var $login_model;
    public function __construct()
    {
        $this->checkout_model = new Checkout();
        $this->cart_model = new Cart();
        $this->login_model = new login();
    }
    function list()
    {
        $data_categories = $this->checkout_model->categories();
        $data_brands = array();
        for ($i = 1; $i <= count($data_categories); $i++) {
            $data_brands[$i] = $this->checkout_model->brands($i);
        }
        if (isset($_SESSION['id_ND']) && $_SESSION['id_ND'] && !empty($_SESSION['id_ND'])) {
            $data_cart = $this->cart_model->detail_cart_item($_SESSION['id_ND']);
            $data_user = $this ->login_model -> get_user($_SESSION['id_ND']);
        }
        if (isset($_SESSION['login'])) {

            $count = 0;
            if (isset($data_cart)) {
                foreach ($data_cart as $value) {
                    $count += $value['SoLuongTrongGio'] * $value['DonGia'];
                }
            }
            require_once('Client/views/index.php');
        } else {
            header('location: login');
        }
    }
    function save()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $ThoiGian =  date('Y-m-d H:i:s');
        $data_cart = $this->cart_model->detail_cart_item($_SESSION['id_ND']);
        $count = 0;
        if (isset($_SESSION['login'])) {
            if (isset($data_cart)) {
                foreach ($data_cart as $value) {
                    $count += $value['SoLuongTrongGio'] * $value['DonGia'];
                    $this->cart_model->update_product_quatity($value['MaSP'], $value['SoLuongTrongGio']);
                }
            }
            $data = array(
                'MaND' => $_SESSION['id_ND'],
                'NgayLap' => $ThoiGian,
                'NguoiNhan' => $_POST['NguoiNhan'],
                'SDT' => $_POST['SDT'],
                'DiaChi' => $_POST['DiaChi'],
                'Quan' => $_POST['Quan'],
                'Phuong' => $_POST['Phuong'],
                'PhuongThucTT' => $_POST['PhuongThucTT'],
                'TongTien' => $count,
                'TrangThai'  =>  '0',
                'Note' => $_POST['Note'],
                'Email' => $_POST['Email'],
            );
        }
        $id_order = $this->checkout_model->save_order($data);
        // update id order for cart item 
        $this->cart_model-> update_id_order_cart($_SESSION['id_ND'], $id_order);
        // update product quatity 

    }
}
