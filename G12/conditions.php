<?php

echo "<br>";
echo "example de conditions en php";
echo "<br>";
$x = 8;

if ($x > 16) {
    echo "x est supérieur à 10";
} elseif ($x == 16) {
    echo "x est égal à 10";
} else {
    echo "x est inférieur à 10";
}
echo "<br>";
echo "note de ds";
echo "<br>";

$mention = 12;

echo "mention : $mention";

if ($mention > 16) {
    echo "mention très bien";
} elseif ($mention > 14) {
    echo "mention bien";
} elseif ($mention > 12) {
    echo "mention assez bien";
} elseif ($mention > 10) {
    echo "passable";
} else {
    echo "refusée";
}
echo "<br>";
