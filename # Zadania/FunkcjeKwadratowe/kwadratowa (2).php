<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Zadanie 3 – Pełna analiza funkcji kwadratowej</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
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
                k (dla przecięć z prostą y=k):
                <input type="number" name="k" step="0.01">
            </label>
            <br><br>
            <label>
                x1 (dla analizy monotoniczności):
                <input type="number" name="x1" step="0.01">
            </label>
            <br><br>
            <label>
                x2 (dla analizy monotoniczności):
                <input type="number" name="x2" step="0.01">
            </label>
        </fieldset>
        <br>
        <button type="submit">Analizuj funkcję</button>
    </form>

    <br><br>
    <fieldset>
    <legend>Bardzo Fany Wykresz</legend>    

    <?php
            if (isset($_POST['a'])) {
                $a = floatval($_POST["a"]); 
            }
        
            if (isset($_POST['b'])) {
                $b = floatval($_POST['b']); 
            }
            
            if (isset($_POST['c'])) {
                $c = floatval($_POST['c']); 
            }
        
            if (isset($_POST['k'])) {
                $k = floatval($_POST['k']); 
            }
        
            if (isset($_POST['x1'])) {
                $x1 = floatval($_POST['x1']); 
            }
        
            if (isset($_POST['x2'])) {
                $x2 = floatval($_POST['x2']); 
            }

        // funkvje
        function czy_rosnaca_na_przedziale($a, $b, $c, $x1, $x2) {
            if ($a == 0) return "nie (funkcja liniowa)";
            $xw = -$b / (2 * $a);
            if ($a > 0) {
                return ($x1 >= $xw) ? "tak" : "nie";
            } else {
                return ($x2 <= $xw) ? "tak" : "nie";
            }
        }

        function czy_malejaca_na_przedziale($a, $b, $c, $x1, $x2) {
            if ($a == 0) return "nie (funkcja liniowa)";
            $xw = -$b / (2 * $a);
            if ($a > 0) {
                return ($x2 <= $xw) ? "tak" : "nie";
            } else {
                return ($x1 >= $xw) ? "tak" : "nie";
            }
        }

        function przeciecia_z_prosta($a, $b, $c, $k) {
            $delta = $b*$b - 4*$a*($c - $k);
            if ($delta < 0) {
                return "0 punktów";
            } elseif ($delta == 0) {
                $x = -$b / (2*$a);
                return "1 punkt: x = " . round($x, 3);
            } else {
                $x1 = (-$b + sqrt($delta)) / (2*$a);
                $x2 = (-$b - sqrt($delta)) / (2*$a);
                return "2 punkty: x₁ = " . round($x1, 3) . ", x₂ = " . round($x2, 3);
            }
        }

        
        echo "<h3>Wyniki:</h3>";
        if (isset($_POST['a']) && isset($_POST['b']) && isset($_POST['c']) && isset($_POST['k']) && isset($_POST['x1']) && isset($_POST['x2'])) {
        echo "<p>Czy rosnąca na [$x1, $x2]? " . czy_rosnaca_na_przedziale($a, $b, $c, $x1, $x2) . "</p>";
        echo "<p>Czy malejąca na [$x1, $x2]? " . czy_malejaca_na_przedziale($a, $b, $c, $x1, $x2) . "</p>";
        echo "<p>Przecięcia z prostą y = $k: " . przeciecia_z_prosta($a, $b, $c, $k) . "</p>";
        }

        //gogole czart
        if (isset($_POST['a']) && isset($_POST['b']) && isset($_POST['c']) && isset($_POST['k']) && isset($_POST['x1']) && isset($_POST['x2'])) {
        $dataPoints = [];
        for ($x = -10; $x <= 10; $x += 0.5) {
            $y = $a * $x * $x + $b * $x + $c;
            $dataPoints[] = [$x, $y];
        }

        echo "<div id='curve_chart' style='width: 900px; height: 500px;'></div>";

        echo "<script>";
        echo "google.charts.load('current', {'packages':['corechart']});";
        echo "google.charts.setOnLoadCallback(drawChart);";
        echo "function drawChart() {";
        echo "var data = google.visualization.arrayToDataTable([";
        echo "['x', 'f(x)'],";

        foreach ($dataPoints as $pt) {
            echo "[" . $pt[0] . ", " . $pt[1] . "],";
        }

        echo "]);";
        echo "var options = {
            title: 'f(x) = " . $a . "x² + " . $b . "x + " . $c . "',
            hAxis: {title: 'x'},
            vAxis: {title: 'f(x)'},
            legend: 'none',
            curveType: 'function'
        };";
        echo "var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));";
        echo "chart.draw(data, options);";
        echo "}";
        echo "</script>";
    }
    ?>
    </fieldset>
</body>
</html>
</body>
</html>