<?php

//require_once "../vendor/dropbox-sdk/Dropbox/autoload.php";
require 'start.php';
require 'dropbox_auth.php';
$client = new Dropbox\Client($user->dropbox_token, $appName, 'UTF-8');
//$client->getAccountInfo();
var_dump ($client->getAccountInfo());

/*$file = fopen('space.jpg', 'rb');
$size = filesize('space.jpg');

$client->uploadFile('/work.jpg', Dropbox\WriteMode::add(), $file, $size);
*/
