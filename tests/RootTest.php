<?php

use Slim\Http\Environment;
use Slim\Http\Request;
require 'App.php';

class RootTest extends PHPUnit_Framework_TestCase
{
    protected $app;

    public function setUp()
    {
        // Inicialización de la aplicación
        $this->app = (new App())->get();
    }

    /** @test */
    public function rootGet() {
        $env = Environment::mock([
            'REQUEST_METHOD' => 'GET',
            'REQUEST_URI'    => '/',
        ]);
        $req = Request::createFromEnvironment($env);
        $this->app->getContainer()['request'] = $req;
        $response = $this->app->run(true);
        // Código 200
        $this->assertSame($response->getStatusCode(), 200);
        $data = json_decode($response->getBody(), true);
        // collection.type tiene que ser 'index'
        $this->assertSame($data['collection']['type'], 'index');
        // collection.links tiene que tener longitud 4
        $this->assertCount(4, $data['collection']['links']);
    } 

}
?>
