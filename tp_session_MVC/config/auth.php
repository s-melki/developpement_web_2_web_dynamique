<?php

function requireLogin()
{
    if (! isset($_SESSION['user'])) {
        header('Location: /views/login.php');
        exit();
    }
}

function requireAdmin()
{
    requireLogin();
    if ($_SESSION['user']['role'] !== 'admin') {
        header('Location: /views/dashboard.php');
        exit();
    }
}
