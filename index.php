<?php

// Cargar Slim Framework y Eloquent a través de Composer
require 'vendor/autoload.php';
require 'database.php';
require 'App.php';

$app = (new App())->get();
$app->run();



?>
