<?php
    function GetFilePathFromEMail($email)
    {
        $filePath = "data/{$email}.txt";
        return $filePath;        
    }
    
    function GetFileFromEMail($email)
    {
        $file = "data/{$email}.txt";
        return $file;
    }
    
    function DataInFile($file, $data)
    {
        foreach ($data as $key => $value)
        {
            file_put_contents($file, "{$key}:{$value}\r\n", FILE_APPEND);
        }
        return 'Data are added successfully';
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