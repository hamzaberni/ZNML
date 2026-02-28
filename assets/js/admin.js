// ── Demo adatok (PHP-val ezt az adatbázisból töltöd fel) ──
const DEMO_USERS = [
    { id: 1,  name: 'Kovács Anna',      phone: '+36 30 123 4567', email: 'anna.kovacs@email.hu',     registered: '2024-11-03', active: true  },
    { id: 2,  name: 'Nagy Péter',       phone: '+36 70 234 5678', email: 'nagy.peter@gmail.com',      registered: '2024-11-15', active: true  },
    { id: 3,  name: 'Szabó Eszter',     phone: '+36 20 345 6789', email: 'szabo.eszter@mail.hu',      registered: '2024-12-01', active: true  },
    { id: 4,  name: 'Horváth Zoltán',   phone: '+36 30 456 7890', email: 'horvath.z@freemail.hu',     registered: '2024-12-10', active: false },
    { id: 5,  name: 'Varga Réka',       phone: '+36 70 567 8901', email: 'varga.reka@gmail.com',      registered: '2024-12-22', active: true  },
    { id: 6,  name: 'Tóth Gábor',       phone: '+36 20 678 9012', email: 'toth.gabor@email.hu',       registered: '2025-01-05', active: true  },
    { id: 7,  name: 'Fekete Judit',     phone: '+36 30 789 0123', email: 'fekete.j@gmail.com',        registered: '2025-01-14', active: true  },
    { id: 8,  name: 'Kiss Bálint',      phone: '+36 70 890 1234', email: 'kiss.balint@citromail.hu',  registered: '2025-01-28', active: false },
    { id: 9,  name: 'Molnár Krisztina', phone: '+36 20 901 2345', email: 'molnar.k@gmail.com',        registered: '2025-02-03', active: true  },
    { id: 10, name: 'Papp Dániel',      phone: '+36 30 012 3456', email: 'papp.daniel@mail.hu',       registered: '2025-02-18', active: true  },
    { id: 11, name: 'Balogh Zsófia',    phone: '+36 70 123 4560', email: 'balogh.zsofia@email.hu',   registered: '2025-02-20', active: true  },
    { id: 12, name: 'Farkas Ádám',      phone: '+36 20 234 5671', email: 'farkas.adam@gmail.com',     registered: '2025-02-24', active: true  },
];

const ROWS_PER_PAGE = 8;
const notifHistory  = [];
let sentCount       = 0;

// ── State ────
let state = {
    users:    [...DEMO_USERS],
    filtered: [...DEMO_USERS],
    selected: new Set(),
    page:     1,
    search:   '',
    sort:     'newest',
};

// ── Sidebar ───
const profileBtn     = document.getElementById('profileBtn');
const sidebar        = document.getElementById('sidebar');
const sidebarOverlay = document.getElementById('sidebarOverlay');
const sidebarClose   = document.getElementById('sidebarClose');

profileBtn.addEventListener('click',    () => { sidebar.classList.add('open'); sidebarOverlay.classList.add('active'); });
sidebarClose.addEventListener('click',  closeSidebar);
sidebarOverlay.addEventListener('click', closeSidebar);
document.addEventListener('keydown', e => { if (e.key === 'Escape') { closeSidebar(); closeModal(); } });

function closeSidebar() {
    sidebar.classList.remove('open');
    sidebarOverlay.classList.remove('active');
}

// Sidebar nav aktív link
document.querySelectorAll('.sidebar-link[data-section]').forEach(link => {
    link.addEventListener('click', e => {
        e.preventDefault();
        document.querySelectorAll('.sidebar-link').forEach(l => l.classList.remove('active'));
        link.classList.add('active');
        const target = document.getElementById(link.dataset.section);
        if (target) { target.scrollIntoView({ behavior: 'smooth', block: 'start' }); }
        closeSidebar();
    });
});

