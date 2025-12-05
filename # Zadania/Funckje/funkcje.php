<!DOCTYPE html>
<html>
<head>
<style>
  text-transform: uppercase;
}

p.lowercase {
  text-transform: lowercase;
}

</style>
</head>
<body>



<?php

# FUNKCJA 1:

// "bold" – zwróć tekst otoczony znacznikiem HTML pogrubienia, np.
// "<b>tekst</b>"
// "italic" – zwróć tekst otoczony znacznikiem HTML kursywy, np.
// "<i>tekst</i>"
// "upper" – zwróć tekst zamieniony na wielkie litery.
// "lower" – zwróć tekst zamieniony na małe litery.

$text = "siema";
$rodzaj = "bold";

formatujTekst($text, $rodzaj);

$text = "uwu";
$rodzaj = "upper";

formatujTekst($text, $rodzaj);

$text = "niedziala";
$rodzaj = "ups";

formatujTekst($text, $rodzaj);


function formatujTekst($tekst , $rodzaj ) {
    if ($rodzaj == "bold") {
        echo "<b>",$tekst,"</b>";
    } else if ($rodzaj == "italic") {
        echo "<i>",$tekst,"<i>";
    } else if ($rodzaj == "upper") {
        echo "<p class='uppercase'>",$tekst,"</p>";
    } else if ($rodzaj == "lower") {
        echo "<p class='lowercase'>",$tekst,"</p>";
    } else {
        echo "Nieznany rodzaj formatowania";
    }
}

// ==================================================== //

# FUNCKJA 2

$tekst = "header!";
$tag = "h12";

opakujTekst($tekst,$tag);

function opakujTekst($tekst, $tag ) {
    if ($tag == "h1" || $tag == "p" || $tag == "mark" || $tag == "code") {
        echo "<",$tag,">",$tekst,"</",$tag,">";
    } else {
        echo "<br>",$tekst;
    }
    
}

echo "<br>";
echo "<br>";

// ==================================================== //

# FUNCKJA 3

$rozmiar = 5;
$znak = "%";

rysujKwadrat($rozmiar, $znak);

function rysujKwadrat($rozmiar, $znak) {

for($i = 1; $i <= $rozmiar; $i++) {

    for($j = 1; $j <= $rozmiar; $j++) {
        echo $znak;
    }

    echo "<br>";
    }
}



// ==================================================== //

# Zadanie 4


function rysujTrojkat_W_K($wysokosc, $kierunek) {
    if ($kierunek !== "lewy" && $kierunek !== "prawy") {
        echo "Niepoprawny kierunek";
        return;
    }

    for ($i = 1; $i <= $wysokosc; $i++) {
        if ($kierunek === "lewy") {
            echo str_repeat("*", $i);
        } elseif ($kierunek === "prawy") {
            echo str_repeat("&nbsp;", $wysokosc - $i);
            echo str_repeat("*", $i);
        }
        echo "<br>";
    }
}

rysujTrojkat_W_K(4, "lewy");
echo "<br>";
rysujTrojkat_W_K(4, "prawy");
echo "<br>";
rysujTrojkat_W_K(3, "srodkowy");

// ==================================================== //

# Zadanie 5
function rysujRamke($szerokosc, $wysokosc, $znak) {
    if ($szerokosc < 2 || $wysokosc < 2) {
        echo "Za małe wymiary ramki";
        return;
    }

    // Pierwszy wiersz
    echo str_repeat($znak, $szerokosc) . "<br>";

    // Środkowe wiersze
    for ($i = 0; $i < $wysokosc - 2; $i++) {
        echo $znak . str_repeat("&nbsp;", $szerokosc - 2) . $znak . "<br>";
    }

    // Ostatni wiersz
    echo str_repeat($znak, $szerokosc) . "<br>";
}

rysujRamke(6, 4, "#");
echo "<br>";
rysujRamke(1, 3, "*");

// ==================================================== //

# Zadanie 6
function skrocTekst($tekst, $tryb) {
    switch ($tryb) {
        case 'start':
            return substr($tekst, 0, 5) . '...';
        case 'end':
            return '...' . substr($tekst, -5);
        case 'both':
            return substr($tekst, 0, 3) . '...' . substr($tekst, -3);
        case 'none':
            return $tekst;
        default:
            return "Niepoprawny tryb skracania";
    }
}

echo skrocTekst("To jest bardzo długi tekst", "start") . "<br>";
echo skrocTekst("To jest bardzo długi tekst", "end") . "<br>";
echo skrocTekst("To jest bardzo długi tekst", "both") . "<br>";
echo skrocTekst("To jest bardzo długi tekst", "none") . "<br>";
echo skrocTekst("To jest bardzo długi tekst", "coś innego") . "<br>";

// ==================================================== //

# Zadanie 7
function zamienSpacje($tekst, $rodzaj) {
    switch ($rodzaj) {
        case 'minus':
            return str_replace(' ', '-', $tekst);
        case 'podkreslnik':
            return str_replace(' ', '_', $tekst);
        case 'br':
            return str_replace(' ', '<br>', $tekst);
        case 'kropka':
            return str_replace(' ', '.', $tekst);
        default:
            return "Nieznany rodzaj zamiany";
    }
}

echo zamienSpacje("To jest test", "minus") . "<br>";
echo zamienSpacje("To jest test", "podkreslnik") . "<br>";
echo zamienSpacje("To jest test", "br") . "<br>";
echo zamienSpacje("To jest test", "kropka") . "<br>";
echo zamienSpacje("To jest test", "gwiazdka") . "<br>";


?>











?>
</body>
</html>