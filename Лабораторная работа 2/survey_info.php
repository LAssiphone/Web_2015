<?php
    require 'include/common.inc.php';
    
    $email = GetParamFromGet('email');
    if ($email == "") 
    {
        echo "E-Mail not specified";
        exit;
    } 
    
    $filePath = GetFilePath($email);
    if (!file_exists($filePath))
    {
        echo 'E-mail can not be found , please try again';
        exit;
    }
    
    $data =  DataFromFile($filePath);
    
    PrintDataArrey($data);