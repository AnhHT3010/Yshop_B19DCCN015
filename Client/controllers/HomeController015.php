<?php
require_once("Client/models/home.php");
require_once("Client/models/cart.php");
require_once("Client/models/login.php");
class HomeController015
{
    var $home_model;
    var $cart_model;
    var $login_model;
    public function __construct()
    {
        $this->home_model = new home();
        $this->cart_model = new Cart();
        $this->login_model = new login();
    }
    function list()
    {
        $data_slider = $this->home_model->slider();
        $data_categories = $this->home_model->categories();
        $data_brands = array();
        if(isset($_SESSION['login']['MaND'])){
            $data_profile = $this->login_model->account();
        }
        for ($i = 0; $i < count($data_categories); $i++) {
            $idDM = $data_categories[$i]['MaDM'];
            $data_brands[$i] = $this->login_model->brands($idDM);
        }
        $data_recommendationforyou = $this->home_model->random(0, 12);
        $top_rated = $this->home_model->liveviews();
        if (isset($_SESSION['id_ND']) && $_SESSION['id_ND'] && !empty($_SESSION['id_ND'])) {
            $data_cart = $this->cart_model->detail_cart_item($_SESSION['id_ND']);
        }
        require_once("Client/views/index.php");
    }
}