
<?php

require 'connection.php';




$form = $col_log->add('Form')->setModel(new Img($db));
$form->onSubmit(function ($form) {
    // implement submission here
    return $form->success('Thanks for submitting file: '.$form->model['img']);
});


$gr = $seg2->addColumn()->add(['Grid', 'menu'=>false, 'paginator'=>false]);
$gr->setModel(new \atk4\filestore\Model\File($db));
$seg2->js(true, new \atk4\ui\jsExpression('setInterval(function() { []; }, 2000)', [$gr->jsReload()]));
