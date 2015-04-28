<?php
    include 'include/common.inc.php';
    // Проверяем наличие вводимых данных
    $email = GetParamFromGet('email');
    // Создаем переменную пути к файлу
    $file = "data/{$email}.txt";
    // Проверка - существует ли файл    
    if (!file_exists($file))
    {
        echo 'E-mail can not be found , please try again';
        return;
    }
    // выводим файл, с проверкой его указания
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