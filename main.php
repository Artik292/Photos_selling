<?php
/*require 'vendor/autoload.php';
$app = new \atk4\ui\App('Photos');
$app->initLayout('Centered');*/
//$app->add[('Card','Hello word')];
$stamp = imagecreatefrompng('https://upload.wikimedia.org/wikipedia/commons/4/47/PNG_transparency_demonstration_1.png');
$im = imagecreatefromjpeg('https://envato-shoebox-0.imgix.net/2a41/93b3-6f8b-4f1c-8767-cd9772b4ded7/kave+310.jpg?w=500&h=278&fit=crop&crop=edges&auto=compress%2Cformat&s=fbc0d75299d7cfda0b3c60ea52ba4aaf');


$marge_right = 1;
$marge_bottom = 1;
$sx = imagesx($stamp);
$sy = imagesy($stamp);


imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));

header('Content-type: image/png');
imagepng($im);
imagedestroy($im);
