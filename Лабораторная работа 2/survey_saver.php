<?php
    require 'include/common.inc.php';
    
    $first_name = GetParamFromGet('first_name');		
    $last_name = GetParamFromGet('last_name');    		
    $age = GetParamFromGet('age');
    
    $email = GetRequiredParamFromGet('email');
   
    $file = CreateFileFromEMail($email);
    
    $data = array
        (
            "Email" => $email,
            "First Name" => $first_name,
            "Last Name" => $last_name,
            "Age" => $age
        );      
   
    DataInFile($file, $data);
       
