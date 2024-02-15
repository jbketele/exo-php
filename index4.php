<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de connexion</title>
</head>
<body>
    <h1>Formulaire de Connexion</h1>
    <form action="" method="get">
        <label for="login">Login :</label>
        <input type="text" id="login" name="login" required><br><br>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Se connecter">
    </form>
    <?php
if (isset($_GET['login']) && isset($_GET['password'])) {
    setcookie("login",$_GET['login'], time()+30);
    setcookie("password",$_GET['login'], time()+30);
}

if(isset($_COOKIE['login']) && isset($_COOKIE['password'])) {
    // Affichage des informations des cookies
    echo "<p>Login : " . $_COOKIE['login'] . "</p>";
    echo "<p>Mot de passe : " . $_COOKIE['password'] . "</p>";
} else {
    echo "<p>Aucune information trouvée dans les cookies.</p>";
}

?> 
</body>
</html>
