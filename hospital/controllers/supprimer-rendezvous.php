<?php
require_once '../models/ajout-rendezvous.php';

if (isset($_GET['id'])) {
    $rdv_id = $_GET['id'];

    $rdv = Rdv::deleteRdv($rdv_id);

    header("Location: ../views/liste-rendezvous.php");
    exit();
} else {
    header("Location: ../views/liste-rendezvous.php");
    exit();
}
?>