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

#Déclarations de Type de Retour
function additionner(int $a, int $b): int {
    return $a + $b;
}

// function trouverUtilisateur(int $id): ?User { // ? permet null
//     return $id > 0 ? new User() : null;
// }

function journaliser(string $msg): void { // Pas de retour
    echo $msg;
}

# PHP 8.0+)
function traiterID(int|string $id): void {
    echo "Traitement : $id <br>";
}

traiterID(42);        // Fonctionne
traiterID("ABC123");  // Fonctionne aussi