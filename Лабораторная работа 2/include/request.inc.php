<?php
    function GetParamFromGet($paramname)
    {   
        $result = isset($_GET[$paramname]) ? $_GET[$paramname] : '';
        return $result;
    }
 