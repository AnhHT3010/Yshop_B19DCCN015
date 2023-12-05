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
    function addtableview($MaSP)
    {
        $status = "SELECT * FROM `live_views015` WHERE MaSP = $MaSP";
        $statusLV = $this->conn->query($status)->fetch_assoc();
        $SoLuonViews = $statusLV['SoLuongView'] + 1;
        $add = "UPDATE `live_views015` SET `SoLuongView`='$SoLuonViews' WHERE `MaSP` = $MaSP";
        $status = $this->conn->query($add);

    }
    function viewlive($id)
    {
        $query = "SELECT * FROM `live_views015` WHERE `MaSP` = $id";
        return $this->conn->query($query)->fetch_assoc();
    }
}
