<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OPONY</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>OPONY</h1>
    </header>

    <main>
        <aside>
            <div class="opona-item">
                <img src="icon-sniezynka.png" alt="zimowa"> <!-- ikona śnieżynki -->
                <strong>Opona:</strong> uLFA AL135<br>
                <strong>Cena:</strong> 101.50 zł
            </div>
            <div class="opona-item">
                <img src="icon-sloneczko.png" alt="letnia"> <!-- ikona słońca -->
                <strong>Opona:</strong> uLFA AL105<br>
                <strong>Cena:</strong> 105.50 zł
            </div>
            <div class="opona-item">
                <img src="icon-sniezynka.png" alt="zimowa">
                <strong>Opona:</strong> eLFA EL305<br>
                <strong>Cena:</strong> 110.00 zł
            </div>
            <div class="opona-item">
                <img src="icon-sniezynka.png" alt="zimowa">
                <strong>Opona:</strong> uLFA AL305<br>
                <strong>Cena:</strong> 110.00 zł
            </div>
            <p><a href="https://opona.pl/">więcej ofert</a></p>
        </aside>

        <section>
            <img src="opona.png" alt="Opona">
            <h2>Opona dnia</h2>
            <p><strong>Model:</strong> uLFA AL135</p>
            <p><strong>Sezon:</strong> zimowa</p>
            <p><strong>Tylko:</strong> 101.50 zł</p>
        </section>

        <section>
            <h2>Najnowsze zamówienie</h2>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $model = $_POST['model'] ?? '';
                $ilosc = (int)($_POST['ilosc'] ?? 1);
                $wysylka = $_POST['wysylka'] ?? '';
                $imie_nazwisko = htmlspecialchars($_POST['imie_nazwisko'] ?? '');

                // Ceny netto dla modeli
                $ceny = [
                    'letnia' => 250.00,
                    'zimowa' => 280.00,
                    'caloroczna' => 300.00,
                    'suv' => 350.00
                ];

                $cena_netto = $ceny[$model] ?? 0;
                $wartosc_netto = $cena_netto * $ilosc;
                $vat = $wartosc_netto * 0.23;
                $wartosc_brutto = $wartosc_netto + $vat;

                $koszt_dostawy = match($wysylka) {
                    'kurier' => 25.00,
                    'paczkomat' => 17.00,
                    'osobisty' => 0.00,
                    default => 0.00
                };

                $do_zaplaty = $wartosc_brutto + $koszt_dostawy;
                $data = date('Y-m-d H:i:s');

                echo "<div class='opona'>";
                echo "<p><strong>Nazwa opony:</strong> " . htmlspecialchars($model) . "</p>";
                echo "<p><strong>Cena jednostkowa netto:</strong> " . number_format($cena_netto, 2, ',', ' ') . " zł</p>";
                echo "<p><strong>Liczba sztuk:</strong> $ilosc</p>";
                echo "<p><strong>Wartość netto:</strong> " . number_format($wartosc_netto, 2, ',', ' ') . " zł</p>";
                echo "<p><strong>VAT 23%:</strong> " . number_format($vat, 2, ',', ' ') . " zł</p>";
                echo "<p><strong>Wartość brutto:</strong> " . number_format($wartosc_brutto, 2, ',', ' ') . " zł</p>";
                echo "<p><strong>Koszt dostawy:</strong> " . number_format($koszt_dostawy, 2, ',', ' ') . " zł</p>";
                echo "<p><strong>Kwota do zapłaty brutto:</strong> " . number_format($do_zaplaty, 2, ',', ' ') . " zł</p>";
                echo "<p><strong>Data złożenia zamówienia:</strong> $data</p>";
                echo "</div>";
            }
            ?>

            <form method="POST" action="opony.php">
                <label for="model">Model opony:</label>
                <select name="model" id="model" required>
                    <option value="letnia">Opona letnia</option>
                    <option value="zimowa">Opona zimowa</option>
                    <option value="caloroczna">Opona całoroczna</option>
                    <option value="suv">Opona SUV</option>
                </select><br><br>

                <label for="ilosc">Liczba sztuk (min. 1):</label>
                <input type="number" name="ilosc" id="ilosc" min="1" value="1" required><br><br>

                <label>Rodzaj wysyłki:</label><br>
                <input type="radio" name="wysylka" value="kurier" id="kurier" required>
                <label for="kurier">Kurier (25 zł)</label><br>
                <input type="radio" name="wysylka" value="paczkomat" id="paczkomat" required>
                <label for="paczkomat">Paczkomat (17 zł)</label><br>
                <input type="radio" name="wysylka" value="osobisty" id="osobisty" required>
                <label for="osobisty">Odbiór osobisty (0 zł)</label><br><br>

                <label for="imie_nazwisko">Imię i nazwisko:</label>
                <input type="text" name="imie_nazwisko" id="imie_nazwisko" required><br><br>

                <button type="submit">Złóż zamówienie</button>
            </form>
        </section>
    </main>

    <footer>
        <p>Stronę wykonał:K </p>
    </footer>
</body>
</html>