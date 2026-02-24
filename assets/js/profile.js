// sidebar
const profileBtn    = document.getElementById('profileBtn');
const sidebar       = document.getElementById('sidebar');
const sidebarOverlay = document.getElementById('sidebarOverlay');
const sidebarClose  = document.getElementById('sidebarClose');

function openSidebar() {
    sidebar.classList.add('open');
    sidebarOverlay.classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeSidebar() {
    sidebar.classList.remove('open');
    sidebarOverlay.classList.remove('active');
    document.body.style.overflow = '';
}

profileBtn.addEventListener('click', openSidebar);
sidebarClose.addEventListener('click', closeSidebar);
sidebarOverlay.addEventListener('click', closeSidebar);

document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') closeSidebar();
});

// profilkép csere
const avatarInput = document.getElementById('avatarInput');
const avatarImg   = document.getElementById('avatarImg');

avatarInput?.addEventListener('change', function () {
    const file = this.files[0];
    if (!file) return;

    if (!file.type.startsWith('image/')) {
        showToast('Csak képfájl tölthető fel!', 'error');
        return;
    }

    const reader = new FileReader();
    reader.onload = (e) => {
        avatarImg.src = e.target.result;
        // Sidebar avatart is frissítjük
        const sidebarAvatar = document.querySelector('.sidebar-avatar');
        if (sidebarAvatar) sidebarAvatar.src = e.target.result;
        showToast('Profilkép frissítve!');
    };
    reader.readAsDataURL(file);
});

// szem.adatok szerk.
const editPersonalBtn   = document.getElementById('editPersonalBtn');
const personalForm      = document.getElementById('personalForm');
const personalActions   = document.getElementById('personalActions');
const cancelPersonalBtn = document.getElementById('cancelPersonalBtn');

let originalValues = {};

editPersonalBtn?.addEventListener('click', () => {
    const inputs = personalForm.querySelectorAll('.field-input');

    inputs.forEach(inp => { originalValues[inp.name] = inp.value; });

    inputs.forEach(inp => inp.removeAttribute('disabled'));
    personalActions.classList.remove('hidden');
    editPersonalBtn.style.display = 'none';

    inputs[0]?.focus();
});

cancelPersonalBtn?.addEventListener('click', () => {
    const inputs = personalForm.querySelectorAll('.field-input');
    // Visszaállítás
    inputs.forEach(inp => { inp.value = originalValues[inp.name] || ''; });
    inputs.forEach(inp => inp.setAttribute('disabled', ''));
    personalActions.classList.add('hidden');
    editPersonalBtn.style.display = '';
});

personalForm?.addEventListener('submit', (e) => {
    e.preventDefault();
    const inputs = personalForm.querySelectorAll('.field-input');

    // név frissítése
    const newName = personalForm.querySelector('[name="fullname"]')?.value;
    if (newName) {
        const avatarNameEl = document.querySelector('.avatar-name');
        const sidebarNameEl = document.querySelector('.sidebar-user-name');
        if (avatarNameEl) avatarNameEl.textContent = newName;
        if (sidebarNameEl) sidebarNameEl.textContent = newName;
    }

    // email frissítés sidebarban
    const newEmail = personalForm.querySelector('[name="email"]')?.value;
    if (newEmail) {
        const sidebarEmailEl = document.querySelector('.sidebar-user-email');
        if (sidebarEmailEl) sidebarEmailEl.textContent = newEmail;
    }

    inputs.forEach(inp => inp.setAttribute('disabled', ''));
    personalActions.classList.add('hidden');
    editPersonalBtn.style.display = '';
    showToast('Adatok sikeresen mentve!');
});

// jelszóváltoztatás
const passwordForm  = document.getElementById('passwordForm');
const newPwInput    = document.getElementById('newPwInput');
const confirmPwInput = document.getElementById('confirmPwInput');
const matchLabel    = document.getElementById('matchLabel');

confirmPwInput?.addEventListener('input', () => {
    if (!confirmPwInput.value) { matchLabel.textContent = ''; return; }
    if (confirmPwInput.value === newPwInput.value) {
        matchLabel.textContent = '✓ A jelszavak egyeznek';
        matchLabel.style.color = '#4ddb77';
    } else {
        matchLabel.textContent = '✗ A jelszavak nem egyeznek';
        matchLabel.style.color = '#ff4d4d';
    }
});

