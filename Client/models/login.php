<?php require_once("model.php");
class login extends model
{
    var $conn;
    function __construct()
    {
        $ob_login = new connection();
        $this->conn = $ob_login->conn;
    }
    function get_user($idND){
        $query = "SELECT * FROM `user` WHERE MaND = $idND";
        return $this->conn->query($query)->fetch_assoc();
    }
    function login_action($data)
    {
        $query = "SELECT * FROM `user` WHERE TaiKhoan = '" . $data['taikhoan'] . "' AND matkhau = '" . $data['matkhau'] . "' AND trangthai = 1";
        $login = $this->conn->query($query)->fetch_assoc();
        if ($login !== NULL) {
            if ($login['MaQuyen'] == 2) {
                $_SESSION['isLogin_Admin'] = true;
                $_SESSION['login'] = $login;
                header('Location: Admin');
            } else {
                $_SESSION['id_ND'] = $login['MaND'];
                $_SESSION['Avatar'] = $login['HinhAnh'];
                $_SESSION['isLogin'] = true;
                $_SESSION['login'] = $login;
                header('Location: .');
            }
        }else {
            setcookie('msg-info', 'Tài khoản hoặc mật khẩu không tồn tại !', time() + 5);
            header('Location: account');
        }
    }
    function account()
    {
        $id = $_SESSION['login']['MaND'];
        return $this->conn->query("SELECT * from user where MaND = $id")->fetch_assoc();
    }
    function order_data()
    {
        $id = $_SESSION['id_ND'];
        $query =  "SELECT * from order015 where MaND = $id";

        require("result.php");

        return $data;
    }
    function getProductsByMaHD($maHD)
    {
        $id = $_SESSION['id_ND'];
        $query = "SELECT c.*, p.DonGia, p.TenSP, p.AnhDaiDien, p.SoLuong
          FROM cart_item015 c 
          JOIN product p ON c.MaSP = p.MaSP 
          WHERE c.MaND = $id AND c.MaHD = $maHD";
        require("result.php");
        return $data;
    }
    function check_account()
    {
        $query =  "SELECT * from user";

        require("result.php");

        return $data;
    }
    function dangky_action($data, $check1, $check2)
    {
        if ($check1 == 0) {
            if ($check2 == 0) {
                $f = "";
                $v = "";
                foreach ($data as $key => $value) {
                    $f .= $key . ",";
                    $v .= "'" . $value . "',";
                }
                $f = trim($f, ",");
                $v = trim($v, ",");
                $query = "INSERT INTO user($f) VALUES ($v);";

                $status = $this->conn->query($query);
                if ($status == true) {
                    setcookie('success', 'Bạn đã đăng ký thành công', time() + 2);
                } else {
                    setcookie('msg-error', 'You are registered unsuccessful', time() + 2);
                }
            } else {
                setcookie('msg-error', 'Do not duplicate passwords', time() + 2);
            }
        } else {
            setcookie('msg-error', 'Account name or Email already exists', time() + 2);
        }
        session_reset();
        echo '<script>window.location.href="account";</script>';
    }
    function cancelOrder($maHD)
    {
        $query = "DELETE FROM order015 WHERE MaHD = $maHD";
        $result = $this->conn->query($query);
        if ($result == true) {
            setcookie('msg-success', 'Hủy đơn hàng thành công !', time() + 2);
            header('Location: personal');
        } else {
            setcookie('msg-error', 'Lỗi cập nhật', time() + 2);
            header('Location: personal');
        }
    }
    function logout()
    {
        if (isset($_SESSION['isLogin_Admin'])) {
            unset($_SESSION['isLogin_Admin']);
            unset($_SESSION['login']);
        }
        if (isset($_SESSION['isLogin'])) {
            unset($_SESSION['isLogin']);
            unset($_SESSION['login']);
            unset($_SESSION['id_ND']);
        }
        header('location: .');
    }
}
