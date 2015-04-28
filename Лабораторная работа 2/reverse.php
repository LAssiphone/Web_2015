<?php
    include 'include/common.inc.php';
    $str = GetParamFromGet('str');
    $rvr = Revers($str);
    echo ("Revers - #{$rvr}#<br>");