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

        if ($statement->execute()) {
            // Retourne l'ID du patient nouvellement ajouté
            return $connexion->lastInsertId();
        } else {
            // En cas d'erreur, retourne false
            return false;
        }
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

    public static function getPatientIdByLastname($lastname) {
        $connexion = Database::getInstance();
        $query = "SELECT id FROM patients WHERE lastname = :lastname";
        $statement = $connexion->prepare($query);
        $statement->bindParam(':lastname', $lastname);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['id'] : null;
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
    // Supprimer tous les rendez-vous du patient
    public static function deletePatientRdv($patient_id) {
        $connexion = Database::getInstance();
    
        try {
            // Commencez une transaction
            $connexion->beginTransaction();
    
            // Supprimez d'abord les rendez-vous associés au patient
            $queryDeleteRdv = 'DELETE FROM appointments WHERE idPatients = :patient_id';
            $statementDeleteRdv = $connexion->prepare($queryDeleteRdv);
            $statementDeleteRdv->bindParam(':patient_id', $patient_id);
            $statementDeleteRdv->execute();
    
            // Ensuite, supprimez le patient lui-même
            $queryDeletePatient = 'DELETE FROM patients WHERE id = :patient_id';
            $statementDeletePatient = $connexion->prepare($queryDeletePatient);
            $statementDeletePatient->bindParam(':patient_id', $patient_id);
            $statementDeletePatient->execute();
    
            // Validez la transaction
            $connexion->commit();
    
            return true; // La suppression a réussi
        } catch (PDOException $e) {
            // En cas d'erreur, annulez la transaction et affichez l'erreur
            $connexion->rollBack();
            echo "Erreur de suppression : " . $e->getMessage();
            return false; // La suppression a échoué
        }
    }
    
    public static function searchPatients($search_term) {
        $connexion = Database::getInstance();
    
        // Requête SQL pour rechercher les patients en fonction du terme de recherche
        $query = 'SELECT * FROM patients WHERE lastname LIKE :search OR firstname LIKE :search';
        $statement = $connexion->prepare($query);
        $search_param = "%$search_term%"; // Ajouter des wildcards pour la recherche partielle
        $statement->bindParam(':search', $search_param);
        $statement->execute();
    
        // Récupérer les résultats sous forme de tableau associatif
        $filtered_patients = $statement->fetchAll(PDO::FETCH_ASSOC);
    
        return $filtered_patients;
    }
    
    public static function getPatientsWithPagination($limit, $offset) {
        $connexion = Database::getInstance();
        $query = "SELECT * FROM patients LIMIT :limit OFFSET :offset";
        $statement = $connexion->prepare($query);
        $statement->bindParam(':limit', $limit, PDO::PARAM_INT);
        $statement->bindParam(':offset', $offset, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public static function countAllPatients() {
        $connexion = Database::getInstance();
        $query = "SELECT COUNT(*) FROM patients";
        $result = $connexion->query($query);
        return $result->fetchColumn();
    }
    
}