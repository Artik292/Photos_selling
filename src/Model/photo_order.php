<?php

namespace photoselling\Model;

class photo_order extends \atk4\data\Model
{
    public $table = 'photo-order';
    public $title_field = 'id';
    public $caption = 'Photo order';
    function init()
    {
        parent::init();

        // Field Declarations
        $this->hasOne('format_id',new format())->addTitle();
        $this->hasOne('photo_id', new photo())->addTitle();
        $this->hasOne('order_id', new order())->addTitle();
        $this->getRef('order_id')->addField('order_is_paid', 'is_paid');
    }
}
