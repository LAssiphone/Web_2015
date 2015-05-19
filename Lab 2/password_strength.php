<?php
    require 'include/common.inc.php';
    
    $pass = GetParamFromGet('password');
    if ($pass == "") 
    {
        echo "Password not specified";
        exit;
    } 
  
    $pass = CheckPass($pass);
    if (!$pass) 
    {
        echo "Password contains invalid characters";
        exit;
    }

    $security = PassSecurity($pass);

    echo ("Password = {$pass} <br>");
    echo ("Password securiry = {$security}");
    
