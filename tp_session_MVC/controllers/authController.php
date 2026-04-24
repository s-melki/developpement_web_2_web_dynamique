<?php

session_start();
require_once "../config/database.php";
require_once "../models/User.php";
$userModel = new User($pdo);
if ($_SERVER['REQUEST_METHOD'] == 'POST') { //$_POST
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    $user = $userModel->findByUsername($username);

    if($user && password_verify($password, $user["password"])) {
        session_regenerate_id(true);
        $_SESSION["user"] = [
            "id" => $user["id"],
            "username" => $user["username"],
            "role" => $user["role"] // admin ou user -
        ];
  header("Location: ../views/dashboard.php");
    }else{
         $_SESSION["error"]= "identifiants invalides";
          header("Location: ../login.php");
        exit();
    }
}
?>