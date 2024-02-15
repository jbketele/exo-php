<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendrier</title>
</head>
<body>
    <h1>Formulaire de création de calendrier</h1>
    <form action="calendrier2.php">
        <select name="mois" id="mois">
            <option value="">Choisir le mois</option>
            <option value="janvier">Janvier</option>
            <option value="février">Février</option>
            <option value="mars">Mars</option>
            <option value="avril">Avril</option>
            <option value="mai">Mai</option>
            <option value="juin">Juin</option>
            <option value="juillet">Juillet</option>
            <option value="aout">Août</option>
            <option value="septembre">Septembre</option>
            <option value="octobre">Octobre</option>
            <option value="novembre">Novembre</option>
            <option value="décembre">Décembre</option>
        </select>
        <br>
        <br>
        <select name="année" id="année">
        <?php
            // Obtenir l'année actuelle
            $annee_actuelle = date("Y");

            // Boucle pour afficher les 10 années précédentes et les 10 années suivantes
            for ($i = $annee_actuelle - 10; $i <= $annee_actuelle + 10; $i++) {
                echo "<option value='$i'>$i</option>";
                echo "<br>";
            }
            
        ?>
        <input type="submit"></input>
        </select>
    </form>
</body>
</html>