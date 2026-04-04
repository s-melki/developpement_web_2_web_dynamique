<?php
function calcul($a, $b, $operation)
{
    switch ($operation) {
        case "+":
            return $a + $b;
        case "-":
            return $a - $b;
        case "*":
            return $a * $b;
        case "/":
            if ($b != 0) {
                return $a / $b;
            } else {
                return "Division par zéro impossible";
            }
        default:
            return "Opération non reconnue";
    }
}

//echo(calcul(10, 5, "+"));

if (isset($_POST['a'], $_POST['b'], $_POST['operation'])) {
    $a         = $_POST['a'];
    $b         = $_POST['b'];
    $operation = $_POST['operation'];
    header("Location: _post.php?result=" . calcul($a, $b, $operation));
} else {
    header("Location: _post.php");
}
