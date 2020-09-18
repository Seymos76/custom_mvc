<?php
namespace App;

use Symfony\Component\Routing;

$routes = new Routing\RouteCollection();

$routes->add('api_register', new Routing\Route('/api/register', [
    'name' => 'api_register',
    '_controller' => 'App\API\RegistrationController::register',
]));

$routes->add('api_login', new Routing\Route('/api/login', [
    'name' => 'api_login',
    '_controller' => 'App\API\LoginController::login',
    '_method' => 'POST'
]));

return $routes;