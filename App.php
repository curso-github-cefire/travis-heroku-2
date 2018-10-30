<?php

require 'vendor/autoload.php';
require 'database.php';

class App
{
    /**
     * Stores an instance of the Slim application.
     *
     * @var \Slim\App
     */
    private $app;
    public function __construct() {




// Configuración de Slim
$config = [
    'settings' => [
        'displayErrorDetails' => true
    ]
];
$app = new \Slim\App($config);

// Get container
$container = $app->getContainer();

// Manejador de errores.
// Para mostrar información en el archivo app.log hay que ejecutar:
// $this->logger->addInfo('Something interesting happened');
$container['logger'] = function($c) {
    $logger = new \Monolog\Logger('MultimediaDB');
    $file_handler = new \Monolog\Handler\StreamHandler('./app.log');
    $logger->pushHandler($file_handler);
    return $logger;
};

// Sistema de views Twig
$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig('./templates', [
        'cache' => false
    ]);

    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));

    return $view;
};

// Middleware para que funcione CORS https://www.slimframework.com/docs/cookbook/enable-cors.html
// Necesario para acceder al servidor desde otro servidor en un dominio distinto (servidor de desarrollo de VueJS)
$app->options('/{routes:.+}', function ($request, $response, $args) {
    return $response;
});

$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
        // Establecer el tipo de datos devuelto por defecto como JSON
        // Ponemos también la codificación de caracteres en utf-8 para los caracteres españoles
        ->withHeader('Content-Type', 'application/json;charset=utf-8')
        // Cabeceras para CORS https://www.slimframework.com/docs/cookbook/enable-cors.html
        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});

// Script con la ruta de entrada a la API
require 'root.php';

// Script para tareas relacionadas con películas
require 'movies.php';

// Script para tareas relacionadas con libros
require 'books.php';

// Script para tareas relacionadas con discos
require 'musicalbums.php';

// Script para tareas relacionadas con videojuegos
require 'videogames.php';

$this->app = $app;
    }
    public function get()
    {
        return $this->app;
    }
}


?>
