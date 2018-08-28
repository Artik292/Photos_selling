<?php

namespace photoselling\Model;

class photographer extends \atk4\data\Model
{
    public $table = 'photographer';
    public $caption = 'Photographer';
    function init()
    {
        parent::init();

        // Field Declarations
        $this->addField('name', ['type' => 'string']);
        $this->addField('email', ['type' => 'string']);
        $this->addField('password', ['type' => 'string']);

        // Extra Relations
        $this->hasMany('events', new event());
    }
}
