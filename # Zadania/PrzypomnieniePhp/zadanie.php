<?php
$a1 = 24;

echo "<h1>1. Potęgi Liczba ", $a1, "<br></h1>";
echo "Potęga 2: ", $a1, " * ", $a1," = ", $a1*$a1, "<br>";
echo "Potęga 3: ", $a1, " * ", $a1, " * ", $a1, " = ", $a1*$a1*$a1, "<br>";
echo "<sup> </sup>";

$a2 = 5;
$b2 = 20;
$c2 = $a2*$a2;

echo "<h1>2. Sprawdzanie Czy <br></h1>", "<h2>Potęga Liczby Pierwszej Jest Większa Od Drugiej <br></h2>";
echo "Liczba Pierwsza: ", $a2, "<br>";
echo "Liczba Druga: ", $b2, "<br>";


echo "<br>";
echo "Liczba Pierwsza Do Kwadratu: ", $c2, "<br>";

if($c2 > $b2) {
    echo $c2, "   ( Czyli ",$a2," Do Kwadratu) Jest Większa Od ", $b2, "<br>";
} else {
    echo $b2, " Jest Większa Od ", $c2, "   ( Czyli ",$a2," Do Kwadratu)", "<br>";
}

echo "<h1>3. Sprawdzanie Czy <br></h1>", "<h2>iloczyn dwóch pierwszych jest równy iloczynowi dwóch ostatnich <br></h2>";

$a3 = 5;
$b3 = 3;
$iloraz1 = $a3 * $b3;
echo $a3, " * ", $b3, " = ", $iloraz1, "<br>";

$c3 = 7;
$d3 = 2;
$iloraz2 = $c3 * $d3;
echo $c3, " * ", $d3, " = ", $iloraz2, "<br>";

if ($iloraz1 == $iloraz2) {
    echo $iloraz1, " Jest Równy Iloczynowi ", $iloraz2;
} else {
    echo $iloraz2, " Nie Jest Równy Iloczynowi ", $iloraz1;
    $brakuje1 = $iloraz1 - $iloraz2;
    if ($brakuje1 < 0) {
        echo " (Brakuje ", $brakuje1*-1,")";
    } else {
        echo " (Brakuje ", $brakuje1,")";
    }
}

echo "<h1>4. Sprawdzanie Czy <br></h1>", "<h2>iloczyn dwóch pierwszych daje ostatnią <br></h2>";

$a4 = 5;
$b4 = 3;
$iloraz3 = $a4 * $b4;
echo $a4, " * ", $b4, " = ", $iloraz1, "<br>";

$c4 = 7;
echo "Ostatnia Liczba: ", $c4, "<br>";

if ($iloraz3 == $c4) {
    echo $iloraz3, " Jest Równy", $c4;
} else {
    echo $iloraz3, " Nie Jest Równy ", $c4;
    $brakuje2 = $iloraz3 - $c4;
    if ($brakuje2 < 0) {
        echo " (Brakuje ", $brakuje2*-1,")";
    } else {
        echo " (Brakuje ", $brakuje2,")";
    }
}
?>