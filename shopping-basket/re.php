<?php
/*$stamp = imagecreatefrompng('photos/w.png');
$im = imagecreatefromjpeg('photos/1s.jpg');
$marge_right = 1;
$marge_bottom = 1;
$sx = imagesx($stamp);
$sy = imagesy($stamp);
$pleasework = imagecopy($im, $stamp, 0, 0, 0, 0, imagesx($stamp), imagesy($stamp));
header('Content-type: image/png');
imagepng($im);
imagedestroy($im); */

$var = 'ABCDEFGH:/MNRPQR/';
echo "Оригинал: $var<hr />\n";

echo substr_replace($var, 'bob', 10, -1) . "<br />\n";
echo substr_replace($var, 'bob', -8, -1) . "<br />\n";

$photo = 'photos/5.jpg';
$s = 's';
echo "Оригинал: $photo<hr />\n";
echo substr_replace($photo, $s, -4, 0) . "<br />\n";
