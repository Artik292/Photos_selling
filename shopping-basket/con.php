<?php

require '../vendor/autoload.php';

class Photo extends \atk4\data\Model {
    public $table = 'photos';
    function init() {
        parent::init();
        $this->addField('date',['type'=>'date']);
        $this->addField('value',['type'=>'money']);
        $this->addField('photo_id');
    }
}

function bask_add ($p) {
    If (isset($_SESSION[$p['id'].'_count'])) {
        $_SESSION[$p['id'].'_count']++;
    } else {
        $_SESSION[$p['id'].'_count'] = 1;
    }
}

if (isset($_ENV['CLEARDB_DATABASE_URL'])){
    $db = \atk4\data\Persistence::connect($_ENV['CLEARDB_DATABASE_URL']);
} else {
    $db = \atk4\data\Persistence::connect('mysql:host=localhost;dbname=photo_selling','root','');
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

/**
 * Making watermark
 */
  function mark($photo)
  {
    $stamp = imagecreatefrompng('photos/w.png');
    $im = imagecreatefromjpeg($photo);
    $sx = imagesx($stamp);
    $sy = imagesy($stamp);
    $pleasework = imagecopy($im, $stamp, 0, 0, 0, 0, imagesx($stamp), imagesy($stamp));
    //header('Content-type: image/png');
    imagepng($im,$photo);
    //imagedestroy($im);
  }

/*

{
  $stamp = imagecreatefrompng('photos/watermark.png');
  $im = imagecreatefromjpeg($photo);
  $marge_right = 1;
  $marge_bottom = 1;
  $sx = imagesx($stamp);
  $sy = imagesy($stamp);
  $pleasework = imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));
  header('Content-type: image/png');
  imagepng($im);
  imagedestroy($im);
}

*/
