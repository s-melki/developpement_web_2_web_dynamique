<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Calculatrice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
    <h1>Calculatrice avec $_POST</h1>
    <form method="post" action="switch.php">
      <div class="mb-3">
        <label for="a" class="form-label">Nombre A</label>
        <input type="number" class="form-control" id="a" name="a" required>
      </div>
      <div class="mb-3">
        <label for="b" class="form-label">Nombre B</label>
        <input type="number" class="form-control" id="b" name="b" required>
      </div>
      <div class="mb-3">
        <label for="operation" class="form-label">Opération</label>
        <select class="form-select" id="operation" name="operation" required>
          <option value="+">Addition (+)</option>
          <option value="-">Soustraction (-)</option>
          <option value="*">Multiplication (*)</option>
          <option value="/">Division (/)</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Calculer</button>
    </form>
    <?php
        if (isset($_GET['result'])) {
            echo "<div class='alert alert-info mt-3'>Résultat : " . htmlspecialchars($_GET['result']) . "</div>";
        }
    ?>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
