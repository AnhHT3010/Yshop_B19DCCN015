<?php
require_once("./models/thuonghieu.php");
class ThuongHieuController015
{
    var $thuonghieu_model;
    function __construct()
    {
        $this->thuonghieu_model = new ThuongHieu();
    }

    public function list()
    {
        $data = array();
        $data = $this->thuonghieu_model->All();
        require_once("./views/admin/home.php");
    }
    public function add()
    {
        $data = $this->thuonghieu_model->danhmuc();
        require_once("./views/admin/home.php");
    }
    public function store()
    {
        $data = array(
            'TenLSP' => $_POST['TenLSP'],
            'HinhAnh' => $_POST['HinhAnh'],
            'MoTa' => $_POST['MoTa'],
            'MaDM' => $_POST['MaDM'],
        );
        foreach ($data as $key => $value) {
            if (strpos($value, "'") != false) {
                $value = str_replace("'", "\'", $value);
                $data[$key] = $value;
            }
        }
        $this->thuonghieu_model->store($data);
    }
    public function edit()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : 5;
        $data_brand = $this->thuonghieu_model->find($id);
        $data = $this->thuonghieu_model->danhmuc();

        require_once("./views/admin/home.php");
    }
    public function update()
    {
        $data = array(
            'MaLSP' => $_POST['MaLSP'],
            'TenLSP' => $_POST['TenLSP'],
            'HinhAnh' => $_POST['HinhAnh'],
            'MoTa' => $_POST['MoTa'],
            'MaDM' => $_POST['MaDM']
        );
        foreach ($data as $key => $value) {
            if (strpos($value, "'") != false) {
                $value = str_replace("'", "\'", $value);
                $data[$key] = $value;
            }
        }
        $this->thuonghieu_model->update($data);
    }
    public function delete()
    {
        if (isset($_GET['id'])) {
            $this->thuonghieu_model->delete($_GET['id']);
        }
    }
}
