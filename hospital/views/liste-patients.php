<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des patients</title>
</head>
<body>
<?php
require_once '../views/index.php';
require_once '../controllers/liste-patients.php';
?>
<h2>Liste des patients</h2>
<form action="../controllers/liste-patients.php" method="GET">
        <label for="search">Rechercher un patient :</label>
        <input type="text" id="search" name="search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
        <button type="submit">Rechercher</button>
    </form>
    <br>
    <?php if (!empty($patients)) : ?>
<table>
    <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Date de naissance</th>
        <th>Téléphone</th>
        <th>Mail</th>
    </tr>
    <?php foreach ($patients as $patient): ?>
    <tr>
        <td> <?php echo $patient['lastname'] ?> </td>
        <td> <?php echo $patient['firstname'] ?> </td>
        <td> <?php echo date('d-m-Y', strtotime($patient['birthdate'])) ?> </td>
        <td> <?php echo $patient['phone'] ?> </td>
        <td> <?php echo $patient['mail'] ?> </td>
        <td><a href="profil-patients.php?id=<?php echo $patient['id'] ?>">Afficher profil</a>-</td>
        <td><a href="../controllers/supprimer-patient.php?patient_id=<?php echo $patient['id'];?>">Supprimer le patient et ses rendez-vous</a></td>
    </tr>
    <?php endforeach; ?>
</table>
<?php else : ?>
        <p>Aucun patient trouvé.</p>
    <?php endif; ?>
<br>
    <?php if ($totalPatients > $limit) : ?>
        <div class="pagination">
            <?php
            $totalPages = ceil($totalPatients / $limit);
            for ($i = 1; $i <= $totalPages; $i++) {
                if ($i == $currentPage) {
                    echo "<span>$i</span>";
                } else {
                    echo "<a href='?page=$i'>$i</a>";
                }
            }
            ?>
        </div>
        <?php endif; ?>

</body>
</html>