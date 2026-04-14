<?php

declare(strict_types=1);

echo '<h1> Data type</h1>
 <a href="index.php">Accueil</a> <br />
';
#Traiter les Soumissions de Formulaires
$erreurs  = [];
$input = $_POST['email'];
$email   = filter_var($input, FILTER_SANITIZE_EMAIL);


$succes   = false;
$donnees  = ['nom' => '', 'email' => '', 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $donnees = [
    'nom'     => trim($_POST['nom']     ?? ''),
    'email'   => trim($_POST['email']   ?? ''),
    'message' => trim($_POST['message'] ?? ''),
  ];

  if (empty($donnees['nom'])) {
    $erreurs['nom'] = 'Le nom est requis';
  }

  if (!filter_var($donnees['email'], FILTER_VALIDATE_EMAIL)) {
    $erreurs['email'] = 'Une adresse email valide est requise';
  }

  if (empty($erreurs)) {
    // Sauvegarder en BDD, envoyer un email, etc.
    $succes = true;
  }
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
      <input name="nom" value="<?= htmlspecialchars($donnees['nom']) ?>">
      <?php if (isset($erreurs['nom'])): ?>
        <span class="error" style="color:red;"><?= $erreurs['nom'] ?></span>
      <?php endif; ?>

      <input type="email" name="email" value="<?= htmlspecialchars($donnees['email']) ?>">
      <textarea name="message"><?= htmlspecialchars($donnees['message']) ?></textarea>
      <button type="submit">Envoyer</button>
    </form>
  <?php endif; ?>
</body>

</html>