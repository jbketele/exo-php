<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiche du rendez-vous</title>
</head>
<body>
    <?php 
    foreach($rdvs as $rdv){
        if ($rdv['idPatients'] == $current_patient_id) {
        echo "<h1>Fiche du rendez-vous</h1>";
        echo "<p>Date et heure : " . $rdv['dateHour'] . "</p>";
        echo "<p>Nom du patient : " . $rdv['lastname'] . "</p>";
        echo "<p>Prénom du patient : " . $rdv['firstname'] . "</p>";
        }
    }
  ?>
</body>
</html>
<?php

