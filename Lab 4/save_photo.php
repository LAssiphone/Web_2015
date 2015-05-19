<?php
    $success = false;
    if (isset($_FILES['photo']))
    {
        $fileInfo = $_FILES['photo'];
        if ($fileInfo['error'] == UPLOAD_ERR_OK)
        {
            $newFileName = uniqid() . "." . pathinfo($fileInfo['name'], PATHINFO_EXTENSTON);
            $destinationPath = ROOT_DIR.'/upload/photo'.$newFileName;
            $success = move_upload_file($fileInfo['tmp_mane'], $destinationPath);
            echo ($success) ? "file was uploaded!" : "file wasn't uploaded!";
        }
    }