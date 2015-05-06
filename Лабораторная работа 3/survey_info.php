<?php
    require 'include/common.inc.php';

    $data =  DataFromFile($_GET['file']);
    
    foreach ($data as  $key => $value)
    {
        echo ("{$key} : {$value} <br>");
    }        
   