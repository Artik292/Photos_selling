<?php
require 'vendor/autoload.php';
$app = new \atk4\ui\App('Photos');
$app->initLayout('Centered');
//$app->add[('Card','Hello word')];
$stamp = imagecreatefrompng('https://upload.wikimedia.org/wikipedia/commons/4/47/PNG_transparency_demonstration_1.png');
$im = imagecreatefromjpeg('https://upload.wikimedia.org/wikipedia/commons/7/72/Pleiades_Spitzer_big.jpg');
//echo 'work';
//var_dump ($im);
//$app->add(["Image",$stamp]);
//phpinfo();
$marge_right = 1;
$marge_bottom = 1;
$sx = imagesx($stamp);
$sy = imagesy($stamp);

$pleasework = imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));

header('Content-type: image/png');
//imagepng($im);
/*$app->add(["Image",$im,"large"]);
$app->add(["Image",$stamp,"large"]);
$app->add(["Image",$pleasework,"large"]);*/

//imagedestroy($im);

//$app->add(["Image",$im]);
