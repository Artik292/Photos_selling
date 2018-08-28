<?php

namespace photoselling;

session_start();

require '../vendor/autoload.php';
<<<<<<< HEAD
<<<<<<< HEAD
require 'narrow.php';
=======
>>>>>>> f8b10895eeafc5156800884021657eca416c9362
=======
>>>>>>> f8b10895eeafc5156800884021657eca416c9362

class App extends \atk4\ui\App
{
    public $db;
    function __construct($interface)
    {
        parent::__construct('Photo Selling');

        $config = [];
<<<<<<< HEAD
<<<<<<< HEAD
        //include '../config.php';
=======
        include '../config.php';
>>>>>>> f8b10895eeafc5156800884021657eca416c9362
=======
        include '../config.php';
>>>>>>> f8b10895eeafc5156800884021657eca416c9362
        date_default_timezone_set('UTC');
        if (isset($_ENV['CLEARDB_DATABASE_URL'])) {
             $this->db = \atk4\data\Persistence::connect($_ENV['CLEARDB_DATABASE_URL']);
         } else {
<<<<<<< HEAD
<<<<<<< HEAD
             //$this->db = \atk4\data\Persistence::connect('mysql:host=localhost;dbname=photo_selling','root','');
             $this->db = \atk4\data\Persistence::connect('mysql:host=127.0.0.1;dbname=Photo_selling','root','');
=======
             $this->db = \atk4\data\Persistence::connect('mysql:host=localhost;dbname=photo_selling','root','');
>>>>>>> f8b10895eeafc5156800884021657eca416c9362
=======
             $this->db = \atk4\data\Persistence::connect('mysql:host=localhost;dbname=photo_selling','root','');
>>>>>>> f8b10895eeafc5156800884021657eca416c9362
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
<<<<<<< HEAD
<<<<<<< HEAD
                //$this->initLayout(new Narrow());
                $this->initLayout('Centered');
                $this->layout->template->del('Header');
                $logo = 'https://images.ru.prom.st/528754_w0_h0_kran_bashennyj.png';
=======
                $this->initLayout('Centered');
                $this->layout->template->del('Header');
                $logo = 'logo.png';
>>>>>>> f8b10895eeafc5156800884021657eca416c9362
=======
                $this->initLayout('Centered');
                $this->layout->template->del('Header');
                $logo = 'logo.png';
>>>>>>> f8b10895eeafc5156800884021657eca416c9362
                $this->layout->add(['Image',$logo,'small centered'],'Header');
                //$this->layout->add(['Label','Work','red right'],'Header');
                $this->layout->add([
                    'Header',
                    'Photo selling',
                    'size'=>'huge',
                    'aligned' => 'center',
                    ], 'Header');
                break;
<<<<<<< HEAD
<<<<<<< HEAD
            //default:
              //  throw new Exception('No such interface');
=======
            default:
                throw new Exception('No such interface');
>>>>>>> f8b10895eeafc5156800884021657eca416c9362
=======
            default:
                throw new Exception('No such interface');
>>>>>>> f8b10895eeafc5156800884021657eca416c9362
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
