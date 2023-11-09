<?php
class connection
{
    var $conn;
    function __construct()
    {
        $severname = "localhost:1234";
        $username = "root";
        $password = "";
        $db_name = "yshop_015";

        //kết nối dữ liệu
        $this->conn = new mysqli($severname, $username, $password, $db_name);
        $this->conn->set_charset("utf8");

        if ($this->conn->connect_error) {
            die("Connection failed : " . $this->conn->connect_error);
        }
    }
}
