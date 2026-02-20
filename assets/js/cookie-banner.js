// Cookie Banner kezelés
document.addEventListener('DOMContentLoaded', function() {
    // Ellenőrizzük, hogy elfogadta-e már a sütiket
    if (!getCookie('cookieConsent')) {
        setTimeout(() => {
            document.getElementById('cookieBanner').classList.add('show');
        }, 1000);
    }
});

// Sütik elfogadása
function acceptCookies(type) {
    if (type === 'all') {
        setCookie('cookieConsent', 'all', 365);
        enableAllCookies();
    } else if (type === 'necessary') {
        setCookie('cookieConsent', 'necessary', 365);
        enableNecessaryCookies();
    }
    
    hideCookieBanner();
}

// Cookie beállítások megnyitása
function openCookieSettings() {
    document.getElementById('cookieSettings').classList.add('show');
}

// Cookie beállítások bezárása
function closeCookieSettings() {
    document.getElementById('cookieSettings').classList.remove('show');
}

// Egyéni cookie beállítások mentése
function saveCustomCookies() {
    const analytics = document.getElementById('analyticsCookies').checked;
    const marketing = document.getElementById('marketingCookies').checked;
    
    let consent = 'necessary';
    if (analytics && marketing) {
        consent = 'all';
    } else if (analytics) {
        consent = 'necessary,analytics';
    } else if (marketing) {
        consent = 'necessary,marketing';
    }
    
    setCookie('cookieConsent', consent, 365);
    
    // Sütik engedélyezése a beállítások alapján
    if (analytics) enableAnalyticsCookies();
    if (marketing) enableMarketingCookies();
    
    closeCookieSettings();
    hideCookieBanner();
}

// Cookie banner elrejtése
function hideCookieBanner() {
    document.getElementById('cookieBanner').classList.remove('show');
}

// Cookie műveletek
function setCookie(name, value, days) {
    const date = new Date();
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    const expires = "expires=" + date.toUTCString();
    document.cookie = name + "=" + value + ";" + expires + ";path=/";
}

function getCookie(name) {
    const nameEQ = name + "=";
    const ca = document.cookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

// Sütik engedélyezése (ide jön a Google Analytics, Facebook Pixel, stb.)
function enableAllCookies() {
    console.log('Minden süti engedélyezve');
    enableNecessaryCookies();
    enableAnalyticsCookies();
    enableMarketingCookies();
}

function enableNecessaryCookies() {
    console.log('Szükséges sütik engedélyezve');
    // Alapvető sütik (mindig engedélyezve)
}

function enableAnalyticsCookies() {
    console.log('Analitikai sütik engedélyezve');
    // Google Analytics kód ide
    // gtag('config', 'GA_MEASUREMENT_ID');
}

function enableMarketingCookies() {
    console.log('Marketing sütik engedélyezve');
    // Facebook Pixel, Google Ads kód ide
}

// Cookie Banner kezelés
document.addEventListener('DOMContentLoaded', function() {
    // Ellenőrizzük, hogy elfogadta-e már a sütiket
    if (!getCookie('cookieConsent')) {
        setTimeout(() => {
            document.getElementById('cookieBanner').classList.add('show');
        }, 1000);
    } else {
        // Ha már elfogadta, mutassuk a lebegő gombot
        showFloatingButton();
    }
    
    // Betöltjük a mentett beállításokat a modal-ba
    loadSavedSettings();
});

// Lebegő gomb megjelenítése
function showFloatingButton() {
    const btn = document.getElementById('cookieSettingsBtn');
    if (btn) {
        setTimeout(() => {
            btn.classList.add('show');
        }, 500);
    }
}

// Lebegő gomb elrejtése
function hideFloatingButton() {
    const btn = document.getElementById('cookieSettingsBtn');
    if (btn) {
        btn.classList.remove('show');
    }
}

// Cookie beállítások újramegnyitása
function reopenCookieSettings() {
    openCookieSettings();
}

// Sütik elfogadása
function acceptCookies(type) {
    if (type === 'all') {
        setCookie('cookieConsent', 'all', 365);
        enableAllCookies();
    } else if (type === 'necessary') {
        setCookie('cookieConsent', 'necessary', 365);
        enableNecessaryCookies();
    }
    
    hideCookieBanner();
    showFloatingButton(); // Megjelenik a lebegő gomb
}

// Cookie beállítások megnyitása
function openCookieSettings() {
    document.getElementById('cookieSettings').classList.add('show');
    document.body.style.overflow = 'hidden'; // Scroll letiltás
}

// Cookie beállítások bezárása
function closeCookieSettings() {
    document.getElementById('cookieSettings').classList.remove('show');
    document.body.style.overflow = ''; // Scroll visszaállítás
}

// Egyéni cookie beállítások mentése
function saveCustomCookies() {
    const analytics = document.getElementById('analyticsCookies').checked;
    const marketing = document.getElementById('marketingCookies').checked;
    
    let consent = 'necessary';
    if (analytics && marketing) {
        consent = 'all';
    } else if (analytics) {
        consent = 'necessary,analytics';
    } else if (marketing) {
        consent = 'necessary,marketing';
    }
    
    setCookie('cookieConsent', consent, 365);
    
    // Sütik engedélyezése a beállítások alapján
    enableNecessaryCookies();
    if (analytics) enableAnalyticsCookies();
    if (marketing) enableMarketingCookies();
    
    closeCookieSettings();
    hideCookieBanner();
    showFloatingButton(); // Megjelenik a lebegő gomb
}

// Mentett beállítások betöltése a modal-ba
function loadSavedSettings() {
    const consent = getCookie('cookieConsent');
    if (consent) {
        // Analitikai süti
        const analyticsCheckbox = document.getElementById('analyticsCookies');
        if (analyticsCheckbox) {
            analyticsCheckbox.checked = consent.includes('analytics') || consent === 'all';
        }
        
        // Marketing süti
        const marketingCheckbox = document.getElementById('marketingCookies');
        if (marketingCheckbox) {
            marketingCheckbox.checked = consent.includes('marketing') || consent === 'all';
        }
    }
}

// Cookie banner elrejtése
function hideCookieBanner() {
    document.getElementById('cookieBanner').classList.remove('show');
}

// Cookie műveletek
function setCookie(name, value, days) {
    const date = new Date();
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    const expires = "expires=" + date.toUTCString();
    document.cookie = name + "=" + value + ";" + expires + ";path=/";
}

function getCookie(name) {
    const nameEQ = name + "=";
    const ca = document.cookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

// Süti törlése (opcionális - ha kell "Összes törlése" funkció)
function deleteCookie(name) {
    document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
}

// Sütik engedélyezése
function enableAllCookies() {
    console.log('Minden süti engedélyezve');
    enableNecessaryCookies();
    enableAnalyticsCookies();
    enableMarketingCookies();
}

function enableNecessaryCookies() {
    console.log('Szükséges sütik engedélyezve');
}

function enableAnalyticsCookies() {
    console.log('Analitikai sütik engedélyezve');
    // Google Analytics kód ide
}

function enableMarketingCookies() {
    console.log('Marketing sütik engedélyezve');
    // Facebook Pixel kód ide
}