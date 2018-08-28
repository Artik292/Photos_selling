<?php

namespace photoselling\Model;

class photo extends \atk4\data\Model
{
    public $table = 'photo';
    public $caption = 'Photo';
    function init()
    {
        parent::init();

        // Field Declarations
        $this->addField('name', ['type' => 'string']);
        $this->addField('image_orig', ['type' => 'string']);
        $this->addField('image', ['type' => 'string']);
        $this->hasOne('event_id', new event())->addTitle();

        // Extra Relations
        $this->hasMany('photo_order', new photo_order());
    }
}
