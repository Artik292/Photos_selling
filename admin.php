<?php
require 'src/App.php';
$app = new \photoselling\App('admin');

$id = $_GET['id'];

 require 'src/Model/user.php';
 require 'src/Model/order.php';
 require 'src/Model/photographer.php';
 require 'src/Model/event.php';
 require 'src/Model/photo.php';
 require 'src/Model/format.php';
 require 'src/Model/photo_order.php';
 /*



TEST FOT PULL REQUEST

new line




 */

switch ($id) {
  case 'user':
    $app->add(['CRUD'])->setModel(new photoselling\Model\user($app->db));
  break;
  case 'order':
    $app->add(['CRUD'])->setModel(new photoselling\Model\order($app->db));
  break;
  case 'photographer':
      $app->add(['CRUD'])->setModel(new photoselling\Model\photographer($app->db));
  break;
  case 'event':
    $app->add(['CRUD'])->setModel(new photoselling\Model\event($app->db));
  break;
  case 'photo':
    $app->add(['CRUD'])->setModel(new photoselling\Model\photo($app->db));
  break;
  case 'format':
    $app->add(['CRUD'])->setModel(new photoselling\Model\format($app->db));
  break;
  case 'photo-order':
    $app->add(['CRUD'])->setModel(new photoselling\Model\photo_order($app->db));
  break;

  default:
    unset($_SESSION['status']); //add more if you need
    Header('Location: index.php');
  break;
}
