<?php
require 'vendor/autoload.php';
$app = new \atk4\ui\App('Photos');
$app->initLayout('Centered');
//$app->add[('Card','Hello word')];
$stamp = ('https://upload.wikimedia.org/wikipedia/commons/4/47/PNG_transparency_demonstration_1.png');
$im =('https://upload.wikimedia.org/wikipedia/commons/7/72/Pleiades_Spitzer_big.jpg');
//echo 'work';
//var_dump ($im);
//$app->add(["Image",$stamp]);
//phpinfo();
$marge_right = 10;
$marge_bottom = 10;
$sx = imagesx($stamp);
$sy = imagesy($stamp);

imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));

header('Content-type: image/png');
imagepng($im);
imagedestroy($im);

$app->add(["Image",$res]);
