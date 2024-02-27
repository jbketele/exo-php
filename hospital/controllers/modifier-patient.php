<?php
// Inclure le modèle pour gérer les opérations sur les patients
require_once '../models/ajout-patient.php';

// Vérifier si les données du formulaire ont été soumises
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $patient_id = $_POST['patient_id'];
    $new_lastname = $_POST['new_lastname'];
    $new_firstname = $_POST['new_firstname'];
    $new_birthdate = $_POST['new_birthdate'];
    $new_phone = $_POST['new_phone'];
    $new_mail = $_POST['new_mail'];
    
    // Créer un objet Patient pour mettre à jour les informations
    $patient = new Patient();
    $patient->setId($patient_id);
    $patient->setLastname($new_lastname);
    $patient->setFirstname($new_firstname);
    $patient->setBirthdate($new_birthdate);
    $patient->setPhone($new_phone);
    $patient->setMail($new_mail);
    
    // Mettre à jour les informations du patient dans la base de données
    $patient->updatePatient();
    
    // Rediriger l'utilisateur vers une autre page après la modification réussie
    header("Location: ../views/liste-patients.php");
    exit(); // Assurez-vous de terminer le script après la redirection
}
?>
