<?php
if (isset($_POST["imie"]) && isset($_POST["nazwisko"]) && isset($_POST["email"])) {
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Podsumowanie Zamówienia</title>
    <link rel="stylesheet" href="style/stylephp.css">

</head>
<body>
    <div class="result-container">
        <?php
            // dane klientow
            $imie = $_POST["imie"];
            $nazwisko = $_POST["nazwisko"];
            $email = $_POST["email"];


            //ile klient wybral prezentow
            $male_choinki = $_POST["male_choinki"];
            if ($male_choinki < 0 ) $male_choinki = 0;

            $srednie_choinki = $_POST["srednie_choinki"];
            if ($srednie_choinki < 0 ) $srednie_choinki = 0;

            $duze_choinki = $_POST["duze_choinki"];
            if ($duze_choinki < 0 ) $duze_choinki = 0;
    


            $male_prezenty = $_POST["male_prezenty"];
            if ($male_prezenty < 0 ) $male_prezenty = 0;

            $srednie_prezenty = $_POST["srednie_prezenty"];
            if ($srednie_prezenty < 0 ) $srednie_prezenty = 0;

            $duze_prezenty = $_POST["duze_prezenty"];
            if ($duze_prezenty < 0 ) $duze_prezenty = 0;

            if(isset($_POST["ozdoby"])) {
                $ozdoby = true;
            } else {
                $ozdoby = false;
            }
     
            //obliczanie i dodwanaie wsyztkeogo
            $suma = ($male_choinki * 50) +
                    ($srednie_choinki * 100) +
                    ($duze_choinki * 150) +
                    ($male_prezenty * 20) +
                    ($srednie_prezenty * 50) +
                    ($duze_prezenty * 100);


            if ($ozdoby) {
                $suma = $suma * 1.10; 
            }

            // tabela z danymi
            echo "<h2> Podsumowanie zamówienia</h2>";
            echo "<p> <strong>Imię i nazwisko:</strong> $imie $nazwisko</p>";
            echo "<p> <strong>Email:</strong> $email</p>";

            echo "<table>";
            echo "<tr> <th> Produkt          </th> <th> Ilość             </th> <th> Cena jednostkowa </th> <th> Wartość</th></tr>";
            echo "<tr> <td> Małe choinki     </td> <td> $male_choinki     </td> <td> 50 zł            </td> <td> " , ($male_choinki * 50)     , " zł </td> </tr>";
            echo "<tr> <td> Średnie choinki  </td> <td> $srednie_choinki  </td> <td> 100 zł           </td> <td> " , ($srednie_choinki * 100) , " zł </td> </tr>";
            echo "<tr> <td> Duże choinki     </td> <td> $duze_choinki     </td> <td> 150 zł           </td> <td> " , ($duze_choinki * 150)    , " zł </td> </tr>";
            echo "<tr> <td> Małe prezenty    </td> <td> $male_prezenty    </td> <td> 20 zł            </td> <td> " , ($male_prezenty * 20)    , " zł </td> </tr>";
            echo "<tr> <td> Średnie prezenty </td> <td> $srednie_prezenty </td> <td> 50 zł            </td> <td> " , ($srednie_prezenty * 50) , " zł </td> </tr>";
            echo "<tr> <td> Duże prezenty    </td> <td> $duze_prezenty    </td> <td> 100 zł           </td> <td> " , ($duze_prezenty * 100)   , " zł </td> </tr>";
            
            if ($ozdoby) {
                echo "<tr> <td colspan='3'>Ozdoby (+10%)</td><td>" , $suma - ($suma / 1.10), " zł</td></tr>";
            }
            echo "<tr><td colspan='3'><strong>RAZEM</strong></td><td><strong>" , $suma, " zł</strong></td></tr>";
            echo "</table>";

            if ($suma > 1000) {
                echo '<img src="img/duze_zamowienie.png" alt="Zadowolony klient">';
                echo '<h3>Dziękujemy za duże zamówienie!</h3>';
            } elseif ($suma > 100) {
                echo '<img src="img/male_zamowienie.png" alt="Neutralny klient">';
                echo '<h3>Dziękujemy za zamówienie.</h3>';
            } else {
                echo '<img src="img/srednie_zamowienie.png" alt="Smutny klient">';
                echo '<h3>Zachęcamy do większych zakupów!</h3>';
            }
            

            echo "<style>";
            if ($suma > 1000) {
                echo "body { background-color:rgb(199, 255, 212); }";
            } elseif ($suma > 100) {
                echo "body { background-color:rgb(217, 255, 255); }";
            } else {
                echo "body { background-color:rgb(182, 182, 182); }";
            }
            echo "</style>";

            
            ?>

        <a href="formularz.html">
            <button type="button">Dobra, Zamawiam Jeszcze Raz!</button>
        </a>

        <h3> Oto Twoje Produkty Irl </h3>
        <?php
            for($i = 0; $i < $male_choinki; $i++) {
                echo "<img src='img/choinka_mala.png' class='image' >";
            }
            for($i = 0; $i < $srednie_choinki; $i++) {
                echo "<img src='img/choinka_srednia.png' class='image' >";
            }
            for($i = 0; $i < $duze_choinki; $i++) {
                echo "<img src='img/choinka_duza.png' class='image' >";
            }
            for($i = 0; $i < $male_prezenty; $i++) {
                echo "<img src='img/prezent_maly.png' class='image' >";
            }
            for($i = 0; $i < $srednie_prezenty; $i++) {
                echo "<img src='img/prezent_sredni.png' class='image' >";
            }
            for($i = 0; $i < $duze_prezenty; $i++) {
                echo "<img src='img/prezent_duzy.png' class='image' >";
            }
            ?>
            


    </div>
</body>
</html>
<?php 
} else {
    echo "Uzupełnij poprawnie imię, nazwisko i adres e-mail.";
    echo "<a href='formularz.html'>
            <button type='button'>Dobra, Zamawiam Jeszcze Raz!</button>
          </a>";
}
?>