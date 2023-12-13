<?php
require_once("model.php");
class ThuongHieu extends Model
{
    var $table = "brands";
    var $contens = "MaLSP";
    var $route = "thuonghieu" ;
    function danhmuc()
    {
        $query = "SELECT * FROM `category`";
        require("result.php");
        return $data;
    }
}
