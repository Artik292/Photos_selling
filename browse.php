<?php
require 'connection.php';
$img = new Img($db);
$img->load(1);
$app->add(['Image',$img['img']]);
