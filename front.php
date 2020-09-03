<?php
require_once __DIR__.'/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();

$response = new Response();

$map = [
    '/' => __DIR__ . '/src/pages/home.php',
    '/home' => __DIR__ . '/src/pages/home.php',
    '/yeah' => __DIR__ . '/src/pages/yeah.php',
    '/articles' => __DIR__ . '/src/pages/articles.php',
];

$path = $request->getPathInfo();
var_dump($path);
if (isset($map[$path])) {
    ob_start();
    include $map[$path];
    $response->setStatusCode(Response::HTTP_OK);
    $response->setContent(ob_get_clean());
} else {
    $response->setStatusCode(400);
    $response->setContent('Not Found !');
}

$response->send();