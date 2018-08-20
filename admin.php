<?php
require 'vendor/autoload.php';
$app = new \atk4\ui\App('Загрузить фотографии');
$app->initLayout('Admin');

$app->layout->leftMenu->addItem(['Users','icon'=>'user circle'],['admin','id'=>'user']);
$app->layout->leftMenu->addItem(['Order','icon'=>'user circle'],['admin','id'=>'order']);
$app->layout->leftMenu->addItem(['Photographer','icon'=>'user circle'],['admin','id'=>'photographer']);
$app->layout->leftMenu->addItem(['Event','icon'=>'user circle'],['admin','id'=>'event']);
$app->layout->leftMenu->addItem(['Photo','icon'=>'user circle'],['admin','id'=>'photo']);
$app->layout->leftMenu->addItem(['Format','icon'=>'user circle'],['admin','id'=>'format']);
$app->layout->leftMenu->addItem(['Photo_order','icon'=>'user circle'],['admin','id'=>'photo-order']);

$id = $_GET['id'];

if (isset($_ENV['CLEARDB_DATABASE_URL'])) {
     $db = \atk4\data\Persistence::connect($_ENV['CLEARDB_DATABASE_URL']);
 } else {
     $db = \atk4\data\Persistence::connect('mysql:host=127.0.0.1;dbname=Photo_selling','root','');
 }

 require 'src/Model/user.php';
 require 'src/Model/order.php';
 require 'src/Model/photographer.php';
 require 'src/Model/event.php';
 require 'src/Model/photo.php';
 require 'src/Model/format.php';
 require 'src/Model/photo_order.php';


switch ($id) {
  case 'user':
    $CRUD=$app->layout->add(['CRUD']);
    $CRUD->setModel(new photoselling\Model\user($db));
    $CRUD->addQuickSearch(['name']);
  break;
  case 'order':
    $app->add(['CRUD'])->setModel(new photoselling\Model\order($db));
  break;
  case 'photographer':
      $app->add(['CRUD'])->setModel(new photoselling\Model\photographer($db));
  break;
  case 'event':
    $app->add(['CRUD'])->setModel(new photoselling\Model\event($db));
  break;
  case 'photo':
    $app->add(['CRUD'])->setModel(new photoselling\Model\photo($db));
  break;
  case 'format':
    $app->add(['CRUD'])->setModel(new photoselling\Model\format($db));
  break;
  case 'photo-order':
    $app->add(['CRUD'])->setModel(new photoselling\Model\photo_order($db));
  break;

  default:
    unset($_SESSION['status']); //add more if you need
    Header('Location: index.php');
  break;
}
