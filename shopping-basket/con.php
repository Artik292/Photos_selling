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
