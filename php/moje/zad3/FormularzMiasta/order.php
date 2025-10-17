<!DOCTYPE HTML>
<html lang="pl">

<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="style/styl.css">
<title>HTML5</title>
</head>


<body>

<header>
    <a href="index.html"><img id="logo-small" src="style/logo.png" alt="Logo"></a>
</header>

<nav>
    <a href="london.html">London</span></a>   <br>
    <a href="paris.html">Paris</span></a>   <br>
    <a href="tokyo.html">Tokyo</span></a>   <br>
    <a href="poland.html">Poland</span></a>   <br>
    <a href="order.html">Order</span></a>   <br>
    
</nav>

<section>
    <h1>Summary</h1>
        <p> This Is Your Summary! </p>

        <?php
        $name = $_POST['q1'];
        $name2 = $_POST['q2'];
        $cityNames = $_POST['q4'] ?? '';

    // Mapowanie kodów na nazwy miast
    $cityNames = [
         'LD' => 'London',
         'TK' => 'Tokyo',
         'PR' => 'Paris',
         'PL' => 'Poland'
    ];


        echo $name," ", $name2, " You Are Ordering A Ticket To ", $cityNames;
        






        ?>
            
</section>

<footer>
Copyright - Konrad &copy 
</footer>

</body>

</html>