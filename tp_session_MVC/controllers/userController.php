<?php

session_start();
require_once '../config/database.php';
require_once '../config/auth.php';
require_once '../models/User.php';

requireAdmin();

$userModel = new User($pdo);
$users     = $userModel->findAll();

$action = $_GET['action'] ?? 'list';

if ($action === 'list') {
    $users = $userModel->findAll();
    require '../views/admin/users/list.php';
}
