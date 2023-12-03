<?php
require_once("model.php");
class Checkout extends model
{
    function save_order($data)
    {
        $f = "";
        $v = "";
        foreach ($data as $key => $value) {
            $f .= $key . ",";
            $v .= "'" . $value . "',";
        }
        $f = trim($f, ",");
        $v = trim($v, ",");
        $query = "INSERT INTO order015($f) VALUES ($v);";

        $status = $this->conn->query($query);

        // $query_mahd = "select MaHD from hoadon ORDER BY NgayLap DESC LIMIT 1";
        // $data_mahd = $this->conn->query($query_mahd)->fetch_assoc();
        // foreach ($_SESSION['products'] as $value) {
        //     $MaSP = $value['MaSP'];
        //     $SoLuong = $value['SoLuong'];
        //     $color = $value['Color'];
        //     $DonGia = $value['DonGia'];
        //     $MaHD = $data_mahd['MaHD'];
        //     $query_ct = "INSERT INTO chitiethoadon(MaHD,MaSP,SoLuong,Color,DonGia) VALUES ($MaHD,$MaSP,$SoLuong,'$color',$DonGia)";
        //     $status_ct = $this->conn->query($query_ct);
        // }
        if ($status == true) {
            // Lấy ID của bản ghi vừa mới được thêm vào
            return $this->conn->insert_id;
        } else {
            echo 'Error: ' . mysqli_error($this->conn);
        }
    }
    function check_quatity_product($idND){
        $query = "SELECT p.MaSP, p.TenSP, p.SoLuong AS SoLuongTrongKho, c.SoLuongTrongGio
                FROM product p
                INNER JOIN cart_item015 c ON p.MaSP = c.MaSP
                WHERE c.SoLuongTrongGio > p.SoLuong AND c.MaND = $idND";
        require("result.php");
        return $data;
    }
}
