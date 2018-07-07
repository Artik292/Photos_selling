<?php
session_start();
$_SESSION['a'] = 1;
require '../vendor/autoload.php';

$app = new \atk4\ui\App('Тест корзины');
$app->initLayout('Centered');

$label = $app->add(['Label',$_SESSION['a']]);

$app->add(['Button','+','massive green'])
  ->on('click',  function() use($app,$label) {
    $_SESSION['a']++;
    $label->set($_SESSION['a']);
    return new \atk4\ui\jsReload($label);
  });
