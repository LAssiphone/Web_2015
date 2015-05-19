<?php
    require 'include/common.inc.php';
    
    $first_name = GetParamFromGet('first_name');		
    $last_name = GetParamFromGet('last_name');    		
    $age = GetParamFromGet('age');

    $email = GetParamFromGet('email');
    if ($email == "") 
    {
        echo "E-Mail not specified";
        exit;
    }   
   
    $filePath = GetFilePath($email);
    if (file_exists($filePath))
    {
        echo 'E -Mail is already in use , specify a different';
        exit;
    }
        
    $data = array
        (
            "Email" => $email,
            "First Name" => $first_name,
            "Last Name" => $last_name,
            "Age" => $age
        );      
   
    $result = DataInFile($filePath, $data);
    echo $result;
   