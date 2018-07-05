<?php

session_start();
$_SESSION['user_id'] = 1;
require '../vendor/autoload.php';

$dropboxKey = '8w78wmexjuwb1fs';
$dropboxSecret = '16ks4zp4z00nhsk';
$appName = 'photo_selling';

$appInfo = new Dropbox\AppInfo($dropboxKey, $dropboxSecret);

$csrfTokenStore = new Dropbox\ArrayEntryStore($_SESSION, 'dropbox-auth-csrf-token');

$webAuth = new Dropbox\WebAuth($appInfo, $appName, 'http://localhost/Photos_selling/dropbox/finish.php',$csrfTokenStore);
  if (isset($_ENV['CLEARDB_DATABASE_URL'])){
      $db = new PDO($_ENV['CLEARDB_DATABASE_URL']);
  } else {
      $db = new PDO('mysql:host=localhost;dbname=photo_selling','root','');
  }
$user = $db->prepare("SELECT * FROM users WHERE id = :user_id");
$user->execute(['user_id' => $_SESSION['user_id']]);
$user = $user->fetchObject();
var_dump ($user);
