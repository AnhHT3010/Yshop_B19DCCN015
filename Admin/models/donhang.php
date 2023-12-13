<?php
require_once("model.php");
class Hoadon extends Model
{
    var $table = "order015";
    var $contens = "MaHD";
    function trangthai($id)
    {
        $query = "SELECT * FROM HoaDon WHERE TrangThai = $id  ORDER BY MaHD DESC";

        require("result.php");

        return $data;
    }
    function order_data_detail()
    {
        $query =  "SELECT o.*, u.Ten, u.Ho FROM order015 o INNER JOIN user u ON o.MaND = u.MaND ORDER BY o.MaHD desc";

        require("result.php");

        return $data;
    }
    function delete_order_by_MaHD($data)
    {
        $v = "";
        foreach ($data as $key => $value) {
            $v .= $key . "='" . $value . "',";
        }
        $v = trim($v, ",");

        $query = "UPDATE $this->table SET  $v   WHERE $this->contens = " . $data[$this->contens];
        $result = $this->conn->query($query);
        if ($result == true) {
            setcookie('msg-success', 'Hủy đơn thành công', time() + 2);
        } else {
            setcookie('msg-error', 'Gặp lỗi trong quá trình xử lý đơn hàng', time() + 2);
        }
        header('Location: ?mod=donhang');
    }
    function increase_product_quatity($maHD)
    {
        $query = "UPDATE product
                INNER JOIN cart_item015 ON product.MaSP = cart_item015.MaSP
                SET product.SoLuong = product.SoLuong + cart_item015.SoLuongTrongGio
                WHERE cart_item015.MaHD = $maHD";
        $result = $this->conn->query($query);
    }
    function get_products_by_MaHD($maHD)
    {
        $query = "SELECT c.*, p.DonGia, p.TenSP, p.AnhDaiDien, p.SoLuong, o.TrangThai
          FROM cart_item015 c 
          JOIN product p ON c.MaSP = p.MaSP 
          JOIN order015 o ON o.MaHD = c.MaHD 
          WHERE c.MaHD = $maHD";
        require("result.php");
        return $data;
    }
    function filter_browse()
    {
        $query = "SELECT o.*, u.Ten, u.Ho FROM order015 o INNER JOIN user u ON o.MaND = u.MaND  WHERE o.TrangThai = 1 ORDER BY o.MaHD desc";
        require("result.php");
        return $data;
    }
    function filter_not_browse()
    {
        $query = "SELECT o.*, u.Ten, u.Ho FROM order015 o INNER JOIN user u ON o.MaND = u.MaND  WHERE o.TrangThai = 0 ORDER BY o.MaHD desc";
        require("result.php");
        return $data;
    }
    function update_hoadon($data){
        $v = "";
        foreach ($data as $key => $value) {
            $v .= $key . "='" . $value . "',";
        }
        $v = trim($v, ",");

        $query = "UPDATE $this->table SET  $v   WHERE $this->contens = " . $data[$this->contens];
        $result = $this->conn->query($query);
        if ($result == true) {
            setcookie('msg-success', 'Duyệt đơn thành công', time() + 2);
        } else {
            setcookie('msg-error', 'Duyệt lỗi', time() + 2);
        }
        header('Location: ?mod=donhang&act=detail&id=' . $data['MaHD']);
    }
    function filterData(&$str)
    {
        $str = preg_replace("/\t/", "\\t", $str);
        $str = preg_replace("/\r?\n/", "\\n", $str);
        if (strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
    }
    function export_invoice()
    {
        $key = $_GET['state'];
        // Filter the excel data 
        // Excel file name for download 
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $fileName = "QuanLyHoaDon_" . date('Y-m-d') . ".xls";

        // Column names 
        $fields = array("STT", "Transaction Date", "Invoice Code", "Customer Name", "Product Name", "Quantity", "Unit Price", "Total Amount", "Note");

        $currentYear = date("Y");
        $currentMonth = date("M");
        // Display column names as first row 
        $excelData = implode("\t", array_values($fields)) . "\n";
        if(isset($key) && $key == "y")
        {
            $query = "SELECT c.*, p.DonGia, p.TenSP, c.SoLuongTrongGio, o.TrangThai, o.MaHD, o.NgayLap, o.NguoiNhan, o.Note
            FROM cart_item015 c 
            JOIN product p ON c.MaSP = p.MaSP 
            JOIN order015 o ON o.MaHD = c.MaHD 
            WHERE YEAR(o.NgayLap) = $currentYear AND o.TrangThai = 1";
        }else{
            $query = "SELECT c.*, p.DonGia, p.TenSP, c.SoLuongTrongGio, o.TrangThai, o.MaHD, o.NgayLap, o.NguoiNhan, o.Note
            FROM cart_item015 c 
            JOIN product p ON c.MaSP = p.MaSP 
            JOIN order015 o ON o.MaHD = c.MaHD 
            WHERE MONTH(o.NgayLap) = $currentMonth AND o.TrangThai = 1";
        }
        //Lấy bản ghi từ cơ sở dữ liệu 
        $query = $this->conn->query($query);
        if ($query->num_rows > 0) {
            // Output each row of the data 
            $stt = 1;
            while ($row = $query->fetch_assoc()) {

                $lineData = array($stt, $row['NgayLap'], $row['MaHD'], $row['NguoiNhan'], $row['TenSP'], $row['SoLuongTrongGio'], $row['DonGia'], $row['DonGia'] * $row['SoLuongTrongGio'], $row['Note']);
                $excelData .= implode("\t", array_values($lineData)) . "\n";
                $stt += 1;
            }
        } else {
            $excelData .= 'No records found...' . "\n";
        }

        // Headers for download 
        header('Content-Encoding: UTF-8');
        header("content-type: text/plain; charset=utf-8");
        header("Content-Disposition: attachment; filename=\"$fileName\"");
        // Render excel data 
        echo $excelData;

        exit;
    }
}
