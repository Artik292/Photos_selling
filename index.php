<?php
require 'src/App.php';
$app = new \photoselling\App('centered');
//$app->initLayout('Centered');

require 'src/Model/user.php';
require 'src/Model/order.php';
require 'src/Model/photographer.php';
require 'src/Model/event.php';
require 'src/Model/photo.php';
require 'src/Model/format.php';
require 'src/Model/photo_order.php';



require 'src/Model/user.php';
require 'src/Model/order.php';
require 'src/Model/photographer.php';
require 'src/Model/event.php';
require 'src/Model/photo.php';
require 'src/Model/format.php';
require 'src/Model/photo_order.php';



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

<<<<<<< HEAD
=======
if (isset($_ENV['CLEARDB_DATABASE_URL'])) {
     $db = \atk4\data\Persistence::connect($_ENV['CLEARDB_DATABASE_URL']);
 } else {
     $db = \atk4\data\Persistence::connect('mysql:host=127.0.0.1;dbname=Photo_selling','root','');
 }

>>>>>>> f8b10895eeafc5156800884021657eca416c9362
 require 'src/Gallery.php';

 $app->add(new Gallery());

/*$app->add(['CRUD'])->setModel(new photoselling\Model\photographer($db));
$app->add(['CRUD'])->setModel(new photoselling\Model\event($db));
$app->add(['CRUD'])->setModel(new photoselling\Model\photo($db));
$app->add(['CRUD'])->setModel(new photoselling\Model\user($db));
$app->add(['CRUD'])->setModel(new photoselling\Model\order($db));
$app->add(['CRUD'])->setModel(new photoselling\Model\format($db));
$app->add(['CRUD'])->setModel(new photoselling\Model\photo_order($db)); */

$app->add(['ui'=>'divider']);

$app->add(['Button','Admin','icon'=>'user'])->link('admin.php?id=user');
