<?php


namespace App\Ui\Controller;


use App\Ui\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends AbstractController
{
    public function articles(Request $request): Response
    {
        return $this->render($request);
    }
}