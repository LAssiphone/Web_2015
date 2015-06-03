<?
	require_once ('include/common.inc.php');
	
	$query = "	
	SELECT * FROM dvd
	WHERE production_year=2010
	ORDER BY title;
	";
				
	$result = dbExecute ($query);
	print_r ($result);