passwordForm?.addEventListener('submit', (e) => {
    e.preventDefault();

    const current = passwordForm.querySelector('[name="current_password"]').value;
    const newPw   = newPwInput.value;
    const confirm = confirmPwInput.value;

    if (!current || !newPw || !confirm) {
        showToast('Töltsd ki az összes mezőt!', 'error'); return;
    }
    if (newPw.length < 6) {
        showToast('A jelszónak min. 6 karakter kell!', 'error'); return;
    }
    if (newPw !== confirm) {
        showToast('A jelszavak nem egyeznek!', 'error'); return;
    }

    passwordForm.reset();
    resetStrength();
    matchLabel.textContent = '';
    showToast('Jelszó sikeresen módosítva!');
});

// jelszóerősség
function checkStrength(val) {
    const bars = ['sb1', 'sb2', 'sb3', 'sb4'].map(id => document.getElementById(id));
    const label = document.getElementById('strengthLabel');
    if (!bars[0]) return;

    bars.forEach(b => { b.className = 's-bar'; });
    if (!val) { if (label) label.textContent = ''; return; }

    let score = 0;
    if (val.length >= 6)                              score++;
    if (val.length >= 10)                             score++;
    if (/[A-Z]/.test(val) && /[0-9]/.test(val))      score++;
    if (/[^A-Za-z0-9]/.test(val))                    score++;

    const cls    = ['', 'weak', 'medium', 'medium', 'strong'];
    const labels = ['', 'Gyenge', 'Közepes', 'Jó', 'Erős'];
    const colors = ['', '#ff4d4d', '#ffaa00', '#ffaa00', '#4ddb77'];

    for (let i = 0; i < score; i++) bars[i].classList.add(cls[score]);
    if (label) {
        label.textContent = `Jelszó erőssége: ${labels[score]}`;
        label.style.color = colors[score];
    }
}

function resetStrength() {
    ['sb1', 'sb2', 'sb3', 'sb4'].forEach(id => {
        const el = document.getElementById(id);
        if (el) el.className = 's-bar';
    });
    const label = document.getElementById('strengthLabel');
    if (label) label.textContent = '';
}

// jelszó
function togglePw(btn) {
    const input = btn.closest('.field-wrap').querySelector('.field-input');
    const icon  = btn.querySelector('svg');
    const eyeOpen = '<path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>';
    const eyeOff  = '<path d="M12 7c2.76 0 5 2.24 5 5 0 .65-.13 1.26-.36 1.83l2.92 2.92c1.51-1.26 2.7-2.89 3.43-4.75-1.73-4.39-6-7.5-11-7.5-1.4 0-2.74.25-3.98.7l2.16 2.16C10.74 7.13 11.35 7 12 7zM2 4.27l2.28 2.28.46.46C3.08 8.3 1.78 10.02 1 12c1.73 4.39 6 7.5 11 7.5 1.55 0 3.03-.3 4.38-.84l.42.42L19.73 22 21 20.73 3.27 3 2 4.27zM7.53 9.8l1.55 1.55c-.05.21-.08.43-.08.65 0 1.66 1.34 3 3 3 .22 0 .44-.03.65-.08l1.55 1.55c-.67.33-1.41.53-2.2.53-2.76 0-5-2.24-5-5 0-.79.2-1.53.53-2.2zm4.31-.78l3.15 3.15.02-.16c0-1.66-1.34-3-3-3l-.17.01z"/>';
    if (input.type === 'password') {
        input.type = 'text';
        icon.innerHTML = eyeOff;
    } else {
        input.type = 'password';
        icon.innerHTML = eyeOpen;
    }
}

// toast
let toastTimer;

function showToast(msg, type = 'success') {
    const toast   = document.getElementById('toast');
    const toastMsg = document.getElementById('toastMsg');
    if (!toast || !toastMsg) return;

    toastMsg.textContent = msg;

    if (type === 'error') {
        toast.style.borderColor = 'rgba(255, 107, 122, 0.35)';
        toast.style.color = '#ff6b7a';
    } else {
        toast.style.borderColor = 'rgba(77, 219, 119, 0.35)';
        toast.style.color = '#4ddb77';
    }

    clearTimeout(toastTimer);
    toast.classList.add('show');
    toastTimer = setTimeout(() => toast.classList.remove('show'), 3000);
}