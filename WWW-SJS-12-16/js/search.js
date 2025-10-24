const searchData = {
    'podstawy': {
        title: 'Podstawy Serwerów Minecraft',
        url: 'content/podstawy.html',
        keywords: 'vanilla spigot paper bukkit forge fabric instalacja java uruchomienie'
    },
    'konfiguracja': {
        title: 'Konfiguracja Serwera',
        url: 'content/konfiguracja.html',
        keywords: 'server.properties bukkit.yml spigot.yml paper whitelist ops konfiguracja ustawienia'
    },
    'optymalizacja': {
        title: 'Optymalizacja Wydajności',
        url: 'content/optymalizacja.html',
        keywords: 'ram jvm flagi aikar tps wydajność optymalizacja view-distance chunks'
    },
    'pluginy': {
        title: 'Pluginy i Modyfikacje',
        url: 'content/pluginy.html',
        keywords: 'plugin essentials luckperms worldedit worldguard vault instalacja'
    },
    'bezpieczenstwo': {
        title: 'Bezpieczeństwo',
        url: 'content/bezpieczenstwo.html',
        keywords: 'ddos griefing backup exploity anticheat ochrona bezpieczeństwo'
    },
    'galeria': {
        title: 'Galeria Serwerów',
        url: 'content/galeria.html',
        keywords: 'galeria zdjęcia obrazki survival creative minigry rpg skyblock'
    },
    'kalkulatory': {
        title: 'Kalkulatory',
        url: 'content/kalkulatory.html',
        keywords: 'kalkulator ram slots chunks koszt tps obliczenia'
    },
    'skorowidz': {
        title: 'Skorowidz',
        url: 'content/skorowidz.html',
        keywords: 'komendy pomoc problemy linki faq'
    }
};

function searchContent() {
    const searchInput = document.getElementById('searchInput');
    const query = searchInput.value.toLowerCase().trim();

    if (query.length < 2) {
        alert('Wpisz przynajmniej 2 znaki');
        return;
    }

    const results = [];

    for (const [key, page] of Object.entries(searchData)) {
        const searchText = (page.title + ' ' + page.keywords).toLowerCase();
        if (searchText.includes(query)) {
            results.push(page);
        }
    }

    if (results.length === 0) {
        alert('Nie znaleziono wyników dla: ' + query);
    } else if (results.length === 1) {
        window.location.href = results[0].url;
    } else {
        let message = 'Znaleziono ' + results.length + ' wyników:\n\n';
        results.forEach((result, index) => {
            message += (index + 1) + '. ' + result.title + '\n';
        });
        message += '\nPrzechodzę do pierwszego wyniku...';
        alert(message);
        window.location.href = results[0].url;
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    if (searchInput) {
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                searchContent();
            }
        });
    }
});
