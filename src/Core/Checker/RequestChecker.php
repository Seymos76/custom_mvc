<?php


namespace App\Core\Checker;


use Symfony\Component\HttpFoundation\Request;

class RequestChecker
{
    private Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function supports(string $method)
    {
        if ($this->request->getMethod() !== $method) {
            throw new \Exception("Only POST is available to this endpoint.");;
        }
        return true;
    }

    public function extract(): array
    {
        return json_decode($this->request->getContent(), true);
    }
}