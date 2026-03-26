<?php
echo '<h1> Data type</h1>
 <a href="index.php">Accueil</a> <br />
';

$nom = "Prof Waffo";
$nom2 = "Prof Waffo2";
$simpleQuote = 'Bonjour';              // Guillemets simples (littéral)
$doubleQuote = "Bonjour, $nom";   // Guillemets doubles (interpolation)

$simpleQuote = 'Bonjour,' . $nom2 . 'et' . $nom;
$simpleQuote = "Bonjour, $nom2 et $nom";

echo "$doubleQuote
<br> $simpleQuote <br>";

$heredoc = <<<EOT
Chaîne sur
plusieurs lignes
EOT;

echo $heredoc;


$decimal = 42;           // Décimal
$negatif = -17;          // Négatif
$octal = 0755;           // Octal (commence par 0)
$hex = 0xFF;             // Hexadécimal (commence par 0x)
$binaire = 0b1010;       // Binaire (commence par 0b)
$lisible = 1_000_000;    // PHP 7.4+ : séparateur de milliers



#3. Float (Nombre à virgule flottante)
$prix = 19.99;
$scientifique = 1.2e3;  // 1200
$negatif = -0.5;

#4. Boolean (Booléen)
$estValide = true;
$aUneErreur = false;

// Valeurs considérées comme "fausses" (falsy) en PHP :
// false, 0, 0.0, "", "0", [], null

#5. Array (Tableau)
$indexe = [1, 2, 3];
$associatif = [
  "nom" => "Jean",
  "age" => 30
];

echo "<br>" . $associatif["nom"];

class Utilisateur
{
  public string $nom;
}
$user = new Utilisateur();

#7. Callable (Appelable)
$callback = function ($x) {
  return $x * 2;
};

$callback2 = fn($x) => $x * 2;


#Vérification des Types

echo "<br>" . gettype($var);      // Retourne le type sous forme de chaîne
is_string($var);    // Vérification booléenne
is_int($var);
is_float($var);
is_bool($var);
is_array($var);
is_null($var);