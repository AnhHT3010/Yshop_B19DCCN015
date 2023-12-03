<?php
require_once("model.php");
class nguoidung extends Model
{
    var $table = "user";
    var $contens = "MaND";
    var $route = "nguoidung";
    function AllUser($idAdmin)
    {
        $query = "select * from user WHERE MaND != $idAdmin ORDER BY MaND DESC ";

        require("result.php");

        return $data;
    }
}
