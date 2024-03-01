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
        echo "<h2>Profil du patient</h2>";

// Inclusion du modèle Patient
require_once '../models/ajout-patient.php';
require_once '../models/ajout-rendezvous.php';

// Vérifier si l'identifiant du patient est fourni dans l'URL
if(isset($_GET['id'])) {
    // Récupérer l'identifiant du patient depuis l'URL
    $patient_id = $_GET['id'];

    // Récupérer les informations du patient depuis la base de données
    $patient = Patient::getPatientById($patient_id); // Méthode hypothétique pour récupérer les informations d'un patient par son identifiant

    $rdvs = Rdv::getRdvsByPatientId($patient_id);

    // Vérifier si le patient existe
    if($patient) {
        // Afficher les informations du patient
        echo "<p>Nom: " . $patient['lastname'] . "</p>";
        echo "<p>Prénom: " . $patient['firstname'] . "</p>";
        echo "<p>Date de naissance: " . $patient['birthdate'] . "</p>";
        echo "<p>Téléphone: " . $patient['phone'] . "</p>";
        echo "<p>Email: " . $patient['mail'] . "</p>";

        // Lien pour modifier le patient
        echo "<a href='modifier-patient.php?patient_id=" . $patient['id'] . "'>Modifier le patient</a><br>";
        if (!empty($rdvs)) {
            foreach ($rdvs as $rdv) {
                echo "<h2>Ses rendez-vous</h2>";
                echo "<p>Date et heure du rendez-vous : " . $rdv['dateHour'] . "</p>";
            }
        } else {
            echo "<p>Aucun rendez-vous associé à ce patient.</p>";
        }        
        
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


