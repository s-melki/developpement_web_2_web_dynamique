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

        $file="utilisateurs.json";
        // Vérifier si le fichier existe
        if(file_exists($file)){
            $contenu=file_get_contents($file); //cette fonction bch ta9ra contenu fichier
            $users=json_decode($json,true); //user est un tableau associatif
        } else {
            $users = []; // Si le fichier n'existe pas, initialiser un tableau vide
        }

        // Ajouter un nouveau utilisateur au tableau
        $users[] = ['nom' => $nom, 'email' => $email, 'age' => $age];

        // Écrire les données mises à jour dans le fichier JSON
        file_put_contents($file, json_encode($users));
        echo "Les données ont été enregistrées avec succès.";
    }
    ?>
</body>
</html>