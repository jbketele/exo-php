<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Récupération des informations du cookie</title>
</head>
<body>
    <h1>Informations du Cookie</h1>

    <?php
    // Vérification de l'existence du cookie
    if(isset($_COOKIE['user_info'])) {
        // Décodage du contenu du cookie (qui est stocké en JSON dans cet exemple)
        $user_info = json_decode($_COOKIE['user_info'], true);

        // Affichage des informations du cookie
        echo "<p>Login : " . $user_info['login'] . "</p>";
        echo "<p>Mot de passe : " . $user_info['password'] . "</p>";
    } else {
        echo "<p>Aucune information trouvée dans le cookie.</p>";
    }
    ?>

</body>
</html>
