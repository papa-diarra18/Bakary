<?php
session_start();
require '../../Database/produits_db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['produit_id'])) {
        $produit_id = $_POST['produit_id'];
        if (deleteProduit($produit_id)) {
            header("Location: /views/auth/produit.php");
            exit();
        } else {
            $_SESSION['error'] = "Erreur lors de la suppression du produit!";
        }
    } else $_SESSION['error'] = "Produit ID manquant!";
}