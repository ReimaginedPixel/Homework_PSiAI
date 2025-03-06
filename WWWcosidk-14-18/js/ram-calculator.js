function calculateRAM() {
    const players = document.getElementById('players').value;
    const plugins = document.getElementById('plugins').value;
    const baseRAM = 1; // Base RAM in GB
    const ramPerPlayer = 0.1; // RAM per player in GB
    const ramPerPlugin = 0.05; // RAM per plugin in GB

    const totalRAM = baseRAM + (players * ramPerPlayer) + (plugins * ramPerPlugin);
    document.getElementById('ram-result').innerText = `Zalecana ilość RAM: ${totalRAM.toFixed(2)} GB`;
}
