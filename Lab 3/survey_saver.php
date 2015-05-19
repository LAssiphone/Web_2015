<?php
    require 'include/common.inc.php';
    
    $first_name = GetParamFromGet('first_name');		
    $last_name = GetParamFromGet('last_name');    		
    $age = GetParamFromGet('age');
    
    $email = GetParamFromGet('email');
    $filePath = GetFilePathFromEMail($email);
    
    $data = array
        (
            "Email" => $email,
            "First Name" => $first_name,
            "Last Name" => $last_name,
            "Age" => $age
        );      
        
    if ($email == "")
    {
        $result = "E-Mail not specified. Try again.";
    }
    else if (file_exists($filePath))
    {
        $result = 'E -Mail is already in use , specify a different. Try again.';
    }
    else 
    {
        $result = DataInFile($filePath, $data);
    }
    
    $vars = array
    (
        'survey_saver_echo' => $result
    );
    
    buildLayout('survey_saver_echo.html', $vars); 
