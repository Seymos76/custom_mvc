<?php


namespace App\Ui;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class TemplateRenderer
{
    /**
     * Renders page template from Request pathInfo
     * @param $request
     * @return Response
     */
    public static function render(Request $request)
    {
        extract($request->attributes->all(), EXTR_SKIP);
        ob_start();
        include sprintf(__DIR__.'/src/pages/%s.php', $_route);
        return new Response(ob_get_clean());
    }
}