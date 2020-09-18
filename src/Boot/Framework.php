<?php


namespace App\Boot;


use Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcher;

class Framework
{
    protected UrlMatcher $urlMatcher;

    protected ControllerResolver $controllerResolver;

    protected ArgumentResolver $argumentResolver;

    public function __construct(UrlMatcher $urlMatcher, ControllerResolver $controllerResolver, ArgumentResolver $argumentResolver)
    {
        $this->urlMatcher = $urlMatcher;
        $this->controllerResolver = $controllerResolver;
        $this->argumentResolver = $argumentResolver;
    }

    public function handle(Request $request)
    {
        $this->urlMatcher->getContext()->fromRequest($request);

        $path = $request->getPathInfo();

        try {
            $request->attributes->add($this->urlMatcher->match($path));

            $controller = $this->controllerResolver->getController($request);
            $arguments = $this->argumentResolver->getArguments($request, $controller);
            return call_user_func_array($controller, $arguments);
        }
        catch (ResourceNotFoundException $exception) {
            return new Response($exception->getCode().': Page was not Found: '.$exception->getMessage()."\n", Response::HTTP_NOT_FOUND);
        }
        catch (Exception $exception) {
            return new Response('An error occurred', 500);
        }
    }
}