<?php
require_once("models/home.php");
class HomeController015
{
    var $home_model;
    public function __construct()
    {
        $this->home_model = new home();
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
        require_once("views/index.php");
    }
}