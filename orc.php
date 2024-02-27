<?php
class Orc extends Character {
    private $damage;
    private $health;
    private $rage;

    public function __construct($health, $rage) {
        parent::__construct($health, $rage);
        echo 
        "Orc : "."<br>"."Health: " . $this->health . "<br>" . 
        "Rage: " . $this->rage . "<br>" ;
    }

    public function getDamage(){
        return $this->damage;
    }

    public function attack() {
        // Générer un nombre aléatoire entre 600 et 800 pour le damage
        $this->damage = rand(600, 800);
    }

}
?>