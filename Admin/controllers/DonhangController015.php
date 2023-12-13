<?php
require_once("./models/donhang.php");
class DonhangController015
{
    var $hoadon_model;
    public function __construct()
    {
        $this->hoadon_model = new Hoadon();
    }
    function list()
    {
        $data_order = $this->hoadon_model->order_data_detail();
        require_once("./views/admin/home.php");
    }

    function detail()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : 1;
        $data = $this->hoadon_model->get_products_by_MaHD($id);
        require_once("./views/admin/home.php");
    }

    function delete()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : 1;
        $this->hoadon_model->increase_product_quatity($id);
        $data = array(
            'MaHD' => $_GET['id'],
            'TrangThai' => 2,
        );
        $this->hoadon_model->delete_order_by_MaHD($data);
        // $data = $this->hoadon_model->delete_order_by_MaHD($id);
    }
    
    function browse_bill()
    {
        $data = array(
            'MaHD' => $_GET['id'],
            'TrangThai' => 1,
        );
        $this->hoadon_model->update_hoadon($data);
        require_once("./views/admin/home.php");
    }
    
    function filter_browse()
    {
        $data_order = $this->hoadon_model->filter_browse();
        require_once("./views/admin/home.php");
    }
    
    function filter_not_browse()
    {
        $data_order = $this->hoadon_model->filter_not_browse();
        require_once("./views/admin/home.php");
    }

    function export_invoice()
    {
        $this->hoadon_model->export_invoice();
    }
}
