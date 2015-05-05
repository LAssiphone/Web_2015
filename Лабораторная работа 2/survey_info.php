<?php
    require 'include/common.inc.php';
    
    $email = GetRequiredParamFromGet('email');
    
    $file = GetFileFromEMail($email);
    
    $data =  DataFromFile($file);
    
    foreach ($data as  $key => $value)
    {
        echo ("{$key} : {$value} <br>");
    }        
   