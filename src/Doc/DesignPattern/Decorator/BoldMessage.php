<?php


namespace App\Decorator;


class BoldMessage extends MessageDecorator
{
    public function display()
    {
        echo "<strong>";
        $this->displayableMessage->display();
        echo "</strong>";
    }
}