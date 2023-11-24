<?php
require_once("Client/models/cart.php");
require_once("Client/models/home.php");
class CartController015
{
    var $cart_model;
    var $home_model;
    public function __construct()
    {
        $this->cart_model = new Cart();
        $this->home_model = new home();
    }
    function list_cart()
    {
        $data_categories = $this->cart_model->categories();
        $data_catalogdetails = array();
        for ($i = 1; $i <= count($data_categories); $i++) {
            $data_brands[$i] = $this->home_model->brands($i);
        }
        for ($i = 1; $i <= count($data_categories); $i++) {
            $data_catalogdetails[$i] = $this->cart_model->catalogdetails($i);
        }
        if (isset($_SESSION['id_ND']) && $_SESSION['id_ND'] && !empty($_SESSION['id_ND'])) {
            $data_cart = $this->cart_model->detail_cart_item($_SESSION['id_ND']);
        }
        // $count = 0;
        // if (isset($_SESSION['id_ND'])) {
        //     foreach ($_SESSION['products'] as $value) {
        //         $count += $value['ThanhTien'];
        //     }
        // }
        require_once("Client/views/index.php");
    }
    function add_cart()
    {
        $id = $_GET['id'];
        $in_stock = $this->cart_model->product_in_stock($id);
        // kiểm tra số lượng sản phẩm còn trong kho
        if($in_stock['count']  < 1){
            print_r($in_stock['count']);
            echo("'Sản phẩm đã hết hàng'");
            setcookie('msg-warning', 'Sản phẩm đã hết hàng', time() + 2);
            header("location: store");
            return;
        }
        if (isset($_POST['quality']) && $_POST['quality'] != NULL) {
            $SoLuong = $_POST['quality'];
        } else {
            $SoLuong = 1;
        }
        if (isset($_SESSION['id_ND']) && $_SESSION['id_ND'] && !empty($_SESSION['id_ND'])) {
            $check = $this->cart_model->check_product_in_cart($id, $_SESSION['id_ND']);
        }
        if(isset($checked)){
            $checked = $_GET['checked'];
        }
        if($check['count'] > 0){
            if(isset($checked) && $checked == 1){
                setcookie('msg-info', 'Sản phẩm đã có trong giỏ hàng', time() + 2);
                header("location: store");
            }else{
                print_r("Cập nhật trong giỏ hàng");
                $this->cart_model->update_cart($SoLuong,$id);
            }
        }else{
            if($_SESSION['id_ND']){
                $dataCartItem = array(
                    'MaSP' => $_GET['id'],
                    'MaND' => $_SESSION['id_ND'],
                    'SoLuongTrongGio' => $SoLuong
                );
            }
            foreach ($dataCartItem as $key => $value) {
                if (strpos($value, "'") != false) {
                    $value = str_replace("'", "\'", $value);
                    $dataCartItem[$key] = $value;
                }
            }
            if (isset($checked)) {
                $this->cart_model->add_cart_database($dataCartItem, $checked);
            }else{
                $checked = false;
                $this->cart_model->add_cart_database($dataCartItem, $checked);
            }
        }
    }
    function reduce_cart()
    {
        $id = $_GET['id'];
        $this->cart_model->reduce_cart_database($id);
    }
    function increase_cart()
    {
        $id = $_GET['id'];
        $this->cart_model->increase_cart_database($id);
    }
    function deleteall_cart()
    {
        $id = $_GET['id'];
        $this->cart_model->deleteall_cart_item_database($id);
    }
}