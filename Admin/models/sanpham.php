<?php
require("model.php");
class sanpham extends model
{
    var $table = "product";
    var $contens = "MaSP";
    var $route = "sanpham";
    function thuonghieu()
    {
        $query = "select * from brands ";
        require("result.php");
        return $data;
    }
    function typecolor($id)
    {
        $query = "select * from typecolor where MaSP = $id";
        require("result.php");
        return $data;
    }
    function danhmuc()
    {
        $query = "select * from category ";
        require("result.php");
        return $data;
    }
    function addTypeColor($data, $id)
    {
        $f = "";
        $v = "";
        foreach ($data as $key => $value) {
            $f .= $key . ",";
            $v .= "'" . $value . "',";
        }
        $f = trim($f, ",");
        $v = trim($v, ",");
        $query = "INSERT INTO typecolor($f) VALUES ($v);";

        $status = $this->conn->query($query);

        if ($status == true) {
            setcookie('msg', 'More success', time() + 10);
            header('Location: ?mod=sanpham&act=edit&id=' . $id);
        } else {
            setcookie('msg', 'Add failed', time() + 10);
            header('Location: ?mod=sanpham&act=edit&id=' . $id);
        }
    }
    function delete_view($id)
    {

        $query = "DELETE from liveview where MaSP =$id";

        $status = $this->conn->query($query);
        if ($status == true) {
            setcookie('msg', 'Delete successfully', time() + 2);
        } else {
            setcookie('msg', 'Deletion failed', time() + 2);
        }
        header('Location: sanpham');
    }
    function delete_allcolor($id)
    {

        $query = "DELETE from typecolor where MaSP =$id";

        $status = $this->conn->query($query);
        if ($status == true) {
            setcookie('msg', 'Delete successfully', time() + 2);
        } else {
            setcookie('msg', 'Deletion failed', time() + 2);
        }
        header('Location: sanpham');
    }
    function delete_Color($id, $name)
    {
        $query = "DELETE from typecolor where `MaSP` =$id AND `TypeColor` = '$name'";

        $status = $this->conn->query($query);
        if ($status == true) {
            setcookie('msg', 'Delete successfully', time() + 2);
        } else {
            setcookie('msg', 'Deletion failed', time() + 2);
        }
        header('Location: ?mod=sanpham&act=edit&id=' . $id);
    }
}
