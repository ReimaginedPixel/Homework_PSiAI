<?php

// // skopiowane z tego czegos https://stackoverflow.com/questions/9861603/can-i-read-a-txt-file-with-php

// $handle = @fopen("slownik.txt", "r");
// if ($handle) {
//     while (($buffer = fgets($handle, 4096)) !== false) {
//         echo "<br>";
//         echo $buffer;
//     }
//     if (!feof($handle)) {
//         echo "Error: unexpected fgets() fail\n";
//     }
//     fclose($handle);
// }


// ===============================----+

// // to jest z https://www.w3schools.com/php/func_math_rand.asp
// echo(rand() . "<br>");
// echo(rand() . "<br>");
// echo(rand(10,100));

// ===============================----+

//przyklad z https://www.w3schools.com/php/func_string_strlen.asp 

// ===============================----+

// specyficzne znaki w stringach

//https://stackoverflow.com/questions/4366730/how-do-i-check-if-a-string-contains-a-specific-word
// ===============================----+

//muj spaggeti kod

session_start();

// -+- ======================= -+-
//     Liczenie Ile Jest Slow
// -+- ======================= -+-

$_SESSION["policzone"] = false;

$policzSlowa = 0;

$plik = @fopen("slownik.txt", "r");
if ($plik) {
    while (($slowo = fgets($plik, 4096)) !== false) {
        $policzSlowa++;
    }

    if (!feof($plik)) {
        echo "Error: jakis niespotyka error lol() fail ez?\n";
    }
    fclose($plik);
}

// -+- ======================= -+-
//  Wpisywanie Wartosci W Tablice
// -+- ======================= -+-


$TablicaSlow = array_fill(0, $policzSlowa, "");


$plik = @fopen("slownik.txt", "r");
if ($plik) {

    $NumerSlowa = 0;

    while (($slowo = fgets($plik, 4096)) !== false) {
        $TablicaSlow[$NumerSlowa] = trim($slowo);
        $NumerSlowa++;
    }

    if (!feof($plik)) {
        echo "Error: jakis niespotyka error lol() fail ez?\n";
    }
    fclose($plik);
}

//   -+- ======================= -+-
//wypisywanie dla tesytow jak testowalem
//   -+- ======================= -+-

// for ($i = 0; $i < $policzSlowa; $i++) {
//     echo $TablicaSlow[$i] . "<br>";
// }

//   -+- ======================= -+-
//      Loswanie Tych Jakis Slowke
//   -+- ======================= -+-

//test jakis
//echo $TablicaSlow[rand(1,$NumerSlowa-1)];

$zycie = 5;

$SlowoKrzyrzowki = $TablicaSlow[rand(1,$NumerSlowa-1)];
$DlugoscSlowaKrzyzowki = strlen($SlowoKrzyrzowki);

echo "<h2>Oto Twoje Tajemnicze Słowo!";
echo "<br>";

for($i = 0;$DlugoscSlowaKrzyzowki > $i ;$i++)
{
    echo "_ ";
}

echo "<br>";
echo "<h3>Pozostalo Ci Tyle Zycia: ", $zycie;




?>
