<?php
require_once __DIR__.'/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use App\Core\Install\RoutesLoader;
use App\Core\Install\ConfigurationLoader;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use App\Boot\Framework;

// init request
$request = Request::createFromGlobals();
// load routes
$api_routes = include __DIR__ . '/src/_routes/_api_routes.php';
$public_routes = include __DIR__ . '/src/_routes/_public_routes.php';
$route_collection = RoutesLoader::getRoutes($public_routes, $api_routes);

// get request context
$context = new RequestContext();
// create matcher to apply on routes
$matcher = new UrlMatcher($route_collection, $context);

$controllerResolver = new ControllerResolver();
$argumentResolver = new ArgumentResolver();

$framework = new Framework($matcher, $controllerResolver, $argumentResolver);
$response = $framework->handle($request);

$securityConfig = ConfigurationLoader::load('security', true);
$doctrineConfig = ConfigurationLoader::load('doctrine', true);
$response->send();
