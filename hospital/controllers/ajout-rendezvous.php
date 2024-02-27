<?php
require_once '../models/ajout-rendezvous.php';

echo "<br>-".$_POST['dateHour'];
echo "<br>-".$_POST['idPatients'];


if (isset($_POST['dateHour']) && isset($_POST['idPatients'])) {
    $dateHour = $_POST['dateHour'];
    $idPatients = $_POST['idPatients'];
    

    $user = new Rdv();
    $user->setDateHour($dateHour);
    $user->setIdPatients($idPatients);

    $user->addRdv();

    header("Location: ../views/liste-rendezvous.php");
}
?>