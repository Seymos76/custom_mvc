<?php


namespace App\Adapter;


class EBookAdapter implements BookInterface
{
    private EBookInterface $eBook;

    public function __construct(EBookInterface $eBook)
    {
        $this->eBook = $eBook;
    }

    public function open(): void
    {
        $this->eBook->unlock();
    }

    public function turnPage(): void
    {
        $this->eBook->pressNext();
    }

    public function getPage(): int
    {
        return $this->eBook->getPage()[0];
    }

}