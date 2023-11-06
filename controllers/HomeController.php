<?php
require_once("models/home.php");
class HomeController
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
        require_once("views/index.php");
    }
}