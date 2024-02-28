<?php
require_once '../models/ajout-patient.php';

// Initialiser la variable $patients
$patients = [];

// Vérifier si un terme de recherche est spécifié
if (isset($_GET['search'])) {
    // Récupérer le terme de recherche depuis l'URL
    $search_term = $_GET['search'];

    // Utiliser le modèle pour obtenir les patients filtrés
    $patients = Patient::searchPatients($search_term);
} else {
    // Si aucun terme de recherche n'est spécifié, obtenir tous les patients
    $patients = Patient::getAllPatients();
}

// Inclure la vue pour afficher la liste des patients
require_once '../views/liste-patients.php';
?>
