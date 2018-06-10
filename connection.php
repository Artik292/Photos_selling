<?php
require 'vendor/autoload.php';

class Img extends \atk4\data\Model {
    public $table = 'test';

    function init() {
        parent::init();
        $this->addField('file', new \atk4\filestore\Field\File($this->app->filesystem));
        $img = $this->addField('img'
        ,['UploadImg', ['defaultSrc' => './images/default.png', 'placeholder' => 'Click to add an image.']]
      );
        $img->onUpload(function ($files) use ($form, $img) {
            if ($files === 'error') {
                return $form->error('img', 'Error uploading image.');
            }
            //Do file processing here...
            $img->setThumbnailSrc('./images/'.$file_name);
            $img->setFileId('123456');
            // can also return a notifier.
            return new atk4\ui\jsNotify(['content' => 'File is uploaded!', 'color' => 'green']);
        });
        $img->onDelete(function ($fileId) use ($img) {
          //reset thumbanil
          $img->clearThumbnail('./images/default.png');

          return new atk4\ui\jsNotify(['content' => $fileId.' has been removed!', 'color' => 'green']);
        });
    }
}



$app = new \atk4\ui\App('Upload');
$app->initLayout('Centered');
//$adapter = new Local(__DIR__.'/localfiles');
$app->filesystem = new Filesystem($adapter);
$seg1 =  new \atk4\ui\View(['ui'=>'segment']);
$seg2 =  new \atk4\ui\View(['ui'=>'segment']);
//$col = $seg1->add('Columns');
//$col_search = $col->addColumn(12);
//$col_log = $col->addColumn(4);
$db = \atk4\data\Persistence::connect('mysql:host=127.0.0.1;dbname=test;charset=utf8', 'MySite','12345');
