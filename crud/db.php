<?php
// Connexion à la base de données
try {
    $pdo = new PDO('mysql:host=localhost;dbname=crud_users_db', 'root', 'Pass4root!');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erreur de connexion : ' . $e->getMessage());
}
?>