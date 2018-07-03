<?php

require 'start.php';
//list($token) = $webAuth->finish($_GET);
$token = $_GET['code'];
//var_dump ($token);
/*$store = $db->prepare("
  UPDATE users
  SET token = :token
  WHERE id = :user_id
");

$store->execute([
  'token' => $token,
  'user_id' => $_SESSION['user_id']
]); */


$user = new User($db);
$user->tryLoadBy('id',$_SESSION['user_id']);
$user['token'] = $token;
$user->save();

header('Location: index.php');
