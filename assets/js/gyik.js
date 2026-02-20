// Bezárás funkciók
document.addEventListener('DOMContentLoaded', function() {
    const closeBtn = document.getElementById('closeBtn');
    const okBtn = document.getElementById('okBtn');
    const overlay = document.getElementById('overlay');
    const popupBox = document.getElementById('popupBox');
    
    // Close gombra kattintás
    closeBtn.addEventListener('click', closePopup);
    
    // OK gombra kattintás
    okBtn.addEventListener('click', closePopup);
    
    // Overlay-re kattintás
    overlay.addEventListener('click', closePopup);
    
    // ESC billentyű
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closePopup();
        }
    });
});

function closePopup() {
    const overlay = document.getElementById('overlay');
    const popupBox = document.getElementById('popupBox');
    
    // Bezárás animáció
    overlay.classList.add('closing');
    popupBox.classList.add('closing');
    
    // Eltávolítás az animáció után
    setTimeout(() => {
        window.location.href = 'index.html';
    }, 400);
}