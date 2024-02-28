<?php
// Inclure le modèle Patient
require_once '../models/ajout-rendezvous.php';

// Vérifier si l'identifiant du patient est fourni dans l'URL
if(isset($_GET['rdv_id'])) {
    // Récupérer l'identifiant du patient depuis l'URL
    $rdv_id = $_GET['rdv_id'];

    // Récupérer les informations du patient depuis la base de données
    $rdv = Rdv::getRdvById($rdv_id);

    // Vérifier si le patient est trouvé
    if($rdv) {
        // Afficher le formulaire de modification des informations du patient
?>
    <h1>Modifier le rendez-vous</h1>

    <form action="../controllers/modifier-rendezvous.php?id=<?php echo $rdv_id; ?>" method="POST">
        <input type="hidden" name="rdv_id" value="<?php echo $rdv_id; ?>">
        <label for="new_dateHour">Nouvelle date et heure du rendez-vous :</label><br>
        <input type="datetime-local" id="dateHour" name="new_dateHour" value="<?php echo $rdv['dateHour']; ?>"><br><br>
        
        <input type="submit" value="Modifier">
    </form>

    <?php
    } else {
        echo "<p>Patient non trouvé.</p>";
    }
} else {
    echo "<p>Aucun identifiant de rendez-vous fourni.</p>";
}
?>