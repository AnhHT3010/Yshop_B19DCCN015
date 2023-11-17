<?php require_once("model.php");
class login extends model
{
    var $conn;
    function __construct()
    {
        $ob_login = new connection();
        $this->conn = $ob_login->conn;
    }
    function login_action($data)
    {
        $query = "SELECT * FROM `user` WHERE TaiKhoan = '" . $data['taikhoan'] . "' AND matkhau = '" . $data['matkhau'] . "' AND trangthai = 1";
        $login = $this->conn->query($query)->fetch_assoc();
        print_r($login);
        if ($login !== NULL) {
            if ($login['MaQuyen'] == 2) {
                $_SESSION['isLogin_Admin'] = true;
                $_SESSION['login'] = $login;
                header('Location: Admin');
            } else {
                $_SESSION['id_ND'] = $login['MaND'];
                $_SESSION['isLogin'] = true;
                $_SESSION['login'] = $login;
                // header('Location: .');
            }
        }else {
            setcookie('msg', 'Tài khoản hoặc mật khẩu không tồn tại !', time() + 5);
            // header('Location: account');
        }
    }
    function account()
    {

        $id = $_SESSION['login']['MaND'];
        return $this->conn->query("SELECT * from user where MaND = $id")->fetch_assoc();
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
                    setcookie('msg', 'You are registered unsuccessful', time() + 2);
                }
            } else {
                setcookie('msg', 'Do not duplicate passwords', time() + 2);
            }
        } else {
            setcookie('msg', 'Account name or Email already exists', time() + 2);
        }
        session_reset();
        echo '<script>window.location.href="account";</script>';
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
        }
        header('location: .');
    }
}
