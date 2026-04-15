<?php
declare(strict_types=1);
session_start();  // Indispensable pour utiliser les sessions
 include "database.php";

$message = "";

if(isset($_POST["soumetre"])){
  $nom = htmlspecialchars($_POST['nom']);
  $prenom = htmlspecialchars($_POST['prenom']);
  $email = htmlspecialchars($_POST['email']);

  if(!empty($nom) && !empty($prenom) && !empty($email) ){
      $sql ="INSERT INTO etudiants (nom, prenom, email)
      VALUES (:nom, :prenom, :email)";
      $req= $pdo->prepare($sql);
      $req->execute([
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email,
      ]);
    // On stocke le message en session avant de rediriger
    $_SESSION['succes'] = "Création du nouvel étudiant avec succès !";
     
    header("Location: index.php");
      exit();
  }else{
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
        <div>
            <label>Nom :</label><br>
            <input type="text" name="nom" >
        </div>
        <br>
        <div>
            <label>Prénom :</label><br>
            <input type="text" name="prenom" >
        </div>
        <br>
        <div>
            <label>Email :</label><br>
            <input type="email" name="email" >
        </div>
        <br>
        <button type="submit" name="soumetre">Enregistrer</button>
        <a href="index.php">Annuler</a>
    </form>

</body>
</html>