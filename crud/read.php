<?php
require 'db.php';
$stmt     = $pdo->query("SELECT * from carnet");
$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des contacts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 30px;
        }
        .badge-php {
            background-color: #6c757d;
            font-size: 0.7rem;
            padding: 5px 10px;
        }
        .table thead {
            background-color: #212529;
            color: white;
        }
        .card {
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-between align-items-start mb-4">
            <div>
                <h1 class="fw-bold h2 mb-1">Gestion des contacts</h1>
                <span class="badge badge-php rounded-pill">Carnet d'adresses</span>
            </div>
            <a href="create.php" class="btn btn-primary btn-sm px-3">+ Ajouter un contact</a>
        </div>

        <div class="card p-4 shadow-sm bg-white">
            <h5 class="mb-3 fw-bold">Liste des contacts</h5>
            <div class="table-responsive">
                <table class="table table-bordered align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>id</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Téléphone</th>
                            <th>Adresse</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($contacts as $contact): ?>
                            <tr>
                                <td><?php echo $contact['id'] ?></td>
                                <td><?php echo $contact['nom'] ?></td>
                                <td><?php echo $contact['prenom'] ?></td>
                                <td><?php echo $contact['email'] ?></td>
                                <td><?php echo $contact['telephone'] ?></td>
                                <td><?php echo $contact['adresse'] ?></td>
                                <td>
                                    <a href="update.php?id=<?php echo $contact['id'] ?>" class="btn btn-warning btn-sm text-dark fw-semibold me-1">Modifier</a>
                                    <a href="delete.php?id=<?php echo $contact['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Voulez vous vraiment supprimer cette ligne')">Supprimer</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
