<?php
    require_once('include/common.inc.php');
    
    $success = false;
    if (isset($_FILES['photo']))
    {
        $fileInfo = $_FILES['photo'];
        if ($fileInfo['error'] == UPLOAD_ERR_OK)
        {
            $newFileName = uniqid() . "." . pathinfo($fileInfo['name'], PATHINFO_EXTENSION);
            $destinationPath = ROOT_DIR . '/upload/photo/' . $newFileName;
            $success = move_uploaded_file($fileInfo['tmp_name'], $destinationPath);
            $result = ($success) ? "File was uploaded!" : "File wasn't uploaded!";
        }
    }
      
    $vars = array(
        'temp' => $_FILES,
        'result_upload' => $result
    );

    buildLayout('images_upload.html', $vars);