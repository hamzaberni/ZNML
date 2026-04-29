// =============================================
// NOTIFICATIONS – notifications.js
// =============================================

(function () {

    // ── DOM ──────────────────────────────────────
    const cards       = document.querySelectorAll('.notif-card');
    const overlay     = document.getElementById('notifModalOverlay');
    const modalClose  = document.getElementById('notifModalClose');
    const modalClosBtn= document.getElementById('notifModalCloseBtn');
    const modalSubject= document.getElementById('notifModalSubject');
    const modalMessage= document.getElementById('notifModalMessage');
    const markAllBtn  = document.getElementById('markAllBtn');
    const unreadCount = document.getElementById('unreadCount');
    const toast       = document.getElementById('notifToast');

    // ── Olvasott állapot localStorage-ból ────────
    function getRead() {
        try { return JSON.parse(localStorage.getItem('notif_read') || '[]'); } catch { return []; }
    }

    function setRead(arr) {
        localStorage.setItem('notif_read', JSON.stringify(arr));
    }

    function markAsRead(id) {
        const read = getRead();
        if (!read.includes(id)) {
            read.push(id);
            setRead(read);
        }
    }

    function updateUnreadCount() {
        const read = getRead();
        let count = 0;
        cards.forEach(card => {
            const id = card.getAttribute('data-id');
            if (!read.includes(id)) count++;
        });
        if (unreadCount) unreadCount.textContent = count;
    }

    function applyReadStates() {
        const read = getRead();
        cards.forEach(card => {
            const id = card.getAttribute('data-id');
            const badge = card.querySelector('.notif-badge');
            if (read.includes(id)) {
                card.classList.remove('unread');
                if (badge) { badge.textContent = 'Olvasott'; badge.className = 'notif-badge read'; }
            } else {
                card.classList.add('unread');
                if (badge) { badge.textContent = 'Új'; badge.className = 'notif-badge new'; }
            }
        });
        updateUnreadCount();
    }

    // ── Modal megnyitás ──────────────────────────
    function openModal(subject, message) {
        if (modalSubject) modalSubject.textContent = subject;
        if (modalMessage) modalMessage.textContent = message;
        if (overlay) overlay.classList.add('open');
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        if (overlay) overlay.classList.remove('open');
        document.body.style.overflow = '';
    }

    // ── Kártya kattintás ─────────────────────────
    cards.forEach(function (card) {
        card.addEventListener('click', function () {
            const id      = card.getAttribute('data-id');
            const subject = card.getAttribute('data-subject');
            const message = card.getAttribute('data-message');

            markAsRead(id);
            applyReadStates();
            openModal(subject, message);
        });
    });

    // ── Modal bezárás ────────────────────────────
    if (modalClose)   modalClose.addEventListener('click', closeModal);
    if (modalClosBtn) modalClosBtn.addEventListener('click', closeModal);

    overlay?.addEventListener('click', function (e) {
        if (e.target === overlay) closeModal();
    });

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') closeModal();
    });

    // ── Összes olvasottnak jelöl ─────────────────
    function showToast(msg) {
        if (!toast) return;
        toast.textContent = msg;
        toast.classList.add('show');
        setTimeout(() => toast.classList.remove('show'), 2500);
    }

    markAllBtn?.addEventListener('click', function () {
        const ids = [];
        cards.forEach(card => ids.push(card.getAttribute('data-id')));
        setRead(ids);
        applyReadStates();
        showToast('✓ Minden értesítés olvasottnak jelölve');
    });

    // ── Sidebar ──────────────────────────────────
    const profileBtn     = document.getElementById('profileBtn');
    const sidebar        = document.getElementById('sidebar');
    const sidebarOverlay = document.getElementById('sidebarOverlay');
    const sidebarClose   = document.getElementById('sidebarClose');

    function openSidebar()  { sidebar?.classList.add('open'); sidebarOverlay?.classList.add('active'); document.body.style.overflow = 'hidden'; }
    function closeSidebar() { sidebar?.classList.remove('open'); sidebarOverlay?.classList.remove('active'); document.body.style.overflow = ''; }

    profileBtn?.addEventListener('click', openSidebar);
    sidebarClose?.addEventListener('click', closeSidebar);
    sidebarOverlay?.addEventListener('click', closeSidebar);

    // ── Init ─────────────────────────────────────
    applyReadStates();

})();