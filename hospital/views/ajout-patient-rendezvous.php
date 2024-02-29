<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout de patient avec rdv</title>
</head>
<body>
<?php require_once '../views/index.php'; ?>

<h2>Ajout de patient et de rendez-vous</h2>
    <form action="../controllers/ajout-patient-rendezvous.php" method="POST">

        <label for="lastname">Nom du patient :</label><br>
        <input type="text" id="lastname" name="lastname"><br>
        <br>
        <label for="firstname">Prénom du patient :</label><br>
        <input type="text" id="firstname" name="firstname"><br>
        <br>
        <label for="birthdate">Date de naissance du patient :</label><br>
        <input type="date" id="birthdate" name="birthdate"><br>
        <br>
        <label for="phone">Numéro de téléphone du patient :</label><br>
        <input type="text" id="phone" name="phone"><br>
        <br>
        <label for="mail">Adresse e-mail du patient :</label><br>
        <input type="email" id="mail" name="mail"><br>
        <br>
        <label for="dateHour">Date et heure du rendez-vous :</label><br>
        <input type="datetime-local" id="dateHour" name="dateHour"><br>
        <br>
        <input type="submit" value="Ajouter">
    </form>
</body>
</html>