// =============================================
// COUNTDOWN BANNER – Visszaszámláló + scroll háttér
// Céldátum: 2025. május 5., 00:00:00
// =============================================

(function () {

    // ── Céldátum ─────────────────────────────────
    const TARGET_DATE = new Date('2026-05-05T07:30:00');

    // ── DOM elemek ───────────────────────────────
    const banner    = document.getElementById('countdownBanner');
    const elDays    = document.getElementById('cd-days');
    const elHours   = document.getElementById('cd-hours');
    const elMinutes = document.getElementById('cd-minutes');
    const elSeconds = document.getElementById('cd-seconds');
    const elExpired = document.getElementById('cd-expired');
    const elUnits   = document.querySelector('.countdown-units');

    // ── Scroll: háttérszín váltás ─────────────────
    // A navbar magassága kb. 72px, a banner kb. 50px,
    // tehát 120px scroll után már "lejött" a hero-ról
    const SCROLL_THRESHOLD = 120;

    function handleScroll() {
        if (!banner) return;
        if (window.scrollY > SCROLL_THRESHOLD) {
            banner.classList.add('scrolled');
        } else {
            banner.classList.remove('scrolled');
        }
    }

    window.addEventListener('scroll', handleScroll, { passive: true });
    handleScroll(); // kezdeti állapot

    // ── Segédfüggvény: kétjegyű szám ─────────────
    function pad(n) {
        return String(n).padStart(2, '0');
    }

    // ── Flip animáció ─────────────────────────────
    function animateFlip(el, newVal) {
        if (!el) return;
        if (el.textContent === newVal) return;
        el.classList.remove('flip');
        void el.offsetWidth;
        el.textContent = newVal;
        el.classList.add('flip');
        setTimeout(() => el.classList.remove('flip'), 250);
    }

    // ── Visszaszámláló frissítés ──────────────────
    function updateCountdown() {
        if (!elDays) return;

        const diff = TARGET_DATE - new Date();

        if (diff <= 0) {
            if (elUnits)   elUnits.style.display  = 'none';
            if (elExpired) elExpired.style.display = 'flex';
            return;
        }

        const days    = Math.floor(diff / (1000 * 60 * 60 * 24));
        const hours   = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((diff % (1000 * 60)) / 1000);

        animateFlip(elDays,    pad(days));
        animateFlip(elHours,   pad(hours));
        animateFlip(elMinutes, pad(minutes));
        animateFlip(elSeconds, pad(seconds));
    }

    // ── Indítás ───────────────────────────────────
    updateCountdown();
    setInterval(updateCountdown, 1000);

})();