// ── Táblázat renderers ────
function getInitials(name) {
    return name.split(' ').slice(0, 2).map(w => w[0]).join('').toUpperCase();
}

function formatDate(str) {
    const d = new Date(str);
    return d.toLocaleDateString('hu-HU', { year: 'numeric', month: 'long', day: 'numeric' });
}

function applyFilter() {
    let arr = [...state.users];

    if (state.search) {
        const q = state.search.toLowerCase();
        arr = arr.filter(u =>
            u.name.toLowerCase().includes(q) ||
            u.email.toLowerCase().includes(q) ||
            u.phone.includes(q)
        );
    }

    if (state.sort === 'newest') arr.sort((a, b) => new Date(b.registered) - new Date(a.registered));
    if (state.sort === 'oldest') arr.sort((a, b) => new Date(a.registered) - new Date(b.registered));
    if (state.sort === 'name')   arr.sort((a, b) => a.name.localeCompare(b.name, 'hu'));

    state.filtered = arr;
    state.page     = 1;
    renderTable();
    renderPagination();
}

function renderTable() {
    const tbody    = document.getElementById('usersBody');
    const empty    = document.getElementById('tableEmpty');
    const start    = (state.page - 1) * ROWS_PER_PAGE;
    const pageData = state.filtered.slice(start, start + ROWS_PER_PAGE);

    if (state.filtered.length === 0) {
        tbody.innerHTML = '';
        empty.style.display = 'flex';
        return;
    }
    empty.style.display = 'none';

    tbody.innerHTML = pageData.map(u => `
        <tr data-id="${u.id}" class="${state.selected.has(u.id) ? 'selected' : ''}">
            <td>
                <label class="check-label">
                    <input type="checkbox" class="check-input row-check" data-id="${u.id}" ${state.selected.has(u.id) ? 'checked' : ''}>
                    <span class="check-box"></span>
                </label>
            </td>
            <td>
                <div class="user-cell">
                    <div class="user-initials">${getInitials(u.name)}</div>
                    <span class="user-name">${u.name}</span>
                </div>
            </td>
            <td>${u.phone}</td>
            <td>${u.email}</td>
            <td>${formatDate(u.registered)}</td>
            <td>
                <span class="status-badge ${u.active ? 'status-badge--active' : 'status-badge--inactive'}">
                    <span class="status-dot"></span>
                    ${u.active ? 'Aktív' : 'Inaktív'}
                </span>
            </td>
            <td>
                <div class="row-actions">
                    <button class="btn-icon btn-detail" data-id="${u.id}" title="Részletek">
                        <svg viewBox="0 0 24 24"><path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/></svg>
                    </button>
                    <button class="btn-icon btn-notif-single" data-id="${u.id}" title="Értesítés küldése">
                        <svg viewBox="0 0 24 24"><path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/></svg>
                    </button>
                </div>
            </td>
        </tr>
    `).join('');

    tbody.querySelectorAll('.row-check').forEach(cb => {
        cb.addEventListener('change', () => {
            const id = parseInt(cb.dataset.id);
            if (cb.checked) state.selected.add(id);
            else            state.selected.delete(id);
            updateBulkBar();
            updateStats();
            cb.closest('tr').classList.toggle('selected', cb.checked);
        });
    });

    // Részletek gomb
    tbody.querySelectorAll('.btn-detail').forEach(btn => {
        btn.addEventListener('click', () => openModal(parseInt(btn.dataset.id)));
    });

    // Értesítés gomb (egy sorhoz)
    tbody.querySelectorAll('.btn-notif-single').forEach(btn => {
        btn.addEventListener('click', () => {
            const user = state.users.find(u => u.id === parseInt(btn.dataset.id));
            if (!user) return;
            state.selected = new Set([user.id]);
            updateBulkBar();
            updateStats();
            document.getElementById('notifications').scrollIntoView({ behavior: 'smooth' });
            document.querySelector('[name="recipients"][value="selected"]').checked = true;
            document.getElementById('selectedCount').textContent = 1;
        });
    });

    // Fő checkbox szinkron
    const selectAll = document.getElementById('selectAll');
    if (selectAll) {
        selectAll.checked = pageData.length > 0 && pageData.every(u => state.selected.has(u.id));
        selectAll.indeterminate = pageData.some(u => state.selected.has(u.id)) && !selectAll.checked;
    }
}

