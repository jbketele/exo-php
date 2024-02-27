<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
// Inclusion du modèle Patient
require_once '../models/ajout-patient.php';

// Vérifier si l'identifiant du patient est fourni dans l'URL
if(isset($_GET['patient_id'])) {
    // Récupérer l'identifiant du patient depuis l'URL
    $patient_id = $_GET['patient_id'];

    // Récupérer les informations du patient depuis la base de données
    $patient = Patient::getPatientById($patient_id); // Méthode hypothétique pour récupérer les informations d'un patient par son identifiant

    // Vérifier si le patient existe
    if($patient) {
        // Afficher les informations du patient
        echo "<h1>Profil du Patient</h1>";
        echo "<p>Nom: " . $patient['lastname'] . "</p>";
        echo "<p>Prénom: " . $patient['firstname'] . "</p>";
        echo "<p>Date de naissance: " . $patient['birthdate'] . "</p>";
        echo "<p>Téléphone: " . $patient['phone'] . "</p>";
        echo "<p>Email: " . $patient['mail'] . "</p>";
        
        // Lien pour modifier le patient
        echo "<a href='modifier-patient.php?patient_id=" . $patient['id'] . "'>Modifier le patient</a><br>";
    } else {
        echo "<p>Patient non trouvé.</p>";
    }
} else {
    echo "<p>Aucun identifiant de patient fourni.</p>";
}

?>
<br>
    <button><a href="ajout-patient.php">Ajouter un patient</a></button>

</body>
</html>


