<?php
    require 'include/common.inc.php';
    
    $pass = GetRequiredParamFromGet('password');
  
    CheckPass($pass);

    $security = PassSecurity($pass);

    echo ("Password = {$pass} <br>");
    echo ("Password securiry = {$security}");
    
