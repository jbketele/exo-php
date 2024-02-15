<?php
//Vérifie si les données ont été transmises
if ($_SERVER["REQUEST_METHOD"]=="POST") {
    //récupère les données
    $nom = $_POST["nom"]
    $civilite = $_POST["civilite"]
    $pays = $_POST["pays"]
    $anniversaire = $_POST["anniversaire"]
    $email = $_POST["email"]
    $password = $_POST["password"]
    $codePostal = $_POST["cp"]
    $profile = $_POST["profile"]
    $langages = $_POST["langages"]
    $commentaire = $_POST["commentaire"]

}
