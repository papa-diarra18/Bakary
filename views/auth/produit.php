<?php
session_start();
$produit = true;
include "../../header.php" ;
include "../../navbar.php" ;

$produits = $_SESSION['produits'] ?? [];
$errorMessage = $_SESSION['error'] ?? null;
unset($_SESSION['error']);

?>

    <main>
    <div class=" container mt-5 pt-5">
        <h1>Produits</h1>
        <?php if (isset($errorMessage)): ?>
        <div class="alert alert-danger" role="alert">
            <?= $errorMessage ?>
        </div>
        <?php endif ?>
        <button class="center btn btn-outline-success" type="submit"><a href="/views/auth/NProduit.php"> + Nouveau produit </a></button>
         <div class="row mt-5">
                <?php if (count($produits) === 0): ?>
                    <div class="alert alert-info" role="alert">
                        Aucun produit trouvé!
                    </div>
                <?php endif ?>
             <?php foreach ($produits as $produit): ?>
        <div class="col-4 mb-3">
             <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?= $produit['libelle'] ?></h5>
                    <p class="card-text"><?= $produit['description'] ?></p>
                    <p class="card-text">Prix: <?= $produit['prix'] ?> FCFA</p>
                    <p class="card-text">Quantité: <?= $produit['qte'] ?></p>
                    <a href="/views/auth/MProduit.php?produit_id=<?= $produit['id'] ?>" class="btn btn-primary">Modifier</a>
                    <a href="/actions/auth/delete_produit_action.php?produit_id=<?= $produit['id'] ?>" class="btn btn-danger">Supprimer</a>  
                </div>
            </div>
        </div>
             <?php endforeach ?>
         </div>
    </main>
    <?php include '../../footer.php'?>