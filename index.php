<?php
require 'src/App.php';
$app = new \photoselling\App('centered');
//$app->initLayout('Centered');

/*use League\Flysystem\Filesystem;
use League\Flysystem\Adapter\Local;

//$db= \atk4\data\Persistence::connect($_ENV['CLEARDB_DATABASE_URL']);

$adapter = new Local(__DIR__.'/localfiles');
$app->filesystem = new Filesystem($adapter);
class Photo extends \atk4\data\Model {
    public $table = 'photos';
    function init() {
        parent::init();
        $this->addField('name');
        $this->addField('file_id');
        $this->addField('file', new \atk4\filestore\Field\File($this->app->filesystem));
        $this->addField('file2', new \atk4\filestore\Field\File($this->app->filesystem));
    }
}
$col = $app->add('Columns');
$form = $col->addColumn()->add('Form');
$form->setModel(new Photo($db));
$form->model->tryLoad(1);
$gr = $col->addColumn()->add(['Grid', 'menu'=>false, 'paginator'=>false]);
$gr->setModel(new \atk4\filestore\Model\File($db));
$col->js(true, new \atk4\ui\jsExpression('setInterval(function() { []; }, 2000)', [$gr->jsReload()])); */
//Header('Location: main.php');

if (isset($_ENV['CLEARDB_DATABASE_URL'])) {
     $db = \atk4\data\Persistence::connect($_ENV['CLEARDB_DATABASE_URL']);
 } else {
     $db = \atk4\data\Persistence::connect('mysql:host=127.0.0.1;dbname=Photo_selling','root','');
 }

 require 'src/Gallery.php';

 //$app->add(new Gallery);


/* NEW TRY */

require 'look.html';

 $photos = [
    "1" => "https://pp.userapi.com/c844418/v844418511/db7be/Emj5fhWQ4og.jpg",
    "2" => "https://pp.userapi.com/c844418/v844418511/db7c5/djTaHYnMrS8.jpg",
    "3" => "https://pp.userapi.com/c844418/v844418511/db7cd/_4buQDuRMF0.jpg",
    "4" => "https://pp.userapi.com/c844418/v844418511/db7d5/GixwMggfCUY.jpg",
    "5" => "https://pp.userapi.com/c844418/v844418511/db7dd/Lo09ruxV_X0.jpg",  // place for DropBox
    "6" => "https://pp.userapi.com/c844418/v844418511/db7e4/XZleg-4kGsc.jpg",
    "7" => "https://pp.userapi.com/c844418/v844418511/db7eb/x57AX8EqlcA.jpg",
    "8" => "https://pp.userapi.com/c844418/v844418511/db7f2/nKQ8YBaM444.jpg",
    "9" => "https://pp.userapi.com/c844418/v844418511/db7f9/gwaf6zcDquo.jpg",
    "10"=> "https://pp.userapi.com/c844418/v844418511/db800/68QFgFpM8uA.jpg"
];

foreach ($photos as $photo) {
  $app->add(new Gallery());
  $_SESSION['photo_image'] = $photo;
  $_SESSION['photo_link'] = $photo;
}


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
