<?php
require_once("models/home.php");
require_once("models/cart.php");
class HomeController015
{
    var $home_model;
    var $cart_model;
    public function __construct()
    {
        $this->home_model = new home();
        $this->cart_model = new Cart();
    }
    function list()
    {
        $data_slider = $this->home_model->slider();
        $data_categories = $this->home_model->categories();
        $data_brands = array();
        for ($i = 1; $i <= count($data_categories); $i++) {
            $data_brands[$i] = $this->home_model->brands($i);
        }
        $data_recommendationforyou = $this->home_model->random(0, 12);
        $top_rated = $this->home_model->liveviews();
        if (isset($_SESSION['id_ND']) && $_SESSION['id_ND'] && !empty($_SESSION['id_ND'])) {
            $data_cart = $this->cart_model->detail_cart_item($_SESSION['id_ND']);
        }
        require_once("views/index.php");
    }
}