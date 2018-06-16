<?php
require 'vendor/autoload.php';
$app = new \atk4\ui\App('Photos');
$app->initLayout('Centered');
$form = $app->add(["Form"]);
$form->addField("PNG");
$form->addField("JPEG");
