<?php
require_once("model.php");
class Cart extends model
{
    function detail_cart_item($id){
        $query = "SELECT c.*, p.DonGia, p.TenSP, p.AnhDaiDien, p.SoLuong
          FROM cart_item015 c 
          JOIN product p ON c.MaSP = p.MaSP 
          WHERE c.MaND = $id AND c.MaHD IS NULL";
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
            setcookie('msg-success', 'Thêm thành công', time() + 2);
            if(isset($checked)){
                header("location: store");
            }else{
                header("location: ");
            }
        } else {
            echo("location: error");
            // setcookie('msg', 'Lỗi thêm', time() + 2);
        }
    }

    function check_product_in_cart($key, $idND){
        $query = "SELECT COUNT(*) AS count FROM cart_item015 WHERE MaSP = $key AND MaND = $idND  AND MaHD IS NULL";
        $result = $this->conn->query($query);
        return $result->fetch_assoc();
    }
    
    function product_in_stock($idSP) {
        $query = "SELECT COUNT(*) as count FROM product WHERE SoLuong > 0 AND MaSP = $idSP";
        $result = $this->conn->query($query);
        return $result->fetch_assoc();
    }
    
    function update_cart($SoLuong, $idSP){
        $query = "UPDATE cart_item015 SET SoLuongTrongGio = SoLuongTrongGio + $SoLuong WHERE MaSP = $idSP AND c.MaHD IS NULL";
        $result = $this->conn->query($query);
        if ($result == true) {
            setcookie('msg-success', 'Thêm thành công', time() + 2);
            header("location: ".$idSP.".html");
        } else {
            echo ("fail");
        }
    }

    function reduce_cart_database($idGH){
        $query = "UPDATE cart_item015 SET SoLuongTrongGio = SoLuongTrongGio - 1 WHERE MaGH = $idGH";
        $result = $this->conn->query($query);
        if ($result == true) {
            setcookie('msg-success', 'Giảm số lượng sản phẩm thành công', time() + 2);
            header("location: cart");
        } else {
            echo ("fail");
        }
    }
    function increase_cart_database($idGH){
        $query = "UPDATE cart_item015 SET SoLuongTrongGio = SoLuongTrongGio + 1 WHERE MaGH = $idGH";
        $result = $this->conn->query($query);
        if ($result == true) {
            setcookie('msg-success', 'Tăng số lượng sản phẩm thành công', time() + 2);
            header("location: cart");
        } else {
            echo ("fail");
        }
    }
    function deleteall_cart_item_database($idGH){
        $query = "DELETE FROM cart_item015 WHERE MaGH = $idGH";
        $result = $this->conn->query($query);
        if ($result == true) {
            setcookie('msg-success', 'Xóa sản phẩm thành công', time() + 2);
            header("location: cart");
        } else {
            echo ("fail");
        }
    }
    function update_id_order_cart($idND,$idHD){
        $query = "UPDATE cart_item015 SET MaHD = $idHD WHERE MaND = $idND AND MaHD IS NULL";
        $result = $this->conn->query($query);
        if ($result == true) {
            setcookie('msg-success', 'Đơn hàng của bạn đã được đặt thành công, chờ duyệt !', time() + 2);
            header('location: cart');
        } else {
            setcookie('msg-error', 'Order failed', time() + 2);
            header('location: ?act=checkout');
        }
    }
    function update_product_quatity($idSP, $SoLuongTrongGio)
    {
        $query = "UPDATE product SET SoLuong = SoLuong - $SoLuongTrongGio WHERE MaSP = $idSP";
        $result = $this->conn->query($query);
    }
    function increase_product_quatity($maHD)
    {
        $query = "UPDATE product
                INNER JOIN cart_item015 ON product.MaSP = cart_item015.MaSP
                SET product.SoLuong = product.SoLuong + cart_item015.SoLuongTrongGio
                WHERE cart_item015.MaHD = $maHD";
        $result = $this->conn->query($query);
    }
}