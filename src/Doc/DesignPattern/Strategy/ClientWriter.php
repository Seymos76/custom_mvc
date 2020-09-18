<?php


namespace App\Strategy;


class ClientWriter
{
    private WriterInterface $writer;

    public function __construct(WriterInterface $writer)
    {
        $this->writer = $writer;
    }

    public function write($data)
    {
        $this->writer->write($data);
    }
}