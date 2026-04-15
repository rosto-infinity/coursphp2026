<?php
 declare(strict_types=1);
 session_start();  // Indispensable pour utiliser les sessions
include "database.php";

if(isset($_GET['id'])){
  $id =$_GET['id'];
  $sql ="DELETE FROM etudiants WHERE id = :id";
  $req= $pdo->prepare($sql);
  $req ->execute(['id' => $id]);

  $_SESSION['succes'] = "Etudiant supprimé avec succès !";
   header("Location: index.php");
     exit();
}

?>