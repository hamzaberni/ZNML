// =============================================
// KEZDŐ OLDAL – kezdo.js
// Accordion + scroll animációk + EmailJS
// =============================================

(function () {

    // ── Accordion ────────────────────────────────
    const items = document.querySelectorAll('.kezdo-accordion-item');

    items.forEach(function (item) {
        const header = item.querySelector('.kezdo-accordion-header');

        header.addEventListener('click', function () {
            const isOpen = item.classList.contains('open');
            items.forEach(function (i) { i.classList.remove('open'); });
            if (!isOpen) {
                item.classList.add('open');
            }
        });
    });

    // ── Scroll megjelenés animáció ────────────────
    const animTargets = document.querySelectorAll(
        '.kezdo-stat-card, .kezdo-accordion-item, .kezdo-tip-card'
    );

    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('kezdo-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12 });

        animTargets.forEach(function (el) {
            el.classList.add('kezdo-hidden');
            observer.observe(el);
        });
    }

    // ── Csoport választó ─────────────────────────
    const groupOptions = document.querySelectorAll('.kf-option');
    const selectedGroupInput = document.getElementById('selectedGroup');
    const groupError = document.getElementById('groupError');

    groupOptions.forEach(function (option) {
        option.addEventListener('click', function () {
            groupOptions.forEach(function (o) { o.classList.remove('selected'); });
            option.classList.add('selected');
            if (selectedGroupInput) {
                selectedGroupInput.value = option.getAttribute('data-value');
            }
            if (groupError) groupError.classList.remove('show');
        });
    });

    // ── Jelentkezési form submit – EmailJS ────────
    const signupForm = document.getElementById('kf-form');
    const formMessage = document.getElementById('kf-message');
    const submitBtn = document.getElementById('kf-submit-btn');

    if (signupForm) {
        signupForm.addEventListener('submit', function (e) {
            e.preventDefault();

            if (!selectedGroupInput || !selectedGroupInput.value) {
                if (groupError) groupError.classList.add('show');
                return;
            }

            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.textContent = 'Küldés...';
            }

            emailjs.send('service_odkiin2', 'template_hyaaqv6', {
                from_name:      document.getElementById('kfName').value,
                from_email:     document.getElementById('kfEmail').value,
                phone:          document.getElementById('kfPhone').value,
                selected_group: selectedGroupInput.value,
                message:        document.getElementById('kfMessage').value,
            })
            .then(function () {
                if (formMessage) {
                    formMessage.className = 'success';
                    formMessage.textContent = '✓ Jelentkezésed megkaptuk! Hamarosan felvesszük veled a kapcsolatot.';
                }
                signupForm.reset();
                groupOptions.forEach(function (o) { o.classList.remove('selected'); });
                if (selectedGroupInput) selectedGroupInput.value = '';
                if (submitBtn) {
                    submitBtn.disabled = false;
                    submitBtn.textContent = 'Jelentkezem!  →';
                }
            })
            .catch(function () {
                if (formMessage) {
                    formMessage.className = 'error';
                    formMessage.textContent = '✗ Hiba történt, próbáld újra!';
                }
                if (submitBtn) {
                    submitBtn.disabled = false;
                    submitBtn.textContent = 'Jelentkezem!  →';
                }
            });
        });
    }

})();