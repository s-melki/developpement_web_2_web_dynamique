<?php 

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Bonjour <?php echo $_SESSION["user"]["username"];?>
    <br>
       <a href="logout.php">Déconnexion</a>
</body>
</html>