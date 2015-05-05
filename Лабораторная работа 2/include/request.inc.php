<?php
    function GetParamFromGet($paramname)
    {   
        $result = isset($_GET[$paramname]) ? $_GET[$paramname] : '';
        return $result;
    }
    
    function GetRequiredParamFromGet($paramname)
    {
        if ((isset($_GET[$paramname])) && ($_GET[$paramname] != ""))
        {
            $result = $_GET[$paramname];
            return $result;
        }
        else
        {
            echo "{$paramname} not specified";
            exit;
        }
    } 
