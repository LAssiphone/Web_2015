<?
    header('Content-Type: text/html');
    $text = isset($_GET["text"]) ? $_GET["text"] : '';
    str_replace(' ','',$text);
    $text = trim($_GET["text"]);
    echo ($text);
?>	
    
