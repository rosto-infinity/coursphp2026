<!DOCTYPE html>
<html>

<head>
    <title>Ma première page PHP</title>
</head>

<body>
    <h1><?php echo "Bienvenue sur ma page PHP !"; ?></h1>
    <p>Nous sommes en l'an :
        <?php echo date("Y"); ?>
    </p>
    <p>Heure actuelle : <?= date("H:i:s") ?></p>
<!-- Équivalent à : <?php echo date("H:i:s"); ?> -->


<?php
// Commentaire sur une seule ligne

# Autre commentaire sur une seule ligne (style shell)

/*
  Commentaire sur plusieurs lignes
  pour des explications plus longues
*/

/**
 * Commentaire DocBlock
 * Utilisé pour la documentation technique
 * @param string $nom Le nom de l'utilisateur
 */

?>

<a href="index.php">Accueil</a> <br />
<a href="01-code.php">Code</a><br />
<a href="02-variable.php">Variables</a><br />
<a href="03-datatype.php">Data type</a><br />
<a href="04-type-declations.php">Data type</a><br />
<a href="07-forms-users-input.php">forms-users-input</a><br />


</body>

</html>