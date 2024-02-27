<?php
require_once 'character.php';
require_once 'hero.php';
require_once 'orc.php';

$hero = new Hero(1000, 0, "Excalibur", 150, "Legendary Armor", 450);

$orc = new Orc(250, 0);

// Boucle d'attaques de l'Orc jusqu'à ce que le Héros n'ait plus de points de vie
while ($hero->getHealth() > 0) {
    // Effectuer une attaque de l'Orc
    $orc->attack();

    // Calculer les dégâts absorbés par l'armure
    $absorbedDamage = min($hero->getRage(), $orc->getDamage());

    // Calculer les dégâts non absorbés
    $unabsorbedDamage = $orc->getDamage() - $absorbedDamage;

    // Réduire la santé du Héros
    $hero->setHealth($hero->getHealth() - $unabsorbedDamage);

    // Afficher les informations sur l'assaut
    echo "Orc attacks!\n <br>";
    echo "Damage dealt by Orc: " . $orc->getDamage() . "\n";
    echo "Damage absorbed by Hero's armor: " . $absorbedDamage . "\n";
    echo "Remaining damage to Hero: " . $unabsorbedDamage . "\n";
    echo "Hero's current rage: " . $hero->getRage() . "\n";
    echo "Hero's remaining health: " . $hero->getHealth() . "\n\n <br>";
}
echo "Hero has fallen in battle! Game over.\n";

?>