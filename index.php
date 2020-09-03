<?php

require './vendor/autoload.php';

use App\Factory\ProductFactory;
use App\Adapter\Book;
use App\Adapter\EBookAdapter;
use App\Adapter\EBook;
use App\Adapter\BookManager;
use App\Decorator\Message;
use App\Decorator\BoldMessage;
use App\Decorator\TitleMessage;

$productA = ProductFactory::create('A', 15);
//var_dump($productA->computeTtc());

$productB = ProductFactory::create('B', null);
//var_dump($productB->computeTtc());

$book = new Book();
$book->open();
$book->turnPage();
//BookManager::updateBook($book);

$eBook = new EBookAdapter(new EBook());
$eBook->open();
$eBook->turnPage();
//BookManager::updateBook($eBook);

$message = new Message("Un message");
$decoratedMessage = new BoldMessage($message);
$decoratedMessage->display();
$decoratedTitle = new TitleMessage($message);
$decoratedTitle->display();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Mon blog</title>
</head>

<body>
    <div>
        <h1>Mon blog</h1>
        <p>En construction</p>
    </div>
</body>
</html>