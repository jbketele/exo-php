<?php
require_once '../models/database.php';

class Rdv {
    private $dateHour;
    private $idPatients;

    public function setDateHour($dateHour) {
        $this->dateHour = $dateHour;
    }
    public function setIdPatients($idPatients) {
        $this->idPatients = $idPatients;
    }
    public function setId($id) {
        $this->id = $id;
    }



    public function addRdv () {
        $connexion = Database::getInstance();

        // Requête SQL pour ajouter un utilisateur à la base de données
        $query = 'INSERT INTO appointments (dateHour, idPatients) VALUES (:dateHour, :idPatients)';
        $statement = $connexion->prepare($query);
        $statement->bindParam(':dateHour', $this->dateHour);
        $statement->bindParam(':idPatients', $this->idPatients);
        $statement->execute();
    }

    public static function getAllRdvs() {
        $connexion = Database::getInstance();
    
        // Requête SQL pour récupérer tous les patients
        $query = 'SELECT * FROM appointments';
        $statement = $connexion->query($query);
        
        // Récupération des résultats sous forme de tableau associatif
        $rdvs = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $rdvs;
        }

    public static function getAllRdvsWithPatientInfo() {
        $connexion = Database::getInstance();
        
        // Requête SQL avec une jointure pour récupérer tous les rendez-vous avec les informations du patient associé
        $query = 'SELECT appointments.*, patients.lastname, patients.firstname FROM appointments INNER JOIN patients ON appointments.idPatients = patients.id';
        $statement = $connexion->query($query);
        
        // Récupération des résultats sous forme de tableau associatif
        $rdvs = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $rdvs;
    }
        
    // Méthode pour récupérer les informations spécifiques d'un rendez-vous à partir de son ID
    public static function getRdvById($id) {
        // Assurez-vous d'avoir une instance de connexion à la base de données
        $connexion = Database::getInstance();

        // Requête SQL pour récupérer les informations du rendez-vous à partir de son ID
        $query = 'SELECT * FROM appointments WHERE id = :id';
        $statement = $connexion->prepare($query);
        $statement->bindParam(':id', $id);
        $statement->execute();

        // Récupérer les résultats sous forme de tableau associatif
        $rdv = $statement->fetch(PDO::FETCH_ASSOC);

        return $rdv; // Retourner les informations du rendez-vous
    }

    // Méthode pour mettre à jour les informations du patient dans la base de données
    public function updateRdv() {
        // Assurez-vous d'avoir une instance de connexion à la base de données
        $connexion = Database::getInstance();

        // Requête SQL pour mettre à jour les informations du patient
        $query = 'UPDATE appointments SET dateHour = :dateHour WHERE id = :id';
        $statement = $connexion->prepare($query);
        $statement->bindParam(':id', $this->id);
        $statement->bindParam(':dateHour', $this->dateHour);

        // Exécution de la requête
        $statement->execute();
    }
    public static function getRdvsByPatientId($patient_id) {
        // Assurez-vous d'avoir une instance de connexion à la base de données
        $connexion = Database::getInstance();

        // Requête SQL pour récupérer les rendez-vous associés à un patient donné
        $query = 'SELECT * FROM appointments WHERE idPatients = :patient_id';
        $statement = $connexion->prepare($query);
        $statement->bindParam(':patient_id', $patient_id);
        $statement->execute();

        // Récupérer les résultats sous forme de tableau associatif
        $rdvs = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $rdvs;
    }
    public static function deleteRdv($rdv_id) {
        $connexion = Database::getInstance();
        $query = "DELETE FROM appointments WHERE id = :rdv_id";
        $statement = $connexion->prepare($query);
        $statement->bindParam(':rdv_id', $rdv_id);
        $statement->execute();
    }
}