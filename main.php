<?php
require 'vendor/autoload.php';
session_start();
$app = new \atk4\ui\App('Photos');
$app->initLayout('Centered');
$form = $app->add(["Form"]);
$form->addField("PNG");
$form->addField("JPEG");
$form->onSubmit(function($form) {
	$_SESSION["PNG"] = $form->model["PNG"];
  $_SESSION["JPEG"] = $form->model["JPEG"];
	return new \atk4\ui\jsExpression('document.location = "watermark.php" ');
});
