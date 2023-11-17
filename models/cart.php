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
    function add_cart_database($data)
    {
        print_r($data);
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
            header("location: shop");
        } else {
            echo("location: error");
            // setcookie('msg', 'Lỗi thêm', time() + 2);
        }
    }
}