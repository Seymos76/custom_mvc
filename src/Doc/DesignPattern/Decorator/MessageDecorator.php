<?php


namespace App\Decorator;


abstract class MessageDecorator implements DisplayableInterface
{
    protected DisplayableInterface $displayableMessage;

    public function __construct(DisplayableInterface $displayableMessage)
    {
        $this->displayableMessage = $displayableMessage;
    }
}