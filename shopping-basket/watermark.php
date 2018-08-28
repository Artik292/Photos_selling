<?php
session_start();
$stamp = imagecreatefrompng('photos/watermark.png');
$im = imagecreatefromjpeg($_SESSION["JPEG"]);
//$im1 = ('https://upload.wikimedia.org/wikipedia/commons/7/72/Pleiades_Spitzer_big.jpg');
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
imagepng($im);
/*$app->add(["Image",$im,"large"]);
$app->add(["Image",$stamp,"large"]);*/
//$app->add(["Image",$pleasework,"large"]);

imagedestroy($im);

//$app->add(["Image",$im]);
