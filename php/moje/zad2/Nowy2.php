<?php

# http://localhost/start2t/Nowy2.php?liczba1=2&liczba2=2&liczba3=2&liczba4=4

$liczba1 = $_GET["liczba1"];
$liczba2 = $_GET["liczba2"];
$liczba3 = $_GET["liczba3"];
$liczba4 = $_GET["liczba4"];
$liczba5 = $_GET["liczba5"];

$wynik = 0;

echo "<h2>", "Zadania Nr. 1!","</h2>";

# 1.Napisz skrypt  wczytujący 4  liczby i wyświetlający ich średnią arytmetyczną. 
echo "<h3>", "Liczenie Średniej arytmatyczniej!","</h3>";



echo " Średniej arytmatyczna: ";

$wynik = 0;
$wynik = $liczba1 + $liczba2 + $liczba3 + $liczba4;
$wynik = $wynik / 4;

echo $wynik;
echo "<br>";
echo "<br>";

echo "<h3>", "Obwod i pole trojkąta","</h3>";
# 2.Napisz skrypt obliczających obwód i pole trójkąta

echo "Liczba 1 = A: ", $liczba1;
echo "<br>";
echo "Liczba 2 = H: ", $liczba2;
echo "<br>";

echo "<br>";

echo "Pole Trojkata : ";

$wynik = 0;
$wynik = $liczba1 * $liczba2;
$wynik = $wynik / 2;

echo $wynik;
echo "<br>";
echo "<br>";

# 3.Napisz skrypt sprawdzający czy z podanych trzech odcinków (ich długości) możliwe jest zbudowanie trójkąta.
echo "<h3>", "Sprtawdz czy mozna zbudowac trojkat","</h3>";

# suma 2 bokow musi byc wiekszza lub rowna od 3

echo "Liczba 1 = bok 1 w trojkacie: ", $liczba1;
echo "<br>";
echo "Liczba 2 = bok 2 w trojkacie: ", $liczba2;
echo "<br>";
echo "Liczba 3 = bok 3 w trojkacie: ", $liczba3;
echo "<br>";

echo "<br>";

if($liczba1 + $liczba2 >= $liczba3)
{
    echo "Z tych liczb mozna zrobic trojkąt! ";
    echo "<br>";
}
else
{
    echo "Z tych liczb nie mozna zrobic trojkąta! ";
    echo "<br>";
}

echo "<h2>", "Zadania Nr. 2!","</h2>";

#1. Napisz skrypt wczytujący 5 liczb i wyświetlający ich sumę.
echo "<h3>", "Dodawanie pieciu liczb","</h3>";

echo $liczba1, " + ", $liczba2, " + ", $liczba3, " + ", $liczba4, " + ", $liczba5;
echo "<br>";
$wynik = $liczba1 + $liczba2 + $liczba3 + $liczba4 + $liczba5;

echo "wynik: ", $wynik;

#2. Napisz skrypt obliczających obwód i pole równoległoboku 
echo "<h3>", "Obwod I pole rownolegloboku","</h3>";

echo "Liczba 1 = bok 1 w trojkacie: ", $liczba1;
echo "<br>";
echo "Liczba 2 = bok 2 w trojkacie: ", $liczba2;
echo "<br>";
echo "Liczba 3 = bok 3 w trojkacie: ", $liczba3;
echo "<br>";

echo "<br>";
echo "<br>";

$wynik = 0;
$wynik = $liczba1 * $liczba2;
$wynik = $wynik / 2;

echo "Pole: ", $wynik;
echo "<br>";


$wynik = 0;
$wynik = $liczba1 + $liczba2 + $liczba3;

echo "Obwod: ", $wynik;
echo "<br>";

#3. Napisz skrypt sprawdzający czy z podanych trzech odcinków (ich długości) możliwe jest zbudowanie trójkąta prostokatnego.
echo "<h3>", "Budowanie trojkota prostokotnego","</h3>";

echo "Liczba 1 = bok 1 w trojkacie: ", $liczba1;
echo "<br>";
echo "Liczba 2 = bok 2 w trojkacie: ", $liczba2;
echo "<br>";
echo "Liczba 3 = bok 3 w trojkacie: ", $liczba3, " <- do sprawdzenia!";
echo "<br>";

$wynik = 0;
if($liczba1*$liczba1 + $liczba2*$liczba2 == $liczba3*$liczba3)
{
    echo "<br>";
    echo "Z tych liczb mozna zrobic trojkąt prostokotnego! ";
    echo "<br>";
}
else
{
    echo "<br>";
    echo "Z tych liczb nie mozna zrobic trojkąta prostokotnego! ";
    echo "<br>";
}


?>