<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendrier (tableau)</title>
</head>
<style>
        table {
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
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

        // Affiche le calendrier
        echo "<h2>Calendrier pour $moisChoisi $anneeChoisie</h2>";
        echo "<table>";
        echo "<tr><th>Lun</th><th>Mar</th><th>Mer</th><th>Jeu</th><th>Ven</th><th>Sam</th><th>Dim</th></tr>";

        //Calcul des cellules vides
        $cellulesVides = date('N', $premierJourMois) -1;

        //Calcul du nombres de semaines
        $nbSemaines = ceil(($cellulesVides + $nbJoursMois) / 7);

        //Init du compteur de jour
        $jour = 1;

        //Boucle pour afficher les semaines
        for ($i = 0; $i < $nbSemaines; $i++) {
            echo "<tr>";

            //Boucle pour afficher les jours
            for ($j = 0; $j < 7; $j++) {
                //Vérifiie la case vide
                if (($i == 0 && $j < $cellulesVides) || $jour > $nbJoursMois) {
                    echo "<td></td>"; //cellule vide
                } else {
                    echo "<td>$jour</td>";
                    $jour++;
                }
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Aucune sélection de mois et d'année n'a été faite.</p>";
    }
    ?>
</body>
</html>