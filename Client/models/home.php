<?php
require_once("model.php");
class home extends model
{
    function slider()
    {
        $query = "SELECT * FROM banner";
        require("result.php");
        return $data;
    }
    
}
