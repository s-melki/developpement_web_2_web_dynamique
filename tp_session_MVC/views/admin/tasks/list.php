<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des tasks</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: Arial, sans-serif; background: #f0f4f8; }
        header { background: #1B4F8A; color: white; padding: 16px 32px; display: flex; justify-content: space-between; align-items: center; }
        header a { color: #AACCEE; text-decoration: none; font-size: 14px; }
        header a:hover { color: white; }
        .container { max-width: 1000px; margin: 32px auto; padding: 0 20px; }
        .top-bar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
        h2 { color: #1B4F8A; }
        .btn { display: inline-block; padding: 9px 18px; border-radius: 4px; text-decoration: none; font-size: 14px; font-weight: bold; cursor: pointer; }
        .btn-primary { background: #1B4F8A; color: white; }
        .btn-primary:hover { background: #2E75B6; }
        .btn-warning { background: #e67e22; color: white; font-size: 13px; padding: 6px 12px; }
        .btn-warning:hover { background: #d35400; }
        .btn-danger  { background: #c0392b; color: white; font-size: 13px; padding: 6px 12px; border: none; cursor: pointer; }
        .btn-danger:hover  { background: #a93226; }
        table { width: 100%; border-collapse: collapse; background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.08); }
        th { background: #1B4F8A; color: white; padding: 12px 16px; text-align: left; font-size: 14px; }
        td { padding: 12px 16px; font-size: 14px; color: #333; border-bottom: 1px solid #f0f0f0; }
        tr:last-child td { border-bottom: none; }
        tr:hover td { background: #f8fbff; }
        .badge { display: inline-block; padding: 3px 10px; border-radius: 20px; font-size: 12px; font-weight: bold; }
        .badge-admin { background: #fdecea; color: #c0392b; }
        .badge-user  { background: #e8f5ee; color: #1E7A45; }
        .actions { display: flex; gap: 6px; }
        .alert-error { background: #fdecea; color: #c0392b; border: 1px solid #f5c6cb; padding: 10px 16px; border-radius: 4px; margin-bottom: 16px; font-size: 14px; }
    </style>
</head>
<body>
     <?php
// session_start() déjà appelé par le contrôleur — ne pas rappeler ici
require_once __DIR__ . "/../../../config/auth.php";
requireAdmin();
?>
    <header>
           <strong>Gestion des tasks</strong>
            <a href="../views/dashboard.php">← Retour au dashboard</a>
    </header>
    <div class="container">
        <div class="top-bar">
              <h2>Tasks (<?php echo count($tasks); ?>)</h2>
              <a href="../controllers/taskController.php?action=create" class="btn btn-danger"> + Nouvelle task</a>
        </div>
        <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Description</th>
                <th>Statut</th>
                <th>Priorité</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
             <?php foreach ($tasks as $t): ?>
                <tr>
                     <td><?php echo $t["id"]; ?></td>
                        <td><strong><?php echo htmlspecialchars($t["titre"]); ?></strong></td>
                           <td><strong><?php echo htmlspecialchars($t["description"]); ?></strong></td>
                           <td><strong><?php echo htmlspecialchars($t["statut"]); ?></strong></td>
                           <td><strong><?php echo htmlspecialchars($t["priorite"]); ?></strong></td>
                           <td>
                            <a href="../controllers/taskController.php?action=edit&id=<?php echo $t["id"] ?>" class="btn btn-warning">Modifier</a>
                            <a href="../controllers/taskController.php?action=delete&id=<?php echo $t["id"] ?>" class="btn btn-danger">Supprimer</a>
                           </td>
                </tr>
                <?php endforeach; ?>
        </tbody>
        </table>
        </div>
</div>
</body>
</html>