<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        Nom: <input type="text" name="nom"><br>
        Email: <input type="email" name="email"><br>
        Age: <input type="number" name="age"><br>
        <button type="submit">Envoyer</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {//$_POST
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $age = $_POST['age'];

        $fichier = fopen("carnet.csv", "a"); // Ouvrir le fichier en mode ajout
        fputcsv($fichier, [$nom, $email, $age]); // Ajouter une ligne au fichier CSV
        fclose($fichier);
        echo "Les données ont été enregistrées avec succès.";
        }
    ?>
</body>
</html>