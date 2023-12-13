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
    function list_order()
    {
        if (isset($_SESSION['id_ND']) && $_SESSION['id_ND'] && !empty($_SESSION['id_ND'])) {
            $data_cart = $this->cart_model->detail_cart_item($_SESSION['id_ND']);
            $data_user = $this ->login_model -> get_user($_SESSION['id_ND']);
            $data_check_quatity = $this->checkout_model->check_quatity_product($_SESSION['id_ND']);
        }
        if (isset($_SESSION['login'])) {
            $count = 0;
            if (isset($data_cart)) {
                foreach ($data_cart as $value) {
                    $count += $value['SoLuongTrongGio'] * $value['DonGia'];
                }
            }
            if($data_check_quatity){
                setcookie('msg-error', 'Vui lòng kiểm tra lại số lượng của sản phẩm !', time() + 2);
                header('location: cart');
            }else{
                $data_categories = $this->checkout_model->categories();
                $data_brands = array();
                $data_profile = $this->login_model->account();
                for ($i = 0; $i < count($data_categories); $i++) {
                    $idDM = $data_categories[$i]['MaDM'];
                    $data_brands[$i] = $this->checkout_model->brands($idDM);
                }
                require_once('Client/views/index.php');
            }
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
                'Tinh' => $_POST['Tinh'],
                'Quan' => $_POST['Quan'],
                'DiaChi' => $_POST['DiaChi'],
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
