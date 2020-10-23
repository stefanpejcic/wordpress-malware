<?php
error_reporting(0);
session_start();

require_once('antibot.php');
require_once('antibot-config.php');


$Antibot = new Antibot;

if($config['bot_block'] && $_SESSION['botCheck'] == false){


	$checkbot 	= $Antibot->checkBot( $config['apikey'] );
	$json 		= $Antibot->json($checkbot);
	
	$_SESSION['botCheck'] 	= true;
	$_SESSION['is_bot'] 	= true;

	if($json['is_bot']){
		die(header("Location: ".$config['redirect_bot']));
	}

}
if($_SESSION['check'] == true && $_SESSION['is_bot'] == true){
	die(header("Location: ".$config['redirect_bot']));
}
if( preg_match("/_/", $config['apikey']) ){
	die("Harap edit APIKEY dalam file antibot-config.php. (Please edit api key in antibot-config.php file.)");
}