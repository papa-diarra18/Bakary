<?php
session_start();
$produit = true;

include "../../header.php";
include "../../navbar.php";

$produits = [];
$errorMessage = $_SESSION['error'] ?? null;
unset($_SESSION['error']);
?>

<main>
    <div class=" container mt-5 pt-5">
        <h1>Nouveau produit</h1>
        <?php if (isset($errorMessage)): ?>
        <div class="alert alert-danger" role="alert">
            <?= $errorMessage ?>
        </div>
        <?php endif ?>
        <form action="/actions/auth/create_produit_action.php" method="POST">
            <div class="mb-3">
                <label for="libelle" class="form-label">Libelle</label>
                <input type="text" class="form-control" id="libelle" placeholder="Votre libelle" name="libelle">
            </div>
            <div class="mb-3">
                <label for="prix" class="form-label">Prix</label>
                <input type="number" class="form-control" id="prix" placeholder="Votre prix" name="prix" max="20000000" min="1">
            </div>
            <div class="mb-3">
                <label for="quantite" class="form-label">Quantité</label>
                <input type="number" class="form-control" id="quantite" placeholder="Quantité" name="quantite" max="100" min="5">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" placeholder="Description du produit" name="description"></textarea>
                
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
        </form>
    </div>
</main>
<?php include '../../footer.php' ?>