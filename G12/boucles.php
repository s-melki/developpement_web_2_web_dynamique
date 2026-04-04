<?php
    for ($i = 0; $i < 10; $i++) {
    echo "iteration : $i <br>";
    }
    $articles = ["article 1", "article 2", "article 3"];
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Les Boucles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <h1>Listes des articles</h1>
    <ul>
      <?php foreach ($articles as $article): ?>
        <li><?php echo $article ?></li>
      <?php endforeach; ?>
    </ul>
    <?php $produits = [
            ["nom" => "Ordinateur", "prix" => 1200],
            ["nom" => "Téléphone", "prix" => 800],
            ["nom" => "Tablette", "prix" => 1000],
    ]; ?>

    <h2>Tableau des produits</h2>
    <table class="table">
      <thead>
        <tr>
          <th>Nom</th>
          <th>Prix</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($produits as $produit): ?>
          <tr>
            <td><?php echo htmlspecialchars($produit['nom']); ?></td>
            <td><?php echo htmlspecialchars(number_format($produit['prix'], 2)); ?> €</td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>

