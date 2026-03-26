<?php

declare(strict_types=1);

echo '<h1> Data type</h1>
 <a href="index.php">Accueil</a> <br />
';

#Types des Paramètres de Fonction

function saluer(string $nom): void
{
  echo "Bonjour, $nom ! <br>";
}

saluer("Alice "); // Fonctionne

#saluer(123);     // TypeError !

#Déclarations de Type de Retour
function additionner(int $a, int $b): int
{
  return $a + $b;
}

// function trouverUtilisateur(int $id): ?User { // ? permet null
//     return $id > 0 ? new User() : null;
// }

function journaliser(string $msg): void
{ // Pas de retour
  echo $msg;
}

# PHP 8.0+)
function traiterID(int|string $id): void
{
  echo "Traitement : $id <br>";
}

traiterID(42);        // Fonctionne
traiterID("ABC123");  // Fonctionne aussi

#Types Nullable

function chercher(?int $id): ?int
{
  // $id peut être int ou null
  // Retourne string ou null

  return $id;
}

$result = chercher(null);
echo $result;
// Syntaxe union PHP 8.0+ (équivalent)
function chercher2(int|null $id): int|null
{
  return $id;
}

$result = chercher(4);
echo $result;


#Accepte n'importe quel type :
function deboguer(mixed $valeur): void
{
  var_dump($valeur);
}

echo deboguer('true');

# Déclarations de Type
class Produit
{
  public string $nom;
  public float $prix;
  public ?string $description = null;
  private int $stock = 0;
}

#Classe PHP moderne avec déclarations de type


class Calculatrice
{
  public function additionner(int|float $a, int|float $b) :float
  {
    return ($a + $b);
  }

  public function diviser(float $a, float $b): ?float
  {
    if ($b === 0.0) {
      return null; // Évite la division par zéro
    }
    return $a / $b;
  }
}

$calc = new Calculatrice();
echo $calc->additionner(5, 3.5);   // 8.5
echo $calc->diviser(10, 0);        // null
