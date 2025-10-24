<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wynajem</title>
</head>
<body>
    <h1> Podsumowanie: </h1>
    </body>
    <?php
    $marka = $_POST["marka"];

    switch ($marka) {
        case 'vw golf':
            echo '<img src="../style/golf.png" alt="zadanie">';
            break;
        case 'ford ka':
            echo '<img src="../style/ford.png" alt="ford.png">';
            break;
        case 'jeep grand':
            echo "<img src='../style/jeep.png' alt='Jeep Grand'>";
            break;
        case 'bus':
            echo "<img src='../style/bus.png' alt='Bus'>";
            break;
        case 'autobus':
            echo "<img src='../style/autobus.png' alt='Autobus>";
            break;
        default:
            echo '';
    }

    ?>


</html>