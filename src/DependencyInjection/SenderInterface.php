<?php


namespace App\DependencyInjection;


interface SenderInterface
{
    public function send(string $message);
}