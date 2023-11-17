<?php
require_once("model.php");
class ProductDetail extends model
{
    function detail_product($id)
    {
        $query = "SELECT * FROM product WHERE MaSP = $id";
        $result = $this->conn->query($query);
        return $result->fetch_assoc();
    }
    function categories_where($id)
    {
        $query = "SELECT * FROM category WHERE MaDM = $id";
        $result = $this->conn->query($query);
        return $result->fetch_assoc();
    }
    // function addtableview($id)
    // {
    //     $query = "SELECT * FROM `sanpham` WHERE `MaSP` = $id";
    //     $okhienthi = $this->conn->query($query)->fetch_assoc();

    //     if ($okhienthi != NULL) {
    //         $MaSP = $okhienthi['MaSP'];
    //         $status = "SELECT * FROM `liveview` WHERE MaSP = $MaSP";
    //         $statusLV = $this->conn->query($status)->fetch_assoc();
    //         if ($statusLV >= 1) {
    //             $SoLuonViews = $statusLV['SoLuongView'] + 1;
    //             $add = "UPDATE `liveview` SET `SoLuongView`='$SoLuonViews' WHERE `MaSP` = $MaSP";
    //             $addliveSP = $this->conn->query($add);
    //         } else {
    //             $add = "INSERT INTO `liveview`(`MaSP`, `SoLuongView`) VALUES ('$MaSP','1')";
    //             $addliveSP = $this->conn->query($add);
    //         }
    //     }
    // }
    function viewlive($id)
    {
        $query = "SELECT * FROM `live_views015` WHERE `MaSP` = $id";
        return $this->conn->query($query)->fetch_assoc();
    }
    // function selectColor($id)
    // {
    //     $query = " SELECT * FROM `typecolor` WHERE `MaSP` = $id";
    //     require("result.php");
    //     return $data;
    // }
}
