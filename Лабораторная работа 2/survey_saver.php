<?php
    require 'include/common.inc.php';
    
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
       
