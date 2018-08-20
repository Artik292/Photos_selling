<?php

namespace photoselling\Model;

class user extends \atk4\data\Model
{
    public $table = 'user';
    public $caption = 'User';
    function init()
    {
        parent::init();

        // Field Declarations
        $this->addField('name', ['type' => 'string']);
        $this->addField('email', ['type' => 'string']);
        $this->addField('password', ['type' => 'string']);
        $this->hasMany('order', new order());
    }
}
