<?php
    include 'include/common.inc.php';
    $str = GetParamFromGet('str');
    $wlst = WithoutLast($str);
    echo ("WithoutLast - #{$wlst}#<br>");