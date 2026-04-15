<?php
declare(strict_types=1);
session_start();  // Indispensable pour utiliser les sessions
 include "database.php";

 $message = "";

 if(isset($_GET['id'])){
  $id =$_GET['id'];

  $sql="SELECT * FROM etudiants  WHERE id = :id";
  $req= $pdo->prepare($sql);
  $req ->execute(['id' => $id]);
  $etudiant = $req->fetch();
  var_dump($etudiant);

   if (!$etudiant) {
        header("Location: index.php");
        exit();
    }
 }

 // 2. Traiter la mise à jour
if (isset($_POST["modifier"])) {
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $id = $_POST['id'];

    if (!empty($nom) && !empty($prenom) && !empty($email)) {
        $sql = "UPDATE etudiants SET nom = :nom, prenom = :prenom, email = :email WHERE id = :id";
        $req = $pdo->prepare($sql);
        $req->execute(compact('nom','prenom','email','id'));

        $_SESSION['succes'] = "Mise à jour réussie !";
        header("Location: index.php");
        exit();
    } else {
        $message = "Veuillez remplir tous les champs.";
    }
}




?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un étudiant</title>
</head>
<body>

    <h1>Ajouter un nouvel étudiant</h1>

    <?php if ($message): ?>
        <p style="color: red;"><?= $message ?></p>
    <?php endif; ?>

     <form action="" method="POST">
        <!-- Champ caché pour l'ID -->
        <input type="hidden" name="id" value="<?= $etudiant['id'] ?>">
        
        <div>
            <label>Nom :</label><br>
            <input type="text" name="nom" value="<?= htmlspecialchars($etudiant['nom']) ?>">
        </div>
        <br>
        <div>
            <label>Prénom :</label><br>
            <input type="text" name="prenom" value="<?= htmlspecialchars($etudiant['prenom']) ?>">
        </div>
        <br>
        <div>
            <label>Email :</label><br>
            <input type="email" name="email" value="<?= htmlspecialchars($etudiant['email']) ?>">
        </div>
        <br>
        <button type="submit" name="modifier">Enregistrer les modifications</button>
        <a href="index.php">Annuler</a>
    </form>
</body>
</html>