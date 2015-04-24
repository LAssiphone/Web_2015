<?php
    if (isset ($_GET["arg1"]) ? $_GET["arg1"] : '');
    if (isset ($_GET["arg2"]) ? $_GET["arg2"] : '');
    $sum = $_GET["arg1"] + $_GET["arg2"];
    echo $sum;
