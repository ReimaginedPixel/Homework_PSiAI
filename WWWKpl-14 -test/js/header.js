document.addEventListener("DOMContentLoaded", function () {
    const header = document.querySelector("header");
    let lastScrollY = window.scrollY;

    // Add a class to make the header sticky
    header.classList.add("sticky-header");

    window.addEventListener("scroll", function () {
        if (window.scrollY > lastScrollY) {
            // Scrolling down
            header.classList.add("header-hidden");
            header.classList.remove("header-visible");
        } else {
            // Scrolling up
            header.classList.add("header-visible");
            header.classList.remove("header-hidden");
        }
        lastScrollY = window.scrollY;
    });
});