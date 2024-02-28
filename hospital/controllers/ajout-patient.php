<?php
require_once '../models/ajout-patient.php';

echo "<br>-".$_POST['lastname'];
echo "<br>-".$_POST['firstname'];
echo "<br>-".$_POST['birthdate'];
echo "<br>-".$_POST['phone'];
echo "<br>-".$_POST['mail'];


if (isset($_POST['lastname']) && isset($_POST['firstname']) && isset($_POST['mail']) && isset($_POST['birthdate'])&& isset($_POST['phone'])) {
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $mail = $_POST['mail'];
    $birthdate = $_POST['birthdate'];
    $phone = $_POST['phone'];
    

    $user = new Patient();
    $user->setLastname($lastname);
    $user->setFirstname($firstname);
    $user->setmail($mail);
    $user->setBirthdate($birthdate);
    $user->setPhone($phone);

    $user->addPatient();

    header("Location: ../views/liste-patients.php");
}

?>