<?php
require 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM carnet WHERE id = ?");
    $stmt->execute([$id]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $adresse = $_POST['adresse'];

    $stmt = $pdo->prepare("UPDATE carnet SET nom = ?, prenom = ?, telephone = ?, email = ?, adresse = ? WHERE id = ?");
    $stmt->execute([$nom, $prenom, $telephone, $email, $adresse, $id]);
    
    header('Location: read.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un contact</title>
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
                    <h5 class="mb-3 fw-bold">Formulaire de modification</h5>
                    <?php if ($contact): ?>
                        <form method="POST">
                            <input type="hidden" name="id" value="<?php echo $contact['id'] ?>">
                            <div class="mb-3">
                                <label class="form-label text-secondary small">Nom</label>
                                <input type="text" name="nom" class="form-control form-control-sm" value="<?php echo $contact['nom'] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-secondary small">Prénom</label>
                                <input type="text" name="prenom" class="form-control form-control-sm" value="<?php echo $contact['prenom'] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-secondary small">Email</label>
                                <input type="email" name="email" class="form-control form-control-sm" value="<?php echo $contact['email'] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-secondary small">Téléphone</label>
                                <input type="tel" name="telephone" class="form-control form-control-sm" value="<?php echo $contact['telephone'] ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-secondary small">Adresse</label>
                                <textarea name="adresse" class="form-control form-control-sm" rows="3"><?php echo $contact['adresse'] ?></textarea>
                            </div>
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-warning btn-sm text-dark fw-semibold px-3">Modifier</button>
                                <a href="read.php" class="btn btn-outline-secondary btn-sm px-3">Annuler</a>
                            </div>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
