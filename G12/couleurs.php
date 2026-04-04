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
    <h1>Couleurs</h1>
    <form method="post" action="couleurs.php">
      <div class="mb-3">

        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="couleurs[]" value="rouge" id="colorRed">
          <label class="form-check-label" for="colorRed">
            Rouge
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="couleurs[]" value="bleu" id="colorBlue">
          <label class="form-check-label" for="colorBlue">
            Bleu
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="couleurs[]" value="vert" id="colorGreen">
          <label class="form-check-label" for="colorGreen">
            Vert
          </label>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Valider</button>
    </form>
    <?php
        if (isset($_POST['couleurs'])) {
            $couleurs = $_POST['couleurs'];
            echo "<div class='alert alert-info mt-3'>Vous avez choisi : " . implode(", ", $couleurs) . "</div>";
        } else {
            echo "<div class='alert alert-warning mt-3'>Aucune couleur sélectionnée</div>";
        }
    ?>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+
jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
