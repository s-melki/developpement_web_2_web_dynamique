<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $adresse = $_POST['adresse'];

    $stmt = $pdo->prepare("INSERT INTO carnet (nom, prenom, telephone, email, adresse) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$nom, $prenom, $telephone, $email, $adresse]);
    
    header('Location: read.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 30px;
        }
        .card {
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row g-4">
            <div class="col-md-5 col-lg-4 mx-auto">
                <div class="card p-4 shadow-sm bg-white">
                    <h5 class="mb-3 fw-bold">Formulaire d'ajout de contact</h5>
                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label text-secondary small">Nom</label>
                            <input type="text" name="nom" class="form-control form-control-sm" placeholder="Ex: Dupont" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-secondary small">Prénom</label>
                            <input type="text" name="prenom" class="form-control form-control-sm" placeholder="Ex: Jean" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-secondary small">Email</label>
                            <input type="email" name="email" class="form-control form-control-sm" placeholder="Ex: email@test.com" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-secondary small">Téléphone</label>
                            <input type="tel" name="telephone" class="form-control form-control-sm" placeholder="Ex: 06 12 34 56 78">
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-secondary small">Adresse</label>
                            <textarea name="adresse" class="form-control form-control-sm" rows="3" placeholder="Ex: 123 rue de la Paix"></textarea>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary btn-sm px-3">Ajouter</button>
                            <button type="reset" class="btn btn-outline-secondary btn-sm px-3">Réinitialiser</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>