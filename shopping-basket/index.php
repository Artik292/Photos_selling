<?php
require 'con.php';
if (!(isset($_SESSION['sum']))) {
    $_SESSION['sum'] = 0;
}

$app = new App();

$app->add(['CRUD'])->setModel(new Photo($app->db));

/*if ((($_SESSION['sum']*100) % 10) == 0) {
    If ($_SESSION['sum'] == 0) {
    $Button = $app->add(['Label',$_SESSION['sum'].' €','big red right ribbon','icon'=>'shopping cart']);
    } else {
    $Button = $app->add(['Label',$_SESSION['sum'].'0 €','big red right ribbon','icon'=>'shopping cart']);
    }
} else {
    $Button = $app->add(['Label',$_SESSION['sum'].' €','big red right ribbon','icon'=>'shopping cart']);
} */

$Button = $app->add(['Label',$_SESSION['sum'].' €','big red right ribbon','icon'=>'shopping cart']);
//$Button = $app->add(['Button',$_SESSION['sum'].' €','big red right ribbon','icon'=>'shopping cart']);

$Button->link(['basket']);

$photo = new Photo($app->db);

$app->add(['ui'=>'hidden divider']);

$page = $app->add(['View', 'id' => 'example']);

$c = $page->add(new \atk4\ui\Columns());
$c1 = $c->addColumn();
$c2 = $c->addColumn();
$c3 = $c->addColumn();

$app->add(['ui'=>'hidden divider']);

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
      $app->mark('photos/'.$p['photo_id'].'.jpg');
      $view->add(['Image','photos/'.$p['photo_id'].'s.jpg','small']);

      $m = $view->add('Menu');
      $sm = $m->addMenu('Sub-menu');
      foreach ($rez as $r) {
        $sm->addItem($r['rez'].' '.$r['value'])->on('click',  function() use($app,$r,$Button) {
        $_SESSION['sum'] = $_SESSION['sum']+$r['value'];
        $Button->set($_SESSION['sum']);
        $app->bask_add($r['value']);
        //return new \atk4\ui\jsExpression('document.location = "index.php" ');
        //return $Button->text($_SESSION['sum']);
        //return new \atk4\ui\jsReload($Button));
        return new \atk4\ui\jsReload($Button, [], new \atk4\ui\jsExpression('console.log("Output with afterSuccess");'));
      });
      }
      /*If ((($p['value']*10) % 10) == 0) {
          $B = $view->add(['Button',$p['value'].' €','massive green tag']);
      } else {
          $B = $view->add(['Button',$p['value'].'0 €','massive green tag']);
      } */
      /*$B->on('click',  function() use($app,$Button,$p) {
      $_SESSION['sum'] = $_SESSION['sum']+$p['value'];
      $Button->set($_SESSION['sum']);
      $app->bask_add($p);
      return new \atk4\ui\jsExpression('document.location = "index.php" '); */
    //});
}

$app->add(['Button','Reset'])->on('click', function($app) {
$_SESSION['sum'] = 0;
return new \atk4\ui\jsExpression('document.location = "index.php" ');
});

$app->add(['Header', 'Button reloading segment']);
$v = $app->add(['View', 'ui' => 'segment'])->set((string) rand(1, 100));
$app->add(['Button', 'Reload random number'])->js('click', new \atk4\ui\jsReload($v, [], new \atk4\ui\jsExpression('console.log("Output with afterSuccess");')));
