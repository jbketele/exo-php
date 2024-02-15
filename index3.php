<?php
session_start();

// Définition des variables
$_SESSION['lastname'] = "Doe";
$_SESSION['firstname'] = "John";
$_SESSION['age'] = 30;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil</title>
</head>
<body>
    <h1>Bienvenue sur la page d'accueil</h1>
    <p>Vous pouvez cliquer sur le lien ci-dessous pour accéder à la deuxième page :</p>
    <a href="page.php">Aller à la deuxième page</a>
</body>
</html>
