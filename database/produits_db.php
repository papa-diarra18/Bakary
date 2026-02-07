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
    $sql = "INSERT INTO produits (libelle, prix, qte, description) VALUES (:libelle, :prix, :qte, :description)";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':libelle', $libelle);
    $stmt->bindParam(':prix', $prix);
    $stmt->bindParam(':qte', $qte);
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