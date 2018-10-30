<?php

// Modelo de objetos que se corresponde con la tabla de MySQL
class Musicalbum extends \Illuminate\Database\Eloquent\Model
{
	public $timestamps = false;
}

// Añadir el resto del código aquí
$app->get('/musicalbums', function ($req, $res, $args) {

    // Creamos un objeto collection + json con la lista de películas

    // Obtenemos la lista de películas de la base de datos y la convertimos del formato Json (el devuelto por Eloquent) a un array PHP
    $musicalbums = json_decode(\MusicAlbum::all());

    // Mostramos la vista
    return $this->view->render($res, 'musicalbumlist_template.php', [
        'items' => $musicalbums
    ]);
})->setName('musicalbums');


/*  Obtención de un album en concreto  */
$app->get('/musicalbums/{name}', function ($req, $res, $args) {

    // Obtenemos la película de la base de datos a partir de su id y la convertimos del formato Json (el devuelto por Eloquent) a un array PHP
    $p = \MusicAlbum::find($args['name']);  
    $musicalbum = json_decode($p);

    // Mostramos la vista
    return $this->view->render($res, 'musicalbum_template.php', [
        'item' => $musicalbum
    ]);

});


/*  Eliminar un album en concreto  */
$app->delete('/musicalbums/{name}', function ($req, $res, $args) {

    $p = \MusicAlbum::find($args['name']);  
    $p->delete();
});


// Añadir album
$app->post("/musicalbums", function ($req, $res, $args) {

    $template = $req->getParsedBody();

    $datos=$template['template']['data'];

    foreach ($datos as $value) {
      
        switch($value['name']){
        case "name":
            $name=$value['value'];
            break;
        case "description":
            $description=$value['value'];
            break;
        case "datePublished":
            $datePublished=$value['value'];
            break;
        case "image":
            $image=$value['value'];
            break;
        case "embedUrl":
            $embedUrl=$value['value'];
            break;
        }
    }
    $album=new Musicalbum;

    $album->name=$name;
    $album->description=$description;
    $album->datePublished=$datePublished;
    $album->image=$image;
    $album->embedUrl=$embedUrl;
    $album->save();
});

//Actualizar
$app->put('/musicalbums/{name}', function ($req, $res, $args) {

    // Obtenemos el album de música de la base de datos a partir de su id y la convertimos del formato Json (el devuelto por Eloquent) a un array PHP
    $p = \MusicAlbum::find($args['name']);

    $template = $req->getParsedBody();

    $datos=$template['template']['data'];

    foreach ($datos as $value) {
      
        switch($value['name']){
        case "name":
            $name=$value['value'];
            break;
        case "description":
            $description=$value['value'];
            break;
        case "datePublished":
            $datePublished=$value['value'];
            break;
        case "image":
            $image=$value['value'];
            break;
        case "embedUrl":
            $embedUrl=$value['value'];
            break;
        }
    }

    $p->name=$name;
    $p->description=$description;
    $p->datePublished=$datePublished;
    $p->image=$image;
    $p->embedUrl=$embedUrl;
    $p->save();
});
?>
