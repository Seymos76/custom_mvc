<?php
require_once __DIR__.'/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;

$request = Request::createFromGlobals();
$routes = include __DIR__.'/src/app.php';

$context = new RequestContext();
$context->fromRequest($request);
$matcher = new UrlMatcher($routes, $context);

$path = $request->getPathInfo();

try {
    extract($matcher->match($path), EXTR_SKIP);
    ob_start();
    include sprintf(__DIR__.'/src/pages/%s.php', $_route);

    $response = new Response(ob_get_clean());
} catch (SymfonyComponentRoutingExceptionResourceNotFoundException $exception) {
    $response = new Response('Not Found', Response::HTTP_NOT_FOUND);
} catch (Exception $exception) {
    $response = new Response('An error occurred', 500);
}

$response->send();