<?php


namespace App\DependencyInjection;


class EmailSender implements SenderInterface
{
    public function send(string $message)
    {
        echo "Sent email";
    }
}