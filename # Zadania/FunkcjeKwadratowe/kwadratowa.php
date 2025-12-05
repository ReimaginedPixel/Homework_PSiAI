<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Zadanie 3 – Pełna analiza funkcji kwadratowej</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses'],
          ['2004',  1000,      400],
          ['2005',  1170,      460],
          ['2006',  660,       1120],
          ['2007',  1030,      540]
        ]);

        var options = {
          title: 'Company Performance',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
</head>
<body>
    <h1>Zadanie 3 – Pełna analiza funkcji kwadratowej</h1>

    <p>
        Dla funkcji <strong>f(x) = ax² + bx + c</strong> napisz w PHP trzy funkcje:
    </p>
    <ol>
        <li><code>pierwiastki($a, $b, $c)</code> – zwraca opis pierwiastków,</li>
        <li><code>wierzcholek($a, $b, $c)</code> – zwraca współrzędne wierzchołka,</li>
        <li><code>przedzialy_monotonicznosci($a, $b, $c)</code> – zwraca przedziały rośnięcia i malejącej.</li>
    </ol>

    <p>
        Po wysłaniu formularza:
    </p>
    <ul>
        <li>wyświetl pierwiastki funkcji (lub informację, że ich nie ma),</li>
        <li>wyświetl współrzędne wierzchołka,</li>
        <li>wyświetl przedziały, na których funkcja rośnie i maleje.</li>
    </ul>



    <form method="post">
        <fieldset>
            <legend>Podaj współczynniki funkcji kwadratowej</legend>
            <label>
                a:
                <input type="number" name="a" step="0.01" required>
            </label>
            <br><br>
            <label>
                b:
                <input type="number" name="b" step="0.01" required>
            </label>
            <br><br>
            <label>
                c:
                <input type="number" name="c" step="0.01" required>
            </label>
            <br><br>
            <label>
                k:
                <input type="number" name="k" step="0.01" required>
            </label>
            <br><br>
            <label>
                x1:
                <input type="number" name="x1" step="0.01" required>
            </label>
            <br><br>
            <label>
                x2:
                <input type="number" name="x2" step="0.01" required>
            </label>
        </fieldset>
        <br>
        <button type="submit">Analizuj funkcję</button>
    </form>

    <div id="curve_chart" style="width: 900px; height: 500px"></div>



    <?php
    // TU NAPISZ FUNKCJE:
    // function pierwiastki($a, $b, $c) { ... }
    // function wierzcholek($a, $b, $c) { ... }
    // function przedzialy_monotonicznosci($a, $b, $c) { ... }

    // TU OBSŁUŻ FORMULARZ:
    // - pobierz wartości a, b, c z $_POST
    // - wywołaj wszystkie trzy funkcje
    // - wyświetl wyniki w czytelnej formie (np. listą lub tabelą)
    //if (isset($_POST['q8']) && $_POST['q8'] == 'b') $score++;

    function czy_rosnaca_na_przedziale($a, $b, $c, $x1, $x2) {
        echo "czy funkcja jest rosnąca na całym [x1, x2]: ";

    }

    function przeciecia_z_prosta($a, $b, $c, $k) {

        $f1 = 2*$a * $x1 * $b;
        $f1 = 2*$a * $x1 * $b;
        if ($f1 >= 0 && $f2 >= 0) echo "ok";
    }

    function czy_malejaca_na_przedziale($a, $b, $c, $x1, $x2) {

    }

    if (isset($_POST['a'])) {
        $a = $_POST["a"]; 
    }

    if (isset($_POST['b'])) {
        $b = $_POST["b"]; 
    }
    
    if (isset($_POST['c'])) {
        $c = $_POST["c"]; 
    }

    if (isset($_POST['k'])) {
        $k = $_POST["k"]; 
    }

    if (isset($_POST['x1'])) {
        $x1 = $_POST["x1"]; 
    }

    if (isset($_POST['x2'])) {
        $x2 = $_POST["x2"]; 
    }

    if (isset($_POST['a']) && isset($_POST['b']) && isset($_POST['c']) && isset($_POST['l']) && isset($_POST['x1']) && isset($_POST['x2'])) {

        czy_rosnaca_na_przedziale();
        echo "<br><br>";
        przeciecia_z_prosta();
        echo "<br><br>";
        czy_malejaca_na_przedziale();
        echo "<br><br>";
    }



    
    ?>

</body>
</html>
