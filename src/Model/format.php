<?php

namespace photoselling\Model;

class format extends \atk4\data\Model
{
    public $table = 'format';
    public $caption = 'Format';
    function init()
    {
        parent::init();

        // Field Declarations
        $this->addField('name', ['type' => 'string']);
        $this->addField('price', ['type' => 'money']);
        $this->addField('width', ['type' => 'float', 'caption' => 'Width (cm)']);
        $this->hasMany('photo-order', new photo_order());
        $this->addField('height', ['type' => 'number', 'caption' => 'Height (cm)']);
    }
}
