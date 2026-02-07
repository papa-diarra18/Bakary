<?php
session_start();
$NProduit = true;

include "../../header.php";
include "../../navbar.php";

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
                <label for="qte" class="form-label">Quantité</label>
                <select name="qte" id="qte" class="form-control">
                    <?php for ($i = 5; $i <= 100; $i++): ?>
                        <option value="<?= $i ?>"><?= $i ?></option>
                    <?php endfor ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" placeholder="Description du produit" name="description"></textarea>
                <?php if (isset($_SESSION['error_description'])): ?>
                    <small id="descriptionHelp" class="form-text text-danger">
                        <?= $_SESSION['error_description'] ?>
                    </small>
                <?php endif ?>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
        </form>
    </div>
</main>
<?php include '../../footer.php' ?>