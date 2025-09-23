<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Nasz klient</title>
</head>
<body>
    <h2>Witamy w naszym parku rozrywki!</h2>
    <div id = "cennik">

        <form method="post" action="index.php">
            <label for="iloscbn">Podaj ilość biletów zwykłych</label>
            <input type="number" id="iloscbn" name="iloscbn" required placeholder = "0"><br>

            <label for="iloscbu">Podaj ilość biletów ulgowych: </label>
            <input type="number" id="iloscbu" name="iloscbu" required placeholder = "0"><br>

            <label for="data">Podaj datę wizyty: </label>
            <input type="date" id="data" name="data" required><br>
        <div id = "atrakcje" >

            <p>Dodatkowe atrakcje:</p>
            <label for="przewodnik">Przewodnik</label><br>
            <input type="checkbox" id="przewodnik" name="przewodnik" value="1">
            
            <label for="karnetFF">Karnet Free Food</label><br>
            <input type="checkbox" id="karnetFF" name="karnetFF" value="1">
            
            <label for="hulajnoga">Hulajnoga</label><br>
            <input type="checkbox" id="hulajnoga" name="hulajnoga" value="1">
            <br>
            <input type="submit" value="Oblicz koszty">
        </div>
        </form>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $iloscbn = $_POST['iloscbn'];
        $iloscbu = $_POST['iloscbu'];
        $data = $_POST['data'];
        if($data<date("Y-m-d")){
            echo "Podano błędną datę wizyty!<br>";
            exit;
        }
        $przewodnik = isset($_POST['przewodnik']) ? 1 : 0;
        $karnetFF = isset($_POST['karnetFF']) ? 1 : 0;
        $hulajnoga = isset($_POST['hulajnoga']) ? 1 : 0;

    echo "<div id='koszt'>";
        echo "<h3>KOSZTY</h3>";
        echo "Koszt biletów zwykłych:  $iloscbn x 100 = "  . ($iloscbn * 100) . " zł<br>";
        echo "Koszt biletów ulgowych: $iloscbu x 20 = " . ($iloscbu * 20) . " zł<br>";
        $dodatkowe = ($przewodnik * 50) + ($karnetFF * ($iloscbn*$iloscbu) * 200) + ($hulajnoga * ($iloscbn + $iloscbu) * 20);
        echo "Łączny koszt dodatkowych atrakcji: " . (($przewodnik * 50) + ($karnetFF * $iloscbn * $iloscbu * 200) + ($hulajnoga * ($iloscbn + $iloscbu) * 20)) . " zł<br>";
        echo "Łączny koszt: <strong>" . (($iloscbn * 100) + ($iloscbu * 20) + $dodatkowe) . "</strong> zł<br>";
        if($przewodnik) {
            echo "<img src='przewodnik.png' alt='Przewodnik' height = '300' width = '300'><br>";
        }
        if($hulajnoga) {
            echo "<img src='hulajka.png' alt='Hulajnoga' height = '300' width = '300'><br>";
        }
        if($karnetFF) {
            echo "<img src='freefood.png' alt='Karnet Free Food' height = '300' width = '300'><br>";
        }
    echo "</div>"; 
    }
    ?>
</body>
</html>
