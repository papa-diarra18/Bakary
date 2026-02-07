<?php
session_start();
$login=true;
include "../../header.php" ;
include "../../navbar.php" ;

$errorMessage = $_SESSION['error'] ?? null;
unset($_SESSION['error']); //supprimer le message d'erreur
?>

    <main>
    <div class=" container mt-5 pt-5">
        <h1>Connectez-vous</h1>
        <?php if (isset($errorMessage)): ?>
        <div class="alert alert-danger" role="alert">
            <?= $errorMessage ?>
        </div>
        <?php endif ?>
        <form action="/actions/auth/login_action.php" method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password" placeholder="Mot de passe" name="password">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Se connecter</button>
            </div>
        </form>
    </div>
    </main>
    <?php include '../../footer.php'?>