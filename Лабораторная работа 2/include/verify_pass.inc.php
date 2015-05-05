<?php
    function CheckPass($pass)
    {
        if (preg_replace('/[^a-zA-Z0-9]/', "", $pass) != $pass)
        {
            echo ('Password contains invalid characters');
            exit;
        }
    }
    
    function PassSecurity($pass)
    {
        $security = 0;
        $len = strlen($pass);

        $n = $len;
        $security += 4*$n;
       

        $n = strlen(preg_replace('/[^0-9]/', '', $pass));
        $security += $n*4;
        

        $n = strlen(preg_replace('/[^A-Z]/', '', $pass));        
        $security += ($len-$n)*2;
        

        $n = strlen(preg_replace('/[^a-z]/', '', $pass));
        $security += ($len-$n)*2;
        

        if ($len == strlen(preg_replace('/[^0-9]/', '', $pass)))
        {
            $security -= $len;
        }
        
        
        if ($len == strlen(preg_replace('/[^A-Za-z]/', '', $pass)))
        {
            $security -= $len;
        }
        
        foreach (count_chars($pass, 1) as $i => $val)
        {
            if ($val > 1)
            {
                $security -= $val;
            }            
        }
        
        return $security;
    }
