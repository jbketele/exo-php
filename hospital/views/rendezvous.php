<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiche du rendez-vous</title>
</head>
<body>
    <?php 
        require_once '../views/index.php';
        echo "<h2>Fiche de rendez-vous</h2>";
    foreach($rdvs as $rdv){
        if ($rdv['idPatients'] == $rdv_id) {
        echo "<p>Date et heure : " . $rdv['dateHour'] . "</p>";
        echo "<p>Nom du patient : " . $rdv['lastname'] . "</p>";
        echo "<p>Prénom du patient : " . $rdv['firstname'] . "</p>";
        echo "<a href='../views/modifier-rendezvous.php?rdv_id=" . $rdv['id'] . "'>Modifier le rendez-vous</a><br>";
        }
    }
  ?>
</body>
</html>
<?php

