<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendrier grid</title>
</head>
<style>
    .calendrier{
        display: grid;
        grid-template-columns: repeat(7, 1fr);
    }
    .jour{
        border: 1px solid black;
        padding : 10px;
        text-align: center;
    }
    .entete{
        text-align: center;
    }
</style>
<body>
<?php
    if (isset($_GET['mois']) && isset($_GET['année'])) {
        //Récupère les valeurs
        $moisChoisi = $_GET['mois'];
        $anneeChoisie = $_GET['année'];

        //Convertit le nom du mois en numéro
        $moisNum = date('m', strtotime($moisChoisi));

        //Nombre de jours dans le mois
        $nbJoursMois = cal_days_in_month(CAL_GREGORIAN, $moisNum, $anneeChoisie);

         //Date du premier jour du mois
        $premierJourMois = mktime(0, 0, 0, $moisNum, 1, $anneeChoisie);

        // Obtenir le premier jour de la semaine
        $premierJourSemaine = date('N', $premierJourMois);

        // Noms des jours de la semaine
        $joursSemaine = array('Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim');

        // Affiche le calendrier
        echo "<h2>Calendrier pour $moisChoisi $anneeChoisie</h2>";
        echo "<div class='calendrier'>";

        // Affiche les noms des jours de la semaine
        $joursSemaine = array('Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim');
        foreach ($joursSemaine as $jour) {
            echo "<div class='entete'>$jour</div>";
        }

        // Ajoute des cellules vides à gauche si le premier jour n'est pas un lundi
        for ($i = 1; $i < $premierJourSemaine; $i++) {
            echo "<div class='jour'></div>";
        }

        //Boucle pour afficher les jours
        for ($jour = 1; $jour <= $nbJoursMois; $jour++) {
            echo "<div class='jour'>$jour</div>";

            // Vérifie si le jour est un lundi pour commencer une nouvelle ligne
            if (($jour + $premierJourSemaine - 1) % 7 == 0) {
                echo "</div><div class='calendrier'>";
            }
        }

        echo "</div>";
    } else {
        echo "<p>Aucune sélection de mois et d'année n'a été faite.</p>";
    }

            
    ?>
</body>
</html>