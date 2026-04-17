<?php
require 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM carnet WHERE id = ?");
    $stmt->execute([$id]);
    header("Location: read.php");
} else {
    header("Location: read.php");
}

