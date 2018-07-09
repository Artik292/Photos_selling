<?php
session_start();
if (!(isset($_SESSION['sum']))) {
    $_SESSION['sum'] = 0;
}
require 'con.php';

$app = new \atk4\ui\App('Тест корзины');
$app->initLayout('Centered');

//////////////////////////////FOR CONNECTION////////////////////////////////



////////////////////////////////////////////////////////////////////////

$app->add(['CRUD'])->setModel(new Photo($db));

$Button = $app->add(['Button',$_SESSION['sum']])->link(['basket']);

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
      $view->add(['Image','photos/'.$p['photo_id'].'.jpg','small']);
      $B = $view->add(['Button',$p['value'],'massive green tag']);
      $B->on('click',  function() use($app,$Button,$p) {
      $_SESSION['sum'] = $_SESSION['sum']+$p['value'];
      $Button->set($_SESSION['sum']);
      bask_add($p);
      //Header ('Location index.php');
      return new \atk4\ui\jsExpression('document.location = "index.php" ');
    });
}
