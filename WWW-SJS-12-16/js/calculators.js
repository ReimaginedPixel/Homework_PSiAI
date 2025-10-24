function calculateRAM() {
    const players = parseInt(document.getElementById('players').value);
    const plugins = parseInt(document.getElementById('plugins').value);
    const worldSize = parseFloat(document.getElementById('worldSize').value);
    const serverType = parseFloat(document.getElementById('serverType').value);

    let baseRAM = 2;

    baseRAM += (players / 10) * 0.5;

    baseRAM += (plugins / 5) * 0.3;

    baseRAM *= worldSize;

    baseRAM *= serverType;

    baseRAM = Math.ceil(baseRAM);

    if (baseRAM < 2) baseRAM = 2;
    if (baseRAM > 32) baseRAM = 32;

    const resultDiv = document.getElementById('ramResult');
    const amountDiv = document.getElementById('ramAmount');
    const descDiv = document.getElementById('ramDescription');
    const jvmDiv = document.getElementById('jvmFlags');
    const progressDiv = document.getElementById('ramProgress');

    amountDiv.textContent = baseRAM + ' GB RAM';

    const progressPercent = Math.min((baseRAM / 16) * 100, 100);
    progressDiv.style.width = progressPercent + '%';
    progressDiv.textContent = baseRAM + ' GB';

    let description = '';
    if (baseRAM <= 4) {
        description = 'Wystarczające dla małego serwera. Dobra wydajność dla podstawowej rozgrywki.';
    } else if (baseRAM <= 8) {
        description = 'Zalecane dla średnich serwerów. Zapewnia płynną rozgrywkę i miejsce na rozwój.';
    } else if (baseRAM <= 16) {
        description = 'Doskonałe dla dużych serwerów. Możesz obsłużyć wiele graczy i pluginów.';
    } else {
        description = 'Premium hosting. Maksymalna wydajność dla największych projektów.';
    }
    descDiv.textContent = description;

    let jvmFlags = '';
    if (baseRAM <= 4) {
        jvmFlags = `java -Xms${baseRAM}G -Xmx${baseRAM}G -XX:+UseG1GC -XX:+ParallelRefProcEnabled -XX:MaxGCPauseMillis=200 -XX:+UnlockExperimentalVMOptions -XX:+DisableExplicitGC -XX:G1HeapRegionSize=8M -XX:G1ReservePercent=20 -jar server.jar nogui`;
    } else if (baseRAM <= 10) {
        jvmFlags = `java -Xms${baseRAM}G -Xmx${baseRAM}G -XX:+UseG1GC -XX:+ParallelRefProcEnabled -XX:MaxGCPauseMillis=200 -XX:+UnlockExperimentalVMOptions -XX:+DisableExplicitGC -XX:+AlwaysPreTouch -XX:G1NewSizePercent=30 -XX:G1MaxNewSizePercent=40 -XX:G1HeapRegionSize=8M -XX:G1ReservePercent=20 -XX:G1HeapWastePercent=5 -XX:G1MixedGCCountTarget=4 -XX:InitiatingHeapOccupancyPercent=15 -XX:G1MixedGCLiveThresholdPercent=90 -XX:G1RSetUpdatingPauseTimePercent=5 -XX:SurvivorRatio=32 -XX:+PerfDisableSharedMem -XX:MaxTenuringThreshold=1 -jar server.jar nogui`;
    } else {
        jvmFlags = `java -Xms${baseRAM}G -Xmx${baseRAM}G -XX:+UseG1GC -XX:+ParallelRefProcEnabled -XX:MaxGCPauseMillis=200 -XX:+UnlockExperimentalVMOptions -XX:+DisableExplicitGC -XX:+AlwaysPreTouch -XX:G1NewSizePercent=40 -XX:G1MaxNewSizePercent=50 -XX:G1HeapRegionSize=16M -XX:G1ReservePercent=15 -XX:G1HeapWastePercent=5 -XX:G1MixedGCCountTarget=4 -XX:InitiatingHeapOccupancyPercent=20 -XX:G1MixedGCLiveThresholdPercent=90 -XX:G1RSetUpdatingPauseTimePercent=5 -XX:SurvivorRatio=32 -XX:+PerfDisableSharedMem -XX:MaxTenuringThreshold=1 -jar server.jar nogui`;
    }
    jvmDiv.textContent = jvmFlags;

    resultDiv.classList.add('visible');
}

