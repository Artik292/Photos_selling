<?php

namespace photoselling;

session_start();

require '../vendor/autoload.php';
require 'narrow.php';

class App extends \atk4\ui\App
{
    public $db;
    function __construct($interface)
    {
        parent::__construct('Photo Selling');

        $config = [];
        //include '../config.php';
        date_default_timezone_set('UTC');
        if (isset($_ENV['CLEARDB_DATABASE_URL'])) {
             $this->db = \atk4\data\Persistence::connect($_ENV['CLEARDB_DATABASE_URL']);
         } else {
             //$this->db = \atk4\data\Persistence::connect('mysql:host=localhost;dbname=photo_selling','root','');
             $this->db = \atk4\data\Persistence::connect('mysql:host=127.0.0.1;dbname=Photo_selling','root','');
         }
        switch ($interface) {
            case 'admin':
                $this->initLayout('Admin');
                $submenu = $this->layout->menuLeft;
                $submenu->addItem('user', ['user']);
                $submenu->addItem('event', ['event']);
                $submenu->addItem('photographer', ['photographer']);
                $submenu = $this->layout->menuLeft->addGroup('Misc');
                $submenu->addItem('format', ['format']);
                break;
            case 'centered':
                //$this->initLayout(new Narrow());
                $this->initLayout('Centered');
                $this->layout->template->del('Header');
                $logo = 'https://images.ru.prom.st/528754_w0_h0_kran_bashennyj.png';
                $this->layout->add(['Image',$logo,'small centered'],'Header');
                //$this->layout->add(['Label','Work','red right'],'Header');
                $this->layout->add([
                    'Header',
                    'Photo selling',
                    'size'=>'huge',
                    'aligned' => 'center',
                    ], 'Header');
                break;
            //default:
              //  throw new Exception('No such interface');
        }
        function bask_add ($p)
        {
            If (isset($_SESSION[$p['id'].'_count'])) {
                $_SESSION[$p['id'].'_count']++;
            } else {
                $_SESSION[$p['id'].'_count'] = 1;
            }
        }
    }
}
