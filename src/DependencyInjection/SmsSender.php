<?php


namespace App\DependencyInjection;


class SmsSender implements SenderInterface
{
    public function send(string $message)
    {
        echo "Sent SMS";
    }

}