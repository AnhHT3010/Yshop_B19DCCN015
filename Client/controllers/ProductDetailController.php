<?php
require_once("Client/models/productdetail.php");
require_once("Client/models/cart.php");
class ProductDetailController
{
    var $detail_model;
    var $cart_model;
    public function __construct()
    {
        $this->detail_model = new ProductDetail();
        $this->cart_model = new Cart();
    }
    public function show_detail()
    {
        $data_categories = $this->detail_model->categories();
        $data_brands = array();
        for ($i = 0; $i < count($data_categories); $i++) {
            $idDM = $data_categories[$i]['MaDM'];
            $data_brands[$i] = $this->detail_model->brands($idDM);
        }
        $id = $_GET['id'];
        $this->detail_model->addtableview($id);
        $data = $this->detail_model->detail_product($id);
        $data_img = $this -> detail_model -> imgdetail($id);
        $dataview = $this->detail_model->viewlive($id);
        if ($data != NULL) {
            $category_where = $this->detail_model->categories_where($data['MaDM']);
        }
        if (isset($_SESSION['id_ND']) && $_SESSION['id_ND'] && !empty($_SESSION['id_ND'])) {
            $data_cart = $this->cart_model->detail_cart_item($_SESSION['id_ND']);
        }
        require_once("Client/views/index.php");
    }
}
        
        // $data_color = $this->detail_model->selectColor($id);
        
        // $this->detail_model->addtableview($id);
