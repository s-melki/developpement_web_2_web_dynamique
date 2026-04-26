<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une task</title>
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
        <strong>Créer une task</strong>
        <a href="../controllers/taskController.php?action=list">← Retour à la liste</a>
    </header>
    <div class="container">
        <div class="card">
            <h2>Nouvelle task</h2>

            <form action="../controllers/taskController.php?action=create" method="POST">
                <label for="title">Titre</label>
                <input type="text" id="title" name="titre" required placeholder="ex: Terminer le projet">

                <label for="description">Description</label>
                <textarea id="description" name="description" required placeholder="ex: Décrire les tâches à accomplir"></textarea>

                <label for="statut">Statut</label>
                <select id="statut" name="statut">
                    <option value="à faire">à faire</option>
                    <option value="en cours">en cours</option>
                    <option value="terminé">terminé</option>
                </select>

                <label for="priorite">Priorité</label>
                <select id="priorite" name="priorite">
                    <option value="basse">Basse</option>
                    <option value="moyenne">moyenne</option>
                    <option value="haute">haute</option>
                </select>

                <button type="submit">Créer la task</button>

            </form>
            <a class="back" href="../controllers/taskController.php?action=list">Annuler</a>
        </div>
    </div>
</body>
</html>