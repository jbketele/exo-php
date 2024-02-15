<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <h1>Les variables</h1>

  <h2>Exo 1</h2>
  <?php
$name = "john";
echo $name; ?>

<h2>Exo 2</h2>
<?php
$age = 25;
echo $age . "<br>";
$weight = 70.5;
echo $weight . "<br>";
$height = 175;
echo $height;
?>
<h2>Exo 3</h2>
<?php
echo $weight * 1000 ." grammes" . "<br>";
echo $height / 100 . " mètres";
?>

<h2>Exo 4</h2>

<?php
$bmc = 20;
echo $bmc;
$bmc = $weight/(($height/100) * ($height/100));
echo $bmc;
?>

<h2>Exo5</h2>
<?php
$var = null;
echo $var;
$var = 42;
echo $var . "<br>";

//Exo7
$color = "blue";
echo "<p style='color: $color; text-transform: uppercase;'>La couleur en majuscules : $color</p>";

// Afficher la couleur en minuscules
echo "<p style='color: $color; text-transform: lowercase;'>La couleur en minuscules : $color</p>";

// Afficher la couleur en couleur
echo "<p style='color: $color;'>La couleur : $color</p>";
?>

<h1>Les conditions</h1>
<h2>Exo 1</h2>
<?php
if ($age >= 18) {
  echo "Vous êtes majeur ";
} else {
  echo "Vous êtes mineur ";
} ?>

<h2>Exo 2</h2>
<?php
$isOk = true;
if ($isOk === true) {
  echo "C'est bon";
} else {
  echo "Ce n'est pas bon";
}
?>

<h2>Exo 3</h2>
<?php
$gender = "homme";
if ($gender === "homme" and $age > 18) {
  echo "Vous êtes un homme et majeur";
} if ($gender === "homme" and $age < 18) {
  echo "Vous êtes un homme et mineur";
} if ($gender === "femme" and $age > 18) {
  echo "Vous êtes une femme et majeur";
}if ($gender === "femme" and $age < 18) {
  echo "Vous êtes un femme et mineur";
}
?>

<h2>Exo 4</h2>
<?php
if ($bmc < 18.5) {
  echo " Maigreur";
} if ($bmc < 24.9 and $bmc >= 18.5) {
  echo " Corpulence normale";
} if ($bmc < 29.9 and $bmc >= 25) {
  echo " Surpoids";
} if ($bmc >= 30) {
  echo " Obésité";
} ?>

<h2>Exo 5</h2>
<?php
if ($gender != "homme") {
  echo "C'est une développeuse";
} else {
  echo "C'est un développeur";
}?>

<h2>Exo 6</h2>
<?php
if ($age >= 18) {
  $state = "Tu es majeur";
} else {
  $state = "Tu n'es pas majeur";
}
echo $state;

?>
<h2>Exo 7</h2>
<?php
if ($isOk == false) {
  echo 'c\'est pas bon !!!';
} else {
  echo 'c\'est ok !!';
}
?> 

<h1>Les boucles</h1>
<h2>Exo 1</h2>
<?php
$nombre = 0;
do {
  echo $nombre;
  $nombre = $nombre + 1;
} while ($nombre < 10);
?>

<h2>Exo 2</h2>
<?php
for ($i = 1; $i <= 15; $i++) {
  echo $i;
  echo " On y arrive presque.<br>";
}
?>

<h2>Exo 3</h2>
<?php
if ($bmc < 24.9 and $bmc >= 18.5) {
  $isOk = true;
}
$age = 0;
$weight = 2.5;
$height = 30;
$personne = array (
  "name" => $name,
  "age" => $age,
  "weight" => $weight,
  "height" => $height,
  "isOk" => $isOk,
  "bmc" => $bmc
);
do {
  $age = $age + 1;
  
} while ($age < 100);

?>

<h2>Exo 2 (bis)</h2>
<?php
$a = 0;
$b = 1;
do {
  $b = $b * $a;
  echo $b;
  $a = $a + 1;
} while ($a < 20);
?>

