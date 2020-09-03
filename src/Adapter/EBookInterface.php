<?php


namespace App\Adapter;


interface EBookInterface
{
    public function unlock(): void;

    public function pressNext(): void;

    /**
     * Returns current page and total number of page, like [currentPage, pagesLength]
     * @return array
     */
    public function getPage(): array;
}