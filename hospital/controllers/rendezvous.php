<?php
require_once '../models/ajout-rendezvous.php';
$rdvs = Rdv::getAllRdvsWithPatientInfo();

// Vérifier si l'ID du rendez-vous est passé en paramètre dans l'URL
if(isset($_GET['id'])) {
    // Récupérer l'ID du rendez-vous depuis l'URL
    $rdv_id = $_GET['id'];

    // Utiliser le modèle pour obtenir les informations spécifiques du rendez-vous
    $rdv = Rdv::getRdvById($rdv_id);

    // Vérifier si le rendez-vous a été trouvé
    if($rdv) {
        // Inclure la vue pour afficher les détails du rendez-vous
        include('../views/rendezvous.php');
    } else {
        // Rediriger vers une autre page si aucun rendez-vous correspondant à l'ID n'est trouvé
        header("Location: ../views/liste-rendezvous.php");
        exit(); // Assurez-vous de terminer le script après la redirection
    }
} else {
    // Rediriger vers une autre page si aucun ID de rendez-vous n'est spécifié dans l'URL
    header("Location: ../views/liste-rendezvous.php");
    exit(); // Assurez-vous de terminer le script après la redirection
}


?>
