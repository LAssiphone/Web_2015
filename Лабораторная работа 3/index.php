<?php
    require_once('include/common.inc.php');
     
    $users = array
    (
        array('name' => 'Sarah', 'surname' => 'Rever', 'age' => 32),
        array('name' => 'Chuck', 'surname' => 'Norris', 'age' => 142),
        array('name' => 'Dart',  'surname' => 'Veider', 'age' => 356)
    );
        
    $vars = array
    (
        'headline' => 'Template Engine',
        'name' => 'Sarah',
        'users' => $users
    );

    buildLayout('index.html', $vars);
