// emailjs-config.js

// EmailJS inicializálás
(function(){
    emailjs.init("wZWcUTd8xiYiRYZGo"); // Public Key
})();

// EmailJS beállítások
const EMAIL_CONFIG = {
    serviceID: 'service_odkiin2',    // Service ID
    templateID: 'template_hxeecpn'   // Template ID
};

// Form kezelés - UNIVERZÁLIS (mindkét form-hoz)
function initContactForms() {
    // Mindkét form megkeresése
    const forms = document.querySelectorAll('#contact-form, #consultation-form');
    
    if (forms.length === 0) {
        console.error('Nincs contact form az oldalon!');
        return;
    }
    
    forms.forEach(form => {
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            
            const btn = this.querySelector('button[type="submit"]');
            const formMessage = this.querySelector('#form-message') || document.getElementById('form-message');
            
            // Gomb letiltása
            if (btn) {
                btn.disabled = true;
                const originalText = btn.textContent;
                btn.textContent = 'Küldés...';
                btn.dataset.originalText = originalText;
            }
            
            // Form message elrejtése
            if (formMessage) {
                formMessage.style.display = 'none';
            }
            
            console.log('EmailJS küldés indul...');
            
            // EmailJS küldés
            emailjs.sendForm(EMAIL_CONFIG.serviceID, EMAIL_CONFIG.templateID, this)
                .then(function(response) {
                    console.log('Sikeres beküldés!', response);
                    
                    // Sikeres üzenet megjelenítése
                    if (formMessage) {
                        formMessage.innerHTML = '<div class="alert alert-success">Üzenet sikeresen elküldve! Hamarosan felvesszük Önnel a kapcsolatot.</div>';
                        formMessage.style.display = 'block';
                    }
                    
                    // Form resetelése
                    form.reset();
                    
                    // Gomb visszaállítása
                    setTimeout(() => {
                        if (btn) {
                            btn.disabled = false;
                            btn.textContent = btn.dataset.originalText || 'Elküldés';
                        }
                    }, 2000);
                    
                }, function(error) {
                    console.error('Hiba történt:', error);
                    
                    // Hiba üzenet megjelenítése
                    if (formMessage) {
                        formMessage.innerHTML = '<div class="alert alert-danger">Hiba történt az üzenet küldése során. Kérjük, próbálja újra később.</div>';
                        formMessage.style.display = 'block';
                    }
                    
                    // Gomb visszaállítása
                    if (btn) {
                        btn.disabled = false;
                        btn.textContent = btn.dataset.originalText || 'Elküldés';
                    }
                });
        });
    });
}

// Inicializálás amikor a DOM betöltődött
document.addEventListener('DOMContentLoaded', function() {
    initContactForms();
});