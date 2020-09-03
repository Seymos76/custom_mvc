<?php


namespace App\Decorator;


class Message implements DisplayableInterface
{
    private string $message;

    public function __construct(string $message)
    {
        $this->message = $message;
    }

    public function display()
    {
        echo $this->message;
    }
}