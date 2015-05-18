<?php
    function GetDegMoveFromGet($degMove)
    {
        if (isset($_GET[$degMove]))
        {
            $result = $_GET[$degMove];
            if (($result < 360) && ($result > -360) && ($result != 0))
            {
                return $result;
            }
            else
            {
                return 10;
            }
        }
        else
        {
            return 10;
        }
    }
    
    function GetMinMoveFromGet($MinMove)
    {
        if (isset($_GET[$MinMove]))
        {
            $result = $_GET[$MinMove];
            if (($result < 60) && ($result > 0))
            {
                return $result;
            }
            else
            {
                return 6;
            }
        }
        else
        {
            return 6;
        }
    }
    function TableSin($degMove, $minMove)
    {
        for ($degrees = 0; $degrees <= 180; $degrees += $degMove) 
        {
            for ($minutes = 0; $minutes <= 60; $minutes += $minMove)
            {
                $value = sin(deg2rad($degrees + $minutes/60));
                $tableSin[$degrees][$minutes] = round($value, 4);
            }
        }
        return $tableSin;
    }