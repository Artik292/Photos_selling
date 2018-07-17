<?php
session_start();
if (!(isset($_SESSION['sum']))) {
    $_SESSION['sum'] = 0;
}
require 'con.php';

//echo $_SESSION['sum'];

$app = new \atk4\ui\App('Тест корзины');
$app->initLayout('Centered');


//////////////////////////////FOR CONNECTION////////////////////////////////



////////////////////////////////////////////////////////////////////////

$app->add(['CRUD'])->setModel(new Photo($db));

If ((($_SESSION['sum']*10) % 10) == 0) {
    $Button = $app->add(['Label',$_SESSION['sum'].' €','big red right ribbon','icon'=>'shopping cart']);
} else {
    $Button = $app->add(['Label',$_SESSION['sum'].'0 €','big red right ribbon','icon'=>'shopping cart']);
}
$Button->link(['basket']);

$photo = new Photo($db);

$app->add(['ui'=>'hidden divider']);

$page = $app->add(['View', 'id' => 'example']);

$c = $page->add(new \atk4\ui\Columns());
$c1 = $c->addColumn(); //->add(['LoremIpsum', 1]);
$c2 = $c->addColumn(); //->add(['LoremIpsum', 1]);
$c3 = $c->addColumn(); //->add(['LoremIpsum', 1]);

$app->add(['ui'=>'hidden divider']);

//$app->add(['Card'])->setModel((new Photo($db))->tryLoadAny());

$i=1;
$image = new SimpleImage();

foreach ($photo as $p) {
  switch ($i) {
    case "1":
        $view = $c1->add(['View']);
        $i++;
        break;
    case "2":
        $view = $c2->add(['View']);
        $i++;
        break;
    case "3":
        $view = $c3->add(['View']);
        $i = 1;
        $c1->add(['ui'=>'hidden divider']);
        $c2->add(['ui'=>'hidden divider']);
        $c3->add(['ui'=>'hidden divider']);
        break;
}
      $image->load('photos/'.$p['photo_id'].'.jpg');
      $image->resize(440, 333);
      $image->save('photos/'.$p['photo_id'].'s.jpg');
      mark('photos/'.$p['photo_id'].'s.jpg');
      $view->add(['Image','photos/'.$p['photo_id'].'s.jpg','small']);
      If ((($p['value']*10) % 10) == 0) {
          $B = $view->add(['Button',$p['value'].' €','massive green tag']);
      } else {
          $B = $view->add(['Button',$p['value'].'0 €','massive green tag']);
      }
      $B->on('click',  function() use($app,$Button,$p) {
      $_SESSION['sum'] = $_SESSION['sum']+$p['value'];
      $Button->set($_SESSION['sum']);
      bask_add($p);
      //Header ('Location index.php');
      return new \atk4\ui\jsExpression('document.location = "index.php" ');
    });
}

$app->add(['Button','Reset'])->on('click', function($app) {
$_SESSION['sum'] = 0;
return new \atk4\ui\jsExpression('document.location = "index.php" ');
});

/*$app->add(['Button','Do watermark'])->on('click', function($app) {
  $image = new SimpleImage();
  $image->load('photos/w.png');
  //$image->scale(100);         Can't do it with PNG
  $image->save('photos/wat.png');
return new \atk4\ui\jsExpression('document.location = "index.php" ');
}); */
