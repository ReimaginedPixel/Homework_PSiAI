document.addEventListener('DOMContentLoaded', () => {
    const sections = document.querySelectorAll('.content-section');
    sections.forEach((section, index) => {
        if (index % 2 === 0) {
            section.classList.add('image-left');
        } else {
            section.classList.add('image-right');
        }
    });

    document.querySelectorAll('.copy-btn').forEach(button => {
        button.addEventListener('click', () => {
            const command = button.previousElementSibling.textContent;
            navigator.clipboard.writeText(command).then(() => {
                alert('Skopiowano do schowka!');
            });
        });
    });
});
