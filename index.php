<?php
require 'vendor/autoload.php';
$app = new \atk4\ui\App('Загрузить фотографии');
$app->initLayout('Centered');

use League\Flysystem\Filesystem;
use League\Flysystem\Adapter\Local;

$db= \atk4\data\Persistence::connect($_ENV['CLEARDB_DATABASE_URL']);

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
$col->js(true, new \atk4\ui\jsExpression('setInterval(function() { []; }, 2000)', [$gr->jsReload()]));
