<?php require_once '../models/ajout-rendezvous.php';?>

<?php
if(isset($_POST['dateHour']) && isset($_POST['idPatient'])) {
$rendezVous = new Rdv();
$rendezVous->setDateHour($_POST['dateHour']);
$rendezVous->setIdPatients($_POST['idPatient']);
$rendezVous->addRdv();
}

header('Location: ../views/liste-rendezvous.php');
?>