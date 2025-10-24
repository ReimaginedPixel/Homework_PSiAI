const galleryImages = [
    { src: '../images/survival-spawn.png', caption: 'Spawn Survival', category: 'survival' },
    { src: '../images/survival-shop.png', caption: 'Admin Shop', category: 'survival' },
    { src: '../images/survival-miasto.png', caption: 'Miasto Graczy', category: 'survival' },
    { src: '../images/survival-farm.png', caption: 'Automatyczne Farmy', category: 'survival' },
    { src: '../images/survival-protection.png', caption: 'System Ochrony Działek', category: 'survival' },
    { src: '../images/creative-plots.png', caption: 'System Działek', category: 'creative' },
    { src: '../images/creative-megabuild.png', caption: 'Mega Budowle', category: 'creative' },
    { src: '../images/creative-worldedit.png', caption: 'WorldEdit w Akcji', category: 'creative' },
    { src: '../images/creative-competition.png', caption: 'Konkursy Budowlane', category: 'creative' },
    { src: '../images/minigames-lobby.png', caption: 'Lobby Minigier', category: 'minigames' },
    { src: '../images/minigames-bedwars.png', caption: 'Arena BedWars', category: 'minigames' },
    { src: '../images/minigames-skywars.png', caption: 'SkyWars', category: 'minigames' },
    { src: '../images/minigames-parkour.png', caption: 'Parkour Extreme', category: 'minigames' },
    { src: '../images/minigames-pvp.png', caption: 'Arena PvP', category: 'minigames' },
    { src: '../images/rpg-miasto.png', caption: 'Miasto RPG', category: 'rpg' },
    { src: '../images/rpg-dungeon.png', caption: 'Lochy i Dungeony', category: 'rpg' },
    { src: '../images/rpg-klasy.png', caption: 'System Klas', category: 'rpg' },
    { src: '../images/rpg-boss.png', caption: 'Walka z Bossem', category: 'rpg' },
    { src: '../images/rpg-sklepy.png', caption: 'Sklepy i NPCe', category: 'rpg' },
    { src: '../images/skyblock-spawn.png', caption: 'Hub Skyblock', category: 'skyblock' },
    { src: '../images/skyblock-wyspa.png', caption: 'Rozbudowana Wyspa', category: 'skyblock' },
    { src: '../images/skyblock-farmy.png', caption: 'Automatyczne Farmy', category: 'skyblock' },
    { src: '../images/skyblock-wyzwania.png', caption: 'System Wyzwań', category: 'skyblock' },
    { src: '../images/skyblock-customitemy.png', caption: 'Custom Itemy', category: 'skyblock' },
    { src: '../images/panel-admin.png', caption: 'Panel Administracyjny', category: 'all' },
    { src: '../images/panel-gracza.png', caption: 'Menu Gracza', category: 'all' },
    { src: '../images/scoreboard.png', caption: 'Custom Scoreboard', category: 'all' },
    { src: '../images/tab-lista.png', caption: 'Custom Tab List', category: 'all' }
];

let currentImageIndex = 0;

function filterGallery(category) {
    const buttons = document.querySelectorAll('.filter-btn');
    buttons.forEach(btn => btn.classList.remove('active'));
    event.target.classList.add('active');

    const items = document.querySelectorAll('.gallery-item');

    items.forEach(item => {
        const itemCategory = item.getAttribute('data-category');

        if (category === 'all' || itemCategory === category) {
            item.style.display = 'block';
            item.style.animation = 'fadeIn 0.5s ease';
        } else {
            item.style.display = 'none';
        }
    });
}

function openLightbox(index) {
    currentImageIndex = index;
    const lightbox = document.getElementById('lightbox');
    const img = document.getElementById('lightbox-img');
    const caption = document.getElementById('lightbox-caption');

    img.src = galleryImages[index].src;
    caption.textContent = galleryImages[index].caption;

    lightbox.classList.add('active');

    document.body.style.overflow = 'hidden';
}

function closeLightbox(event) {
    if (event.target.id === 'lightbox' || event.target.classList.contains('lightbox-close')) {
        const lightbox = document.getElementById('lightbox');
        lightbox.classList.remove('active');
        document.body.style.overflow = 'auto';
        event.stopPropagation();
    }
}

function changeLightbox(direction, event) {
    event.stopPropagation();

    currentImageIndex += direction;

    if (currentImageIndex < 0) {
        currentImageIndex = galleryImages.length - 1;
    } else if (currentImageIndex >= galleryImages.length) {
        currentImageIndex = 0;
    }

    const img = document.getElementById('lightbox-img');
    const caption = document.getElementById('lightbox-caption');

    img.style.opacity = '0';

    setTimeout(() => {
        img.src = galleryImages[currentImageIndex].src;
        caption.textContent = galleryImages[currentImageIndex].caption;
        img.style.opacity = '1';
    }, 150);
}

document.addEventListener('keydown', function(event) {
    const lightbox = document.getElementById('lightbox');

    if (lightbox && lightbox.classList.contains('active')) {
        if (event.key === 'Escape') {
            lightbox.classList.remove('active');
            document.body.style.overflow = 'auto';
        } else if (event.key === 'ArrowLeft') {
            const fakeEvent = { stopPropagation: () => {} };
            changeLightbox(-1, fakeEvent);
        } else if (event.key === 'ArrowRight') {
            const fakeEvent = { stopPropagation: () => {} };
            changeLightbox(1, fakeEvent);
        }
    }
});

document.addEventListener('DOMContentLoaded', function() {
    const style = document.createElement('style');
    style.textContent = `
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.95);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .lightbox-content img {
            transition: opacity 0.15s ease;
        }
    `;
    document.head.appendChild(style);
});