function calculateSlots() {
    const cpuGhz = parseFloat(document.getElementById('cpuGhz').value);
    const ram = parseInt(document.getElementById('availableRAM').value);
    const diskType = parseFloat(document.getElementById('diskType').value);
    const plugins = parseInt(document.getElementById('pluginCount').value);

    let cpuScore = cpuGhz * 10;
    let ramScore = ram * 5;
    let diskScore = diskType * 20;

    let pluginPenalty = plugins * 0.5;

    let totalScore = cpuScore + ramScore + diskScore - pluginPenalty;

    let maxPlayers = Math.floor(totalScore / 2);

    if (maxPlayers < 5) maxPlayers = 5;
    if (maxPlayers > 500) maxPlayers = 500;

    const resultDiv = document.getElementById('slotsResult');
    const playersDiv = document.getElementById('maxPlayers');
    const descDiv = document.getElementById('slotsDescription');
    const bottleneckList = document.getElementById('bottleneckList');

    playersDiv.textContent = 'Maksymalnie: ' + maxPlayers + ' graczy';

    let description = `Przy obecnej konfiguracji Twój serwer może obsłużyć około ${maxPlayers} graczy online z zachowaniem dobrej wydajności (18+ TPS).`;
    descDiv.textContent = description;

    bottleneckList.innerHTML = '';

    const bottlenecks = [];

    if (cpuGhz < 3.0) {
        bottlenecks.push('❌ CPU: Niskie taktowanie (<3.0 GHz) - główne wąskie gardło');
    } else if (cpuGhz < 3.5) {
        bottlenecks.push('⚠️ CPU: Taktowanie mogłoby być wyższe (opt. 3.5+ GHz)');
    } else {
        bottlenecks.push('✅ CPU: Bardzo dobre taktowanie');
    }

    if (ram < 4) {
        bottlenecks.push('❌ RAM: Za mało pamięci dla większej liczby graczy');
    } else if (ram < 8) {
        bottlenecks.push('⚠️ RAM: Wystarczające, ale można zwiększyć');
    } else {
        bottlenecks.push('✅ RAM: Doskonała ilość pamięci');
    }

    if (diskType < 1) {
        bottlenecks.push('❌ Dysk: HDD spowalnia ładowanie chunków - zalecany SSD');
    } else if (diskType === 1) {
        bottlenecks.push('✅ Dysk: SSD SATA - dobry wybór');
    } else {
        bottlenecks.push('✅ Dysk: SSD NVMe - doskonała wydajność');
    }

    if (plugins > 30) {
        bottlenecks.push('⚠️ Pluginy: Bardzo duża liczba może obciążać serwer');
    } else if (plugins > 15) {
        bottlenecks.push('⚠️ Pluginy: Umiarkowana liczba - monitoruj wydajność');
    } else {
        bottlenecks.push('✅ Pluginy: Rozsądna liczba');
    }

    bottlenecks.forEach(item => {
        const li = document.createElement('li');
        li.textContent = item;
        bottleneckList.appendChild(li);
    });

    resultDiv.classList.add('visible');
}

function calculateChunks() {
    const viewDistance = parseInt(document.getElementById('viewDistance').value);
    const simDistance = parseInt(document.getElementById('simDistance').value);
    const onlinePlayers = parseInt(document.getElementById('onlinePlayers').value);
    const worlds = parseInt(document.getElementById('worldsCount').value);

    const viewChunksPerPlayer = (2 * viewDistance + 1) * (2 * viewDistance + 1);

    const totalViewChunks = viewChunksPerPlayer * onlinePlayers * worlds;

    const simChunksPerPlayer = (2 * simDistance + 1) * (2 * simDistance + 1);
    const totalSimChunks = simChunksPerPlayer * onlinePlayers * worlds;

    const resultDiv = document.getElementById('chunkResult');
    const countDiv = document.getElementById('chunkCount');
    const descDiv = document.getElementById('chunkDescription');
    const recDiv = document.getElementById('chunkRecommendation');
    const progressDiv = document.getElementById('chunkProgress');

    countDiv.textContent = totalViewChunks.toLocaleString() + ' chunków renderowanych';

    const maxReasonable = 50000;
    const progressPercent = Math.min((totalViewChunks / maxReasonable) * 100, 100);
    progressDiv.style.width = progressPercent + '%';
    progressDiv.textContent = Math.round(progressPercent) + '%';

    let loadLevel = '';
    if (totalViewChunks < 20000) {
        loadLevel = 'Niskie obciążenie - doskonała wydajność';
        progressDiv.style.background = 'linear-gradient(90deg, #4caf50, #8bc34a)';
    } else if (totalViewChunks < 40000) {
        loadLevel = 'Średnie obciążenie - dobra wydajność';
        progressDiv.style.background = 'linear-gradient(90deg, #ff9800, #ffc107)';
    } else {
        loadLevel = 'Wysokie obciążenie - możliwe problemy z TPS';
        progressDiv.style.background = 'linear-gradient(90deg, #f44336, #e91e63)';
    }

    const desc = `${loadLevel}\n\nChunki renderowane: ${totalViewChunks.toLocaleString()}\nChunki symulowane: ${totalSimChunks.toLocaleString()}\nŚredni chunks/gracz: ${Math.round(totalViewChunks/onlinePlayers)}`;
    descDiv.textContent = desc;

    let recommendation = '';
    if (totalViewChunks > 40000) {
        const newView = Math.max(4, viewDistance - 2);
        const newSim = Math.max(3, simDistance - 2);
        recommendation = `Zalecane zmniejszenie ustawień:\n• view-distance: ${viewDistance} → ${newView}\n• simulation-distance: ${simDistance} → ${newSim}\n\nTo zmniejszy obciążenie o około ${Math.round(((totalViewChunks - ((2*newView+1)*(2*newView+1)*onlinePlayers*worlds))/totalViewChunks)*100)}%`;
    } else if (totalViewChunks < 15000) {
        const newView = Math.min(16, viewDistance + 2);
        recommendation = `Masz zapas wydajności!\n\nMożesz bezpiecznie zwiększyć:\n• view-distance: ${viewDistance} → ${newView}\n\nTo poprawi doświadczenie graczy bez znaczącego wpływu na TPS.`;
    } else {
        recommendation = `Obecne ustawienia są optymalne!\n\n✅ view-distance: ${viewDistance}\n✅ simulation-distance: ${simDistance}\n\nZachowaj te wartości dla najlepszej równowagi wydajność/jakość.`;
    }

    recDiv.textContent = recommendation;

    resultDiv.classList.add('visible');
}

