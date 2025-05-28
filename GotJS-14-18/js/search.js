document.addEventListener('DOMContentLoaded', function() {
    const searchContainer = document.querySelector('.search-container');
    if (window.location.pathname !== '../index.html') {
        searchContainer.style.display = 'none';
    } else {
        document.querySelector('header input[type="text"]').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const gridItems = document.querySelectorAll('.grid-item');

            gridItems.forEach(item => {
                const text = item.textContent.toLowerCase();
                if (text.includes(searchTerm)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    }
});