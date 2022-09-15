<?php

$items = Array('https://www.puertasymas.com.mx/jp1.php?open');

$URL = $items[array_rand($items)];

header("Location: $URL");

?>
