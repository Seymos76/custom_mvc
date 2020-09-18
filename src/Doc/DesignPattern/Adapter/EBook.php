<?php


namespace App\Adapter;


class EBook implements EBookInterface
{
    private bool $locked = true;

    private int $currentPage = 1;

    private int $pagesLength = 100;

    public function unlock(): void
    {
        if ($this->locked) {
            $this->locked = false;
        }
    }

    public function pressNext(): void
    {
        $this->currentPage++;
    }

    public function getPage(): array
    {
        return [$this->currentPage, $this->pagesLength];
    }

    public function addPages(?int $pages)
    {
        if (null !== $pages) {
            $this->pagesLength += $pages;
        } else {
            $this->pagesLength++;
        }
        return $this;
    }

}