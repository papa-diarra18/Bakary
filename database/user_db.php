<?php
require 'db_connexion.php';

function getUserByEmail($email) {
    global $connexion;
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    return $stmt->fetch();
}

function registerUser($nom, $prenom, $email, $password) {
    global $connexion;
    $sql = "INSERT INTO users (nom, prenom, email, password) VALUES (:nom, :prenom, :email, :password)";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':email', $email);
    //hachage de mot de passe
    $passwordHash = password_hash($password, PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $passwordHash);


    return $stmt->execute();
}