<?php

 if ($user->dropbox_token) {
      $client = new Dropbox\Client($user->dropbox_token, $appName, 'UTF-8');

        //doesn't work as I expected

      /* try {
          $a = $client->getAccountInfo();
        } catch (Dropbox\Exception_InvalidAccessToken $e) {
          $authUrl = $webAuth->start();
          header('Location: '.$authUrl);
          exit();
        } */

 } else {
   $authUrl = $webAuth->start();
   header('Location: '.$authUrl);
   exit();
 }
