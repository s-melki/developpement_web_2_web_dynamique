<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit <?php echo $user["username"]; ?></title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f0f4f8;
        }

        header {
            background: #1B4F8A;
            color: white;
            padding: 16px 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header a {
            color: #AACCEE;
            text-decoration: none;
            font-size: 14px;
        }

        header a:hover {
            color: white;
        }

        .container {
            max-width: 520px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .card {
            background: white;
            border-radius: 8px;
            padding: 32px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        h2 {
            color: #1B4F8A;
            margin-bottom: 24px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            font-size: 14px;
            color: #333;
        }

        input,
        select {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 15px;
            margin-bottom: 18px;
        }

        input:focus,
        select:focus {
            outline: none;
            border-color: #2E75B6;
        }

        .hint {
            font-size: 12px;
            color: #888;
            margin-top: -14px;
            margin-bottom: 16px;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #1B4F8A;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            font-weight: bold;
        }

        button:hover {
            background: #2E75B6;
        }

        .back {
            display: block;
            text-align: center;
            margin-top: 16px;
            color: #2E75B6;
            text-decoration: none;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <?php
    // session_start() déjà appelé par le contrôleur — ne pas rappeler ici
    require_once __DIR__ . "/../../../config/auth.php";
    requireAdmin();
    ?>
    <header>
        <strong>Modifier <?php echo $user["username"]; ?></strong>
        <a href="../controllers/userController.php?action=list">← Retour à la liste</a>
    </header>
    <div class="container">
        <div class="card">
            <h2>Modifier l'utilisateur</h2>

            <form action="../controllers/userController.php?action=update&id=<?php echo $user["id"]; ?>" method="POST">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" id="username" name="username" value="<?php echo $user["username"]; ?>" required placeholder="ex: ibtissem">

                <label for="email">Adresse email</label>
                <input type="email" id="email" name="email" value="<?php echo $user["email"]; ?>" required placeholder="ex: ibtissem@mail.com">

                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="Minimum 6 caractères" autocomplete="FALSE">
                <p class="hint">Le mot de passe sera automatiquement hashé (bcrypt).</p>

                <label for="role">Rôle</label>
                <select id="role" name="role">
                    <option value="user" <?php if ($user["role"] == "user") echo "selected"; ?>>Utilisateur</option>
                    <option value="admin" <?php if ($user["role"] == "admin") echo "selected"; ?>>Administrateur</option>
                </select>

                <button type="submit">Modifier l'utilisateur</button>

            </form>
            <a class="back" href="../controllers/userController.php?action=list">Annuler</a>
        </div>
    </div>
</body>

</html>