function renderPagination() {
    const pages = Math.ceil(state.filtered.length / ROWS_PER_PAGE);
    const el    = document.getElementById('pagination');
    if (pages <= 1) { el.innerHTML = ''; return; }

    let html = `
        <button class="page-btn" id="prevPage" ${state.page === 1 ? 'disabled' : ''}>
            <svg viewBox="0 0 24 24"><path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/></svg>
        </button>`;

    for (let i = 1; i <= pages; i++) {
        if (i === 1 || i === pages || Math.abs(i - state.page) <= 1) {
            html += `<button class="page-btn ${i === state.page ? 'active' : ''}" data-page="${i}">${i}</button>`;
        } else if (Math.abs(i - state.page) === 2) {
            html += `<span style="color:rgba(255,255,255,.3);display:flex;align-items:center;padding:0 .2rem">…</span>`;
        }
    }

    html += `
        <button class="page-btn" id="nextPage" ${state.page === pages ? 'disabled' : ''}>
            <svg viewBox="0 0 24 24"><path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/></svg>
        </button>`;

    el.innerHTML = html;

    el.querySelectorAll('[data-page]').forEach(btn => {
        btn.addEventListener('click', () => { state.page = parseInt(btn.dataset.page); renderTable(); renderPagination(); });
    });
    el.querySelector('#prevPage')?.addEventListener('click', () => { state.page--; renderTable(); renderPagination(); });
    el.querySelector('#nextPage')?.addEventListener('click', () => { state.page++; renderTable(); renderPagination(); });
}

// ── Select all ──────
document.getElementById('selectAll').addEventListener('change', function () {
    const start    = (state.page - 1) * ROWS_PER_PAGE;
    const pageData = state.filtered.slice(start, start + ROWS_PER_PAGE);
    pageData.forEach(u => { if (this.checked) state.selected.add(u.id); else state.selected.delete(u.id); });
    renderTable();
    updateBulkBar();
    updateStats();
});

// ── Bulk bar ─────
function updateBulkBar() {
    const bar   = document.getElementById('bulkBar');
    const count = document.getElementById('bulkCount');
    count.textContent = state.selected.size;
    bar.classList.toggle('visible', state.selected.size > 0);

    document.getElementById('selectedCount').textContent = state.selected.size;
}

document.getElementById('bulkClearBtn').addEventListener('click', () => {
    state.selected.clear();
    updateBulkBar();
    updateStats();
    renderTable();
});

document.getElementById('bulkNotifBtn').addEventListener('click', () => {
    document.getElementById('notifications').scrollIntoView({ behavior: 'smooth' });
    document.querySelector('[name="recipients"][value="selected"]').checked = true;
});

// ── Keresés & szűrés ──
document.getElementById('searchInput').addEventListener('input', e => {
    state.search = e.target.value.trim();
    applyFilter();
});

document.getElementById('sortSelect').addEventListener('change', e => {
    state.sort = e.target.value;
    applyFilter();
});

// ── Export CSV ──
document.getElementById('exportBtn').addEventListener('click', () => {
    const headers = ['ID', 'Név', 'Telefonszám', 'Email', 'Regisztráció', 'Státusz'];
    const rows    = state.filtered.map(u => [
        u.id, u.name, u.phone, u.email, u.registered, u.active ? 'Aktív' : 'Inaktív'
    ]);
    const csv     = [headers, ...rows].map(r => r.join(';')).join('\n');
    const blob    = new Blob(['\uFEFF' + csv], { type: 'text/csv;charset=utf-8;' });
    const url     = URL.createObjectURL(blob);
    const a       = document.createElement('a');
    a.href        = url;
    a.download    = `felhasznalok_${new Date().toISOString().split('T')[0]}.csv`;
    a.click();
    URL.revokeObjectURL(url);
    showToast('CSV exportálva!');
});

