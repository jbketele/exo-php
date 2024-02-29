<?php
require_once '../models/ajout-patient.php';
require_once '../models/ajout-rendezvous.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire pour le patient
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $mail = $_POST['mail'];
    $birthdate = $_POST['birthdate'];
    $phone = $_POST['phone'];

    // Créer un nouvel objet Patient
    $patient = new Patient();
    $patient->setLastname($lastname);
    $patient->setFirstname($firstname);
    $patient->setMail($mail);
    $patient->setBirthdate($birthdate);
    $patient->setPhone($phone);

    // Ajouter le patient à la base de données
    $patient_id = $patient->addPatient();

    if ($patient_id) {
        // Récupérer les données du formulaire pour le rendez-vous
        $dateHour = $_POST['dateHour'];

        // Créer un nouvel objet Rdv
        $rendezVous = new Rdv();
        $rendezVous->setDateHour($dateHour);
        $rendezVous->setIdPatients($patient_id); // Associer le rendez-vous au patient ajouté

        // Ajouter le rendez-vous à la base de données
        $rendezVous->addRdv();

        // Rediriger
        header("Location: ../views/liste-patients.php");
        exit();
    } else {
        echo "Une erreur s'est produite lors de l'ajout du patient.";
    }
}
?>
