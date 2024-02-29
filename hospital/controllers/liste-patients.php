<?php
require_once '../models/ajout-patient.php';

// Initialiser la variable $patients
$patients = [];
$limit = 10; //Nombre de patients par page

//Définir la page actuelle
$currentPage = isset($_GET['page']) ? $_GET ['page'] : 1;

// Calcul de l'offset
$offset = ($currentPage - 1) * $limit;

// Vérifier si un terme de recherche est spécifié
if (isset($_GET['search'])) {
    // Récupérer le terme de recherche depuis l'URL
    $search_term = $_GET['search'];

    // Utiliser le modèle pour obtenir les patients filtrés
    $patients = Patient::searchPatients($search_term);
} else {
    // Récupération de la liste des patients pour la page actuelle
    $patients = Patient::getPatientsWithPagination($limit, $offset);

}

// Récupération du nombre total de patients
$totalPatients = Patient::countAllPatients();

// Calculer le nombre total de pages
$totalPages = ceil($totalPatients / $limit);

// Inclure la vue pour afficher la liste des patients
require_once '../views/liste-patients.php';
?>
