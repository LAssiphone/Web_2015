<?php
    include 'include/common.inc.php';
    $str = GetParamFromGet('str');
    $lst = Last($str);
    echo ("Last - #{$lst}#<br>");