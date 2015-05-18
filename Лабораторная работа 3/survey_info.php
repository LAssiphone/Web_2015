<?php
    require 'include/common.inc.php';

    $data =  DataFromFile($_GET['file']);
    
    $vars = array
    (
        'survey' => $data
    );

    buildLayout('survey.html', $vars); 