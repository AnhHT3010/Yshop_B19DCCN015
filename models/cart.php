<?php
require_once("model.php");
class Cart extends model
{
    function detail_product($id)
    {
        $query = "SELECT * FROM product WHERE MaSP = $id";
        $result = $this->conn->query($query);
        return $result->fetch_assoc();
    }

    function detail_cart_item($id){
        $query = "SELECT c.*, p.DonGia, p.TenSP, p.AnhDaiDien, p.SoLuong
          FROM cart_item015 c 
          JOIN product p ON c.MaSP = p.MaSP 
          WHERE c.MaND = $id";
        require("result.php");
        return $data;
    }

    function add_cart_database($data, $checked)
    {
        $f = "";
        $v = "";
        foreach ($data as $key => $value) {
            $f .= $key . ",";
            $v .= "'" . $value . "',";
        }
        $f = trim($f, ",");
        $v = trim($v, ",");
        $query = "INSERT INTO cart_item015($f) VALUES ($v);";

        $status = $this->conn->query($query);

        if ($status == true) {
            setcookie('msg', 'Thêm thành công', time() + 2);
            if(isset($checked)){
                header("location: store");
            }else{
                header("location: store");
            }
        } else {
            echo("location: error");
            // setcookie('msg', 'Lỗi thêm', time() + 2);
        }
    }

    function check_product_in_cart($key){
        $query = "SELECT COUNT(*) AS count FROM cart_item015 WHERE MaSP = $key";
        $result = $this->conn->query($query);
        return $result->fetch_assoc();
    }
    
    function update_cart($SoLuong, $idSP){
        $query = "UPDATE cart_item015 SET SoLuongTrongGio = SoLuongTrongGio + $SoLuong WHERE MaSP = $idSP";
        $result = $this->conn->query($query);
        if ($result == true) {
            setcookie('msg', 'Thêm thành công', time() + 2);
            header("location: ".$idSP.".html");
        } else {
            echo ("fail");
        }
    }

    function reduce_cart_database($idSP){
        $query = "UPDATE cart_item015 SET SoLuongTrongGio = SoLuongTrongGio - 1 WHERE MaSP = $idSP";
        $result = $this->conn->query($query);
        if ($result == true) {
            setcookie('msg', 'Giảm số lượng sản phẩm thành công', time() + 2);
            header("location: cart");
        } else {
            echo ("fail");
        }
    }
    function increase_cart_database($idSP){
        $query = "UPDATE cart_item015 SET SoLuongTrongGio = SoLuongTrongGio + 1 WHERE MaSP = $idSP";
        $result = $this->conn->query($query);
        if ($result == true) {
            setcookie('msg', 'Tăng số lượng sản phẩm thành công', time() + 2);
            header("location: cart");
        } else {
            echo ("fail");
        }
    }
    function deleteall_cart_database($idSP){
        $query = "DELETE FROM cart_item015 WHERE MaSP = $idSP";
        $result = $this->conn->query($query);
        if ($result == true) {
            setcookie('msg', 'Xóa sản phẩm thành công', time() + 2);
            header("location: cart");
        } else {
            echo ("fail");
        }
    }
}