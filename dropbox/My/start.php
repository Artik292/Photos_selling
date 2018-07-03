<?php

session_start();
$_SESSION['user_id'] = 1;

$key = "8w78wmexjuwb1fs";
$secret = "16ks4zp4z00nhsk";
$app_name = "photo-selling";

require '../vendor/autoload.php';

$appInfo = new Dropbox\AppInfo($key,$secret);

$token = new Dropbox\ArrayEntryStore($_SESSION ,'dropbox-auth-csrt-token');

$webAuth = new Dropbox\WebAuth($appInfo,$app_name,"http://localhost/Photos_selling/dropbox/finish.php",$token);

//$db = new PDO('mysql:host=127.0.0.1;dbname=photo_selling;charset=utf8', 'root', '');

/*$user = $db->prepare("SELECT * FROM dropbox WHERE id = :user_id");
$user->execute(['user_id' => $_SESSION['user_id']]);
$user = $user->fetchObject(); */

if (isset($_ENV['CLEARDB_DATABASE_URL'])) {
     $db = \atk4\data\Persistence::connect($_ENV['CLEARDB_DATABASE_URL']);
 } else {
     $db = \atk4\data\Persistence::connect('mysql:host=127.0.0.1;dbname=photo_selling;charset=utf8', 'root', '');
 }

class User extends \atk4\data\Model {
public $table = 'dropbox';
function init() {
	parent::init();
	$this->addField('user_name');
  $this->addField('token');
}
}

$user = new User($db);
$user->tryLoadBy('id',$_SESSION['user_id']);
//header("Location: ".'auth.php');

// var_dump($user);
