<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Exo5</h2>
<form action="index2.php" method="GET">
  <select id="titre" name="civil" id="civilite">
    <option value="Mr">Mr</option>
    <option value="Mme">Mme</option>
  </select>
  <label for="firstname">Prénom</label>
  <input id="firstname" type="text" name="firstname">
  <label for="lastname">Nom</label>
  <input id="lastname" type="text" name="lastname">
  <input type="submit" value="Envoyer">;
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Déterminer la méthode
    $method = $_SERVER["REQUEST_METHOD"];
    
    //Récupérer les données transmises
    if ($method == "POST") {
        $nom = $_POST['nom'] ?? '';
        $prenom = $_POST['prenom'] ?? '';
        $titre = $_POST['titre'] ?? '';
    
    } else {
        $nom = $_GET['nom'] ?? '';
        $prenom = $_GET['prenom'] ?? '';
        $titre = $_GET['titre'] ?? '';
    
    }

     // Afficher les données
     echo "<h2>Informations Utilisateur :</h2>";
     echo "<p>Titre : $titre</p>";
     echo "<p>Nom : $nom</p>";
     echo "<p>Prénom : $prenom</p>";
} else {
    // Si aucune donnée n'a été soumise, afficher le formulaire

    echo "<form action=\"\" method=\"post\">";
    echo "<label for=\"titre\">Titre :</label>";
    echo "<select id=\"titre\" name=\"titre\">";
    echo "<option value=\"Mr\">M.</option>";
    echo "<option value=\"Mme\">Mme</option>";
    echo "</select><br><br>";
    echo "<label for=\"nom\">Nom :</label>";
    echo "<input type=\"text\" id=\"nom\" name=\"nom\"><br><br>";
    echo "<label for=\"prenom\">Prénom :</label>";
    echo "<input type=\"text\" id=\"prenom\" name=\"prenom\"><br><br>";
    echo "<input type=\"submit\" value=\"Envoyer\">";
    echo "</form>";
}
?>
</body>
</html>