# API Collection + JSON para biblioteca multimedia

API CRUD para interactuar con una base de datos de una biblioteca multimedia. Utiliza el formato [Collection + JSON](http://amundsen.com/media-types/collection/).

## Setup

Instalar XAMPP y copiar el repositorio a la carpeta `htdocs`

``` bash
# Instalar dependencias con composer
composer install
```

## Acceso en servidor local de desarrollo
- Ejecutar `php -S localhost:8000`
- Arrancar servidor MySQL con la base de datos `biblioteca` cargada
- Acceso: http://localhost:8000

## Acceso al servidor de producción (Heroku)

http://APP_NAME.herokuapp.com
