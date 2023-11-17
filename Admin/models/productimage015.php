<?php
require("model.php");
class product_image015 extends model
{
    var $table = "product_image015";
    var $contens = "MaAnhSP";
    function storeImage($data)
    {
        $f = "";
        $v = "";
        foreach ($data as $key => $value) {
            $f .= $key . ",";
            $v .= "'" . $value . "',";
        }
        $f = trim($f, ",");
        $v = trim($v, ",");
        $query = "INSERT INTO $this->table($f) VALUES ($v);";
    }
}