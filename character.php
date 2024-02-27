<?php
class Character {
    //définir les attributs
    private $health;
    private $rage;

    public function __construct ($health, $rage){;
    $this->health = $health;
    $this->rage = $rage;
    }

    //Récupérer les valeur des attributs avec get
    public function getHealth(){
        return $this -> health;
    }

    public function getRage(){
        return $this -> rage;
    }

 
}
?>