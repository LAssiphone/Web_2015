<?php
    include 'include/common.inc.php';
    
    $file = "data/{$email}.txt";
        
    if (!file_exists($file))
    {
        echo 'E-mail can not be found , please try again';
        return;
    }
    
    if (isset($_GET['email']))
    {
        $data = file($file);
        foreach ($data as $line)
        {
            $line = trim($line);
            list($key , $value) = explode(':' , $line);
            if ($value == "")
            {
                $value = '...';
            }
            $info[$key] = $value;
        }
        foreach ($info as  $key => $value)
        {
            echo ("{$key} : {$value} <br>");
        }        
    }
    else
    {
        echo 'E -Mail not specified';
        return;
    }
