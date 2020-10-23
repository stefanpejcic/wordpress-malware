<?php
/**
 * @Author: Nokia 1337
 * @Date:   2019-09-13 13:41:05
 * @Last Modified by:   Nokia 1337
 * @Last Modified time: 2019-10-07 17:38:13
*/
class Antibot
{
	function __construct()
	{
		$this->domain = 'https://antibot.pw';
	}
	function respons($status , $array){
		return json_encode( array('status' => $status , 'respons' => $array) );
	}
	function get_client_ip() {
	    $ipaddress = '';
	    if (getenv('HTTP_CLIENT_IP')){
	        $ipaddress = getenv('HTTP_CLIENT_IP');
	    }
	    if(getenv('HTTP_X_FORWARDED_FOR')){
	        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
	    }
	    if(getenv('HTTP_X_FORWARDED')){
	        $ipaddress = getenv('HTTP_X_FORWARDED');
	    }
	    if(getenv('HTTP_FORWARDED_FOR')){
	        $ipaddress = getenv('HTTP_FORWARDED_FOR');
	    }
	    if(getenv('HTTP_FORWARDED')){
	       $ipaddress = getenv('HTTP_FORWARDED');
	    }
	    if(getenv('REMOTE_ADDR')){
	        $ipaddress = getenv('REMOTE_ADDR');
	    }
	    $ipaddress = explode(",",  $ipaddress);
	    if(preg_match("/::1/", $ipaddress[0])){
	    	$ipaddress[0] = '36.84.242.253';
	    }
	    return $ipaddress[0];
	}
	function httpGet($url){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		return $response;
	}
	function httpPost($url , $array){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($array));
		$response = curl_exec($ch);
		return $response;
	}
	function redirect($apikey , $keyname){
		$url 		= $this->domain."/api/v2-manager?ip=".$this->get_client_ip()."&apikey=".$apikey."&keyname=".$keyname."&ua=".urlencode($_SERVER['HTTP_USER_AGENT']);
		$respons 	= $this->httpGet($url);
		return $respons;
	}
	function checkBot($apikey){
		$url 		= $this->domain."/api/v2-blockers?ip=".$this->get_client_ip()."&apikey=".$apikey."&ua=".urlencode($_SERVER['HTTP_USER_AGENT']);
		$respons 	= $this->httpGet($url);
		return $respons;
	}
	function addtoHtaccess(){
		$fopn = fopen(".htaccess", "a+");
		fwrite($fopn, "Deny from ".$this->get_client_ip()."\r\n");
		fclose($fopn);
	}
	function json($respons){
		return json_decode($respons,true);
	}
	function error($code , $error_message = ''){
		$tempale = '<html>
		<head>
		<title>{text}</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css">
		<link href="/style.css" rel="stylesheet">
		<link rel="shortcut icon" href="/km.png">   <style type="text/css">
		    {
		        font-family: "Roboto" , sans-serif;
		    }
		    .error-template
		    {
		        padding: 40px 15px;
		        text-align: center;
		            margin-top: 10%;
		    }
		    .error-actions
		    {
		        margin-top: 15px;
		        margin-bottom: 15px;
		    }
		    .error-actions .btn
		    {
		        margin-right: 10px;
		    }
		    .message-box h1
		    {
		        color: #252932;
		        font-size: 98px;
		        font-weight: 700;
		        line-height: 98px;
		        text-shadow: rgba(61, 61, 61, 0.3) 1px 1px, rgba(61, 61, 61, 0.2) 2px 2px, rgba(61, 61, 61, 0.3) 3px 3px;
		    }
		    </style>
		</head>
		<body>
		<div class="container"> 
		    <div class="row" style="margin-top: 150px;">
		        <div class="col-md-6">
		            <div class="error-template">
		                <h1>[0,0] {text}</h1>
		                <div><br>
		                    <p>{error_message}</p>
		                    <p>— IT Security.</p>
		                </div>
		                <div class="error-actions">
		                    <a href="/" >Back To Home</a>
		                </div>
		            </div>
		        </div>
		        <div class="col-md-6">
		            <svg class="svg-box" width="380px" height="500px" viewbox="0 0 837 1045" version="1.1"
		                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
		                xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
		                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
		                        <path d="M353,9 L626.664028,170 L626.664028,487 L353,642 L79.3359724,487 L79.3359724,170 L353,9 Z" id="Polygon-1" stroke="#3bafda" stroke-width="6" sketch:type="MSShapeGroup"></path>
		                        <path d="M78.5,529 L147,569.186414 L147,648.311216 L78.5,687 L10,648.311216 L10,569.186414 L78.5,529 Z" id="Polygon-2" stroke="#7266ba" stroke-width="6" sketch:type="MSShapeGroup"></path>
		                        <path d="M773,186 L827,217.538705 L827,279.636651 L773,310 L719,279.636651 L719,217.538705 L773,186 Z" id="Polygon-3" stroke="#f76397" stroke-width="6" sketch:type="MSShapeGroup"></path>
		                        <path d="M639,529 L773,607.846761 L773,763.091627 L639,839 L505,763.091627 L505,607.846761 L639,529 Z" id="Polygon-4" stroke="#00b19d" stroke-width="6" sketch:type="MSShapeGroup"></path>
		                        <path d="M281,801 L383,861.025276 L383,979.21169 L281,1037 L179,979.21169 L179,861.025276 L281,801 Z" id="Polygon-5" stroke="#ffaa00" stroke-width="6" sketch:type="MSShapeGroup"></path>
		                    </g>
		                </svg>
		        </div>
		    </div>
		</body>
		</html>';
		switch ($code) {
			case '403':
				$tempale = str_replace("{text}", "403 Forbidden", $tempale);
				$tempale = str_replace("{error_message}", "You dont have authorization to view this page.", $tempale);
				echo $tempale;
				die(header('HTTP/1.0 403 Forbidden'));
			break;
			case '100':
				$tempale = str_replace("{text}", "Notice Antibot", $tempale);
				$tempale = str_replace("{error_message}", $error_message , $tempale);
				echo $tempale;
				die(header('HTTP/1.0 403 Forbidden'));
			break;
			default:
				$tempale = str_replace("{text}", "404 Not Found", $tempale);
				$tempale = str_replace("{error_message}", "The requested was not found on this server.", $tempale);
				echo $tempale;
				die(header("HTTP/1.0 404 Not Found"));
			break;
		}
	}
}