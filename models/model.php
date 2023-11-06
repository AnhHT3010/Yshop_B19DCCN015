<?php
require_once("connection.php");
class model
{
    var $conn;
    function __construct()
    {
        $oj_connect = new connection();
        $this->conn = $oj_connect->conn;
    }
    function categories()
    {
        $query = "SELECT * FROM category";
        require("result.php");
        return $data;
    }
}
