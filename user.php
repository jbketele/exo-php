<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

// Le tableau $users contenant les tableaux associatifs des utilisateurs
$users = array(
    "user1" => array(
        "firstname" => "Steve",
        "lastname" => "Jobs",
        "email" => "steve.jobs@apple.com"
    ),
    "user2" => array(
        "firstname" => "Jeff",
        "lastname" => "Bezos",
        "email" => "jeff.bezos@amazon.com"
    ),
    "user3" => array(
        "firstname" => "Mark",
        "lastname" => "Zuckerberg",
        "email" => "mark.zuckerberg@facebook.com"
    ),
    "user4" => array(
        "firstname" => "Sundar",
        "lastname" => "Pichai",
        "email" => "sundar.pichai@google.com"
    ),
    "user5" => array(
        "firstname" => "Bill",
        "lastname" => "Gates",
        "email" => "bill.gates@microsoft.com"
    ),
    "user_julie" => array(
        "firstname" => "Julie",
        "lastname" => "Chapon",
        "email" => "julie.chapon@yuka.com"
    )
);

echo "<h1>Exo1</h1>";

// Vérifier si le paramètre "user" a été passé dans l'URL
if (isset($_GET['user'])) {
    // Récupérer la valeur du paramètre "user"
    $utilisateur = $_GET['user'];
    
    // Afficher le nom de l'utilisateur
    echo "Vous avez sélectionné l'utilisateur : $utilisateur";
} else {
    // Si aucun paramètre "user" n'a été passé dans l'URL
    echo "Aucun utilisateur sélectionné.";
};


echo "<h1>Exo2 - 3 - 4 - 5</h1>";

// Vérifier si le paramètre "id" existe dans l'URL
if (isset($_GET['id'])) {
    // Si le paramètre "id" existe, stocker sa valeur dans la variable $id
    $id = $_GET['id'];
    // Afficher la valeur de $id à titre de test
    echo "ID de l'utilisateur : $id";
    echo "<br>";
    // Vérifier si l'ID correspond à un utilisateur dans le tableau $users
    if (array_key_exists($id, $users)) {
        // Afficher le prénom et le nom de l'utilisateur
        $prenom = $users[$id]['firstname'];
        $nom = $users[$id]['lastname'];
        echo "Prénom : $prenom<br>";
        echo "Nom : $nom<br>";

        $colors= ["blue", "red", "green"];        
        if (isset($_GET['color'])) {
            $couleur = $_GET['color'];
        } else {
            $couleur = "black";
        };

        // Afficher le nom de l'utilisateur avec la couleur choisie
        echo "<span style='color: $couleur;'>$prenom $nom</span><br>";        

        // Afficher le lien pour contacter l'utilisateur par e-mail
        echo "<a href='mailto:{$users[$id]['email']}'>$prenom $nom</a>";
    } else {
        // Si l'ID ne correspond à aucun utilisateur dans le tableau $users
        echo "Utilisateur non trouvé.";
    }
} else {
    // Si le paramètre "id" n'existe pas, rediriger vers la page users.php
   // header("Location: users.php");
    //exit; 
    // Assure que le script s'arrête après la redirection
}

echo "<h1>Les formulaires</h1>";
echo "<h2>Exo3</h2>";
// Vérifier si des données ont été soumises
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Récupérer les données du formulaire
    $nom = $_GET['lastname'];
    $prenom = $_GET['firstname'];

    // Afficher les données
    echo "<h2>Informations Utilisateur :</h2>";
    echo "<p>Nom : $nom</p>";
    echo "<p>Prénom : $prenom</p>";
} else {
    // Si aucune donnée n'a été soumise, afficher un message d'erreur
    echo "<p>Aucune donnée soumise.</p>";
}

echo "<h2>Exo4</h2>";
// Vérifier si des données ont été soumises
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST['lastname'];
    $prenom = $_POST['firstname'];

    // Afficher les données
    echo "<h2>Informations Utilisateur :</h2>";
    echo "<p>Nom : $nom</p>";
    echo "<p>Prénom : $prenom</p>";
} else {
    // Si aucune donnée n'a été soumise, afficher un message d'erreur
    echo "<p>Aucune donnée soumise.</p>";
}

?>

</body>
</html>

