<?php
 echo '<h1> Variable</h1>
 <a href="index.php">Accueil</a> <br />
';


$nom = "Jean";       // Chaîne de caractères (String)

$age = 25;           // Entier (Integer)

$prix = 19.99;       // Nombre à virgule (Float)
$estActif = true;    // Booléen (Boolean)

<?php
$nom = "Alice";

isset($nom);       // true - la variable existe et n'est pas nulle
isset($inconnu);   // false - la variable n'existe pas

empty("");         // true - une chaîne vide est considérée comme "vide"
empty(0);          // true - zéro est considéré comme "vide"
empty("hello");    // false - contient des données

unset($nom);       // Détruit la variable
isset($nom);       // false - n'existe plus