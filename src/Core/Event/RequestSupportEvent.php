<?php


namespace App\Core\Event;


use Symfony\Contracts\EventDispatcher\Event;
use Symfony\Component\HttpFoundation\Request;

class RequestSupportEvent extends Event
{
    public const NAME = 'api.request_supports';

    protected Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getRequest(): Request
    {
        return $this->request;
    }
}