<?php
session_start();
require '../../Database/produits_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['libelle']) && !empty($_POST['prix'])
        && !empty($_POST['qte']) && !empty($_POST['description'])) {
        $libelle = $_POST['libelle'];
        //verification si le libelle existe déja
        $produit = getProduitById($libelle);
        if ($produit) {
            $prix = $_POST['prix'];
            $qte = $_POST['qte'];
            $description = $_POST['description'];
            if (NProduit($libelle, $prix, $qte, $description)) {
                header("Location: /views/auth/produit.php");
                exit();
            } else {
                $_SESSION['error'] = "Erreur lors de la création du produit!";
            }
        } else $_SESSION['error'] = "Cet Produit existe déjà!";
    } else $_SESSION['error'] = "Veuillez remplir tous les champs!";
}

header("Location: ../../views/auth/produit.php");
exit();