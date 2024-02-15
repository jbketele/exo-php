<?php
session_start();

// Vérification de l'existence des variables de session
if(isset($_SESSION['lastname']) && isset($_SESSION['firstname']) && isset($_SESSION['age'])) {
    $lastname = $_SESSION['lastname'];
    $firstname = $_SESSION['firstname'];
    $age = $_SESSION['age'];
} else {
    // Redirection si les variables de session ne sont pas définies
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deuxième page</title>
</head>
<body>
    <h1>Informations de l'utilisateur</h1>
    <p>Nom : <?php echo $lastname; ?></p>
    <p>Prénom : <?php echo $firstname; ?></p>
    <p>Âge : <?php echo $age; ?></p>
</body>
</html>
