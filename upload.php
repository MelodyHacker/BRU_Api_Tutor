<?php
$imsrc = base64_decode($_POST['image']);
$file = '/var/www/html/dev/tutor/img/img.png';
echo $file;
$current = file_get_contents($file);
$current .= $imsrc;
file_put_contents($file, $current);
?>


