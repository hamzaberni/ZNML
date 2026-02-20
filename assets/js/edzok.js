document.addEventListener('DOMContentLoaded', function() {
    
    // Modal megnyitás
    const trainerLinks = document.querySelectorAll('.portfolio-link[data-trainer]');
    
    trainerLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const trainerId = this.getAttribute('data-trainer');
            openTrainerModal(trainerId);
        });
    });
    
    // Modal bezárás
    const closeButtons = document.querySelectorAll('.trainer-modal-close');
    
    closeButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            const modal = this.closest('.trainer-modal');
            closeTrainerModal(modal.id);2
        });
    });
    
    // Modal bezárás - háttérre
    const modals = document.querySelectorAll('.trainer-modal');
    
    modals.forEach(modal => {
        modal.addEventListener('click', function(e) {
            if (e.target === this) {
                closeTrainerModal(this.id);
            }
        });
    });
    
    // Modal bezárás - ESC billentyűre
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            const activeModals = document.querySelectorAll('.trainer-modal.active');
            activeModals.forEach(modal => {
                closeTrainerModal(modal.id);
            });
        }
    });
    
});

// Modal megnyitás függvény
function openTrainerModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    }
}

// Modal bezárás függvény
function closeTrainerModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.remove('active');
        document.body.style.overflow = '';
    }
}