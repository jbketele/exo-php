<?php
require_once '../models/database.php';

class Patient {
    private $lastname;
    private $firstname;
    private $birthdate;
    private $phone;
    private $mail;

    public function setLastname($lastname) {
        $this->lastname = $lastname;
    }
    public function setFirstname($firstname) {
        $this->firstname = $firstname;
    }
    public function setBirthdate($birthdate) {
        $this->birthdate = $birthdate;
    }
    public function setPhone($phone) {
        $this->phone = $phone;
    }
    public function setMail($mail) {
        $this->mail = $mail;
    }
    public function setId($id) {
        $this->id = $id;
    }

    public function addPatient () {
        $connexion = Database::getInstance();

        // Requête SQL pour ajouter un utilisateur à la base de données
        $query = 'INSERT INTO patients (lastname, firstname, birthdate, phone, mail) VALUES (:lastname, :firstname, :birthdate, :phone, :mail)';
        $statement = $connexion->prepare($query);
        $statement->bindParam(':lastname', $this->lastname);
        $statement->bindParam(':firstname', $this->firstname);
        $statement->bindParam(':birthdate', $this->birthdate);
        $statement->bindParam(':mail', $this->mail);
        $statement->bindParam(':phone', $this->phone);
        $statement->execute();
    }

    // Dans votre modèle Patient (ajout-patient.php)
    public static function getAllPatients() {
    $connexion = Database::getInstance();

    // Requête SQL pour récupérer tous les patients
    $query = 'SELECT * FROM patients';
    $statement = $connexion->query($query);
    
    // Récupération des résultats sous forme de tableau associatif
    $patients = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    return $patients;
    }

    // Méthode pour ajouter un patient à la base de données...
    
    public static function getPatientById($patient_id) {
        $connexion = Database::getInstance();

        // Requête SQL pour récupérer les informations d'un patient par son identifiant
        $query = 'SELECT * FROM patients WHERE id = :patient_id';
        $statement = $connexion->prepare($query);
        $statement->bindParam(':patient_id', $patient_id);
        $statement->execute();
        
        // Récupération du résultat
        $patient = $statement->fetch(PDO::FETCH_ASSOC);
        
        return $patient;
    }

    // Méthode pour mettre à jour les informations du patient dans la base de données
    public function updatePatient() {
        // Assurez-vous d'avoir une instance de connexion à la base de données
        $connexion = Database::getInstance();

        // Requête SQL pour mettre à jour les informations du patient
        $query = 'UPDATE patients SET lastname = :lastname, firstname = :firstname, birthdate = :birthdate, phone = :phone, mail = :mail WHERE id = :id';
        $statement = $connexion->prepare($query);
        $statement->bindParam(':id', $this->id);
        $statement->bindParam(':lastname', $this->lastname);
        $statement->bindParam(':firstname', $this->firstname);
        $statement->bindParam(':birthdate', $this->birthdate);
        $statement->bindParam(':phone', $this->phone);
        $statement->bindParam(':mail', $this->mail);

        // Exécution de la requête
        $statement->execute();
    }
}