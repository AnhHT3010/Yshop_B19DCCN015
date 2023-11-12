<?php
require_once("./models/sanpham.php");
class SanphamController015
{
    var $sanpham_model;
    public function __construct()
    {
        $this->sanpham_model = new sanpham();
    }
    public function list()
    {
        $data = $this->sanpham_model->All();
        require_once("./views/admin/home.php");
    }
    public function detail()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : 1;
        $data = $this->sanpham_model->find($id);
        require_once("./views/admin/home.php");
        //require_once("./views/posts/detail.php");
    }
    public function add()
    {
        $data_brand = $this->sanpham_model->thuonghieu();
        $data_dm = $this->sanpham_model->danhmuc();
        require_once("./views/admin/home.php");
        //require_once("./views/posts/add.php");
    }
    public function store()
    {
        $target_dir = "../public/assets/images/products/";  // thư mục chứa file upload

        $HinhAnh1 = ""; //tạo biến
        $target_file = $target_dir . basename($_FILES["HinhAnh1"]["name"]); // link sẽ upload file lên

        $status_upload = move_uploaded_file($_FILES["HinhAnh1"]["tmp_name"], $target_file); //move_uploaded_file() là hàm up ảnh

        if ($status_upload) { // nếu upload file không có lỗi 
            $HinhAnh1 =  basename($_FILES["HinhAnh1"]["name"]);
        }

        $HinhAnh2 = "";
        $target_file = $target_dir . basename($_FILES["HinhAnh2"]["name"]); // link sẽ upload file lên
        $status_upload = move_uploaded_file($_FILES["HinhAnh2"]["tmp_name"], $target_file);
        if ($status_upload) { // nếu upload file không có lỗi 
            $HinhAnh2 = basename($_FILES["HinhAnh2"]["name"]);
        }

        $HinhAnh3 = "";
        $target_file = $target_dir . basename($_FILES["HinhAnh3"]["name"]); // link sẽ upload file lên
        $status_upload = move_uploaded_file($_FILES["HinhAnh3"]["tmp_name"], $target_file);
        if ($status_upload) { // nếu upload file không có lỗi 
            $HinhAnh3 = basename($_FILES["HinhAnh3"]["name"]);
        }
        $HinhAnh4 = "";
        $target_file = $target_dir . basename($_FILES["HinhAnh4"]["name"]); // link sẽ upload file lên
        $status_upload = move_uploaded_file($_FILES["HinhAnh4"]["tmp_name"], $target_file);
        if ($status_upload) { // nếu upload file không có lỗi 
            $HinhAnh4 = basename($_FILES["HinhAnh4"]["name"]);
        }
        $HinhAnh5 = "";
        $target_file = $target_dir . basename($_FILES["HinhAnh5"]["name"]); // link sẽ upload file lên
        $status_upload = move_uploaded_file($_FILES["HinhAnh5"]["tmp_name"], $target_file);
        if ($status_upload) { // nếu upload file không có lỗi 
            $HinhAnh5 = basename($_FILES["HinhAnh5"]["name"]);
        }

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $ThoiGian =  date('Y-m-d H:i:s');
        $data = array(
            'MaLSP' =>    $_POST['MaLSP'],
            'MaDM' => $_POST['MaDM'],
            'TenSP'  =>   $_POST['TenSP'],
            'DonGia' => $_POST['DonGia'],
            'SoLuong' => $_POST['SoLuong'],
            'HinhAnh1' => $HinhAnh1,
            'HinhAnh2' => $HinhAnh2,
            'HinhAnh3' => $HinhAnh3,
            'HinhAnh4' => $HinhAnh4,
            'HinhAnh5' => $HinhAnh5,
            'MaKM' =>  $_POST['MaKM'],
            'ManHinh' =>  $_POST['ManHinh'],
            'HDH' => $_POST["HDH"],
            'CamSau' =>  $_POST['CamSau'],
            'CamTruoc' =>  $_POST['CamTruoc'],
            'CPU' =>  $_POST['CPU'],
            'Ram' =>  $_POST['Ram'],
            'Rom' =>  $_POST['Rom'],
            'SDCard' =>  $_POST['SDCard'],
            'Pin' =>  $_POST['Pin'],
            'SoSao' =>  $_POST['review'],
            'SoDanhGia' => $_POST['SoDanhGia'],
            'TrangThai' => $_POST['TrangThai'],
            'MoTa' =>  $_POST['MoTa'],
            'ThoiGian' => $ThoiGian,
            'LoaiMau1' => "",
            'LoaiMau2' => "",
            'LoaiMau3' => "",
            'LoaiMau4' => "",
            'LoaiMau5' => ""
        );
        foreach ($data as $key => $value) {
            if (strpos($value, "'") != false) {
                $value = str_replace("'", "\'", $value);
                $data[$key] = $value;
            }
        }

        $this->sanpham_model->store($data);
    }
    public function delete()
    {
        $id = $_GET['id'];
        $this->sanpham_model->delete($id);
        $this->sanpham_model->delete_view($id);
        $this->sanpham_model->delete_allcolor($id);
    }
    public function delete_Color()
    {
        $id = $_GET['id'];
        $name = $_GET['name'];
        $this->sanpham_model->delete_Color($id, $name);
    }
    public function edit()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : 1;
        $data_lsp = $this->sanpham_model->thuonghieu();
        $data_dm = $this->sanpham_model->danhmuc();
        $data = $this->sanpham_model->find($id);
        require_once("./views/admin/home.php");
        //require_once("./views/posts/edit.php");
    }
    public function update()
    {

        $target_dir = "../public/assets/images/products/";  // thư mục chứa file upload

        $HinhAnh1 = "";
        $target_file = $target_dir . basename($_FILES["HinhAnh1"]["name"]); // link sẽ upload file lên
        $status_upload = move_uploaded_file($_FILES["HinhAnh1"]["tmp_name"], $target_file);
        var_dump(basename($_FILES["HinhAnh1"]["name"]));
        if ($status_upload) { // nếu upload file không có lỗi 
            $HinhAnh1 = basename($_FILES["HinhAnh1"]["name"]);
        }

        $HinhAnh2 = "";
        $target_file = $target_dir . basename($_FILES["HinhAnh2"]["name"]); // link sẽ upload file lên
        $status_upload = move_uploaded_file($_FILES["HinhAnh2"]["tmp_name"], $target_file);
        if ($status_upload) { // nếu upload file không có lỗi 
            $HinhAnh2 = basename($_FILES["HinhAnh2"]["name"]);
        }

        $HinhAnh3 = "";
        $target_file = $target_dir . basename($_FILES["HinhAnh3"]["name"]); // link sẽ upload file lên
        $status_upload = move_uploaded_file($_FILES["HinhAnh3"]["tmp_name"], $target_file);
        if ($status_upload) { // nếu upload file không có lỗi 
            $HinhAnh3 =  basename($_FILES["HinhAnh3"]["name"]);
        }
        $HinhAnh4 = "";
        $target_file = $target_dir . basename($_FILES["HinhAnh4"]["name"]); // link sẽ upload file lên
        $status_upload = move_uploaded_file($_FILES["HinhAnh4"]["tmp_name"], $target_file);
        if ($status_upload) { // nếu upload file không có lỗi 
            $HinhAnh4 =  basename($_FILES["HinhAnh4"]["name"]);
        }
        $HinhAnh5 = "";
        $target_file = $target_dir . basename($_FILES["HinhAnh5"]["name"]); // link sẽ upload file lên
        $status_upload = move_uploaded_file($_FILES["HinhAnh5"]["tmp_name"], $target_file);
        if ($status_upload) { // nếu upload file không có lỗi 
            $HinhAnh5 =  basename($_FILES["HinhAnh5"]["name"]);
        }

        $TrangThai = 0;
        if (isset($_POST['TrangThai'])) {
            $TrangThai = $_POST['TrangThai'];
        }
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $ThoiGian =  date('Y-m-d H:i:s');
        $data = array(
            'MaSP' => $_POST['MaSP'],
            'MaLSP' =>    $_POST['MaLSP'],
            'MaDM' => $_POST['MaDM'],
            'TenSP'  =>   $_POST['TenSP'],
            'DonGia' => $_POST['DonGia'],
            'SoLuong' => $_POST['SoLuong'],
            'HinhAnh1' => $HinhAnh1,
            'HinhAnh2' => $HinhAnh2,
            'HinhAnh3' => $HinhAnh3,
            'HinhAnh4' => $HinhAnh4,
            'HinhAnh5' => $HinhAnh5,
            'MaKM' =>  $_POST['MaKM'],
            'ManHinh' =>  $_POST['ManHinh'],
            'HDH' => $_POST["HDH"],
            'CamSau' =>  $_POST['CamSau'],
            'CamTruoc' =>  $_POST['CamTruoc'],
            'CPU' =>  $_POST['CPU'],
            'Ram' =>  $_POST['Ram'],
            'Rom' =>  $_POST['Rom'],
            'SDCard' =>  $_POST['SDCard'],
            'Pin' =>  $_POST['Pin'],
            'SoSao' =>  $_POST['review'],
            'SoDanhGia' => $_POST['SoDanhGia'],
            'TrangThai' => $TrangThai,
            'MoTa' =>  $_POST['MoTa'],
            'ThoiGian' => $ThoiGian,
            'LoaiMau1' =>  "",
            'LoaiMau2' =>  "",
            'LoaiMau3' =>  "",
            'LoaiMau4' =>  "",
            'LoaiMau5' =>  ""
        );
        foreach ($data as $key => $value) {
            if (strpos($value, "'") != false) {
                $value = str_replace("'", "\'", $value);
                $data[$key] = $value;
            }
        }
        if ($HinhAnh1 == "") {
            unset($data['HinhAnh1']);
        }
        if ($HinhAnh2 == "") {
            unset($data['HinhAnh2']);
        }
        if ($HinhAnh3 == "") {
            unset($data['HinhAnh3']);
        }
        if ($HinhAnh4 == "") {
            unset($data['HinhAnh4']);
        }
        if ($HinhAnh5 == "") {
            unset($data['HinhAnh5']);
        }
        $this->sanpham_model->update($data);
    }
    function addTypeColor()
    {
        $id = $_POST['MaSP'];
        $data = array(
            'MaSP' => $_POST['MaSP'],
            'TypeColor' => $_POST['TypeColor']
        );

        foreach ($data as $key => $value) {
            if (strpos($value, "'") != false) {
                $value = str_replace("'", "\'", $value);
                $data[$key] = $value;
            }
        }
        $this->sanpham_model->addTypeColor($data, $id);
    }
}
