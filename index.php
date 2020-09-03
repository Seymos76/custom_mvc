<?php

require './vendor/autoload.php';

use App\Factory\ProductFactory;
use App\Adapter\Book;
use App\Adapter\EBookAdapter;
use App\Adapter\EBook;
use App\Decorator\Message;
use App\Decorator\BoldMessage;
use App\Decorator\TitleMessage;
use App\Command\Stock;
use App\Command\BuyStock;
use App\Command\SellStock;
use App\Command\Broker;
use App\Prototype\SquarePrototype;
use App\Prototype\CirclePrototype;
use App\Proxy\ImageProxy;

/**
 * Factory
 */
$productA = ProductFactory::create('A', 15);
//var_dump($productA->computeTtc());

$productB = ProductFactory::create('B', null);
//var_dump($productB->computeTtc());

/**
 * Adapter
 */
$book = new Book();
$book->open();
$book->turnPage();
//BookManager::updateBook($book);

$eBook = new EBookAdapter(new EBook());
$eBook->open();
$eBook->turnPage();
//BookManager::updateBook($eBook);

/**
 * Decorator
 */
$message = new Message("Un message");
$decoratedMessage = new BoldMessage($message);
$decoratedMessage->display();
$decoratedTitle = new TitleMessage($message);
$decoratedTitle->display();

/**
 * Command
 */
$stock = new Stock(15);
$buyStock = new BuyStock($stock);
$sellStock = new SellStock($stock);

$broker = new Broker();
$broker->takeOrder($sellStock);
$broker->takeOrder($buyStock);
//$broker->placeOrders();

/**
 * Prototype
 */
$squareProto = new SquarePrototype();
$circleProto = new CirclePrototype();
for ($i = 0; $i < 5; $i++) {
    $square = clone $squareProto;
    $square->setPerimeter(random_int(1,500));
//    var_dump($square);
}
for ($i = 0; $i < 5; $i++) {
    $circle = clone $circleProto;
    $circle->setPerimeter(random_int(1,500));
//    var_dump($circle);
}

/**
 * Proxy
 */
$imageProxy = new ImageProxy('/home/image.jpg');
$imageProxy->display();
$imageProxy->display();
$imageProxy->display();
$imageProxy->display();

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