<h2>Exo 3 (bis)</h2>
<?php
$a = 100;
$b = 50;
do {
  $b = $b * $a;
  echo $b;
  $a = $a - 1;
} while ($a > 10);
?>

<h2>Exo 4</h2>
<?php
$c = 1;
do {
  echo $c;
  $c = $c + ($c/2);
} while ($c < 10);
?>
<h2>Exo 5</h2>
<p>cf exo </p>
<h2>Exo 6</h2>
<?php
for ($i = 20; $i >= 0; $i--) {
  echo $i;
  echo " C'est presque bon.<br>";
}
?>

<h2>Exo 7</h2>
<?php
for ($i = 1; $i <= 100; $i+= 15) {
  echo $i;
  echo " On tient le bon bout.<br>";
}
?>

<h2>Exo 8</h2>
<?php
for ($i = 20; $i >= 0; $i-= 12) {
  echo $i;
  echo " Enfin.<br>";
}
?>

<h1>Les tableaux</h1>
<?php
require_once(__DIR__ . '/users.php');
?>

<h1>Les fonctions</h1>
<h2>Exo 1</h2>
<?php
function number ($x){
  return $x;
}
$x = 22;
echo number($x);
?>

<h2>Exo 2</h2>
<?php
function numbers ($x, $y){
  return $x + $y;
}
$x = 12;
$y = 8;
echo numbers ($x, $y);
?>

<h2>Exo 3</h2>
<?php
$students=["Anatole","Benjamin","Caroline","David","Emilie","Fabien","Gustave","Henri","Isidore","Jean"];
function afficherListePrenoms($students) {
  $listePrenoms = implode(', ', $students);
  $message = "La liste des prénoms de la classe est $listePrenoms.";
  return $message;
}
echo afficherListePrenoms($students)
?>

<h2>Exo 4</h2>
<?php
$marks=[1,12,5,15,17,3,9,10,11,19];
function moyenne ($marks) {
  $nombreNotes = count($marks);
  
  if ($nombreNotes > 0) {
    $somme = array_sum($marks);
    $moyenne = $somme / $nombreNotes;
    return $moyenne;
  } else {
    return 0;
  }
}
echo moyenne ($marks);
?>

<h2>Exo 5</h2>
<?php
function studentsNotes ($students, $marks) {
  $associate = array_combine ($students, $marks);
  return $associate;
}
$resultat = studentsNotes($students, $marks);
foreach ($resultat as $students => $marks) {
  echo "$students - $marks, ";
}
?>
<h2>Exo 6</h2>
<?php
function studentsNotesTxt ($students, $marks) {
  $associate = array_combine ($students, $marks);
  $resultatFinal = array();

  foreach ($resultat as $students => $marks) {
    $message = "";

    if ($marks >= 0 && $marks <= 5) {
      $message = "Au travail";
    }
    if ($marks > 5 && $marks <= 11) {
      $message = "Les efforts fournis ne sont pas suffisants";
    }if ($marks > 11 && $marks <= 16) {
      $message = "Bon travail";
    }if ($marks > 16 && $marks <= 20) {
      $message = "Excellent travail";
    }
    $resultatFinal[$students] = array("note" => $marks, "message" => $message);

  }
  return $resultatFinal;
}
foreach ($resultat as $students => $info) {
  echo "$students - $marks - $message";
};
?>

<h1>Les formulaires</h1>
<h2>Exo1</h2>
<form action="user.php" method="GET">
  <label for="firstname">Prénom</label>
  <input id="firstname" type="text" name="firstname">
  <label for="lastname">Nom</label>
  <input id="lastname" type="text" name="lastname">
  <input type="submit" value="Envoyer">
</form>

<h2>Exo2</h2>
<form action="user.php" method="POST">
  <label for="firstname">Prénom</label>
  <input id="firstname" type="text" name="firstname">
  <label for="lastname">Nom</label>
  <input id="lastname" type="text" name="lastname">
  <input type="submit" value="Envoyer">
</form>

<h2>Exo5</h2>
<a href="index2.php">formulaire</a>


</body>
</html>

