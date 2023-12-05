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
        $query = "select * from user where MaQuyen = 1 and MaND = 1";
        return $this->conn->query($query)->fetch_assoc();
    }
    function orderStatistics(){
        $query = "select count(*) as count from order015";
        return $this->conn->query($query)->fetch_assoc();
    }
    function revenueStatistics(){
        $query = "select sum(TongTien) as sum from order015 where TrangThai = 1";
        return $this->conn->query($query)->fetch_assoc();
    }
    function userStatistics(){
        $query = "select count(MaND) as sum from user where MaQuyen = 1";
        return $this->conn->query($query)->fetch_assoc();
    }
    function productExpiresStatistics(){
        $query = "select count(MaSP) as sum from product where SoLuong < 5 and SoLuong > 0";
        return $this->conn->query($query)->fetch_assoc();
    }
    function best_selling_product()
    {
        $query =  "SELECT p.TenSP, p.AnhDaiDien,p.DonGia, SUM(c.SoLuongTrongGio) AS TongSoLuong
                    FROM product p
                    JOIN cart_item015 c ON p.MaSP = c.MaSP
                    JOIN order015 o ON c.MaHD = o.MaHD
                    WHERE c.MaHD IS NOT NULL AND o.TrangThai = 1
                    GROUP BY p.TenSP, p.AnhDaiDien, p.DonGia
                    ORDER BY TongSoLuong DESC
                    LIMIT 8";

        require("result.php");

        return $data;
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
