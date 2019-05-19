<?php

class Gallery extends \atk4\ui\View
{
    //public $defaultTemplate = __DIR__.'/../look.html';
    public $defaultTemplate = __DIR__.'/../photo.html';
    //function __construct($link)
    function init()
    {
        parent::init();
        //parent::__construct();
        //$this->template['photo'] = $_SESSION['photo_image'];
        //$this->template['link'] = $_SESSION['photo_link'];

        /*$this->template['photo1'] = 'https://tiles.trulia.com/tiles/median_age/9/135/196.png';
        $this->template['photo2'] = 'https://tiles.trulia.com/tiles/home_prices_listings/9/102/196.png';
        $this->template['photo3'] = 'https://tiles.trulia.com/tiles/median_age/9/135/196.png';
        $this->template['photo4'] = 'https://tiles.trulia.com/tiles/home_prices_listings/9/102/196.png';
        $this->template['photo5'] = 'https://tiles.trulia.com/tiles/median_age/9/135/196.png';
        $this->template['photo6'] = 'https://tiles.trulia.com/tiles/home_prices_listings/9/102/196.png'; */
    }
    function add($photo)
    {
      $this->template['photo'] = $photo;
      //$this->template['link'] = $photo;
    }
}
