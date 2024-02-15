<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="controllers/traitement.php" method="POST">
    <select name="civilite">
        <option value="Mr">Mr</option>
        <option value="Mme">Mme</option>
    </select>
    <br>
    <br>
    <input type="text" placeholder="Nom" name="name">
    <br>
    <br>
    <label for="pays">Pays de naissance :</label><br>
    <select name="pays">
        <option value="France">France</option>
        <option value="Belgique">Belgique</option>
        <option value="Suisse">Suisse</option>
        <option value="Luxembourg">Luxembourg</option>
        <option value="Allemagne">Allemagne</option>
        <option value="Italie">Italie</option>
    </select>
    <br>
    <br>
    <label for="birth">Date de naissance :</label><br>
    <input type="date" name="anniversaire">
    <br>
    <br>
    <input type="email" name="email" placeholder="Email">
    <br>
    <br>
    <label for="password">Mot de passe :</label><br>
    <input type="password">
    <br>
    <br>
    <input type="number" name="cp" placeholder="Code Postal">
    <br>
    <br>
    <label for="profile">Choisir une photo de profil :</label><br>
    <input type="file" name="profile" placeholder="Choisir une photo">
    <br>
    <br>
    <legend> Quels langages connaissez-vous ?</legend>
    <input type="radio" name="langages" value="html/css">
    <label for="htmlcss">HTML/CSS</label>
    <input type="radio" name="langages" value="php">
    <label for="php">PHP</label>
    <input type="radio" name="langages" value="js">
    <label for="js">JavaScript</label>
    <input type="radio" name="langages" value="autres">
    <label for="autres">Autres</label><br>
    <br>
    <textarea rows="5" cols="33" name="commentaire" placeholder="Racontez votre expérience avec la programation ou l'informatique"></textarea>
    <input type="submit">
</form>
    <?php
        
    ?>
</body>
</html>