<?php
require("model.php");
class sanpham extends model
{
    var $table = "product";
    var $contens = "MaSP";
    var $route = "sanpham";
    function store($data)
    {
        $f = "";
        $v = "";
        foreach ($data as $key => $value) {
            $f .= $key . ",";
            $v .= "'" . $value . "',";
        }
        $f = trim($f, ",");
        $v = trim($v, ",");
        $query = "INSERT INTO $this->table($f) VALUES ($v);";
        $status = $this->conn->query($query);
    
        if ($status == true) {
            // Lấy ID của bản ghi vừa mới được thêm vào
            return $this->conn->insert_id;
        } else {
            echo 'Error: ' . mysqli_error($this->conn);
        }
    }
    function storeImage($data)
    {
        $f = "";
        $v = "";
        foreach ($data as $key => $value) {
            $f .= $key . ",";
            $v .= "'" . $value . "',";
        }
        $f = trim($f, ",");
        $v = trim($v, ",");
        $query = "INSERT INTO product_image015($f) VALUES ($v);";

        $status = $this->conn->query($query);

        if ($status == true) {
            setcookie('msg-success', 'Thêm thành công', time() + 2);
            header('Location: ?mod=' . $this->route);
        } else {
            setcookie('msg-error', 'Lỗi thêm', time() + 2);
            header('Location: ?mod=' . $this->route . '&act=add');
        }
    }
    function update($data)
    {
        $v = "";
        foreach ($data as $key => $value) {
            $v .= $key . "='" . $value . "',";
        }
        $v = trim($v, ",");

        $query = "UPDATE $this->table SET  $v WHERE $this->contens = " . $data[$this->contens];
        $status = $this->conn->query($query);
    
        if ($status == true) {
            // Lấy ID của bản ghi vừa mới được thêm vào
            return $this->conn->insert_id;
        } else {
            echo 'Error: ' . mysqli_error($this->conn);
        }
    }

    function updateImage($data)
    {
        if (!empty($data) && isset($data[0]['MaSP'])) {
            print_r($data[0]['MaSP']);
        } else {
            echo "Không có dữ liệu hoặc key 'MaSP' không tồn tại.";
        }
        // Delete rows from product_image015 where MaSP is equal to $data['MaSP']
        $deleteQuery = "DELETE FROM product_image015 WHERE MaSP = " . $data[0]['MaSP']; // Assuming 'MaSP' is the same for all items in $data
        $deleteStatus = $this->conn->query($deleteQuery);

        if ($deleteStatus) {
            // Insert new rows with data from $data
            foreach ($data as $item) {
                $insertQuery = "INSERT INTO product_image015 (MaSP, AnhURL) VALUES (" . $item['MaSP'] . ", '" . $item['AnhURL'] . "')";
                $insertStatus = $this->conn->query($insertQuery);

                if (!$insertStatus) {
                    // Error in insert
                    setcookie('msg-error', 'Lỗi cập nhật (insert)', time() + 2);
                    header('Location: ?mod=' . $this->route . '&act=edit');
                    return; // Exit the function if there's an error in insert
                }
            }
            // Successful update
            setcookie('msg-success', 'Cập nhật thành công', time() + 2);
            header('Location: ?mod=' . $this->route);
        } else {
            // Error in delete
            setcookie('msg-error', 'Lỗi cập nhật (delete)', time() + 2);
            header('Location: ?mod=' . $this->route . '&act=edit');
        }
    }
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
    function find_product_image015($id) {
        $query = "select * from product_image015";
        $query = "select * from product_image015 where MaSP = $id";
        require("result.php");
        return $data;
    }
    function danhmuc()
    {
        $query = "select * from category ";
        require("result.php");
        return $data;
    }
    function add_views($idSP)
    {
        $query = "insert into live_views015 (MaSP) VALUES ".$idSP."";
    }
}