// ── Statisztikák ───
function updateStats() {
    const now      = new Date();
    const thirtyAgo = new Date(now.getFullYear(), now.getMonth(), now.getDate() - 30);
    const newUsers = state.users.filter(u => new Date(u.registered) >= thirtyAgo).length;

    document.getElementById('statTotal').textContent    = state.users.length;
    document.getElementById('statNew').textContent      = newUsers;
    document.getElementById('statNotifs').textContent   = sentCount;
    document.getElementById('statSelected').textContent = state.selected.size;
    document.getElementById('recipientCount').textContent = state.users.length;
}

// ── Modal ──
const modalOverlay = document.getElementById('userModalOverlay');
let currentModalUser = null;

function openModal(id) {
    const user = state.users.find(u => u.id === id);
    if (!user) return;
    currentModalUser = user;

    document.getElementById('modalTitle').textContent = user.name;
    document.getElementById('modalBody').innerHTML = `
        <div class="modal-row">
            <div class="modal-row-icon"><svg viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" fill="currentColor"/></svg></div>
            <div><span class="modal-row-label">Teljes név</span><span class="modal-row-value">${user.name}</span></div>
        </div>
        <div class="modal-row">
            <div class="modal-row-icon"><svg viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" fill="currentColor"/></svg></div>
            <div><span class="modal-row-label">Email cím</span><span class="modal-row-value">${user.email}</span></div>
        </div>
        <div class="modal-row">
            <div class="modal-row-icon"><svg viewBox="0 0 24 24"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" fill="currentColor"/></svg></div>
            <div><span class="modal-row-label">Telefonszám</span><span class="modal-row-value">${user.phone}</span></div>
        </div>
        <div class="modal-row">
            <div class="modal-row-icon"><svg viewBox="0 0 24 24"><path d="M9 11H7v2h2v-2zm4 0h-2v2h2v-2zm4 0h-2v2h2v-2zm2-7h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V9h14v11z" fill="currentColor"/></svg></div>
            <div><span class="modal-row-label">Regisztráció dátuma</span><span class="modal-row-value">${formatDate(user.registered)}</span></div>
        </div>
        <div class="modal-row">
            <div class="modal-row-icon"><svg viewBox="0 0 24 24"><path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z" fill="currentColor"/></svg></div>
            <div><span class="modal-row-label">Státusz</span>
                <span class="modal-row-value">
                    <span class="status-badge ${user.active ? 'status-badge--active' : 'status-badge--inactive'}">
                        <span class="status-dot"></span>${user.active ? 'Aktív' : 'Inaktív'}
                    </span>
                </span>
            </div>
        </div>
    `;

    modalOverlay.classList.add('open');
    document.body.style.overflow = 'hidden';
}

function closeModal() {
    modalOverlay.classList.remove('open');
    document.body.style.overflow = '';
    currentModalUser = null;
}

document.getElementById('modalClose').addEventListener('click', closeModal);
document.getElementById('modalCloseBtn').addEventListener('click', closeModal);
modalOverlay.addEventListener('click', e => { if (e.target === modalOverlay) closeModal(); });

document.getElementById('modalNotifBtn').addEventListener('click', () => {
    if (!currentModalUser) return;
    state.selected = new Set([currentModalUser.id]);
    updateBulkBar(); updateStats();
    closeModal();
    document.getElementById('notifications').scrollIntoView({ behavior: 'smooth' });
    document.querySelector('[name="recipients"][value="selected"]').checked = true;
});

