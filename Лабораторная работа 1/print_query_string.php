<?php
    header('Content-Type: text/plain');
    echo "Query string = '" . (isset($_SERVER["QUERY_STRING"]) ? $_SERVER["QUERY_STRING"] : ''). "'";
