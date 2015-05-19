<?php
    $arg1 = isset($_GET["arg1"]) ? $_GET["arg1"] : 0;
    $arg2 = isset($_GET["arg2"]) ? $_GET["arg2"] : 0;
    $sum = $arg1 + $arg2;
    echo $sum;
