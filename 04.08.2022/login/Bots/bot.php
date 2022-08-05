<?php


$ip = $_SERVER['REMOTE_ADDR'];
$url = "https://rdap.arin.net/registry/ip/".$ip;
$ch = curl_init($url);

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_HEADER, 0);
curl_setopt($curl, CURLOPT_POST, 0);

$data = curl_exec($curl);
curl_close($curl);
$data = explode(",", $data);
$data = str_replace('"name" : ','',$data[25]);
$data = preg_replace("/\n/","",$data);
$data = preg_replace("/ /","",$data);
$data = str_replace('"','',$data);
$data = explode('-',$data);
$final = $data[0];

$bad_names = array("GOOGLE","DIGITALOCEAN","RIPE","APNIC","MSFT","QUADRANET");

if(in_array($final, $bad_names)){
  return "is_bot";
} else {
  return "is_human";
}

?>
