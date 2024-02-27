<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout de patient</title>
</head>
<body>
    <?php require_once '../views/index.php' ?>
    <h2>Ajout de patient</h2>
    <form action="../controllers/ajout-patient.php" method="POST">
        <label for="lastname">Nom</label>
        <input type="text" name="lastname"> <br>
        <br>
        <label for="firstname">Prénom</label>
        <input type="text" name="firstname"> <br>
        <br>
        <label for="birth">Date de naissance</label>
        <input type="date" name="birthdate"> <br>
        <br>
        <label for="phone">Téléphone</label>
        <input type="text" name="phone"> <br>
        <br>
        <label for="mail">Email</label>
        <input type="text" name="mail"> <br>
        <br>
        <input type="hidden" name="patient_id" value="<?php echo $patient_id; ?>">
        <input type="submit" value="Ajouter">
    </form>
</body>
</html>