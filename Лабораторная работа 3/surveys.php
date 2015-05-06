<?php
    require_once('include/common.inc.php');
    
    $folder = 'data';
    $files = scandir($folder);
    unset($files[0], $files[1]);
    
    $vars = array(
        'folder' => $folder,
        'files' => $files, 
    );

    buildLayout('surveys.html', $vars);