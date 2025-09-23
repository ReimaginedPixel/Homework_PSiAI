<?php

echo "<h1>", "Hello World!","<h1>";

$a = 4;
$b = 5;
$wynik = $a + $b;

echo "<br>";
echo $wynik;

echo "<br>";
echo "<h2>", "Zadanie 1", "</h2>";
// zdeklaruj 3 zmienne, imie i nazwisko , rok urodzenia 
// wyswietl w postaci :
// witaj ..... , imie i nazwisko 
//urodzony XXXX
//Masz xx lat
# ilość lat ma być wyświetlona w znaczniku <strong> 
# rok urodzenia ma być podkreślony

$imie = "Konrad";
$nazwisko = "Kukula";
$rok = 2009;
$lat = 2025 - $rok;

echo "<br>";
echo "<br>";
echo "Witaj ";
echo $imie;
echo " ";
echo $nazwisko;

echo "<br>";
echo "urodzony w ";
echo $rok;



echo "<br>";
echo "masz ";
echo $lat;
echo " lat";

echo "<br>";
echo "<br>";
echo "<h3>", "Zadanie 1.1", "</h3>";
echo "<br>";

echo "<br>", "Witaj ", $imie, " ", $nazwisko;
echo "<br>", "Urodzony w  ","<underline>", $rok, "</underline>";
echo "<br>", "Masz  ", "<strong>", $lat,"</strong>", " lat";

echo "<br>";
echo "<br>";
echo "<h2>", "Zadanie 2", "</h2>";
echo "<br>";
echo "<br>";

$bok1 = 5;
$bok2 = 10;
$pole = $bok1 * $bok2;

echo "pole wynosi: ", $pole;

#w zmiennej mamy boki prostokąta, należy policzyć pole.
# * narysować prostokąt 

//$budowaniebok1 = 0;
//$budowaniebok2 = 0;

//while ($budowaniebok2 !==  $bok2)
//{
//    echo "<br>";
//    while ($budowaniebok1 !==  $bok1)
//    {
//        echo "#"; 
//    }
//}
//for (ibnt i = 0; i < 10; i++) {
//    for(in tj = 0; i < bok2; j++) {
//        echo "*";
//    }
//    echo "br"
//}

echo "<br>";
echo "<br>";

for ($i = 0; $i < $bok2 ; $i = $i + 1 )
{
    for ($j = 0; $j < $bok1; $j = $j + 1)
    {
        echo "#";
    }
    echo "<br>";
}

# stwórz zmienną liczba i wyświetl:
# - jej wartość
# - podwojoną wartość
# - napis "parzysta" lub "nieparzysta"
# - jej kwadrat i ^3

echo "<br>";
echo "<br>";
echo "<h2>", "Zadanie 3", "</h2>";
echo "<br>";
echo "<br>";

$zmienna = 10;

echo $zmienna, "<br>";
echo $zmienna * 2, "<br>";
if($zmienna )

echo "<br>";
echo "<br>";
echo "<h2>", "Zadanie 4 (Adres Var.)", "</h2>";
echo "<br>";
echo "<br>";


//localhost/start2t/Nowy.php?imie=piotr

$imie = $_GET["imie"];

echo "<br>";
echo "Witaj ";
echo $imie;
// wynik dodawanie odejmowanie, dzielenie, mnzenie, potega ^2 ^3
// wyswietlic o\podane liczby
//wyswietlic dzialanie i wynik

//podane liczby to 1,2,3.
// 1+2+3 = 6.
// 1-2-3 = ....

//http://localhost/start2t/Nowy.php?imie=piotr&wybor=1&liczba1=2&liczba2=2&liczba3=2


echo "<br>";
echo "<br>";
echo "<h2>", "Zadanie 5 (Karkulator)", "</h2>";
echo "<br>";
echo "<br>";

$wybor = $_GET["wybor"];

$liczba1 = $_GET["liczba1"];
$liczba2 = $_GET["liczba2"];
$liczba3 = $_GET["liczba3"];

$wynik = 0;

echo "Witaj W kalkulatorze.", "<br>";
echo "opcje:", "<br>";
echo "1 - Dodawanie", "<br>";
echo "2 - Odejmowanie", "<br>";
echo "3 - Dzielenie", "<br>";
echo "4 - Mnozenie", "<br>";
echo "5 - Potega", "<br>";

switch($wybor)
{
    case 1:
        {
            echo "<br>", "wybrano doawanie", "<br>";
            echo $liczba1, " + ", $liczba2, " + ", $liczba3, "= ";

            $wynik = $liczba1 + $liczba2 + $liczba3;
            echo $wynik;

            break;
        }
    
    case 2:
        {
            echo "<br>", "wybrano odejmowanie", "<br>";
            echo $liczba1, " - ", $liczba2, " - ", $liczba3, "= ";

            $wynik = $liczba1 - $liczba2 - $liczba3;
            echo $wynik;

            break;
        }

    case 3:
        {
            echo "<br>", "wybrano mnozenie", "<br>";
            echo $liczba1, " * ", $liczba2, " * ", $liczba3, "= ";

            $wynik = $liczba1 * $liczba2 * $liczba3;
            echo $wynik;

            break;
        }

    case 4:
         {
            echo "<br>", "wybrano dzielenie", "<br>";
            echo $liczba1, " / ", $liczba2, " / ", $liczba3, "= ";

            $wynik = $liczba1 / $liczba2 / $liczba3;
            echo $wynik;
             break;
         }
    
    case 5:
        {
            echo "<br>", "wybrano potegowanie (bez 2 i 3 liczby) ", "<br>";
            echo $liczba1, " * ", $liczba1, "= ";

            $wynik = $liczba1 * $liczba1;

            echo $wynik;
            
            break;
        }
            
}



?>