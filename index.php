<?php

require './vendor/autoload.php';

use App\Config\Database;
use App\Product\ProductFactory;

$productA = ProductFactory::create('A', 15);
var_dump($productA->computeTtc());

$productB = ProductFactory::create('B', null);
var_dump($productB->computeTtc());

$db = new Database();
var_dump($db->getConnexion());

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