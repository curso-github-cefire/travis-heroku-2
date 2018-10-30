<?php

// Cargar Slim Framework y Eloquent a través de Composer
require 'App.php';

$app = (new App())->get();
$app->run();



?>
