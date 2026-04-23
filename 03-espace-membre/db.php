<?php
$dsn = 'mysql:host=127.0.0.1;dbname=espace_membre.2026';
$username = 'valet';
$password = 'valet';
$options = [
   // Lancer des exceptions en cas d'erreur
    PDO::ATTR_ERRMODE             => PDO::ERRMODE_EXCEPTION,
    // Retourner des tableaux associatifs par défaut
    PDO::ATTR_DEFAULT_FETCH_MODE  => PDO::FETCH_ASSOC,
    // Ne pas émuler les requêtes préparées
    PDO::ATTR_EMULATE_PREPARES    => false,
];
try {
  $pdo= new PDO($dsn, $username, $password, $options);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
die("erreur". $e->getMessage());
}