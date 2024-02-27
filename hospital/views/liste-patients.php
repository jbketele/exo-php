<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require_once '../views/index.php';
        echo "<h2>Liste des patients</h2>";
// Inclusion du modèle Patient
require_once '../models/ajout-patient.php';

// Récupération de la liste des patients
$patients = Patient::getAllPatients(); // Cette méthode hypothétique récupère tous les patients depuis la base de données

// Vérification s'il y a des patients à afficher
if ($patients) {
    // Affichage de la liste des patients
    echo "<ul>";
    foreach ($patients as $patient) {
        echo "<p>Nom: " . $patient['lastname'] . ", Prénom: " . $patient['firstname'] . " - <a href='profil-patients.php?patient_id=" . $patient['id'] . "'>Voir Profil</a></p>";
    }
    echo "</ul>";
} else {
    echo "<p>Aucun patient trouvé.</p>";
}
?>
<br>
    <button><a href="ajout-patient.php">Ajouter un patient</a></button>

</body>
</html>


