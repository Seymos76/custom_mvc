<?php

require './vendor/autoload.php';

use App\Config\Database;
use App\Factory\ProductFactory;
use App\Adapter\Book;
use App\Adapter\EBookAdapter;
use App\Adapter\EBook;
use App\Adapter\BookManager;

$productA = ProductFactory::create('A', 15);
//var_dump($productA->computeTtc());

$productB = ProductFactory::create('B', null);
//var_dump($productB->computeTtc());

$book = new Book();
$book->open();
$book->turnPage();
var_dump($book->getPage());
BookManager::updateBook($book);

$eBook = new EBookAdapter(new EBook());
$eBook->open();
$eBook->turnPage();
var_dump($eBook->getPage());
BookManager::updateBook($eBook);

$db = new Database();
//var_dump($db->getConnexion());

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