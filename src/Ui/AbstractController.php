<?php


namespace App\Ui;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

abstract class AbstractController
{
    public function render(Request $request): Response
    {
        extract($request->attributes->all(), EXTR_SKIP);
//        dump($request->attributes->all());
        ob_start();
        include sprintf(__DIR__ . '/../Ui/pages/%s.php', $_route);
        return new Response(ob_get_clean());
    }
}