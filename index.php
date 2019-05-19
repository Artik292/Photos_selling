<?php
require 'src/App.php';
$app = new \photoselling\App('centered');

/*
if (isset($_ENV['CLEARDB_DATABASE_URL'])) {
     $db = \atk4\data\Persistence::connect($_ENV['CLEARDB_DATABASE_URL']);
 } else {
     $db = \atk4\data\Persistence::connect('mysql:host=127.0.0.1;dbname=Photo_selling','root','');
 }*/

 require 'src/Gallery.php';

 //$app->add(new Gallery);


/* NEW TRY */

require 'look.html';
//require 'css/style.css';

 $photos = [
    "1" => "https://pp.userapi.com/c844418/v844418511/db7be/Emj5fhWQ4og.jpg",
    "2" => "https://pp.userapi.com/c844418/v844418511/db7c5/djTaHYnMrS8.jpg",
    "3" => "https://pp.userapi.com/c844418/v844418511/db7cd/_4buQDuRMF0.jpg",
    "4" => "https://pp.userapi.com/c844418/v844418511/db7d5/GixwMggfCUY.jpg",
    "5" => "https://pp.userapi.com/c844418/v844418511/db7dd/Lo09ruxV_X0.jpg",  // place for Azure
    "6" => "https://pp.userapi.com/c844418/v844418511/db7e4/XZleg-4kGsc.jpg",
    "7" => "https://pp.userapi.com/c844418/v844418511/db7eb/x57AX8EqlcA.jpg",
    "8" => "https://pp.userapi.com/c844418/v844418511/db7f2/nKQ8YBaM444.jpg",
    "9" => "https://pp.userapi.com/c844418/v844418511/db7f9/gwaf6zcDquo.jpg",
    "10"=> "https://pp.userapi.com/c844418/v844418511/db800/68QFgFpM8uA.jpg"
];

foreach ($photos as $photo) {
  $gallery = $app->add(new Gallery());
  $gallery->add($photo);

  $vir = $app->add('VirtualPage');
  $vir->set(function($vir) {
      $vir->add(['Label',"It's work!",'big green']);
  });

  $gallery->on('click', new \atk4\ui\jsModal('New Folder',$vir));
  //$_SESSION['photo_image'] = $photo;
  //$_SESSION['photo_link'] = $photo;
}

$app->add(['ui'=>'divider']);

$view = $app->add(['View','Test']);
$vir = $app->add('VirtualPage');
$vir->set(function($vir) {
    $vir->add(['Label',"It's work!",'big green']);
});

$view->on('click', new \atk4\ui\jsModal('New Folder',$vir));


/* END OF NEW TRY*/


/*
require 'src/Model/user.php';
require 'src/Model/order.php';
require 'src/Model/photographer.php';
require 'src/Model/event.php';
require 'src/Model/photo.php';
require 'src/Model/format.php';
require 'src/Model/photo_order.php';

$app->add(['CRUD'])->setModel(new photoselling\Model\photographer($db));
$app->add(['CRUD'])->setModel(new photoselling\Model\event($db));
$app->add(['CRUD'])->setModel(new photoselling\Model\photo($db));
$app->add(['CRUD'])->setModel(new photoselling\Model\user($db));
$app->add(['CRUD'])->setModel(new photoselling\Model\order($db));
$app->add(['CRUD'])->setModel(new photoselling\Model\format($db));
$app->add(['CRUD'])->setModel(new photoselling\Model\photo_order($db));
*/

$app->add(['ui'=>'divider']);

$app->add(['Button','Admin','icon'=>'user'])->link('admin.php?id=user');
