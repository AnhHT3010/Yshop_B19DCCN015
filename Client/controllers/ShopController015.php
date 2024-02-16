<?php
require_once("Client/models/shop.php");
require_once("Client/models/cart.php");
class ShopController015
{
    var $shop_model;
    var $cart_model;
    public function __construct()
    {
        $this->shop_model = new Shop();
        $this->cart_model = new Cart();
    }
    function list()
    {
        $data_categories = $this->shop_model->categories();
        $data_brands = array();
        for ($i = 0; $i < count($data_categories); $i++) {
            $idDM = $data_categories[$i]['MaDM'];
            $data_brands[$i] = $this->shop_model->brands($idDM);
        }
        $data_profile = $this->shop_model->account();
        if(isset($_GET['category'])){
            //hiển thị tất cả sản phẩm theo từng danh mục
            $data = $this->shop_model->find_product_for_category(0, 9, $_GET['category']);
            $data_count = $this->shop_model->count_product_category($_GET['category']);
            $data_tong = $data_count['tong'];
        }else{
            if(isset($_GET['from'])){
                $from = $_GET['from'];
                $to = $_GET['to'];
                $data = $this-> shop_model->get_products_in_price_range($from,$to);
                $data_tong = count($data);
            } else {
                //tìm kiếm theo tên hoặc danh mục
                if (isset($_POST['keyword'])) {
                    $data = $this->shop_model->keywork($_POST['keyword'], $_POST['searchcategory']);
                    $data_tong = count($data);
                } else {
                    //hiển thị tất cả trong store và phân trang(12sản phẩm/trang)
                    $id = isset($_GET['page']) ? $_GET['page'] : 1;
                    $limit = 12;
                    $start = ($id - 1) * $limit;
                    $data = $this->shop_model->limit($start, $limit);
                    $data_count = $this->shop_model->count_sp();
                    $data_tong = $data_count['tong'];
                    $test = 0;
                }
            }
        }
        if (isset($_SESSION['id_ND']) && $_SESSION['id_ND'] && !empty($_SESSION['id_ND'])) {
            $data_cart = $this->cart_model->detail_cart_item($_SESSION['id_ND']);
        }
        require_once("Client/views/index.php");
    }
}
