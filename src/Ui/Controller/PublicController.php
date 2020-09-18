<?php


namespace App\Ui\Controller;


use App\Ui\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PublicController extends AbstractController
{
    public function index(Request $request): Response
    {
        if ($request->attributes->get('_method') === 'GET') {
            return $this->render($request);
        }
        return new Response('Cette page n\'existe pas', 404);
    }

    public function login(Request $request): Response
    {
        if ($request->attributes->get('_method') === 'GET') {
            return $this->render($request);
        }
        return new Response('Cette page n\'existe pas', 404);
    }

    public function register(Request $request): Response
    {
        return $this->render($request);
    }
}