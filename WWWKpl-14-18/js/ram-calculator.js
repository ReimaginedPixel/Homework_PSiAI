function calculateRAM() {
    const players = document.getElementById('players').value;
    const plugins = document.getElementById('plugins').value;
    const baseRAM = 1;
    const ramPerPlayer = 0.1;
    const ramPerPlugin = 0.05;

    const totalRAM = baseRAM + (players * ramPerPlayer) + (plugins * ramPerPlugin);
    document.getElementById('ram-result').innerText = `Zalecana ilość RAM: ${totalRAM.toFixed(2)} GB`;
}
