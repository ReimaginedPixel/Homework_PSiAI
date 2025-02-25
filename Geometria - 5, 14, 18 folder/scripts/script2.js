document.addEventListener("DOMContentLoaded", function () {
    function filterFigures() {
        const input = document.getElementById("searchInput").value.toLowerCase();
        const articles = document.querySelectorAll("#figures article");

        articles.forEach(article => {
            const title = article.querySelector("h2").textContent.toLowerCase();
            if (title.includes(input)) {
                article.style.display = "block";
            } else {
                article.style.display = "none";
            }
        });

        if (!input) {
            articles.forEach(article => {
                article.style.display = "block";
            });
        }
    }

    function redirectToFigurePage(figure) {
        window.location.href = `../pages/${figure}.html`;
    }

    window.filterFigures = filterFigures;
    window.redirectToFigurePage = redirectToFigurePage;
});