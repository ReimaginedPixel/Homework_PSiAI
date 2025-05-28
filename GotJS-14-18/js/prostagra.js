let y = Math.floor(Math.random() * 100 + 1);

let guess = 1;

document.getElementById("submitguess").onclick = function () {
  let x = document.getElementById("guessField").value;

  if (x == y) {
    alert("Zgadłeś liczbe za " + guess + " razem ");
  } else if (x > y) {
    guess++;
    alert("Zła liczba. Spróbuj podać mniejszą");
  } else {
    guess++;
    alert("Zła liczba. Spróbuj podać większą");
  }
};