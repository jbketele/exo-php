<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des rendez-vous</title>
</head>
<body>
<?php
require_once '../views/index.php';
echo "<h2>Liste des rendez-vous</h2>";

require_once '../models/ajout-rendezvous.php';

// Appel de la méthode pour récupérer tous les rendez-vous avec les informations du patient associé
$rdvs = Rdv::getAllRdvsWithPatientInfo();
?>

    <table>
        <tr>
            <th>Date et heure</th>
            <th>Nom du patient</th>
            <th>Prénom du patient</th>
        </tr>
        <?php foreach ($rdvs as $rdv): ?>
        <tr>
            <td><?php echo $rdv['dateHour']; ?></td>
            <td><?php echo $rdv['lastname']; ?></td>
            <td><?php echo $rdv['firstname']; ?></td>
            <td><a href="../controllers/rendezvous.php?id=<?php echo $rdv['idPatients']; ?>">Voir la fiche du rendez-vous</a></td>
        </tr>
        <?php endforeach; ?>
    </table>

<br>
    <button><a href="ajout-rendezvous.php">Ajouter un rendez-vous</a></button>

</body>
</html>


