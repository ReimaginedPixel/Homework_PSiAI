document.addEventListener('DOMContentLoaded', function () {
    // Smooth scrolling for chapter navigation
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });

    // Fade-in animation for chapters on scroll
    const chapters = document.querySelectorAll('.chapter');
    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target); // Remove observer once visible
            }
        });
    }, { threshold: 0.1 });

    chapters.forEach(chapter => {
        observer.observe(chapter);
    });

    // Toggle details on click
    window.toggleDetails = function (id) {
        const details = document.getElementById(id);
        details.classList.toggle('expanded');
    };
});
