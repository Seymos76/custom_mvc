<?php


namespace App\Ui\Controller;


use App\Core\Install\DatabaseSchema;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class InstallationController
{
    public function install(Request $request): Response
    {
        dump('here install func');
        $schema = DatabaseSchema::getSqlFile('user');
        dump($schema);
//        return new Response($response, Response::HTTP_OK, []);
    }
}