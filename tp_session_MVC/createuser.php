<?php

require_once "config/database.php";
require_once "models/User.php";
$userModel = new User($pdo);

$userModel->create("group12","group12@group.tes","1234");
echo "user créé ";

?>