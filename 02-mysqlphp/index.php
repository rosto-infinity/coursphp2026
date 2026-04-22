<?php
declare(strict_types=1);
session_start();
include "database.php";

// 1. Récupération propre de la recherche
$search = $_GET['search'] ?? ''; 
$params = [];

// 2. Construction dynamique de la requête
$sql = "SELECT * FROM etudiants";

if ($search !== '') {
    $sql .= " WHERE nom LIKE ? OR email LIKE ?";
    $term = "%$search%"; //ou '%' .$search. '%'
    $params = [$term, $term]; // On passe la même valeur deux fois pour les deux '?'
}

$sql .= " ORDER BY id DESC";

// 3. Préparation et Exécution en une seule ligne
$req = $pdo->prepare($sql);
$req->execute($params);

// 4. Récupération
$etudiants = $req->fetchAll();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mysql php connect DB</title>
</head>

<body>
    <h1>Liste des étudiants</h1>

    <?php if (isset($_SESSION['succes'])) : ?>
        <p style="color: green; padding: 5px; background:rgba(0,255,0,0.3)"><?= $_SESSION['succes'] ?></p>
        <?php unset($_SESSION['succes'])  ?>
    <?php endif; ?>
    <!-- Formulaire de recherche -->
    <form method="GET" action="" class="mb-4">
        <a class="" href="create.php">Créer un
            nouvel étudiant</a>
        <a class=""
            href="index.php">Actualiser
        </a>
        <input type="text" name="search" placeholder="Rechercher par nom ou email"
            value="<?= $search ?>" class="">
        <button type="submit" class="">Rechercher</button>
    </form>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($etudiants as $etudiant): ?>
                <tr>
                    <td><?= $etudiant['id'] ?></td>
                    <td><?= htmlspecialchars($etudiant['nom']) ?></td>
                    <td><?= htmlspecialchars($etudiant['prenom']) ?></td>
                    <td><?= htmlspecialchars($etudiant['email']) ?></td>
                    <td>
                        <a href="update.php?id=<?= $etudiant['id'] ?>">Edit </a>
                        <a href="delete.php?id=<?= $etudiant['id'] ?>" onClick=" return confirm('Êtes-vous sûr de vouloir supprimer ?')">
                            Supprimer
                        </a>

                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
</body>

</html>