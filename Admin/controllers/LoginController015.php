<?php
    require_once("./models/login.php");
    require_once("./models/donhang.php");
    class LoginController015 {
        var $login_model;
        var $order_model;
        public function __construct()
        {
            $this->login_model = new login();
            $this->order_model = new Hoadon();
        }
    
        public function admin()
        {
            $user_data = $this->login_model -> adminProfile();
            $count_order = $this->login_model -> orderStatistics();
            $count_revenue = $this->login_model -> revenueStatistics();
            $count_user = $this->login_model -> userStatistics();
            $count_product_expires = $this->login_model ->productExpiresStatistics();
            $data_order = $this->order_model->order_data_detail();
            $data_best_selling = $this->login_model->best_selling_product();
            require_once("./views/admin/home.php");
        }
        
        public function dangxuat()
        {
            $this->login_model->logout();
        }
    }