// ── Értesítés form ──
const notifTitle = document.getElementById('notifTitle');
const notifMsg   = document.getElementById('notifMsg');
const charCount  = document.getElementById('charCount');
const notifPreview = document.getElementById('notifPreview');

notifMsg.addEventListener('input', () => {
    const len = notifMsg.value.length;
    charCount.textContent = len;
    charCount.style.color = len > 450 ? '#ffaa00' : len > 499 ? '#ff4d4d' : '';
    updatePreview();
});

notifTitle.addEventListener('input', updatePreview);

function updatePreview() {
    const t = notifTitle.value.trim();
    const m = notifMsg.value.trim();
    if (t || m) {
        notifPreview.style.display = 'block';
        document.getElementById('previewTitle').textContent = t || '(tárgy nélkül)';
        document.getElementById('previewMsg').textContent   = m || '(üzenet nélkül)';
    } else {
        notifPreview.style.display = 'none';
    }
}

document.getElementById('previewBtn').addEventListener('click', () => {
    notifPreview.style.display = notifPreview.style.display === 'none' ? 'block' : 'none';
    updatePreview();
});

// Sablonok
document.querySelectorAll('.btn-template').forEach(btn => {
    btn.addEventListener('click', () => {
        notifTitle.value = btn.dataset.title;
        notifMsg.value   = btn.dataset.msg;
        charCount.textContent = notifMsg.value.length;
        updatePreview();
    });
});

// Küldés
document.getElementById('notifForm').addEventListener('submit', e => {
    e.preventDefault();

    const title     = notifTitle.value.trim();
    const message   = notifMsg.value.trim();
    const recipient = document.querySelector('[name="recipients"]:checked').value;

    if (!title || !message) { showToast('Töltsd ki az összes mezőt!', 'error'); return; }

    const count = recipient === 'all'
        ? state.users.length
        : state.selected.size;

    if (recipient === 'selected' && count === 0) {
        showToast('Nincs kijelölt felhasználó!', 'error'); return;
    }

    // Hozzáadjuk az előzményekhez
    sentCount++;
    notifHistory.unshift({ title, message, count, date: new Date() });
    renderHistory();
    updateStats();

    document.getElementById('notifForm').reset();
    charCount.textContent = 0;
    notifPreview.style.display = 'none';

    showToast(`Értesítés elküldve ${count} felhasználónak!`);
});

function renderHistory() {
    const list = document.getElementById('historyList');
    if (notifHistory.length === 0) {
        list.innerHTML = '<p style="font-size:.82rem;color:rgba(255,255,255,.25);padding:.5rem 0">Még nem küldtél értesítést.</p>';
        return;
    }

    list.innerHTML = notifHistory.slice(0, 5).map(h => `
        <div class="history-item">
            <div class="history-icon">
                <svg viewBox="0 0 24 24"><path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z" fill="currentColor"/></svg>
            </div>
            <div class="history-info">
                <div class="history-info-title">${h.title}</div>
                <div class="history-info-meta">${h.date.toLocaleDateString('hu-HU', { month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit' })}</div>
            </div>
            <span class="history-count">${h.count} fő</span>
        </div>
    `).join('');
}

let toastTimer;

function showToast(msg, type = 'success') {
    const toast    = document.getElementById('toast');
    const toastMsg = document.getElementById('toastMsg');
    toastMsg.textContent = msg;

    toast.style.borderColor = type === 'error' ? 'rgba(255,107,122,.35)' : 'rgba(77,219,119,.35)';
    toast.style.color       = type === 'error' ? '#ff6b7a' : '#4ddb77';

    const icon = toast.querySelector('svg');
    icon.innerHTML = type === 'error'
        ? '<path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>'
        : '<path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>';

    clearTimeout(toastTimer);
    toast.classList.add('show');
    toastTimer = setTimeout(() => toast.classList.remove('show'), 3200);
}

// ── Init ──
updateStats();
applyFilter();
renderHistory();