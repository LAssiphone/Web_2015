<?php
    function Last($str)
    {
        $lst = substr($str, strlen($str) - 1, 1);
        return $lst;
    }
    
    function WithoutLast($str)
    {
        $wlst = substr($str, 0, strlen($str) - 1);
        return $wlst;
    }
    
    function Revers($str)
    {
        $rvr = strrev($str);
        return $rvr;
    }
    
    function RemoveExtraBlanks($str)
    {
        $nstr = trim($str);
        while (strpos($nstr, '  ') !== false)
        {
            $nstr = str_replace('  ', ' ', $nstr);
        }
        return $nstr;
    }
