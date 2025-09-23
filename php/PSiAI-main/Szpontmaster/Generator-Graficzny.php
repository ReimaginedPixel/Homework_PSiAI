<?php
echo "Hello world!";
$a=4;
$b=5;
$wynik=$a+$b;
echo"<br>";
for($i = 0; $i < $a; $i++)
{
    for($j = 0; $j < $b; $j++)
    {
        echo"#";
    }
    echo"<br";
}
echo "<br>";
echo"<br>";
echo $wynik;
$imie="Jakub";
$nazwisko="Pękala";
$rok_urodzenia=2010;
$wiek=2025-$rok_urodzenia;
echo "<br>";
echo "Twoje imie to $imie, nazwisko $nazwisko, urodziłeś się w <u>$rok_urodzenia</u>, masz <strong>$wiek</strong> lat.";
$pole=$a*2+$b*2;
echo"<br>$pole";
$liczba = 67;
echo"<br>$liczba";
$liczba = $liczba *2;
echo"<br>$liczba";
$liczba = 67;
echo"<br>$liczba";
if($liczba %2 == 0)
{
    echo" parzysta";
}
else
{
    echo" nieparzysta";
}
$liczba = 67;
$liczba = pow($liczba, 2);
echo"<br>$liczba";
$liczba = 67;
$liczba = pow($liczba, 3);
echo"<br>$liczba<br>";

$imie =$_GET['imie'];
echo"$imie";


?>