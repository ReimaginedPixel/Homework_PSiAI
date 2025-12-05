<?php

function normalizuj($tekst) {
    $znaki = [
        'ą'=>'a','ć'=>'c','ę'=>'e','ł'=>'l','ń'=>'n','ó'=>'o','ś'=>'s','ź'=>'z','ż'=>'z',
        'Ą'=>'a','Ć'=>'c','Ę'=>'e','Ł'=>'l','Ń'=>'n','Ó'=>'o','Ś'=>'s','Ź'=>'z','Ż'=>'z'
    ];
    $tekst = strtr($tekst, $znaki);
    $tekst = strtolower($tekst);

    // usuń niedozwolone znaki
    $tekst = preg_replace('/[^a-z0-9._]/', '_', $tekst);

    // login nie może zaczynać się cyfrą
    if (preg_match('/^[0-9]/', $tekst)) {
        $tekst = "_".$tekst;
    }

    // bez spacji
    $tekst = str_replace(" ", "", $tekst);

    return $tekst;
}

function dopelnij_login($login, $rok) {
    while (strlen($login) < 5) {
        $login .= substr($rok, -1);  // dodaj ostatnią cyfrę roku
    }
    return substr($login, 0, 20); // max 20 znaków
}

// generowanie losowego znaku
function losuj($z) { return $z[rand(0, strlen($z)-1)]; }

function generuj_haslo($imie, $nazwisko, $rok, $slowo="") {

    $male = "abcdefghijklmnopqrstuvwxyz";
    $duze = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $cyfry = "0123456789";
    $spec = "!@#$%^&*?-_";

    do {
        $haslo = "";

        // bazowe elementy
        $haslo .= losuj($duze);
        $haslo .= losuj($male);
        $haslo .= losuj($cyfry);
        $haslo .= losuj($spec);

        // dopełnienie 12+ losowymi znakami
        $wszystkie = $male.$duze.$cyfry.$spec;

        for ($i=0; $i<12; $i++) {
            $haslo .= losuj($wszystkie);
        }

        // jeśli jest ulubione słowo – wpleć w losowej formie
        if ($slowo !== "") {
            $haslo .= losuj($spec).strtoupper(substr($slowo,0,2));
        }

        // wymieszaj
        $haslo = str_shuffle($haslo);

        // zabezpieczenia:
        $proste = ["1234","abcd","qwerty","password"];
        $zabronione = false;

        foreach ($proste as $s) {
            if (stripos($haslo, $s)!==false) $zabronione = true;
        }

        // powtarzanie 3+ razy
        if (preg_match('/(.)\1\1/', $haslo)) $zabronione = true;

        // imię i nazwisko zakazane
        if (stripos($haslo, $imie)!==false) $zabronione = true;
        if (stripos($haslo, $nazwisko)!==false) $zabronione = true;

    } while ($zabronione || strlen($haslo)<16);

    return $haslo;
}

function ocena_hasla($haslo, $imie, $nazwisko) {

    $punkty = 0;

    if (strlen($haslo) > 16) $punkty++;

    if (preg_match('/[a-z]/', $haslo) &&
        preg_match('/[A-Z]/', $haslo) &&
        preg_match('/[0-9]/', $haslo) &&
        preg_match('/[!@#$%^&*?\-_]/', $haslo)) $punkty++;

    $proste = ["1234","abcd","qwerty","password"];
    $ok = true;
    foreach ($proste as $s) {
        if (stripos($haslo, $s) !== false) $ok = false;
    }
    if ($ok) $punkty++;

    if (stripos($haslo, $imie) === false && stripos($haslo, $nazwisko) === false)
        $punkty++;

    if ($punkty <= 1) return ["słabe","weak.png"];
    if ($punkty <= 3) return ["średnie","medium.png"];
    return ["mocne","strong.png"];
}

/* ---------------------------------------------------------- */
/* ---------------------- PROGRAM GŁÓWNY --------------------- */
/* ---------------------------------------------------------- */

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $imie = strtolower($_POST["imie"]);
    $nazwisko = strtolower($_POST["nazwisko"]);
    $rok = $_POST["rok_ur"];
    $slowo = $_POST["slowo"] ?? "";

    // propozycje loginów
    $login1 = normalizuj($imie.".".substr($nazwisko,0,1).substr($rok, -2));
    $login2 = normalizuj(substr($imie,0,1).$nazwisko.substr($rok, -2));

    $login1 = dopelnij_login($login1, $rok);
    $login2 = dopelnij_login($login2, $rok);

    // generowanie hasła
    $haslo = generuj_haslo($imie, $nazwisko, $rok, $slowo);

    list($ocena, $grafika) = ocena_hasla($haslo, $imie, $nazwisko);

    echo "<h2>Wygenerowane loginy:</h2>";
    echo "<p>$login1</p>";
    echo "<p>$login2</p>";

    echo "<h2>Wygenerowane hasło:</h2>";
    echo "<p><b>$haslo</b></p>";

    echo "<h2>Ocena hasła:</h2>";
    echo "<p>Siła hasła: <b>$ocena</b></p>";
    echo "<img src='$grafika' width='150'>";
}
?>

<!-- FORMULARZ -->
<form method="POST">
Imię: <input type="text" name="imie" required><br>
Nazwisko: <input type="text" name="nazwisko" required><br>
Rok urodzenia: <input type="number" name="rok_ur" required><br>
Ulubione słowo (opcjonalnie): <input type="text" name="slowo"><br>
<input type="submit" value="Generuj">
</form>
