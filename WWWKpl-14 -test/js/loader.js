document.addEventListener("DOMContentLoaded", function () {
    const loader = document.getElementById("loader");
    const mainContent = document.querySelector("main");

    // Hide loader after 100 milliseconds, then wait 20 milliseconds, then show main content with fade-in effect
    window.addEventListener("load", function () {
        setTimeout(function () {
            loader.classList.add("hidden");
            setTimeout(function () {
                mainContent.classList.add("fade-in");
            }, 20); // Wait another 20 milliseconds before showing the text
        }, 100); // Initial 100 milliseconds
    });

    // Show loader on link click
    document.querySelectorAll("a").forEach(link => {
        link.addEventListener("click", function (e) {
            loader.classList.remove("hidden");
        });
    });
});