<?php
require_once("./models/danhmuc.php");
class DanhmucController015
{
    var $danhmuc_model;
    function __construct()
    {
        $this->danhmuc_model = new Danhmuc();
    }

    public function list()
    {
        $data = array();
        $data = $this->danhmuc_model->All();
        require_once("./views/admin/home.php");
    }
    public function add()
    {
        require_once("./views/admin/home.php");
    }
    public function store()
    {
        $data = array(
            'MaDM' => $_POST['MaDM'],
            'TenDM' => $_POST['TenDM'],
            'HinhAnh' => $_POST['HinhAnh']
        );
        foreach ($data as $key => $value) {
            if (strpos($value, "'") != false) {
                $value = str_replace("'", "\'", $value);
                $data[$key] = $value;
            }
        }
        $this->danhmuc_model->store($data);
    }
    public function edit()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : 5;
        $data = $this->danhmuc_model->find($id);
        require_once("./views/admin/home.php");
    }
    public function update()
    {
        $data = array(
            'MaDM' => $_POST['MaDM'],
            'TenDM' => $_POST['TenDM'],
            'HinhAnh' => $_POST['HinhAnh']
        );
        foreach ($data as $key => $value) {
            if (strpos($value, "'") != false) {
                $value = str_replace("'", "\'", $value);
                $data[$key] = $value;
            }
        }
        $this->danhmuc_model->update($data);
    }
    public function delete()
    {
        if (isset($_GET['id'])) {
            $this->danhmuc_model->delete($_GET['id']);
        }
    }
}