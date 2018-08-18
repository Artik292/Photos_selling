<?php

require '../vendor/autoload.php';

session_start();

class App extends \atk4\ui\App {
    public $db;
    function __construct() {
        parent::__construct('Тест корзины');
            $this->initLayout('Centered');
            $this->layout->template->del('Header');
            $logo = 'logo.png';
            $this->layout->add(['Image',$logo,'small centered'],'Header');
            //$this->layout->add(['Label','Work','red right'],'Header');
            $this->layout->add([
                'Header',
                'Тест корзины',
                'size'=>'huge',
                'aligned' => 'center',
            ], 'Header');
       if (isset($_ENV['CLEARDB_DATABASE_URL'])) {
            $this->db = \atk4\data\Persistence::connect($_ENV['CLEARDB_DATABASE_URL']);
        } else {
            $this->db = \atk4\data\Persistence::connect('mysql:host=localhost;dbname=photo_selling','root','');
        }
}
            function mark($photo)
            {
              $image = new SimpleImage();
              $image->load($photo);
              $image->resize(440, 333);
              $photo = substr_replace($photo, 's', -4, 0);
              $image->save($photo);
              $stamp = imagecreatefrompng('photos/w.png');
              $im = imagecreatefromjpeg($photo);
              $sx = imagesx($stamp);
              $sy = imagesy($stamp);
              $pleasework = imagecopy($im, $stamp, 0, 0, 0, 0, imagesx($stamp), imagesy($stamp));
              imagepng($im,$photo);
              imagedestroy($im);
            }

            function bask_add ($p)
            {
                If (isset($_SESSION[$p['id'].'_count'])) {
                    $_SESSION[$p['id'].'_count']++;
                } else {
                    $_SESSION[$p['id'].'_count'] = 1;
                }
            }
}


class SimpleImage {

   var $image;
   var $image_type;

   function load($filename) {
      $image_info = getimagesize($filename);
      $this->image_type = $image_info[2];
      if( $this->image_type == IMAGETYPE_JPEG ) {
         $this->image = imagecreatefromjpeg($filename);
      } elseif( $this->image_type == IMAGETYPE_GIF ) {
         $this->image = imagecreatefromgif($filename);
      } elseif( $this->image_type == IMAGETYPE_PNG ) {
         $this->image = imagecreatefrompng($filename);
      }
   }
   function save($filename, $image_type=IMAGETYPE_JPEG, $compression=75, $permissions=null) {
      if( $image_type == IMAGETYPE_JPEG ) {
         imagejpeg($this->image,$filename,$compression);
      } elseif( $image_type == IMAGETYPE_GIF ) {
         imagegif($this->image,$filename);
      } elseif( $image_type == IMAGETYPE_PNG ) {
         imagepng($this->image,$filename);
      }
      if( $permissions != null) {
         chmod($filename,$permissions);
      }
   }
   function output($image_type=IMAGETYPE_JPEG) {
      if( $image_type == IMAGETYPE_JPEG ) {
         imagejpeg($this->image);
      } elseif( $image_type == IMAGETYPE_GIF ) {
         imagegif($this->image);
      } elseif( $image_type == IMAGETYPE_PNG ) {
         imagepng($this->image);
      }
   }
   function getWidth() {
      return imagesx($this->image);
   }
   function getHeight() {
      return imagesy($this->image);
   }
   function resizeToHeight($height) {
      $ratio = $height / $this->getHeight();
      $width = $this->getWidth() * $ratio;
      $this->resize($width,$height);
   }
   function resizeToWidth($width) {
      $ratio = $width / $this->getWidth();
      $height = $this->getheight() * $ratio;
      $this->resize($width,$height);
   }
   function scale($scale) {
      $width = $this->getWidth() * $scale/100;
      $height = $this->getheight() * $scale/100;
      $this->resize($width,$height);
   }
   function resize($width,$height) {
      $new_image = imagecreatetruecolor($width, $height);
      imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
      $this->image = $new_image;
   }
}

/*$rez = array(
    '1'  => '1980x1920',
    '2' => '1280x1024',
    '3' => '1600x900',
  ); */

  $rez = array('1'=>array('rez'=>'1980x1920', 'value'=>'15'),
               '2'=>array('rez'=>'1280x1024', 'value'=>'10'),
               '3'=>array('rez'=>'1600x900', 'value'=>'5'));
