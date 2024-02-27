<?php
// Inclure le modèle Patient
require_once '../models/ajout-patient.php';

// Vérifier si l'identifiant du patient est fourni dans l'URL
if(isset($_GET['patient_id'])) {
    // Récupérer l'identifiant du patient depuis l'URL
    $patient_id = $_GET['patient_id'];

    // Récupérer les informations du patient depuis la base de données
    $patient = Patient::getPatientById($patient_id);

    // Vérifier si le patient est trouvé
    if($patient) {
        // Afficher le formulaire de modification des informations du patient
?>
        <h1>Modifier les informations du patient</h1>
        <form action="../controllers/modifier-patient.php" method="post">
            <input type="hidden" name="patient_id" value="<?php echo $patient_id; ?>">
            <label for="new_lastname">Nom:</label>
            <input type="text" name="new_lastname" value="<?php echo $patient['lastname']; ?>"><br><br>
            <label for="new_firstname">Prénom:</label>
            <input type="text" name="new_firstname" value="<?php echo $patient['firstname']; ?>"><br><br>
            <label for="new_birthdate">Date de naissance:</label>
            <input type="date" name="new_birthdate" value="<?php echo $patient['birthdate']; ?>"><br><br>
            <label for="new_phone">Téléphone:</label>
            <input type="text" name="new_phone" value="<?php echo $patient['phone']; ?>"><br><br>
            <label for="new_mail">Email:</label>
            <input type="text" name="new_mail" value="<?php echo $patient['mail']; ?>"><br><br>
            <input type="submit" value="Enregistrer les modifications">
        </form>
<?php
    } else {
        echo "<p>Patient non trouvé.</p>";
    }
} else {
    echo "<p>Aucun identifiant de patient fourni.</p>";
}
?>
