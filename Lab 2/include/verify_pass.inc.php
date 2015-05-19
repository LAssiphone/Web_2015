<?php
    function CheckPass($pass)
    {
        if (preg_replace('/[^a-zA-Z0-9]/', "", $pass) != $pass)
        {
            return;
        }
        else
        {
            return $pass;
        }
    }
    
    function PassSecurity($pass)
    {
        $security = 0;
        
        $security += CalcSecurityForLength($pass);
        $security += CalcSecurityForDigt($pass);
        $security += CalcSecurityForUpperCase($pass);
        $security += CalcSecurityForLowerCase($pass);
        $security -= CalcSecurityOnlyDigt($pass);
        $security -= CalcSecurityOnlyLetter($pass);
        $security -= CalcSecurityRepSymbol($pass);
            
        return $security;
    }
    
    function CalcSecurityForLength($pass)
    {
        $n = strlen($pass);
        return 4*$n;
    }  
    
    function CalcSecurityForDigt($pass)
    {
        $n = strlen(preg_replace('/[^0-9]/', '', $pass));
        return $n*4;
    }   
    
    function CalcSecurityForUpperCase($pass)
    {
        $n = strlen(preg_replace('/[^A-Z]/', '', $pass));        
        return (strlen($pass)-$n)*2;
    }   

    function CalcSecurityForLowerCase($pass)
    {
        $n = strlen(preg_replace('/[^a-z]/', '', $pass));
        return (strlen($pass)-$n)*2;
    }   

    function CalcSecurityOnlyDigt($pass)
    {
        if (strlen($pass) == strlen(preg_replace('/[^0-9]/', '', $pass)))
        {
            return strlen($pass);
        }
    }   
    
    function CalcSecurityOnlyLetter($pass)
    {        
        if (strlen($pass) == strlen(preg_replace('/[^A-Za-z]/', '', $pass)))
        {
            return strlen($pass);
        }
    }
        
    function CalcSecurityRepSymbol($pass)
    {
        $count = 0; 
        foreach (count_chars($pass, 1) as $i => $val)
        {
            if ($val > 1)
            {
                $count += $val;
            }            
        }
        return $cont;
    }
