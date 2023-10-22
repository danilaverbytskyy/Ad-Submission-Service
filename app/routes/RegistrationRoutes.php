<?php
$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/logout', ["App\controllers\HomeController", "logOut"]);
    $r->addRoute('GET', '/login', ["App\controllers\HomeController", "logIn"]);
    $r->addRoute('GET', '/', ["App\controllers\HomeController", "main"]);
    $r->addRoute('POST', '/enter', ["App\controllers\HomeController", "enter"]);
    $r->addRoute('POST', '/register', ["App\controllers\HomeController", "register"]);
});