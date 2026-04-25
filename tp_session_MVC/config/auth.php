<?php
// ============================================================
// config/auth.php
// Fonctions de protection des pages selon le rôle

/* Vérifie que l'utilisateurexiste ou non 
sil non existance de ce user ->rederige vers la page login */
function requireLogin()
{
    if (!isset($_SESSION["user"])) {
        header("Location: /views/login.php");
        exit();
    }
}
function requireAdmin()
{
    requireLogin();
    if ($_SESSION["user"]["role"] !== "admin") {
        header("Location: /views/dashboard.php");
        exit();
    }
}
