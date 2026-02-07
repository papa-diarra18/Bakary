<?php
session_start();
require('Database/db_connexion.php');
$index = true;
include "header.php";
include "navbar.php";
?>

<main>
    <div class=" container mt-5 pt-5">
        <h1>Bienvenue <?= $_SESSION['user_prenom'] ?? "" ?>
            <?= $_SESSION['user_nom'] ?? "" ?> sur L2GL APP</h1>
    </div>
</main>
<?php include 'footer.php' ?>