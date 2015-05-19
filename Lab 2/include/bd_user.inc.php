<?php
    function GetFilePath($email)
    {
        $filePath = "data/{$email}.txt";
        return $filePath;
    }
  
    function DataInFile($filePath, $data)
    {
        foreach ($data as $key => $value)
        {
            file_put_contents($filePath, "{$key}:{$value}\r\n", FILE_APPEND);
        }
        return 'Data are added successfully';
    }
   
    function DataFromFile($filePath)
    {
        $data = file($filePath);
        foreach ($data as $line)
        {
            list($key , $value) = explode(':' , $line);
            $info[$key] = $value;
        }
        return $info;
    }
    
    function PrintDataArrey($arrey) 
    {
        foreach ($arrey as  $key => $value)
        {
            echo ("{$key} : {$value} <br>");
        }    
    }