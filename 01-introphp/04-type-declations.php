<?php
declare(strict_types=1);

 echo '<h1> Data type</h1>
 <a href="index.php">Accueil</a> <br />
';

#Types des Paramètres de Fonction

function saluer(string $nom): void {
    echo "Bonjour, $nom ! <br>";
}

saluer("Alice "); // Fonctionne

#saluer(123);     // TypeError !