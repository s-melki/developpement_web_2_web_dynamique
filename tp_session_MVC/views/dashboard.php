<?php
    session_start();
    require_once __DIR__ . "/../config/auth.php";
    requireAdmin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: Arial, sans-serif; background: #f0f4f8; }
        header {
            background: #1B4F8A;
            color: white;
            padding: 16px 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        header h1 { font-size: 20px; }
        header span { font-size: 14px; opacity: 0.8; }
        header a { color: #AACCEE; text-decoration: none; font-size: 14px; }
        header a:hover { color: white; }
        .container { max-width: 900px; margin: 40px auto; padding: 0 20px; }
        .welcome { font-size: 22px; color: #1B4F8A; margin-bottom: 8px; font-weight: bold; }
        .role-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 32px;
        }
        .role-admin { background: #fdecea; color: #c0392b; }
        .role-user  { background: #e8f5ee; color: #1E7A45; }
        .menu-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 16px; }
        .menu-card {
            background: white;
            border-radius: 8px;
            padding: 24px 20px;
            text-decoration: none;
            color: #333;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            border-left: 4px solid #2E75B6;
            transition: transform 0.1s;
        }
        .menu-card:hover { transform: translateY(-2px); box-shadow: 0 4px 16px rgba(0,0,0,0.12); }
        .menu-card .icon { font-size: 28px; margin-bottom: 10px; }
        .menu-card .title { font-size: 16px; font-weight: bold; color: #1B4F8A; }
        .menu-card .desc  { font-size: 13px; color: #666; margin-top: 4px; }
        .section-title { font-size: 16px; color: #666; margin-bottom: 16px; border-bottom: 2px solid #e0e0e0; padding-bottom: 8px; }
    </style>
</head>
<body>
<?php
    $username = $_SESSION["user"]["username"];
    $role     = $_SESSION["user"]["role"];
?>
<header>
     <h1>Gestion des Tâches</h1>
     <div>
        <span>Connecté : <strong><?php echo htmlspecialchars($username); ?></strong></span>
        &nbsp;&nbsp;
        <a href="logout.php">Déconnexion</a>
    </div>
</header>
<div class="container">
<p class="welcome">Bonjour  <strong><?php echo htmlspecialchars($username); ?></strong></p>
 <?php if ($role === "admin"): ?>
<!-- ── MENU ADMINISTRATEUR ── -->
   <p class="section-title">Administration</p>
<div class="menu-grid">
    <a class="menu-card" href="../controllers/userController.php?action=list">
        <div class="icon">👥</div>
         <div class="title">Gérer les utilisateurs</div>
        </a>
         <a class="menu-card" href="../controllers/taskController.php?action=list">
        <div class="icon">👥</div>
         <div class="title">Gérer les taches</div>
        </a>
</div>
 <?php else: ?>
    <!-- ── MENU USER SIMPLE ── -->
    <p class="section-title">Mon espace</p>
    <div class="menu-grid"></div>
        <?php endif; ?>
</div>
</body>
</html>