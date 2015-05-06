<?php
    function CreateFileFromEMail($email)
    {
        $file = "data/{$email}.txt";
        if (file_exists($file))
        {
            echo 'E -Mail is already in use , specify a different';
            exit;
        }
        else 
        {
            return $file;
        }
    }
    
    function GetFileFromEMail($email)
    {
        $file = "data/{$email}.txt";
        if (!file_exists($file))
        {
            echo 'E-mail can not be found , please try again';
            exit;
        }
        else 
        {
            return $file;
        }
    }
    
    function DataInFile($file, $data)
    {
        foreach ($data as $key => $value)
        {
            file_put_contents($file, "{$key}:{$value}\r\n", FILE_APPEND);
        }
        echo 'Data are added successfully';
    }
    
    function DataFromFile($file)
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
        return $info;
    }