<?php

$a = -2;
$b = -2;
$c = -2;
echo "siema siema <br> ";

nosensecheck($a,$b,$c);

function nosensecheck($a = 0, $b = 0, $c = 0) {

    if($a == 0) {
        return $b+$c;
    } else if ($a > 0) {
        echo $b-$c;
    } else if ($a == $b && $a == $c && $b == $c) {
        echo "Bingo!!!";
    }

}




?>