<html>
<link rel="stylesheet" href="style/style.css">
<body>

<?php
$score = 0;

if (isset($_POST['q1']) && $_POST['q1'] == 'b') $score++;
if (isset($_POST['q2']) && $_POST['q2'] == 'b') $score++;
if (isset($_POST['q3']) && $_POST['q3'] == 'b') $score++;
if (isset($_POST['q4']) && $_POST['q4'] == 'b') $score++;
if (isset($_POST['q5']) && $_POST['q5'] == 'a') $score++;
if (isset($_POST['q6']) && $_POST['q6'] == 'b') $score++;
if (isset($_POST['q7']) && $_POST['q7'] == 'b') $score++;
if (isset($_POST['q8']) && $_POST['q8'] == 'b') $score++;
if (isset($_POST['q9']) && $_POST['q9'] == 'a') $score++;
if (isset($_POST['q10']) && $_POST['q10'] == 'b') $score++;

$grade = "Słaby. Musisz więcej się nauczyć o HTML.";
if ($score >= 5) $grade = "Dobry. Warto jeszcze popracować nad HTML.";
if ($score >= 7) $grade = "Bardzo dobry! Dobrze znasz HTML!";
if ($score >= 9) $grade = "Celujący! Świetna znajomość HTML!";

echo "<h1>Wyniki testu wiedzy HTML</h1>";
echo "<h2>Wyniki:</h2>";
echo "<p>Pytanie 1: ", (isset($_POST['q1']) ? ($_POST['q1'] == 'b' ? "✅ POPRAWNE (+1)" : "❌ BŁĘDNE (0)") : "💡 BRAK ODPOWIEDZI (0)"), "</p>";
echo "<p>Pytanie 2: ", (isset($_POST['q2']) ? ($_POST['q2'] == 'b' ? "✅ POPRAWNE (+1)" : "❌ BŁĘDNE (0)") : "💡 BRAK ODPOWIEDZI (0)"), "</p>";
echo "<p>Pytanie 3: ", (isset($_POST['q3']) ? ($_POST['q3'] == 'b' ? "✅ POPRAWNE (+1)" : "❌ BŁĘDNE (0)") : "💡 BRAK ODPOWIEDZI (0)"), "</p>";
echo "<p>Pytanie 4: ", (isset($_POST['q4']) ? ($_POST['q4'] == 'b' ? "✅ POPRAWNE (+1)" : "❌ BŁĘDNE (0)") : "💡 BRAK ODPOWIEDZI (0)"), "</p>";
echo "<p>Pytanie 5: ", (isset($_POST['q5']) ? ($_POST['q5'] == 'a' ? "✅ POPRAWNE (+1)" : "❌ BŁĘDNE (0)") : "💡 BRAK ODPOWIEDZI (0)"), "</p>";
echo "<p>Pytanie 6: ", (isset($_POST['q6']) ? ($_POST['q6'] == 'b' ? "✅ POPRAWNE (+1)" : "❌ BŁĘDNE (0)") : "💡 BRAK ODPOWIEDZI (0)"), "</p>";
echo "<p>Pytanie 7: ", (isset($_POST['q7']) ? ($_POST['q7'] == 'b' ? "✅ POPRAWNE (+1)" : "❌ BŁĘDNE (0)") : "💡 BRAK ODPOWIEDZI (0)"), "</p>";
echo "<p>Pytanie 8: ", (isset($_POST['q8']) ? ($_POST['q8'] == 'b' ? "✅ POPRAWNE (+1)" : "❌ BŁĘDNE (0)") : "💡 BRAK ODPOWIEDZI (0)"), "</p>";
echo "<p>Pytanie 9: ", (isset($_POST['q9']) ? ($_POST['q9'] == 'a' ? "✅ POPRAWNE (+1)" : "❌ BŁĘDNE (0)") : "💡 BRAK ODPOWIEDZI (0)"), "</p>";
echo "<p>Pytanie 10: ", (isset($_POST['q10']) ? ($_POST['q10'] == 'b' ? "✅ POPRAWNE (+1)" : "❌ BŁĘDNE (0)") : "💡 BRAK ODPOWIEDZI (0)"), "</p>";
echo "<h4>Dodatkowe:</h4>";
echo "<p>Pytanie 11: ", (isset($_POST['q11']) ? (in_array($_POST['q11'], ['a', 'b', 'c', 'd']) ? "✅ POPRAWNE (+0 🤣)" : "❌ BŁĘDNE (0)") : "💡 BRAK ODPOWIEDZI... serio? 💀 "), "</p>";
echo "<h3>Twój wynik: $score/10 punktów</h3>";
echo "<p>Ocena: $grade</p>";
echo '<a href="quiz.html">Wróć do testu</a>';
echo '</body></html>';
?>

</body>
</html>
