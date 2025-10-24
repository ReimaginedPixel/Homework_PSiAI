document.addEventListener('DOMContentLoaded', function() {
    animateStats();
    setupHoverEffects();
});

function animateStats() {
    const statNumbers = document.querySelectorAll('.stat-number');

    const observerOptions = {
        threshold: 0.5
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const target = entry.target;
                const finalValue = target.textContent;

                if (finalValue.includes('+')) {
                    animateNumber(target, 0, parseInt(finalValue), 2000);
                } else {
                    const num = parseInt(finalValue);
                    if (!isNaN(num)) {
                        animateNumber(target, 0, num, 1500);
                    }
                }

                observer.unobserve(target);
            }
        });
    }, observerOptions);

    statNumbers.forEach(stat => {
        observer.observe(stat);
    });
}

function animateNumber(element, start, end, duration) {
    const hasPlus = element.textContent.includes('+');
    const range = end - start;
    const increment = range / (duration / 16);
    let current = start;

    const timer = setInterval(() => {
        current += increment;
        if (current >= end) {
            current = end;
            clearInterval(timer);
        }
        element.textContent = Math.floor(current) + (hasPlus ? '+' : '');
    }, 16);
}

function setupHoverEffects() {
    const tocItems = document.querySelectorAll('.toc-item');

    tocItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.style.transition = 'all 0.3s ease';
        });
    });

    const quickLinks = document.querySelectorAll('.quick-link');

    quickLinks.forEach(link => {
        link.addEventListener('mouseenter', function() {
            const icon = this.querySelector('.icon');
            if (icon) {
                icon.style.transform = 'scale(1.2) rotate(5deg)';
                icon.style.transition = 'transform 0.3s ease';
            }
        });

        link.addEventListener('mouseleave', function() {
            const icon = this.querySelector('.icon');
            if (icon) {
                icon.style.transform = 'scale(1) rotate(0deg)';
            }
        });
    });
}

const easeInOutQuad = function(t) {
    return t < 0.5 ? 2 * t * t : -1 + (4 - 2 * t) * t;
};
