<?php
require_once("connection.php");
class login
{
    var $conn;
    function __construct()
    {
        $conn_obj = new Connection();
        $this->conn = $conn_obj->conn;
    }
    function adminProfile()
    {
        $query = "select * from user where MaQuyen = 1 and MaND = 1 ";
        require("result.php");
        return $userdata;
    }
    function logout()
    {
        echo("Logout");
        if (isset($_SESSION['isLogin_Admin'])) {
            unset($_SESSION['isLogin_Admin']);
            unset($_SESSION['login']);
        }
        if (isset($_SESSION['isLogin'])) {
            unset($_SESSION['isLogin']);
            unset($_SESSION['login']);
            unset($_SESSION['id_ND']);
        }
        header('location: ../');
    }
}
