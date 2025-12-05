<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizzeria Margherita</title>
    <link rel="stylesheet" href="styl6.css">
</head>
<body>
    <header><h2>Najlepsza pizza w mieście<img id="zdjecie_header" src="logo.png"></h2></header>

    <section id="lewy">
        <p>„U nas zamówisz pizzę z dowozem</p>
        <a href="logo.png">Nasze Logo</a>
        </section>

        <section id="prawy">
            <h3>Oferta</h3>
            <ol>
                <li>Pizza</li>
                <li>Lasagne</li>
                <li>Sałatki</li>
            </ol> 
            <a id="odsylacz" href="Oferta.txt">Pobierz pełną ofertę</a>
        </section>

    <section id="srodkowy">
        <h3>Pizzeria Margherita</h3>
        <p>ul. Botaniczna 4, Zielona Góra</p>
    </section>


    <section id="dolny">
    <form method="post">
        <h3>Oblicz koszt dostawy</h3>
        <input type="checkbox" id="checkbox" name="checkbox" value="checkbox"> Jestem z Zielonej Góry</input>
        <p>albo</p>
        Podaj liczbę kilometrów od Zielonej Góry
        <input type="number" id="number" name="number" value="number"> 
        <button type="submit">Oblicz</button>
    </form>

        <?php
            $ustawione = isset($_POST["checkbox"]);
            $cena;
            if($ustawione) {
                echo "Dowieziemy Twoją pizzę za darmo";
            } else {
                $KM = $_POST["number"];
                $cena = $KM * 2;
                echo "Dowóz będzie cię kosztował ", $cena, " złotych";
            }
        ?>

    </section>
    <footer>
        Stronę internetową opracował: pesel
    </footer>
</body>
</html>