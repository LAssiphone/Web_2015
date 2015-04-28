<?
    header('Content-Type: text/plain');
    $text = isset($_GET["text"]) ? $_GET["text"] : '';
    $text = trim($_GET["text"]);
    while(strpos($text , '  ') !== false)
    {
        $text = str_replace('  ' , ' ' , $text);
    };
	echo ("#{$text}#");
?>	
    
