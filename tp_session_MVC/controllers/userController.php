<?php
// ============================================================
// controllers/userController.php
// CRUD complet des utilisateurs — réservé aux ADMINS
//
// Routes disponibles (paramètre GET "action") :
//   ?action=list    → liste tous les utilisateurs
//   ?action=create  → GET : affiche formulaire / POST : crée
//   ?action=edit    → GET : affiche formulaire / POST : modifie
//   ?action=delete  → supprime et redirige
// ============================================================

session_start();
require_once "../config/database.php";
require_once "../config/auth.php";
require_once "../models/User.php";
// Seuls les admins peuvent accéder à ce contrôleur
requireAdmin();

$userModel = new User($pdo);
$action    = $_GET["action"] ?? "list";

// ─── LIST ──────────────────────────────────────────────────
if ($action == "list") {
// Charge tous les utilisateurs depuis la BDD
    $users = $userModel->findAll();
    // Inclut la vue qui affiche le tableau
    require "../views/admin/users/list.php";
// ─── CREATE (GET : afficher le formulaire) ─────────────────
} elseif ($action == "create" && $_SERVER["REQUEST_METHOD"] == "GET") {
    require "../views/admin/users/create.php";
// ─── CREATE (POST : traiter la création) ───────────────────

} elseif ($action == "create" && $_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email    = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $role     = $_POST["role"] ?? "user";
//Crée l'utilisateur (le hash du mot de passe est fait dans le modèle)
    $userModel->create($username, $email, $password, $role);
// Redirige vers la liste après création
    header("Location: userController.php?action=list");
    exit();
} elseif ($action == "edit" && $_SERVER["REQUEST_METHOD"] == "GET") {
    $id   = $_GET["id"] ?? null;
    $user = $userModel->findById($id);
    require_once "../views/admin/users/edit.php";

} elseif ($action == "update" && $_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email    = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $role     = $_POST["role"] ?? "user";
    $userModel->update($_GET["id"], $username, $email, $role, $password);
    header("Location: userController.php?action=list");
    exit();
} elseif ($action == "delete" && $_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"] ?? null;
    //$user = $userModel->delete($id);
    header("Location: userController.php?action=list");

}
