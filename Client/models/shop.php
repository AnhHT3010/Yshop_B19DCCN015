<?php
require_once("model.php");
class Shop extends model
{
    function loaisp($a, $b)
    {
        $query = "SELECT * FROM loaisanpham WHERE   MaDM = 1 LIMIT $a, $b";

        require("result.php");

        return $data;
    }
    function keywork($a, $b)
    {
        $a = "'%" . $a . "%'";
        $b = "'%" . $b . "%'";
        if ($a != NULL && $b == "") {
            $query = "SELECT `sanpham`.*,`loaisanpham`.* FROM `sanpham` JOIN `loaisanpham` on `sanpham`.`MaLSP`=`loaisanpham`.`MaLSP` WHERE `TenLSP` LIKE $a OR `TenSP` LIKE $a ";
        } else {
            $query = "SELECT `sanpham`.*,`loaisanpham`.* FROM `sanpham` JOIN `loaisanpham` on `sanpham`.`MaLSP`=`loaisanpham`.`MaLSP` WHERE `TenLSP` LIKE $b AND `TenSP` LIKE $a ";
        }
        require("result.php");

        return $data;
    }
    function dongia($a, $b)
    {
        $query = "SELECT * FROM sanpham WHERE  DonGia > $a AND DonGia < $b  LIMIT 0, 9";

        require("result.php");

        return $data;
    }

    function chitiet_loai($loai, $sp)
    {
        $query = "SELECT * FROM loaisanpham WHERE  TenLSP = '$loai' and MaDM = $sp";

        require("result.php");

        return $data;
    }
    function thuonghieu()
    {
        $query = "SELECT * FROM `loaisanpham` WHERE MaDM = 1";
        require("result.php");

        return $data;
    }
    function chitiet($id, $sp)
    {
        $query = "SELECT * FROM sanpham WHERE  MaLSP = '$id' and MaDM = $sp";

        require("result.php");

        return $data;
    }
    function sanpham_noibat()
    {
        // $query = "SELECT * FROM sanpham WHERE MaSP = (SELECT MaSP sp FROM chitiethoadon GROUP BY MaSP ORDER BY COUNT(MaSP) DESC LIMIT 1)";
        // $query ="SELECT * FROM sanpham WHERE TrangThai = 1 ORDER BY MaSP DESC LIMIT 9";
        $query = " SELECT `chitiethoadon`.*,`sanpham`.* FROM `chitiethoadon` JOIN `sanpham` on `chitiethoadon`.`MaSP`=`sanpham`.`MaSP`";
        require("result.php");
        return $data;
    }
    function count_sp()
    {
        $query = "SELECT COUNT(MaSP) as tong FROM product";

        return $this->conn->query($query)->fetch_assoc();
    }
    function count_product_category($dm)
    {
        $query = "SELECT COUNT(MaSP) as tong FROM product WHERE MaDM = $dm";

        return $this->conn->query($query)->fetch_assoc();
    }
    function count_sp_ctdm($dm, $ctdm)
    {
        $query = "SELECT COUNT(MaSP) as tong FROM sanpham WHERE MaDM = $dm And MaLSP = $ctdm";

        return $this->conn->query($query)->fetch_assoc();
    }
    function get_products_in_price_range($from, $to){
        $query = "SELECT * from product WHERE DonGia > $from AND DonGia < $to";
        require("result.php");

        return $data;
    }
}
