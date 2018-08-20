<?php

namespace photoselling\Model;

class event extends \atk4\data\Model
{
    public $table = 'event';
    public $caption = 'Event';
    function init()
    {
        parent::init();

        // Field Declarations
        $this->addField('name', ['type' => 'string']);
        $this->addField('event_date', ['type' => 'date']);
        $this->addField('category', ['enum' => ['wedding', 'school trip', 'graduation', 'aniversary']]);
        $this->hasOne('photographer_id', new photographer())->addTitle();

        // Extra Relations
        $this->hasMany('photo', new photo());
    }
}
