<?php

session_start();

require_once "../config/database.php";
require_once "../config/auth.php";
require_once "../models/Task.php";
requireLogin();

$taskModel = new Task($pdo);
$action    = $_GET["action"] ?? "list";

if ($action == "list") {
    $tasks = $taskModel->findAll();
    require "../views/admin/tasks/list.php";
} elseif ($action == "create" && $_SERVER["REQUEST_METHOD"] == "GET") {
    require "../views/admin/tasks/create.php";
} elseif ($action == "create" && $_SERVER["REQUEST_METHOD"] == "POST") {
    $titre       = $_POST["titre"];
    $description = $_POST["description"];
    $priorite    = $_POST["priorite"];
    $user_id     = $_SESSION["user"]["id"];
    $statut = $_POST["statut"] ?? "pending";
    $taskModel->create($titre, $description, $statut, $priorite, $user_id);
    header("Location: taskController.php?action=list");
    exit();
} elseif ($action == "edit" && $_SERVER["REQUEST_METHOD"] == "GET") {
    $id   = $_GET["id"] ?? null;
    $task = $taskModel->findById($id);
    require_once "../views/admin/tasks/edit.php";
} elseif ($action == "update" && $_SERVER["REQUEST_METHOD"] == "POST") {
    $titre       = $_POST["titre"];
    $description = $_POST["description"];
    $statut      = $_POST["statut"];
    $priorite    = $_POST["priorite"];
    $taskModel->update($_GET["id"], $titre, $description, $statut, $priorite);
    header("Location: taskController.php?action=list");
    exit();
} elseif ($action == "delete" && $_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"] ?? null;
    // $taskModel->delete($id);
    header("Location: taskController.php?action=list");
}
