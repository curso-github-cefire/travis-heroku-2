<?php

// Modelo de objetos que se corresponde con la tabla de MySQL
class Movie extends \Illuminate\Database\Eloquent\Model
{
    public $timestamps = false;
}

/* Obtención de la lista de películas */

$app->get('/movies', function ($req, $res, $args) {

    // Creamos un objeto collection + json con la lista de películas

    // Obtenemos la lista de películas de la base de datos y la convertimos del formato Json (el devuelto por Eloquent) a un array PHP
    $pelis = json_decode(\Movie::all());

    // Mostramos la vista
    return $this->view->render($res, 'movielist_template.php', [
        'items' => $pelis
    ]);
})->setName('movies');


/*  Obtención de una película en concreto  */
$app->get('/movies/{name}', function ($req, $res, $args) {

    // Creamos un objeto collection + json con la película pasada como parámetro

    // Obtenemos la película de la base de datos a partir de su id y la convertimos del formato Json (el devuelto por Eloquent) a un array PHP
    $p = \Movie::find($args['name']);  
    $peli = json_decode($p);

    // Mostramos la vista
    return $this->view->render($res, 'movie_template.php', [
        'item' => $peli
    ]);

});

//Borrar pelicula
$app->delete('/movies/{name}', function ($req, $res, $args) {
    //Le pasamos la variable para que la encuentre
    $peli = Movie::find($args['name']);
    //Borramos la pelicula encontrada
    $peli->delete();
});

//Guardar nueva pelicula
$app->post('/movies', function ($req, $res, $args)  {
    $template = $req->getParsedBody();

    $datos = $template['template']['data'];
    //longitud del vector
    $longitud = count($datos);
    //bucle que recorre vector
    for ($i = 0; $i < $longitud; $i++)
    {
        switch($datos[$i]['name'])
        {
        case "name":
            $name = $datos[$i]['value'];
            break;
        case "description":
            $description = $datos[$i]['value'];
            break;
        case "director":
            $director = $datos[$i]['value'];
            break;
        case "embedUrl":
            $embedUrl = $datos[$i]['value'];
            break;
        case "datePublished":
            $datePublished = $datos[$i]['value'];
            break;
        }
    }
    $nueva_movie = new Movie;
    $nueva_movie['name'] = $name;
    $nueva_movie['description'] = $description;
    $nueva_movie['director'] = $director;
    $nueva_movie['datePublished'] = $datePublished;
    $nueva_movie['embedUrl'] = $embedUrl;

    $nueva_movie->save();
});
//Actualizar pelicula
$app->put('/movies/{id}', function ($req, $res, $args) {
    $template = $req->getParsedBody();
    $datos = $template['template']['data'];
    //longitud del vector
    $longitud = count($datos);
    //bucle que recorre vector
    for ($i = 0; $i < $longitud; $i++)
    {
        switch($datos[$i]['name'])
        {
        case "name":
            $name = $datos[$i]['value'];
            break;
        case "description":
            $description = $datos[$i]['value'];
            break;
        case "director":
            $director = $datos[$i]['value'];
            break;
        case "embedUrl":
            $embedUrl = $datos[$i]['value'];
            break;
        case "datePublished":
            $datePublished = $datos[$i]['value'];
            break;
        }
    }
  
    $nueva_movie = Movie::find($args['id']);
    $nueva_movie['name'] = $name;
    $nueva_movie['description'] = $description;
    $nueva_movie['director'] = $director;
    $nueva_movie['embedUrl'] = $embedUrl;
    $nueva_movie['datePublished'] = $datePublished;
  
    $nueva_movie->save();

});

?>
