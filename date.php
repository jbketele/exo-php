<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    echo "<h1>Les dates</h1>";
    echo "<h2>Exo1</h2>";
    $date = date('d/m/y');
    echo "Nous sommes le $date";

    echo "<h2>Exo2</h2>";
    $nombre_jours = cal_days_in_month(CAL_GREGORIAN, date('n'), date('y'));
    echo "il y a $nombre_jours jours ce mois-ci";

    echo "<h2>Exo3</h2>";
    $secondes_ecoulees = time();
    echo $secondes_ecoulees;

    echo "<h2>Exo4</h2>";
    
    // Coordonnées géographiques (exemple : Paris)
    $latitude = 48.8566;
    $longitude = 2.3522; 

    // Date actuelle
    $date_actuelle = time();

    // Calcul de la date de la prochaine éclipse solaire partielle
    //$timestamp_prochaine_eclipse = date_sunrise(strtotime("tomorrow"), SUNFUNCS_RET_TIMESTAMP, $latitude, $longitude, 90, ini_get("date.timezone"));

    //echo "Timestamp du début de la prochaine éclipse solaire partielle : $timestamp_prochaine_eclipse";

    echo "<h2>Exo6</h2>";
    // Créer un nouvel objet DateTime avec la date courante
    $dateCourante = new DateTime();

    // Afficher la date courante
    echo "La date courante est : " . $dateCourante->format('d-m-y');

    echo "<h2>Exo7</h2>";
    // Date de naissance au format 'Y-m-d'
    $dateDeNaissance = DateTime::createFromFormat('d-m-Y', '07-04-1998');

    // Afficher la date de naissance
    echo "Ma date de naissance est : " . $dateDeNaissance->format('d-m-Y');

    echo "<h2>Exo8</h2>";
    $aujourdHui = new DateTime();
    $difference = $dateDeNaissance->diff($aujourdHui);
    $age = $difference->y;
    echo "Je suis né le " . $dateDeNaissance->format('l j F Y') . ". J’ai actuellement $age ans.";

    echo "<h2>Exo9</h2>";
     // Créer un formateur de date en français
     $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::NONE);
     echo "Je suis né le " . $formatter->format($dateDeNaissance) . ". J’ai actuellement $age ans.";

    ?>
</body>
</html>