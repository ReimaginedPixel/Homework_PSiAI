document.addEventListener("DOMContentLoaded", function () {
    function validateNumber(value) {
        const number = parseFloat(value);
        if (isNaN(number) || number <= 0) {
            alert("🚫 Podano nieprawidłową wartość. Wprowadź liczbę większą od 0.");
            return false;
        }
        return true;
    }

    function calculateFigureProperties(figure) {
        let result = "";
        switch (figure) {
            case "kwadrat":
                const squareSide = prompt("🟦 Podaj długość boku kwadratu:");
                if (validateNumber(squareSide)) {
                    const area = squareSide * squareSide;
                    const perimeter = 4 * squareSide;
                    result = `🟦 Pole kwadratu: ${area}, Obwód: ${perimeter}`;
                }
                break;
            case "trojkat":
                const base = prompt("🔺 Podaj długość podstawy trójkąta:");
                const height = prompt("📏 Podaj wysokość trójkąta:");
                const side1 = prompt("📐 Podaj długość pierwszego boku:");
                const side2 = prompt("📐 Podaj długość drugiego boku:");
                if (
                    validateNumber(base) &&
                    validateNumber(height) &&
                    validateNumber(side1) &&
                    validateNumber(side2)
                ) {
                    const area = 0.5 * base * height;
                    const perimeter = parseFloat(base) + parseFloat(side1) + parseFloat(side2);
                    result = `🔺 Pole trójkąta: ${area}, Obwód: ${perimeter}`;
                }
                break;
            case "prostokat":
                const width = prompt("⬛ Podaj szerokość prostokąta:");
                const heightRect = prompt("⬛ Podaj wysokość prostokąta:");
                if (validateNumber(width) && validateNumber(heightRect)) {
                    const area = width * heightRect;
                    const perimeter = 2 * (parseFloat(width) + parseFloat(heightRect));
                    result = `⬛ Pole prostokąta: ${area}, Obwód: ${perimeter}`;
                }
                break;
            case "romb":
                const diag1 = prompt("🔷 Podaj długość pierwszej przekątnej rombu:");
                const diag2 = prompt("🔷 Podaj długość drugiej przekątnej rombu:");
                const sideRomb = prompt("🔷 Podaj długość boku rombu:");
                if (
                    validateNumber(diag1) &&
                    validateNumber(diag2) &&
                    validateNumber(sideRomb)
                ) {
                    const area = (diag1 * diag2) / 2;
                    const perimeter = 4 * sideRomb;
                    result = `🔷 Pole rombu: ${area}, Obwód: ${perimeter}`;
                }
                break;
            case "rownoleglobok":
                const basePar = prompt("🔶 Podaj długość podstawy równoległoboku:");
                const heightPar = prompt("📏 Podaj wysokość równoległoboku:");
                const sidePar = prompt("📐 Podaj długość boku równoległoboku:");
                if (
                    validateNumber(basePar) &&
                    validateNumber(heightPar) &&
                    validateNumber(sidePar)
                ) {
                    const area = basePar * heightPar;
                    const perimeter = 2 * (parseFloat(basePar) + parseFloat(sidePar));
                    result = `🔶 Pole równoległoboku: ${area}, Obwód: ${perimeter}`;
                }
                break;
            case "trapez":
                const base1 = prompt("🔻 Podaj długość pierwszej podstawy trapezu:");
                const base2 = prompt("🔻 Podaj długość drugiej podstawy trapezu:");
                const heightTrapez = prompt("📏 Podaj wysokość trapezu:");
                const side1Trapez = prompt("📐 Podaj długość pierwszego boku trapezu:");
                const side2Trapez = prompt("📐 Podaj długość drugiego boku trapezu:");
                if (
                    validateNumber(base1) &&
                    validateNumber(base2) &&
                    validateNumber(heightTrapez) &&
                    validateNumber(side1Trapez) &&
                    validateNumber(side2Trapez)
                ) {
                    const area =
                        ((parseFloat(base1) + parseFloat(base2)) * heightTrapez) / 2;
                    const perimeter =
                        parseFloat(base1) +
                        parseFloat(base2) +
                        parseFloat(side1Trapez) +
                        parseFloat(side2Trapez);
                    result = `🔻 Pole trapezu: ${area}, Obwód: ${perimeter}`;
                }
                break;
            case "kolo":
                const radius = prompt("⚪ Podaj promień koła:");
                if (validateNumber(radius)) {
                    const area = Math.PI * radius * radius;
                    const perimeter = 2 * Math.PI * radius;
                    result = `⚪ Pole koła: ${area.toFixed(2)}, Obwód: ${perimeter.toFixed(
                        2
                    )}`;
                }
                break;
            case "owal":
                const majorAxis = prompt("🟠 Podaj długość dużej osi owalu:");
                const minorAxis = prompt("🟠 Podaj długość małej osi owalu:");
                if (validateNumber(majorAxis) && validateNumber(minorAxis)) {
                    const area = Math.PI * majorAxis * minorAxis / 4;
                    const perimeter = Math.PI * (3 * (majorAxis + minorAxis) - Math.sqrt((3 * majorAxis + minorAxis) * (majorAxis + 3 * minorAxis)));
                    result = `🟠 Pole owalu: ${area.toFixed(2)}, Przybliżony obwód: ${perimeter.toFixed(2)}`;
                }
                break;
            case "szesciokat":
                const hexSide = prompt("⬡ Podaj długość boku sześciokąta:");
                if (validateNumber(hexSide)) {
                    const area = (3 * Math.sqrt(3) * hexSide * hexSide) / 2;
                    const perimeter = 6 * hexSide;
                    result = `⬡ Pole sześciokąta: ${area.toFixed(2)}, Obwód: ${perimeter}`;
                }
                break;
            default:
                alert("❓ Nieznana figura.");
        }
        if (result) {
            alert(result);
        }
    }

    window.startCalculation = calculateFigureProperties;
});
