<?php


namespace App\DependencyInjection;


class AlertSender
{
    private SenderInterface $sender;

    public function __construct(SenderInterface $sender)
    {
        $this->sender = $sender;
    }

    public function alert(string $message)
    {
        $this->sender->send($message);
    }
}