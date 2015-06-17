<?php
    require_once('include/common.inc.php');
    
    $mysql_query = $_POST['mysql_query'];
    if ($mysql_query)
        $result = dbExecute($mysql_query);
    
    
    $vars = array(
        'result' => $result
    );
    
    buildLayout('mySQL.html', $vars);