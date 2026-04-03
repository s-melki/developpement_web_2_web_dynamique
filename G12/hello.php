<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>hello g12</title>
</head>
<body>
<?php
    // seule ligne
    /*  plusieurs lignes
   plusieurs lignes
   */
    echo "Affectation de variables en php";
    echo "<br>";
    echo "hello g12";
    $nom    = "g12";
    $x      = 5;
    $y      = 10;
    $e      = null;
    $fruits = ["pomme", "banane", "orange"];
    $isHere = true;
    var_dump($nom);
    var_dump($x);
    var_dump($e);
    var_dump($fruits);
    var_dump($isHere);
    echo "<br>";
    echo "bonjour $nom votre effectif est de $x ans";
    echo "<br>";
    echo 'bonjour ' . $nom . ' votre effectif est de ' . $x . ' ans';
    echo "<br>";
    echo `bonjour {$nom} votre effectif est de {$x} ans`;

    /*
    exercices : operateurs arithmetiques, operateurs de comparaison, operateurs logiques, operateurs d'affectation
    avec affichege de resyultats par ligne
    */
    echo "<br>";

    echo "Operateurs arithmetiques : + - * / %";
    echo "<br>";
    echo "<br>";
    echo 'Addition : $x + $y <=> ' . "$x + $y = " . ($x + $y);
    echo "<br>";
    echo 'Soustraction : $x - $y <=> ' . "$x - $y = " . ($x - $y);
    echo "<br>";
    echo 'Multiplication : $x * $y <=> ' . "$x * $y = " . ($x * $y);
    echo "<br>";
    echo 'Division : $x / $y <=> ' . "$x / $y = " . ($x / $y);
    echo "<br>";
    echo 'Modulo : $x % $y <=> ' . "$x % $y = " . ($x % $y);
?>
</body>
</html>
