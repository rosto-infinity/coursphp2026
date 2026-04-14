<?php

declare(strict_types=1);

echo '<h1> Data type</h1>
 <a href="index.php">Accueil</a> <br />
';
#Traiter les Soumissions de Formulaires

$succes = false;
 $erreurs = [];

if(isset($_POST['soumettre'])){

 $nom = $_POST['nom'];
 $email = $_POST['email'];
 $password = $_POST['password'];
 $messsage = $_POST['messsage'];
 $age = $_POST['age'];
 
    // Champ requis
    if (empty($nom)) {
        $erreurs['nom'] = 'Le nom est requis';
    } elseif (strlen($data['nom']) < 2) {
        $erreurs['nom'] = 'Le nom doit contenir au moins 2 caractères';
    }

    // Validation d'email
    // if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
    //     $erreurs['email'] = 'Adresse email invalide';
    // }

    // Robustesse du mot de passe
    // if (strlen($data['motdepasse']) < 8) {
    //     $erreurs['motdepasse'] = 'Le mot de passe doit contenir au moins 8 caractères';
    // }

    // Plage numérique
    // $age = filter_var($data['age'], FILTER_VALIDATE_INT);
    // if ($age === false || $age < 18 || $age > 120) {
    //     $erreurs['age'] = "L'âge doit être compris entre 18 et 120";
    // }

  
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Traiter les Soumissions de Formulaires</title>
</head>

<body>
 <?php if ($succes): ?>
    <p class="success">Merci pour votre message !</p>
<?php else: ?>

    <form method="POST">
       Nom <input type="text" name="nom" value=""> <br /> <br />
        Email <input type="email" name="email" value=""><br /> <br />
        Password <input type="password" name="password" value=""><br /> <br />
        Age  <input type="text" name="age" value=""> <br /><br />
        <textarea name="message"></textarea> <br /><br />
        <button type="submit" name="soumettre">Envoyer</button>
    </form>

<?php endif; ?>


</body>

</html>