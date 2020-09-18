<?php


namespace App\_routes;

use Symfony\Component\Routing;

$routes = new Routing\RouteCollection();

$routes->add('index', new Routing\Route('/', [
    'name' => 'index',
    '_controller' => 'App\Ui\Controller\PublicController::index',
    '_method' => 'GET'
]));

$routes->add('articles', new Routing\Route('/articles', [
    '_controller' => 'App\Ui\Controller\ArticleController::articles',
    '_method' => 'GET'
]));

$routes->add('leap_year', new Routing\Route('/is_leap_year/{year}', [
    'year' => null,
    '_controller' => 'App\Calendar\Controller\LeapYearController::index',
    '_method' => 'GET'
]));

$routes->add('register', new Routing\Route('/register', [
    'name' => 'register',
    '_controller' => 'App\Ui\Controller\PublicController::register',
]));

$routes->add('login', new Routing\Route('/login', [
    'name' => 'login',
    '_controller' => 'App\Ui\Controller\PublicController::login',
    '_method' => 'GET'
]));

$routes->add('installation', new Routing\Route('/install', [
    'name' => 'installation',
    '_controller' => 'App\Ui\Controller\InstallationController::install',
    '_method' => 'GET'
]));

return $routes;