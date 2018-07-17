<?php
session_start();
if (!(isset($_SESSION['sum']))) {
    $_SESSION['sum'] = 0;
}
require 'con.php';

$app = new \atk4\ui\App('Тест корзины');
$app->initLayout('Centered');

for ($n=0; $n < 1000; $n++) {
    if (isset($_SESSION[$n.'_count'])) {
      $p = new Photo($db);
      $p->load($n);
      $app->add(['Label',$_SESSION[$n.'_count'],'big fluid','image'=>'photos/'.$p['photo_id'].'s.jpg']);
    }
}

  $app->add(['Button',$_SESSION['sum'],'green fluid'])->link(['pay']);
