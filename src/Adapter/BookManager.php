<?php


namespace App\Adapter;


class BookManager
{
    public static function updateBook(BookInterface $book)
    {
        echo "Book updated";
    }
}