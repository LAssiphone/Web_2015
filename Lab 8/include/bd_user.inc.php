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
    
    function findUser($login)
    {
        $login = dbQuore($login);
        $query = "SELECT user_id, user_password FROM users WHERE user_login='{$login}' LIMIT 1;";
        return dbExecute($query);
    }
    
    function addUser($login, $password)
    {
        $password = dbQuore($password);
        $password = md5(md5(trim($password)));
        $query = "INSERT INTO users SET user_login='{$login}', user_password='{$password}';";
        return dbExecute($query);
    }
    
    function userLoginUpd($user, $userIp, $hash)
    {
        $userId = $user['0']['user_id'];
        $query = "UPDATE users SET user_hash='{$hash}', user_ip=INET_ATON('{$userIp}') WHERE user_id='{$userId}';";
        return dbExecute($query);
    }