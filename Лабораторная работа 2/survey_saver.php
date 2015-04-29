<?php
    include 'include/common.inc.php';
    
    $first_name = GetParamFromGet('first_name');
    $last_name = GetParamFromGet('last_name');
    $email = GetParamFromGet('email');
    $age = GetParamFromGet('age');
   
    $file = "data/{$email}.txt";
    $data = array
        (
            "Email" => $email,
            "First Name" => $first_name,
            "Last Name" => $last_name,
            "Age" => $age
        );
       
    if (file_exists($file))
    {
        echo 'E -Mail is already in use , specify a different';
        return;
    }
   
    if (isset($_GET['email']))
    {
        foreach ($data as $key => $value)
        {
            file_put_contents($file, "{$key}:{$value}\r\n", FILE_APPEND);
        }
        echo 'Data are added successfully';
    }
    else
    {
        echo 'E -Mail not specified';
        return;
    }
