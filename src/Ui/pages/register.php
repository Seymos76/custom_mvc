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
    <h1>Inscription</h1>
    <form action="http://127.0.0.1:9000/api/register" method="post">
        <input type="email" value="john@doe.fr" name="email">
        <input type="password" value="password" name="password">
        <button type="submit">Register</button>
    </form>
</div>
</body>
</html>
