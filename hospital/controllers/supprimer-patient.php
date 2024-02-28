<?php
require_once '../models/ajout-patient.php';

if (isset($_GET['patient_id'])) {
    $patient_id = $_GET['patient_id'];

    echo "ID du patient à supprimer : " . $patient_id;


    $success = Patient::deletePatientRdv($patient_id);

    var_dump($patient);

    if ($success) {
        header("Location: ../views/liste-patients.php");
        exit();
    } else {
        echo "La suppression a échoué";
    }

}
