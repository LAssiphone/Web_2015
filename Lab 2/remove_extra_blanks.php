<?php
    include 'include/common.inc.php';
    $str = GetParamFromGet('str');
    $nstr = RemoveExtraBlanks($str);
    echo ("RemoveExtraBlanks - #{$nstr}#<br>");