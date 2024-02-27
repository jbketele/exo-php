<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout de rendez-vous</title>
</head>
<body>
<?php require_once '../views/index.php' ?>
    <h2>Ajout de rendez-vous</h2>
    <form action="../controllers/ajout-rendezvous.php" method="POST">
        <label for="dateHour">Date et Heure du rdv</label><br>
        <input type="datetime-local" name="dateHour"><br>
        <br>
        <label for="idPatients">ID du patient</label><br>
        <input type="number" name="idPatients"><br>
        <br>
        <input type="hidden" name="rdv_id" value="<?php echo $rdv_id; ?>">
        <input type="submit" value="Ajouter">
    </form>
</body>
</html>