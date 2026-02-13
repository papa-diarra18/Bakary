<?php
require 'db_connexion.php';

function getProduitById($id) {
    global $connexion;
    $sql = "SELECT * FROM produits WHERE id = :id";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch();
}

function NProduit($libelle, $prix, $qte, $description) {
    global $connexion;
    $sql = "INSERT INTO produits (libelle, prix, quantite, description) VALUES (:libelle, :prix, :quantite, :description)";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':libelle', $libelle);
    $stmt->bindParam(':prix', $prix);
    $stmt->bindParam(':quantite', $qte);
    $stmt->bindParam(':description', $description);

    return $stmt->execute();
}

function deleteProduit($id) {
    global $connexion;
    $sql = "DELETE FROM produits WHERE id = :id";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    return $stmt->execute();
}
function getAll(){
    global $connexion;
    $sql ="SELECT * FROM produits";
    $stmt = $connexion->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}
function ModifierProduit($id, $prix, $quantite, $description) {
    global $connexion;
    $sql = "UPDATE produits SET prix = :prix, quantite = :quantite, description = :description WHERE id = :id";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':prix', $prix);
    $stmt->bindParam(':quantite', $quantite);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    return $stmt->execute();
}