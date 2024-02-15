<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tableaux</title>
</head>
<body>
<h2>Exo 1</h2>
<?php
$firstnames = ["Steve", "Jeff", "Marck", "Sundar"];
print_r ($firstnames);
?>
<h2>Exo 2</h2>
<?php
$index_marck = array_search("Marck", $firstnames);

if ($index_marck !== false) {
    $firstnames[$index_marck] = "Mark";
    print_r ($firstnames);
} else {
    echo "Prénom non trouvé";
}
?>

<h2>Exo 3</h2>
<?php
array_push($firstnames, "Bill");
print_r ($firstnames);
?>

<h2>Exo 4</h2>
<?php
array_unshift ($firstnames, "Julie");
print_r ($firstnames);
?>

<h2>Exo 5</h2>
<?php
sort ($firstnames);
print_r ($firstnames);
?>

<h2>Exo 6</h2>
<?php
echo "Le premier du tableau firstnames est : " . $firstnames[0];
?>

<h2>Exo 7</h2>
<?php
$nombrePrenoms = count($firstnames);
echo $nombrePrenoms;
?>

<h2>Exo 8</h2>
<?php
echo "Liste des prénoms :\n";
echo "<ul>\n";
foreach ($firstnames as $prenom) {
  echo "<li>$prenom</li>\n";
}

echo "</ul>";
?>

<h2>Exo 9</h2>
<?php
$user1 = [
  "firstname" => "Steve",
  "lastname" => "Jobs",
  "email" => "steve.jobs@apple.com"
];
$user2 = [
  "firstname" => "Bill",
  "lastname" => "Gates",
  "email" => "bill.gates@microsoft.com"
];
$user3 = [
  "firstname" => "Jeff",
  "lastname" => "Bezos",
  "email" => "jeff.bezos@amazon.com"
];
$user4 = [
  "firstname" => "Sundar",
  "lastname" => "Pichai",
  "email" => "sundar.pichai@google.com"
];
$user5 = [
  "firstname" => "Mark",
  "lastname" => "Zuckerberg",
  "email" => "mark.zuckerberg@meta.com"
];
$user6 = [
  "firstname" => "Julie",
  "lastname" => "Chapon",
  "email" => "julie.chapon@yuka.com"
];
?>

<h2>Exo 10</h2>
<?php
$users = [
  "user1" => $user1,
  "user2" => $user2,
  "user3" => $user3,
  "user4" => $user4,
  "user5" => $user5,
  "user6" => $user6
];
foreach ($users as $key => $user) {
  echo "Informations pour $key :\n <br>";
  foreach ($user as $key => $value) {
      echo "$key : $value\n";
  }
  echo "\n <br>";
};
?>

<h2>Exo11</h2>
<?php
echo "L'email du patron de Meta est : " . $users["user3"]["email"] . ".\n <br>";
echo "Le patron de Microsoft s'appelle " . $users["user5"]["firstname"] . " " . $users["user5"]["lastname"] . ".\n <br>";
echo "Dans un monde si masculin, Yuka a été fondé en 2016, notamment par " . $users["user6"]["firstname"] . " " . $users["user6"]["lastname"] . ".\n";

?>

<h2>Exo 12</h2>
<?php
echo "Liste des utilisateurs :\n";
echo "<ul>\n";

foreach ($users as $key => $user) {
    echo "<li>{$user['firstname']} {$user['lastname']} - {$user['email']}</li>\n";
}

echo "</ul>";
?>
<h1>URL</h1>
<h2>Exo1 & 5</h2>
<?php
// Afficher tous les utilisateurs dans une liste avec des liens
echo "Liste des utilisateurs :\n";
echo "<ul>\n";

foreach ($users as $key => $user) {
    $index = array_search($user, $users);
    $colors= ["blue", "red", "green"];
    $couleur = $colors[array_rand($colors)];
    $link = "user.php?user=" . urlencode($key) . "&id=" . urlencode($index);
    echo "<li><a href='$link' style='color: $couleur;'>{$user['firstname']} {$user['lastname']} - {$user['email']}</a></li>\n";
}

echo "</ul>";
?>

<?php


?>
</body>
</html>