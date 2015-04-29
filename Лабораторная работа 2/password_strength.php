<?php
    include 'include/common.inc.php';

    if (isset($_GET['password']))
    {
        $password = $_GET['password'];
        echo ("PASSWORD = {$password} <br><br>");
        $security = 0;
        $len = strlen($password);

        $n = $len;
        if (strlen(preg_replace('/[^a-zA-Z0-9]/', '', $password)) != $len)
        {
            echo ('Password contains invalid characters');
        }
        else
        {
            $security += 4*$n;
            echo ("characters = {$n} ; security +" . 4*$n . " ; security = {$security}<br>");

            $n = strlen(preg_replace('/[^0-9]/', '', $password));
            $security += $n*4;
            echo ("digits = {$n} ; security +" . $n*4 . " ; security = {$security}<br>");

            $n = strlen(preg_replace('/[^A-Z]/', '', $password));        
            $security += ($len-$n)*2;
            echo ("uppercase = {$n} ; security +" . ($len-$n)*2 . " ; security = {$security}<br>");

            $n = strlen(preg_replace('/[^a-z]/', '', $password));
            $security += ($len-$n)*2;
            echo ("lowercase = {$n} ; security +" . ($len-$n)*2 . " ; security = {$security}<br>");

            if (strlen(preg_replace('/[^0-9]/', '', $password)) == $len)
            {
                $security -= $len;
                echo ("password contains only digits ; security -$len ; security = {$security}<br>");
            }
            if (strlen(preg_replace('/[^A-Za-z]/', '', $password)) == $len)
            {
                $security -= $len;
                echo ("password contains only letters ; security -$len ; security = {$security}<br>");
            }
            foreach (count_chars($password, 1) as $i => $val)
            {
                if ($val > 1)
                {
                    $security -= $val;
                    echo "in password $val instances of \"" , chr($i) , "\" ; security -$val ; security = {$security}<br>";
                }            
            }
            echo ("<br>TOTAL SECURITY = {$security}");
        }
    }
    else
    {
        echo ('No password, try it again!');
    }
