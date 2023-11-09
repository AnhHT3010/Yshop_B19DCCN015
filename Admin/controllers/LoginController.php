<?php 
    require_once("./models/login.php");
    echo "Ok";
    class LoginController {
        var $login_model;
        public function __construct()
        {
            $this->login_model = new login();
        }
    
        public function admin()
        {   
            echo "VÀO ĐÂY RỒI";
            require_once("./views/admin/home.php");
        }

    }
