<?php
session_start();
require '../../Database/produits_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['produit_id'])) {
        $produit_id = $_POST['produit_id'];
        $produit = getProduitById($produit_id);
        if ($produit) {
            $prix = $_POST['prix'] ?? $produit['prix'];
            $quantite = $_POST['quantite'] ?? $produit['quantite'];
            $description = $_POST['description'] ?? $produit['description'];
            if (ModifierProduit($produit_id, $prix, $quantite, $description)) {
                header("Location: /views/auth/produit.php");
                exit();
            } else $_SESSION['error'] = "Erreur lors de la modification du produit!";
        } else {
            $_SESSION['error'] = "Produit non trouvé!";
        }
    } else $_SESSION['error'] = "Produit ID manquant!";
}
header("Location: /views/auth/produit.php");
exit();