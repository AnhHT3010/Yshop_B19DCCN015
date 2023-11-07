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
    function brands($id)
    {
        $query =  "SELECT c.TenDM, b.* FROM category as c, brands as b WHERE c.MaDM = b.MaDM and c.MaDM = $id";

        require("result.php");

        return $data;
    }
}
