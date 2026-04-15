<?php
 declare(strict_types=1);
session_start();  // Indispensable pour utiliser les sessions
include "database.php";


$sql="SELECT * FROM etudiants";
// 1. Préparation de la requête
$req= $pdo->prepare($sql);

// 2. Exécution
$req->execute();

// 3. Récupération de tous les résultats dans une variable
$etudiants = $req->fetchAll();

// var_dump($etudiants);



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

<?php  if(isset($_SESSION['succes'])) :?>
  <p style="color: green; padding: 5px; background:rgba(0,255,0,0.3)"><?= $_SESSION['succes'] ?></p>
  <?php unset($_SESSION['succes'])  ?>
<?php endif; ?>
 <!-- Bouton Créer -->
    <a href="create.php" >Ajouter un étudiant</a> <br /> 


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
                <a href="update.php?id=<?=  $etudiant['id']?>" >Edit </a>
                <a href="delete.php?id=<?=  $etudiant['id']?>"  onClick=" return confirm('Êtes-vous sûr de vouloir supprimer ?')">
                  Supprimer
                 </a>

                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>

    </table>        
</body>

</html>