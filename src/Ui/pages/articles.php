<?php

$page = $request->getPathInfo();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Mon blog</title>
</head>

<body>
<nav>
    <a href="/">Accueil</a>
    <a href="/articles">Articles</a>
    <a href="/login">Connexion</a>
    <a href="/register">Inscription</a>
</nav>
<div>
    <h1>Mon blog - <?= htmlspecialchars($page, ENT_QUOTES, 'UTF-8') ?></h1>
    <p>En construction</p>
</div>
</body>
</html>