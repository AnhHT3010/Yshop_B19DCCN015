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
    function random($a, $b)
    {
        $query = "SELECT DISTINCT * FROM `live_views015` JOIN `product` WHERE live_views015.MaSP = product.MaSP ORDER BY RAND() LIMIT $a, $b;";
        require("result.php");
        return $data;
    }
    function liveviews()
    {
        $query = "SELECT DISTINCT * FROM `live_views015` JOIN `product` WHERE live_views015.MaSP = product.MaSP ORDER BY SoLuongView DESC";
        require("result.php");
        return $data;
    }
    function imgdetail($id){
        $query = "SELECT * FROM `product_image015` WHERE product_image015.MaSP = $id";
        require("result.php");
        return $data;
    }
    function catalogdetails($id)
    {
        $query =  "SELECT d.TenDM as Ten, l.* FROM category as d, brands as l WHERE d.MaDM = l.MaDM and d.MaDM = $id";

        require("result.php");

        return $data;
    }
    function find_product_for_category($a, $b, $category)
    {
        $query =   "SELECT * from product WHERE MaDM = $category ORDER BY ThoiGian DESC limit $a,$b";

        require("result.php");

        return $data;
    }
    function limit($a, $b)
    {
        $query = "SELECT * FROM product ORDER BY ThoiGian DESC LIMIT $a,$b";
        require("result.php");
        return $data;
    }
}
