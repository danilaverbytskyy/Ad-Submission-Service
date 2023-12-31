<?php

use Aura\SqlQuery\QueryFactory;
use DI\ContainerBuilder;
use League\Plates\Engine;

require '../vendor/autoload.php';

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions([
    Engine::class => function () {
        return new Engine('../app/views');
    },
    QueryFactory::class => function () {
        return new QueryFactory('mysql');
    },
    PDO::class => function () {
        return new PDO("mysql:host=localhost; dbname=Ad Submission Service", "root", "");
    },
    Delight\Auth\Auth::class => function () {
        return new Delight\Auth\Auth(new PDO("mysql:host=localhost; dbname=Ad Submission Service", "root", ""));
    },
    Intervention\Image\Image::class => function() {
        return new Intervention\Image\Image;
    }
]);
$container = $containerBuilder->build();

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/logout', ["App\controllers\RegistrationController", "logOut"]);
    $r->addRoute('POST', '/enter', ["App\controllers\RegistrationController", "enter"]);
    $r->addRoute('POST', '/register', ["App\controllers\RegistrationController", "register"]);

    $r->addRoute('GET', '/', ["App\controllers\HomeController", "home"]);
    $r->addRoute('GET', '/login', ["App\controllers\HomeController", "logIn"]);
    $r->addRoute('GET', '/signup', ["App\controllers\HomeController", "signUp"]);
    $r->addRoute('GET', '/create', ["App\controllers\HomeController", "createAdvertisement"]);

    $r->addRoute('POST', '/storeAdvertisement', ["App\controllers\AdvertisementController", "storeAdvertisement"]);
    $r->addRoute('GET', '/show/{task_id}', ["App\controllers\AdvertisementController", "show"]);
    $r->addRoute('GET', '/edit/{task_id}', ["App\controllers\AdvertisementController", "edit"]);
    $r->addRoute('GET', '/delete/{task_id}', ["App\controllers\AdvertisementController", "delete"]);
    $r->addRoute('POST', '/update/{task_id}', ["App\controllers\AdvertisementController", "update"]);
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        dd("404 NOT FOUND");
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        dd("405 NOT ALLOWED");
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        $container->call($handler, $vars);
        break;
}
?>