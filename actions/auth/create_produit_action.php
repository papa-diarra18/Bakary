<?php
session_start();
require '../../Database/produits_db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['libelle']) && !empty($_POST['prix'])
        && !empty($_POST['quantite']) && !empty($_POST['description'])) {
        $libelle = $_POST['libelle'];
        //verification si le libelle existe déja
        $produit = NProduit($_POST['libelle'], $_POST['prix'], 
        $_POST['quantite'], $_POST['description']);
            if ($produit) {
                header("Location: /views/auth/produit.php");
                exit();
            } else {
                $_SESSION['error'] = "Erreur lors de la création du produit!";
            }
        } else {
            $_SESSION['error'] = "Veuillez remplir tous les champs!";
            header("Location: /views/auth/NProduit.php");
        }

    } else $_SESSION['error'] = "Cet Produit existe déjà!";

header("Location: /views/auth/NProduit.php");
exit();