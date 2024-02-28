<?php require_once '../models/ajout-patient.php'; ?>

<?php
$patient = new Patient();
$patients = $patient->getAllPatients();

?>