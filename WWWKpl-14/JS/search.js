document.addEventListener("DOMContentLoaded", function () {
    const input = document.getElementById("search-input");
    const button = document.getElementById("search-button");

    function performSearch() {
        const query = input.value.toLowerCase();
        const elements = document.querySelectorAll("main p, main h2, main h3, main ul li, main ol li");
        let firstMatch = null;

        elements.forEach(element => {
            const text = element.textContent.toLowerCase();
            if (text.includes(query)) {
                const regex = new RegExp(`(${query})`, "gi");
                element.innerHTML = text.replace(regex, "<span class='highlight'>$1</span>");
                if (!firstMatch) {
                    firstMatch = element;
                }
            } else {
                element.innerHTML = text;
            }
        });

        if (firstMatch) {
            firstMatch.scrollIntoView({ behavior: "smooth", block: "center" });
        }
    }

    button.addEventListener("click", performSearch);

    input.addEventListener("keydown", function (event) {
        if (event.key === "Enter") {
            performSearch();
        }
    });
});