function calculateCost() {
    const ram = parseInt(document.getElementById('hostingRAM').value);
    const hostingType = parseFloat(document.getElementById('hostingType').value);
    const ddos = parseFloat(document.getElementById('ddosProtection').value);
    const backup = parseFloat(document.getElementById('backup').value);

    let baseCost = 0;

    if (hostingType === 0) {
        baseCost = 0;
    } else {
        baseCost = (ram * hostingType) + ddos + backup;
    }

    const resultDiv = document.getElementById('costResult');
    const costDiv = document.getElementById('monthlyCost');
    const breakdownDiv = document.getElementById('costBreakdown');
    const tipsDiv = document.getElementById('costTips');

    if (baseCost === 0) {
        costDiv.textContent = 'Hosting domowy (koszt prądu ~20-50 PLN/mc)';
    } else {
        costDiv.textContent = Math.round(baseCost) + ' PLN/miesiąc';
    }

    let breakdown = '<h4>Szczegóły kosztów:</h4><ul>';
    if (hostingType > 0) {
        breakdown += `<li>Hosting (${ram} GB RAM): ${Math.round(ram * hostingType)} PLN</li>`;
        if (ddos > 0) {
            breakdown += `<li>Ochrona DDoS: ${ddos} PLN</li>`;
        }
        if (backup > 0) {
            breakdown += `<li>Backup: ${backup} PLN</li>`;
        }
        breakdown += `<li><strong>Razem: ${Math.round(baseCost)} PLN/mc</strong></li>`;
        breakdown += `<li>Rocznie: ~${Math.round(baseCost * 12)} PLN</li>`;
    } else {
        breakdown += '<li>Własny sprzęt - jednorazowy koszt zakupu</li>';
        breakdown += '<li>Koszt prądu: ~20-50 PLN/mc (zależnie od zużycia)</li>';
        breakdown += '<li>Internet: ~50-100 PLN/mc (szerokopasmowy)</li>';
    }
    breakdown += '</ul>';
    breakdownDiv.innerHTML = breakdown;

    let tips = '';
    if (hostingType === 0) {
        tips = '💡 Hosting domowy - najtańszy, ale wymaga:\n• Dobrego internetu (upload 10+ Mbps)\n• Stałego działania komputera\n• Konfiguracji routera (port forwarding)\n• Ochrony DDoS (TCPShield)';
    } else if (baseCost < 50) {
        tips = '💡 Budżetowy hosting - dobry na start:\n• Wystarczy dla małych serwerów (10-20 graczy)\n• Rozważ VPS zamiast shared hostingu\n• TCPShield jako darmowa ochrona DDoS';
    } else if (baseCost < 100) {
        tips = '💡 Średni hosting - profesjonalna opcja:\n• Doskonały dla serwerów 30-60 graczy\n• Dobra stabilność i wsparcie\n• Warto zainwestować w backup';
    } else {
        tips = '💡 Premium hosting - dla dużych projektów:\n• Maksymalna wydajność i stabilność\n• Dedykowane zasoby\n• Profesjonalne wsparcie 24/7';
    }
    tipsDiv.textContent = tips;

    resultDiv.classList.add('visible');
}

