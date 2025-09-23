<html>
    <body>
    <form method=post action="">
        <label for="weight">Waga (kg):</label>
        <input type=number id="weight"name=weight step="0.1" required>
        <br>
        <label for="height">Wzrost (cm):</label>
        <input type=number id="height" name=height step="0.1" required>
        <br>
        <input type=submit value="Oblicz BMI">
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"]=="POST") {
    $weight = floatval($_POST['weight']);
    $height = floatval($_POST['height']) / 100;
    if ($height>0)
    {
        $bmi = $weight / ($height * $height);
        echo "<h2>Twoje BMI: " . round($bmi, 2) . "</h2>";

        if($bmi<18.5)
        {
            echo "<p>Niedowaga</p>";
        }
        elseif($bmi>=18.5 && $bmi<24.9)
        {
            echo "<p>Waga prawidłowa</p>";
        }
        elseif($bmi>=25 && $bmi<29.9)
        {
            echo "<p>Nadwaga</p>";
        }
        else
        {
            echo "<p>Otyłość</p>";
        }
    }
}

    ?>
    </body>

</html>