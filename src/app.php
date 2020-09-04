<?php
namespace App;

use Symfony\Component\Routing;

$staticRoutes = [
    '/' => 'home',
    '/home' => 'home',
    '/yeah' => 'yeah',
    '/articles' => 'articles',
];

$routes = new Routing\RouteCollection();
foreach ($staticRoutes as $routePath => $controllerName) {
    $routes->add($controllerName, new Routing\Route($routePath));
}

return $routes;