<?php

// Modelo de objetos que se corresponde con la tabla de MySQL
class Book extends \Illuminate\Database\Eloquent\Model
{
	public $timestamps = false;
}

$app->get('/books', function ($req, $res, $args)  {

    // Creamos un objeto collection + json con la lista de películas

    // Obtenemos la lista de los libros de la base de datos y la convertimos del formato Json (el devuelto por Eloquent) a un array PHP
    $libros = json_decode(\Book::all());

    // Mostramos la vista
    return $this->view->render($res, 'booklist_template.php', [
        'items' => $libros
    ]);
})->setName('books');


/*  Obtención de un libro en concreto  */
$app->get('/books/{name}', function ($req, $res, $args) {

    // Creamos un objeto collection + json con el libro pasado como parámetro

    // Obtenemos el libro de la base de datos a partir de su id y la convertimos del formato Json (el devuelto por Eloquent) a un array PHP
    $p = \book::find($args['name']);
    $libro = json_decode($p);

    // Mostramos la vista
    return $this->view->render($res, 'book_template.php', [
        'item' => $libro
    ]);

});


/* Borrado de un libro en concreto */
$app->delete('/books/{name}', function ($req, $res, $args) {

    // Obtenemos el libro de la base de datos a partir de su id y lo borramos
    $p = \Book::find($args['name']);  
    $p->delete();

});

/* Añadido de un libro */

$app->post('/books', function ($req, $res, $args) {
    $template = $req->getParsedBody();

    $datos = $template['template']['data'];

    foreach ($datos as $item) { 
        switch ($item['name']) {
        case 'name':
            $name = $item['value'];
            break;

        case 'description':
            $description = $item['value'];
            break;

        case 'isbn':
            $isbn = $item['value'];
            break;

        case 'datePublished':
            $datePublished = $item['value'];
            break;

        case 'image':
            $image = $item['value'];
            break;
        }
    }

    $book = new Book;

    $book->name = $name;
    $book->description = $description;
    $book->isbn = $isbn;
    $book->datePublished = $datePublished;
    $book->image = $image;
    $book->save();
});

/* Actualizacion de un libro en concreto */
/*  Obtención de un libro en concreto  */
$app->put('/books/{name}', function ($req, $res, $args) {

    // Creamos un objeto collection + json con el libro pasado como parámetro

    // Obtenemos el libro de la base de datos a partir de su id y la convertimos del formato Json (el devuelto por Eloquent) a un array PHP
    $p = \book::find($args['name']);

    $template = $req->getParsedBody();

    $datos = $template['template']['data'];

    foreach ($datos as $item) { 
        switch ($item['name']) {
        case 'name':
            $nombre= $item['value'];
            break;

        case 'description':
            $description = $item['value'];
            break;

        case 'isbn':
            $isbn = $item['value'];
            break;

        case 'datePublished':
            $datePublished = $item['value'];
            break;

        case 'image':
            $image = $item['value'];
            break;
        }
    }

    $p->name = $nombre;
    $p->description = $description;
    $p->isbn = $isbn;
    $p->datePublished = $datePublished;
    $p->image = $image;
    $p->save();


});

?>