function calculateTicks() {
    const currentTPS = parseFloat(document.getElementById('currentTPS').value);
    const normalTicks = parseInt(document.getElementById('normalTicks').value);
    const redstoneClock = parseFloat(document.getElementById('redstoneClock').value);
    const mobSpawns = parseInt(document.getElementById('mobSpawns').value);

    const tpsPercent = (currentTPS / 20) * 100;

    const actualTicks = (normalTicks / 20) * currentTPS;

    const actualTime = normalTicks / 20;
    const realTime = normalTicks / currentTPS;
    const delay = realTime - actualTime;

    const clockTicksNormal = 20 / redstoneClock;
    const clockTicksActual = currentTPS / redstoneClock;
    const clockDelay = clockTicksNormal - clockTicksActual;

    const normalSpawnRate = mobSpawns;
    const actualSpawnRate = (mobSpawns / 20) * currentTPS;
    const spawnDifference = normalSpawnRate - actualSpawnRate;

    const resultDiv = document.getElementById('tickResult');
    const statusDiv = document.getElementById('tpsStatus');
    const analysisDiv = document.getElementById('tickAnalysis');
    const mechanismList = document.getElementById('mechanismImpact');
    const progressDiv = document.getElementById('tpsProgress');

    let status = '';
    if (currentTPS >= 19.5) {
        status = '✅ Doskonały - ' + currentTPS + ' TPS';
        progressDiv.style.background = 'linear-gradient(90deg, #4caf50, #8bc34a)';
    } else if (currentTPS >= 18) {
        status = '⚠️ Dobry - ' + currentTPS + ' TPS';
        progressDiv.style.background = 'linear-gradient(90deg, #8bc34a, #cddc39)';
    } else if (currentTPS >= 15) {
        status = '⚠️ Słaby - ' + currentTPS + ' TPS';
        progressDiv.style.background = 'linear-gradient(90deg, #ff9800, #ffc107)';
    } else {
        status = '❌ Krytyczny - ' + currentTPS + ' TPS';
        progressDiv.style.background = 'linear-gradient(90deg, #f44336, #e91e63)';
    }
    statusDiv.textContent = status;

    progressDiv.style.width = tpsPercent + '%';
    progressDiv.textContent = Math.round(tpsPercent) + '%';

    let analysis = `Aktualny stan serwera:\n\n`;
    analysis += `TPS: ${currentTPS}/20 (${tpsPercent.toFixed(1)}% nominalnej wydajności)\n\n`;
    analysis += `Dla ${normalTicks} ticków (${actualTime.toFixed(2)}s przy 20 TPS):\n`;
    analysis += `• Rzeczywisty czas: ${realTime.toFixed(2)}s\n`;
    analysis += `• Opóźnienie: ${delay.toFixed(2)}s (${((delay/actualTime)*100).toFixed(1)}%)\n\n`;

    if (currentTPS < 19) {
        analysis += `⚠️ Serwer działa ${((1 - currentTPS/20) * 100).toFixed(1)}% wolniej niż powinien!`;
    } else {
        analysis += `✅ Serwer działa prawidłowo!`;
    }

    analysisDiv.textContent = analysis;

    mechanismList.innerHTML = '';

    const impacts = [];

    impacts.push(`Czas gry: ${actualTime.toFixed(2)}s trwa faktycznie ${realTime.toFixed(2)}s (+${(delay).toFixed(2)}s)`);

    if (redstoneClock > 0) {
        impacts.push(`Zegar redstone ${redstoneClock} Hz: działa z częstotliwością ${(currentTPS/clockTicksNormal).toFixed(2)} Hz`);
    }

    impacts.push(`Spawn mobów: ${actualSpawnRate.toFixed(1)}/${normalSpawnRate} na minutę (${spawnDifference.toFixed(1)} mniej)`);

    const growthPenalty = ((20 - currentTPS) / 20) * 100;
    impacts.push(`Wzrost roślin: opóźniony o ${growthPenalty.toFixed(1)}%`);

    const hopperSpeed = (currentTPS / 20) * 100;
    impacts.push(`Transfery hopperów: ${hopperSpeed.toFixed(1)}% normalnej prędkości`);

    if (currentTPS < 18) {
        impacts.push(`⚠️ Zauważalne spowolnienie rozgrywki dla graczy`);
    }

    if (currentTPS < 15) {
        impacts.push(`❌ Znaczące lagi - gracze doświadczają "rubber banding"`);
    }

    impacts.forEach(item => {
        const li = document.createElement('li');
        li.textContent = item;
        mechanismList.appendChild(li);
    });

    resultDiv.classList.add('visible');
}
