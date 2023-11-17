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
        $data_category = $this->sanpham_model->danhmuc();
        require_once("./views/admin/home.php");
    }
    public function store()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $ThoiGian =  date('Y-m-d H:i:s');
        $data = array(
            'MaLSP' =>    $_POST['MaLSP'],
            'MaDM' => $_POST['MaDM'],
            'TenSP'  =>   $_POST['TenSP'],
            'DonGia' => $_POST['DonGia'],
            'SoLuong' => $_POST['SoLuong'],
            'AnhDaiDien' => $_POST['AnhDaiDien'],
            'ManHinh' =>  $_POST['ManHinh'],
            'HDH' => $_POST["HDH"],
            'CamSau' =>  $_POST['CamSau'],
            'CamTruoc' =>  $_POST['CamTruoc'],
            'CPU' =>  $_POST['CPU'],
            'Ram' =>  $_POST['Ram'],
            'Rom' =>  $_POST['Rom'],
            'SDCard' =>  $_POST['SDCard'],
            'Pin' =>  $_POST['Pin'],
            'MoTa' =>  $_POST['MoTa'],
            'ThoiGian' => $ThoiGian,
        );
        foreach ($data as $key => $value) {
            if (strpos($value, "'") != false) {
                $value = str_replace("'", "\'", $value);
                $data[$key] = $value;
            }
        }
        // Get the last inserted ID
        $lastInsertedID = $this->sanpham_model->store($data);
        if($lastInsertedID !== false){
            echo "Thành công";
        }else{
            echo "Không thành công";
        }
        $jsonString = $_POST['AnhURL'];
        $array_image = json_decode($jsonString, true);
        
        if (is_array($array_image)) {
            foreach ($array_image as $key => $value) {
                if (is_string($value) && strpos($value, "'") !== false) {
                    $value = str_replace("'", "\'", $value);
                    $array_image[$key] = $value;
                }
            }

            foreach ($array_image as $key => $value) {
                $data_image = array(
                    'MaSP' => $lastInsertedID,
                    'AnhURL' => $value
                );
                $this->sanpham_model->storeImage($data_image);
            }
        } else {
            die('Invalid JSON data: The decoded value is not an array.');
        }
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
        $data_product = $this->sanpham_model->find($id);
        echo ($_POST['MaSP']);
        $data_brand = $this->sanpham_model->thuonghieu();
        $data_category = $this->sanpham_model->danhmuc();
        $data_image_product = $this->sanpham_model->find_product_image015($id);
        require_once("./views/admin/home.php");
    }
    public function update()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $ThoiGian =  date('Y-m-d H:i:s');
        $data = array(
            'MaSP' => $_POST['MaSP'],
            'MaDM' => $_POST['MaDM'],
            'MaLSP' =>    $_POST['MaLSP'],
            'TenSP'  =>   $_POST['TenSP'],
            'DonGia' => $_POST['DonGia'],
            'SoLuong' => $_POST['SoLuong'],
            'ManHinh' =>  $_POST['ManHinh'],
            'HDH' => $_POST["HDH"],
            'CamSau' =>  $_POST['CamSau'],
            'CamTruoc' =>  $_POST['CamTruoc'],
            'CPU' =>  $_POST['CPU'],
            'Ram' =>  $_POST['Ram'],
            'Rom' =>  $_POST['Rom'],
            'SDCard' =>  $_POST['SDCard'],
            'Pin' =>  $_POST['Pin'],
            'MoTa' =>  $_POST['MoTa'],
            'ThoiGian' => $ThoiGian,
        );
        foreach ($data as $key => $value) {
            if (strpos($value, "'") != false) {
                $value = str_replace("'", "\'", $value);
                $data[$key] = $value;
            }
        }
        $this->sanpham_model->update($data);
        $jsonString = $_POST['AnhURL'];
        $array_image = json_decode($jsonString, true);
        if (is_array($array_image)) {
            foreach ($array_image as $key => $value) {
                if (is_string($value) && strpos($value, "'") !== false) {
                    $value = str_replace("'", "\'", $value);
                    $array_image[$key] = $value;
                }
            }
            $data_image = [];
            foreach ($array_image as $url) {
                // Tạo một mảng mới cho mỗi hình ảnh và thêm vào mảng $data
                $data_image[] = ['MaSP' => 19, 'AnhURL' => $url];
            }
            $this->sanpham_model->updateImage($data_image);
        } else {
            die('Invalid JSON data: The decoded value is not an array.');
        }
    }
}
