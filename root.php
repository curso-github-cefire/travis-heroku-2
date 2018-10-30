<?php

// Esta función escuchará en la ruta principal de la API, '/'
$app->get('/', function ($req, $res, $args) {

    // Creamos un objeto collection + json con cuatro enlaces a las cuatro categorías

    // Creamos los datos que vamos a pasar a la vista
    return $this->view->render($res, 'root_template.php', [
        'url' => $req->getUri()
    ]);


})->setName('root');


?>