<?php

//connexion à la bdd
$server = "localhost";
$username = "jbketele";
$password = "pasdavenirsansagri";
$db = "colyseum";

try {
//créer une connexion
$connect = new PDO("mysql:host=$server;dbname=$db", $username, $password);

// Définir le mode d'erreur PDO sur exception
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
// Requête SQL pour récupérer tous les résultats
$sql = "SELECT * FROM clients";

// Préparer la requête SQL
$stmt = $connect->prepare($sql);

// Exécuter la requête
$stmt->execute();

// Vérifier s'il y a des résultats
if ($stmt->rowCount() > 0) {
    // Afficher les résultats dans un tableau HTML
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nom</th><th>Prénom</th><th>Anniversaire</th><th>card</th><th>N°carte</th></tr>";
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["lastName"]."</td><td>".$row["firstName"]."</td><td>".$row["birthDate"]."</td><td>".$row["card"]."</td><td>".$row["cardNumber"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 résultats trouvés";
}

echo "<br>";
$sql = "SELECT * FROM showTypes";
$stmt = $connect->prepare($sql);
$stmt->execute();

if ($stmt->rowCount() > 0){
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Type</th></tr>";
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["type"]."</td></tr>";
    }
    echo "</table>";
}

echo "<br>";

// Requête SQL pour récupérer tous les résultats
$sql = "SELECT * FROM clients LIMIT 20";

// Préparer la requête SQL
$stmt = $connect->prepare($sql);

// Exécuter la requête
$stmt->execute();

// Vérifier s'il y a des résultats
if ($stmt->rowCount() > 0) {
    // Afficher les résultats dans un tableau HTML
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nom</th><th>Prénom</th><th>Anniversaire</th><th>card</th><th>N°carte</th></tr>";
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["lastName"]."</td><td>".$row["firstName"]."</td><td>".$row["birthDate"]."</td><td>".$row["card"]."</td><td>".$row["cardNumber"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 résultats trouvés";
}

echo "<br>";

// Requête SQL pour récupérer tous les résultats
$sql = "SELECT * FROM clients WHERE card = 1";

// Préparer la requête SQL
$stmt = $connect->prepare($sql);

// Exécuter la requête
$stmt->execute();

// Vérifier s'il y a des résultats
if ($stmt->rowCount() > 0) {
    // Afficher les résultats dans un tableau HTML
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nom</th><th>Prénom</th><th>Anniversaire</th><th>card</th><th>N°carte</th></tr>";
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["lastName"]."</td><td>".$row["firstName"]."</td><td>".$row["birthDate"]."</td><td>".$row["card"]."</td><td>".$row["cardNumber"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 résultats trouvés";
}

echo "<br>";

// Requête SQL pour récupérer tous les résultats
$sql = "SELECT * FROM clients WHERE lastName LIKE 'M%' ORDER BY lastName";

// Préparer la requête SQL
$stmt = $connect->prepare($sql);

// Exécuter la requête
$stmt->execute();

// Vérifier s'il y a des résultats
if ($stmt->rowCount() > 0) {
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        echo "Nom du client : " . $row["lastName"]. "<br>";
        echo "Prénom du client : ". $row["firstName"]. "<br> <br>";
    }
}

echo "<br>";
echo "<br>";

$sql = "SELECT * FROM shows ORDER BY title";
$stmt = $connect->prepare($sql);
$stmt->execute();

if ($stmt->rowCount() > 0){
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo $row["title"]. " par ".$row["performer"]. ", le ".$row["date"]. " à ".$row["startTime"]. "<br>";
    }
};

echo "<br>";

$sql = "SELECT * FROM clients";
$stmt = $connect->prepare($sql);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "Nom du client : " . $row["lastName"]. "<br>";
        echo "Prénom du client : ". $row["firstName"]. "<br>";
        echo "Date de naissance : ". $row["birthDate"]. "<br>";
        if ($row["card"]== 1){
            echo "Carte de fidélité : Oui <br>";
            echo "Numéro de carte : ".$row["cardNumber"]. "<br><br>";
        } else {
            echo "Carte de fidélité : Non <br><br>";
        }
    }
};

} catch(PDOException $e) {
// En cas d'erreur de connexion ou d'exécution de la requête
echo "Erreur : " . $e->getMessage();
}

