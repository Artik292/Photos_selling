<?php

namespace photoselling\Model;

class order extends \atk4\data\Model
{
    public $table = 'order';
    public $caption = 'Order';
    function init()
    {
        parent::init();

        // Field Declarations
        $this->addField('ref', ['type' => 'string']);
        $this->addField('name', ['type' => 'string']);
        $this->addField('date', ['type' => 'datetime']);
        $this->addField('amount', ['type' => 'money']);
        $this->addField('is_paid', ['type' => 'boolean']);
        $this->addField('vat', ['type' => 'money', 'caption' => 'VAT']);

        // Extra Relations
        $this->hasMany('photo_order', new photo_order());
        $this->hasOne('user_id',new user())->addTitle();
    }
}
