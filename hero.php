<?php
class Hero extends Character {
    private $weapon;
    private $weaponDamage;
    private $shield;
    private $shieldValue;

    public function __construct ($health, $rage, $weapon, $weaponDamage, $shield, $shieldValue){;
    parent::__construct($health, $rage);
    $this ->weapon = $weapon;
    $this ->weaponDamage = $weaponDamage;
    $this->shield = $shield;
    $this->shieldValue = $shieldValue;
    }
    

    //Récupérer les valeur des attributs avec get
    public function getWeapon(){
        return $this -> weapon;
    }

    public function getWeaponDamage(){
        return $this -> weaponDamage;
    }

    public function getshield(){
        return $this -> shield;
    }

    public function getShiledValue(){
        return $this -> shieldValue;
    }

    public function getStatistics() {
        echo "Hero : <br>";
        echo "Health: " . $this->health . "<br>";
        echo "Rage: " . $this->rage . "<br>";
        echo "Weapon: " . $this->weapon . "<br>";
        echo "Weapon Damage: " . $this->weaponDamage . "<br>";
        echo "Shield: " . $this->shield . "<br>";
        echo "Shield Value: " . $this->shieldValue . "<br>";
    }    

    public function attacked($damage) {
        // Calculer les dégâts réels après réduction par l'armure
        $damageTaken = $damage - $this->shieldValue;
        if ($damageTaken < 0) {
            $damageTaken = 0; // Assure que les dégâts réels ne soient pas négatifs
        }

        // Réduire la santé du héros en fonction des dégâts reçus
        $this->health -= $damageTaken;

        // S'assurer que la santé ne devienne pas négative
        if ($this->health < 0) {
            $this->health = 0;
        }

        $this->rage += 30;
    }

    public function checkRageAttack() {
        if ($this->getRage() >= 60) {
            // Déclencher une attaque avec les dégâts de l'arme
            $this->health -= $this->weaponDamage;
            if ($this->health < 0) {
                $this->health = 0;
            }
            // Réinitialiser la rage à zéro
            $this->setRage(0);
            return true; // Attaque déclenchée avec succès
        }
        return false; // Pas assez de rage pour déclencher l'attaque
    }
}
?>