<?php
session_start();
$produit = true;

include "../../header.php";
include "../../navbar.php";
require '../../Database/produits_db.php';

$errorMessage = $_SESSION['error'] ?? null;
unset($_SESSION['error']);
$id = $_GET['produit_id'] ?? null;

if ($id) {
    $produit = getProduitById($id);
    if (!$produit) {
        $_SESSION['error'] = "Produit non trouvé!";
        header("Location: /views/auth/produit.php");
        exit();
    }
} else {
    $_SESSION['error'] = "Produit ID manquant!";
    header("Location: /views/auth/produit.php");
    exit();
}
?>

<main>
    <div class=" container mt-5 pt-5">
        <h1>Modifier produit</h1>
        <?php if (isset($errorMessage)): ?>
        <div class="alert alert-danger" role="alert">
            <?= $errorMessage ?>
        </div>
        <?php endif ?>
        <form action="/actions/auth/modify_produit_action.php" method="POST">
            <input type="hidden" name="produit_id" value="<?= $id ?>">
            <div class="mb-3">
                <label for="prix" class="form-label">Prix</label>
                <input type="text" class="form-control" id="prix" placeholder="Votre prix" name="prix" value="<?= $produit['prix'] ?>">
            </div>
            <div class="mb-3">
                <label for="quantite" class="form-label">Quantité</label>
                <input type="number" class="form-control" id="quantite" placeholder="Quantité" name="quantite" max="100" min="5" value="<?= $produit['quantite'] ?>">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" placeholder="Description du produit" name="description"><?= $produit['description'] ?></textarea>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Modifier</button>
            </div>
        </form>
    </div>
</main>
<?php include '../../footer.php' ?>