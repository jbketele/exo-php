<?php
// Inclure le modèle pour gérer les opérations sur les patients
require_once '../models/ajout-rendezvous.php';

// Vérifier si les données du formulaire ont été soumises
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $rdv_id = $_POST['rdv_id'];
    $new_dateHour = $_POST['new_dateHour'];

    
    // Créer un objet Patient pour mettre à jour les informations
    $rdv = new Rdv();
    $rdv->setId($rdv_id);
    $rdv->setDateHour($new_dateHour);

    
    // Mettre à jour les informations du patient dans la base de données
    $rdv->updateRdv();
    
    // Rediriger l'utilisateur vers une autre page après la modification réussie
    header("Location: ../views/liste-rendezvous.php");
    exit(); // Assurez-vous de terminer le script après la redirection
}
?>
