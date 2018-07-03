<?php

//require 'start.php';

//echo $user['token'];

if (($user['token']) != NULL) {
    $client = new Dropbox\Client($user['token'],$app_name,'UTF-8');

    try {
      $client->getAccountInfo();
      }
      catch (Dropbox\Exception_InvalidAccessToken $e) {
      $authUrl = $webAuth->start();
      //var_dump ($user);
      header('Location: '.$authUrl);
      exit();
    }
} else {
    $authUrl = $webAuth->start();
    //echo ' Does not work';
    header("Location: ".$authUrl);
    exit();
}

//   "ext-gd":"*",
//  "h4cc/wkhtmltopdf-i386": "*",
