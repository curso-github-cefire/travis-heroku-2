<?php

// Modelo de objetos que se corresponde con la tabla de MySQL
class Videogame extends \Illuminate\Database\Eloquent\Model
{
	public $timestamps = false;
}

// Añadir el resto del código aquí
$app->get('/videogames', function ($req, $res, $args) {

    // Creamos un objeto collection + json con la lista de películas

    // Obtenemos la lista de películas de la base de datos y la convertimos del formato Json (el devuelto por Eloquent) a un array PHP
    $juegos = json_decode(\VideoGame::all());

    // Mostramos la vista
    return $this->view->render($res, 'videogamelist_template.php', [
        'items' => $juegos
    ]);
})->setName('games');


/*  Obtención de un videojuego en concreto  */
$app->get('/videogames/{name}', function ($req, $res, $args) {

    // Creamos un objeto collection + json con el videojuego pasada como parámetro

    // Obtenemos el videojuego de la base de datos a partir de su id y la convertimos del formato Json (el devuelto por Eloquent) a un array PHP
    $p = \VideoGame::find($args['name']);  
    $juego = json_decode($p);

    // Mostramos la vista
    return $this->view->render($res, 'videogame_template.php', [
        'item' => $juego
    ]);

});

/*  Eliminacion de un videojuego en concreto  */
$app->delete('/videogames/{name}', function ($req, $res, $args) {
	
    // Obtenemos el videojuego de la base de datos a partir de su id y la convertimos del formato Json (el devuelto por Eloquent) a un array PHP
    $p = \VideoGame::find($args['name']); 
    $p->delete();

});

/*Crea un nuevo videojuego con los datos recibidos*/
$app->post('/videogames', function ($req, $res, $args) {
    //Código para peticiones de POST (creación de items)
    $template = $req->getParsedBody();
    $datos = $template['template']['data'];  

    $longitud = count($datos);
    for($i=0; $i<$longitud; $i++)
    {
        switch ($datos[$i]['name']){
        case "name":
            $name = $datos[$i]['value'];
            break;
        case "description":
            $desc = $datos[$i]['value'];
            break;
        case "gamePlatform":
            $plataf = $datos[$i]['value'];
            break;
        case "applicationSubCategory":
            $category = $datos[$i]['value'];
            break;
        case "screenshot":
            $screenshot = $datos[$i]['value'];
            break;
        case "datePublished":
            $date = $datos[$i]['value'];
            break;
        case "embedUrl":
            $embedUrl = $datos[$i]['value'];
            break;		
        }    
    }
  
    $videogame = new Videogame;
    $videogame->name = $name;
    $videogame->description = $desc;
    $videogame->gamePlatform = $plataf;
    $videogame->applicationSubCategory = $category;
    $videogame->screenshot =  $screenshot;
    $videogame->datePublished = $date;
    $videogame->embedUrl = $embedUrl;
  
    $videogame->save();
});


//Actualizar videojuego

$app->put('/videogames/{name}', function ($req, $res, $args) {

	// Creamos un objeto collection + json con el libro pasado como parámetro

	// Obtenemos el libro de la base de datos a partir de su id y la convertimos del formato Json (el devuelto por Eloquent) a un array PHP
	$nuevo_videogame = \VideoGame::find($args['name']);	

    $template = $req->getParsedBody();

	$datos = $template['template']['data'];
  	foreach ($datos as $item)
  	{ 
		switch($item['name'])
		{
        case "name":
            $name = $item['value'];
            break;
        case "description":
            $description = $item['value'];
            break;
        case "gamePlatform":
            $gamePlatform = $item['value'];
            break;

        case "applicationSubCategory":
            $applicationSubCategory = $item['value'];
            break;

        case "screenshot":
            $screenshot = $item['value'];
            break;
				
        case "embedUrl":
            $embedUrl = $item['value'];
            break;
        case "datePublished":
            $datePublished = $item['value'];
            break;
		}
	}

	$nuevo_videogame['name'] = $name;
	$nuevo_videogame['description'] = $description;
	$nuevo_videogame['gamePlatform'] = $gamePlatform;
	$nuevo_videogame['applicationSubCategory'] = $applicationSubCategory;
	$nuevo_videogame['screenshot'] = $screenshot;
	$nuevo_videogame['embedUrl'] = $embedUrl;
	$nuevo_videogame['datePublished'] = $datePublished;
	$nuevo_videogame->save();

});


?>
