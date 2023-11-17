<?php
require_once("models/cart.php");
class CartController015
{
    var $cart_model;
    public function __construct()
    {
        $this->cart_model = new Cart();
    }
    // function list_cart()
    // {
    //     $data_categories = $this->cart_model->categories();
    //     $data_catalogdetails = array();

    //     for ($i = 1; $i <= count($data_categories); $i++) {
    //         $data_catalogdetails[$i] = $this->cart_model->catalogdetails($i);
    //     }

    //     $count = 0;
    //     if (isset($_SESSION['products'])) {
    //         foreach ($_SESSION['products'] as $value) {
    //             $count += $value['ThanhTien'];
    //         }
    //     }
    //     if (empty($_SESSION['products'])) {
    //     } else {
    //         $data = $this->cart_model->detail_product($value['MaSP']);
    //     }
    //     require_once("Views/index.php");
    // }
    function add_cart()
    {
        $id = $_GET['id'];
        $data = $this->cart_model->detail_product($id);
        $count = 0;
        if ($_POST['quality'] != NULL) {
            $i = $_POST['quality'];
        } else {
            $i = 1;
        }
        if(isset($data) && $_SESSION['id_ND']){
            $dataCartItem = array(
                'MaSP' => $data['MaSP'],
                'MaND' => $_SESSION['id_ND'],
                'SoLuong' => $i
            );
        }
        foreach ($dataCartItem as $key => $value) {
            if (strpos($value, "'") != false) {
                $value = str_replace("'", "\'", $value);
                $dataCartItem[$key] = $value;
            }
        }
        
        $this->cart_model->add_cart_database($dataCartItem);

        // $color = $_POST['typecolor'];
        // if (isset($_SESSION['products'][$id])) {
        //     $arr = $_SESSION['products'][$id];
        //     $_SESSION['products'][$id] = $arr;
        // } else {
        //     $_SESSION['products'][$id] = $arr;
        // }
        // foreach ($_SESSION['products'] as $value) {
        //     $count += $value['ThanhTien'];
        // }

        // setcookie('cart', 'Add to cart successfully', time() + 4);

        // header('location: ' . $data['MaSP'] . ".html");
    }
}