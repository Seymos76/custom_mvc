<?php


namespace App\Decorator;


class TitleMessage extends MessageDecorator
{
    public function display()
    {
        echo "<h1>";
        $this->displayableMessage->display();
        echo "</h1>";
    }
}