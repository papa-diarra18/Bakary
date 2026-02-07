<?php
session_start();
$MProduit = true;

include "../../header.php";
include "../../navbar.php";

$errorMessage = $_SESSION['error'] ?? null;
unset($_SESSION['error']);
?>

<main>
    <div class=" container mt-5 pt-5">
        <h1>Modifier produit</h1>
        <?php if (isset($errorMessage)): ?>
        <div class="alert alert-danger" role="alert">
            <?= $errorMessage ?>
        </div>
        <?php endif ?>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="prix" class="form-label">Prix</label>
                <input type="text" class="form-control" id="prix" placeholder="Votre prix" name="prix">
            </div>
            <div class="mb-3">
                <label for="qte" class="form-label">Quantité</label>
                <input type="number" class="form-control" id="qte" placeholder="Quantité" name="qte">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" placeholder="Description du produit" name="description"></textarea>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Modifier</button>
            </div>
        </form>
    </div>
</main>
<?php include '../../footer.php' ?>