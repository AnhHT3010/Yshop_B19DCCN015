<?php
require_once("./models/nguoidung.php");
class NguoiDungController
{
    var $nguoidung_model;
    public function __construct()
    {
        $this->nguoidung_model = new nguoidung();
    }
    public function list()
    {
        $data_customer = $this->nguoidung_model->AllUser($_SESSION['id_Admin']);
        require_once("./views/admin/home.php");
        //require_once("MVC/Views/authors/list.php");
    }
    public function detail()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : 1;
        $data = $this->nguoidung_model->find($id);
        require_once("MVC/Views/Admin/home.php");
        //require_once("MVC/Views/authors/detail.php");
    }
    public function add()
    {
        require_once("MVC/Views/Admin/home.php");
        //require_once("MVC/Views/authors/add.php");
    }
    public function store()
    {
        $target_dir = "../public/assets/images/testimonials/";  // thư mục chứa file upload

        $HinhAnh = "";
        $target_file = $target_dir . basename($_FILES["HinhAnh"]["name"]); // link sẽ upload file lên
        $status_upload = move_uploaded_file($_FILES["HinhAnh"]["tmp_name"], $target_file);
        var_dump(basename($_FILES["HinhAnh"]["name"]));
        if ($status_upload) { // nếu upload file không có lỗi 
            $HinhAnh = basename($_FILES["HinhAnh"]["name"]);
        }
        $data = array(
            'Ho' =>    $_POST['Ho'],
            'Ten'  =>   $_POST['Ten'],
            'GioiTinh' => $_POST['GioiTinh'],
            'SDT' => $_POST['SDT'],
            'Email' =>    $_POST['Email'],
            'DiaChi'  =>   $_POST['DiaChi'],
            'Quan'  =>  $_POST['Quan'],
            'Tinh'  => $_POST['Tinh'],
            'HinhAnh' => $HinhAnh,
            'TaiKhoan' => $_POST['TaiKhoan'],
            'MatKhau' => md5($_POST['MatKhau']),
            'MaQuyen' =>  '1',
            'TrangThai'  =>  '1'
        );
        foreach ($data as $key => $value) {
            if (strpos($value, "'") != false) {
                $value = str_replace("'", "\'", $value);
                $data[$key] = $value;
            }
        }

        $this->nguoidung_model->store($data);
    }
    public function delete()
    {
        $id = $_GET['id'];
        $this->nguoidung_model->delete($id);
    }
    public function edit()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : 1;
        $data_user_detail = $this->nguoidung_model->find($id);
        require_once("./views/admin/home.php");
    }
    public function update()
    {
        $data = array(
            'MaND' => $_POST['MaND'],
            'Ho' =>    $_POST['Ho'],
            'Ten'  =>   $_POST['Ten'],
            'GioiTinh' => $_POST['GioiTinh'],
            'SDT' => $_POST['SDT'],
            'Email' =>    $_POST['Email'],
            'DiaChi'  =>   $_POST['DiaChi'],
            'Quan'  =>  $_POST['Quan'],
            'Tinh'  => $_POST['Tinh'],
            'HinhAnh' => $_POST['HinhAnh'],
            'TaiKhoan' => $_POST['TaiKhoan'],
            'MatKhau' => md5($_POST['MatKhau']),
            'MaQuyen' =>  '1',
            'TrangThai'  =>  $_POST['TrangThai'],
        );
        foreach ($data as $key => $value) {
            if (strpos($value, "'") != false) {
                $value = str_replace("'", "\'", $value);
                $data[$key] = $value;
            }
        }
        $this->nguoidung_model->update($data);
    }
}
