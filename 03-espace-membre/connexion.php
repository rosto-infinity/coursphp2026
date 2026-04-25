<?php

declare(strict_types=1);
session_start();
require_once 'db.php';
require_once 'flash.php';

function authenticateUser(PDO $pdo, string $mailconnect, string $mdpconnect): string
{
    if (empty($mailconnect) || empty($mdpconnect)) return "Tous les champs doivent être complétes !";

    $requser = $pdo->prepare("SELECT * FROM membres WHERE  mail = :mail");
    $requser->execute([':mail' => $mailconnect]);
    $userinfo = $requser->fetch();
    // var_dump($userinfo);

    if (!$userinfo || !password_verify($mdpconnect, $userinfo['motdepasse'])) {
        return "Identifiants invalides."; // Message unique pour les deux erreurs
    }

    $_SESSION['id'] = $userinfo['id'];
    $_SESSION['pseudo'] = $userinfo['pseudo'];
    $_SESSION['mail'] = $userinfo['mail'];
    // $_SESSION['avatar'] = $userinfo['avatar'];
    $_SESSION['role'] = $userinfo['role'];
    return "success";
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "ok";
    $mailconnect   = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL) ?? '';
    $mdpconnect = $_POST['motdepasse'] ?? '';

    $result = authenticateUser($pdo, $mailconnect, $mdpconnect);
    if ($result === "success") {
        flash_set('success', "Heureux de vous revoir !");
        header("Location: profil.php?id=" . $_SESSION['id']);
        exit();
    } else {
        flash_set('error', $result);
        header("Location: connexion.php");
        exit();
    }
}
include 'header.php';
?>

<div class="card">
    <h2 class="text-center" style="margin-bottom: 2rem;">connexion</h2>

    <form method="POST" action="">
        <div class="form-group">
            <label for="mail">Adresse E-mail</label>
            <input type="email" placeholder="votre@email.com" id="mail" name="mail" />
        </div>

        <div class="form-group">
            <label for="mdp">Mot de passe</label>
            <input type="password" placeholder="8 caractères min. (lettre + chiffre)" id="mdp" name="motdepasse" />
        </div>

        <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 1rem;">
            Se connecter
        </button>

        <p class="text-center mt-4" style="font-size: 0.9rem; color: #94a3b8;">
            Déjà inscrit ? <a href="connexion.php" style="color: var(--vue-green); text-decoration: none;">Se connecter</a>
        </p>
    </form>
</div>

<?php include 'footer.php'; ?>