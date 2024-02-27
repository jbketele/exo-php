<?php
class Database {
/**
     * instance unique de PDO
     *
     * @var PDO
     */


    static private $instance = null;
    public static function getInstance()
{
    // Si aucune instance n'existe on en crée
    if (is_null(self::$instance)) {
   self::$instance = new PDO('mysql:host=localhost;dbname=hospitalE2N', 'jbketele', 'pasdavenirsansagri');
    }
        return self::$instance;
}
    }



?>