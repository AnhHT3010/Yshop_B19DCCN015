<?php 
    require_once("./models/login.php");
    class LoginController015 {
        var $login_model;
        public function __construct()
        {
            $this->login_model = new login();
        }
    
        public function admin()
        {
            $this->login_model -> adminProfile();
            require_once("./views/admin/home.php");
        }
        
        public function dangxuat()
        {
            $this->login_model->logout();
        }
    }