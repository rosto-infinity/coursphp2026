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
</body>

</html>