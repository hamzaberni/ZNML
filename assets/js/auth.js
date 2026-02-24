// =============================================
// AUTH – Közös JavaScript (login + register)
// =============================================

/**
 * Jelszó megjelenítése / elrejtése
 * @param {string} fieldId  - az input id-je
 * @param {HTMLElement} btn - a toggle gomb
 */
function togglePassword(fieldId, btn) {
    const input = document.getElementById(fieldId);
    const icon  = btn.querySelector('svg');

    const eyeOpen = '<path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>';
    const eyeOff  = '<path d="M12 7c2.76 0 5 2.24 5 5 0 .65-.13 1.26-.36 1.83l2.92 2.92c1.51-1.26 2.7-2.89 3.43-4.75-1.73-4.39-6-7.5-11-7.5-1.4 0-2.74.25-3.98.7l2.16 2.16C10.74 7.13 11.35 7 12 7zM2 4.27l2.28 2.28.46.46C3.08 8.3 1.78 10.02 1 12c1.73 4.39 6 7.5 11 7.5 1.55 0 3.03-.3 4.38-.84l.42.42L19.73 22 21 20.73 3.27 3 2 4.27zM7.53 9.8l1.55 1.55c-.05.21-.08.43-.08.65 0 1.66 1.34 3 3 3 .22 0 .44-.03.65-.08l1.55 1.55c-.67.33-1.41.53-2.2.53-2.76 0-5-2.24-5-5 0-.79.2-1.53.53-2.2zm4.31-.78l3.15 3.15.02-.16c0-1.66-1.34-3-3-3l-.17.01z"/>';

    if (input.type === 'password') {
        input.type    = 'text';
        icon.innerHTML = eyeOff;
    } else {
        input.type    = 'password';
        icon.innerHTML = eyeOpen;
    }
}

/**
 * Jelszóerősség ellenőrzése (csak register oldalon)
 * @param {string} val - a jelszó értéke
 */
function checkStrength(val) {
    const bars = [
        document.getElementById('bar1'),
        document.getElementById('bar2'),
        document.getElementById('bar3'),
        document.getElementById('bar4'),
    ];
    const text = document.getElementById('strengthText');

    if (!bars[0] || !text) return; // nem register oldal

    bars.forEach(b => { b.className = 'strength-bar'; });

    if (!val) { text.textContent = ''; return; }

    let score = 0;
    if (val.length >= 6)                                 score++;
    if (val.length >= 10)                                score++;
    if (/[A-Z]/.test(val) && /[0-9]/.test(val))         score++;
    if (/[^A-Za-z0-9]/.test(val))                       score++;

    const levels = ['', 'weak', 'medium', 'medium', 'strong'];
    const labels = ['', 'Gyenge', 'Közepes', 'Jó', 'Erős'];
    const colors = ['', '#ff4d4d', '#ffaa00', '#ffaa00', '#4ddb77'];

    for (let i = 0; i < score; i++) {
        bars[i].classList.add(levels[score]);
    }

    text.textContent = `Jelszó erőssége: ${labels[score]}`;
    text.style.color = colors[score];
}