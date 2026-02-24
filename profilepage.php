<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil – ZOONIMAL</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/profile.css">
</head>
<body>

<!-- background -->
<div class="bg-layer">
    <div class="bg-orb bg-orb-1"></div>
    <div class="bg-orb bg-orb-2"></div>
</div>

<!-- ── topbar ── -->
<header class="topbar">
    <div class="topbar-brand">
        <img src="assets/images/monkey.png" alt="ZOONIMAL" class="topbar-logo-img">
        <span class="topbar-brand-name">ZOONIMAL</span>
    </div>

    <button class="profile-btn" id="profileBtn" aria-label="Profil menü">
        <img src="assets/images/profilepic.png" alt="Profilkép" class="profile-btn-img">
        <span class="profile-btn-dot"></span>
    </button>
</header>

<!-- ── sidebar overlay ── -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<!-- ── sidebar ── -->
<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <div class="sidebar-user">
            <img src="assets/images/profilepic.png" alt="Profilkép" class="sidebar-avatar">
            <div class="sidebar-user-info">
                <span class="sidebar-user-name">Felhasználó neve</span>
                <span class="sidebar-user-email">pelda@email.hu</span>
            </div>
        </div>
        <button class="sidebar-close" id="sidebarClose" aria-label="Bezárás">
            <svg viewBox="0 0 24 24"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/></svg>
        </button>
    </div>

    <nav class="sidebar-nav">
        <a href="profile.html" class="sidebar-link active" data-page="profile">
            <span class="sidebar-link-icon">
                <svg viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
            </span>
            <span>Saját adatok</span>
            <svg class="sidebar-link-arrow" viewBox="0 0 24 24"><path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6z"/></svg>
        </a>

        <a href="notifications.html" class="sidebar-link" data-page="notifications">
            <span class="sidebar-link-icon">
                <svg viewBox="0 0 24 24"><path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-6v-5c0-3.07-1.64-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.63 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2z"/></svg>
            </span>
            <span>Értesítések</span>
            <span class="sidebar-badge">3</span>
            <svg class="sidebar-link-arrow" viewBox="0 0 24 24"><path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6z"/></svg>
        </a>

        <a href="legal.html" class="sidebar-link" data-page="legal">
            <span class="sidebar-link-icon">
                <svg viewBox="0 0 24 24"><path d="M14 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/></svg>
            </span>
            <span>Adatkezelési tájékoztató és ÁSZF</span>
            <svg class="sidebar-link-arrow" viewBox="0 0 24 24"><path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6z"/></svg>
        </a>
    </nav>

    <div class="sidebar-footer">
        <a href="backend/logout.php" class="sidebar-logout">
            <svg viewBox="0 0 24 24"><path d="M17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5zM4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4V5z"/></svg>
            Kijelentkezés
        </a>
    </div>
</aside>

<main class="main-content">
    <div class="page-header">
        <h1 class="page-title">Saját adatok</h1>
        <p class="page-subtitle">Kezeld a profilod és személyes adataid</p>
    </div>

    <div class="profile-grid">

        <!-- profilkép  -->
        <div class="card card--avatar">
            <div class="avatar-section">
                <div class="avatar-wrap" id="avatarWrap">
                    <img src="assets/images/profilepic.png" alt="Profilkép" class="avatar-img" id="avatarImg">
                    <label class="avatar-overlay" for="avatarInput" title="Profilkép módosítása">
                        <svg viewBox="0 0 24 24"><path d="M12 15.2A3.2 3.2 0 0 1 8.8 12 3.2 3.2 0 0 1 12 8.8 3.2 3.2 0 0 1 15.2 12 3.2 3.2 0 0 1 12 15.2M12 7a5 5 0 0 0-5 5 5 5 0 0 0 5 5 5 5 0 0 0 5-5 5 5 0 0 0-5-5m0-5.5c-2.8 0-5.3 1-7.2 2.7L6.2 5.6C7.7 4.3 9.7 3.5 12 3.5c4.7 0 8.5 3.8 8.5 8.5 0 2.3-.8 4.3-2.1 5.8l1.4 1.4C21 17.3 22 14.8 22 12c0-5.5-4.5-10-10-10M12 20.5c-2.3 0-4.3-.8-5.8-2.1L4.8 19.8C6.7 21.5 9.2 22.5 12 22.5c5.5 0 10-4.5 10-10h-2c0 4.7-3.8 8.5-8.5 8.5"/></svg>
                        <span>Módosítás</span>
                    </label>
                    <input type="file" id="avatarInput" accept="image/*" style="display:none">
                </div>
                <div class="avatar-info">
                    <h2 class="avatar-name">Felhasználó neve</h2>
                    <span class="avatar-since">Tag: 2025. január óta</span>
                    <span class="avatar-badge">
                        <svg viewBox="0 0 24 24"><path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z"/></svg>
                        Aktív tag
                    </span>
                </div>
            </div>
        </div>

        <!-- szem.adatok -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <svg viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                    Személyes adatok
                </h3>
                <button class="btn-edit" id="editPersonalBtn">
                    <svg viewBox="0 0 24 24"><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/></svg>
                    Szerkesztés
                </button>
            </div>

            <form class="data-form" id="personalForm">
                <div class="field-group">
                    <label class="field-label">Teljes név</label>
                    <div class="field-wrap">
                        <span class="field-icon"><svg viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg></span>
                        <input type="text" class="field-input" name="fullname" value="Felhasználó neve" disabled>
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Email cím</label>
                    <div class="field-wrap">
                        <span class="field-icon"><svg viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg></span>
                        <input type="email" class="field-input" name="email" value="pelda@email.hu" disabled>
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Telefonszám</label>
                    <div class="field-wrap">
                        <span class="field-icon"><svg viewBox="0 0 24 24"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg></span>
                        <input type="tel" class="field-input" name="phone" value="+36 30 000 0000" disabled>
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Születési dátum</label>
                    <div class="field-wrap">
                        <span class="field-icon"><svg viewBox="0 0 24 24"><path d="M9 11H7v2h2v-2zm4 0h-2v2h2v-2zm4 0h-2v2h2v-2zm2-7h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V9h14v11z"/></svg></span>
                        <input type="date" class="field-input" name="birthdate" value="1990-01-01" disabled>
                    </div>
                </div>

                <div class="form-actions hidden" id="personalActions">
                    <button type="button" class="btn-cancel" id="cancelPersonalBtn">Mégse</button>
                    <button type="submit" class="btn-save">
                        <svg viewBox="0 0 24 24"><path d="M17 3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V7l-4-4zm-5 16c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3zm3-10H5V5h10v4z"/></svg>
                        Mentés
                    </button>
                </div>
            </form>
        </div>

        <!-- jelszóváltoztatás -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <svg viewBox="0 0 24 24"><path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z"/></svg>
                    Jelszó módosítása
                </h3>
            </div>

            <form class="data-form" id="passwordForm">
                <div class="field-group">
                    <label class="field-label">Jelenlegi jelszó</label>
                    <div class="field-wrap">
                        <span class="field-icon"><svg viewBox="0 0 24 24"><path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z"/></svg></span>
                        <input type="password" class="field-input" name="current_password" placeholder="••••••••">
                        <button type="button" class="toggle-pw" onclick="togglePw(this)">
                            <svg viewBox="0 0 24 24"><path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/></svg>
                        </button>
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Új jelszó</label>
                    <div class="field-wrap">
                        <span class="field-icon"><svg viewBox="0 0 24 24"><path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z"/></svg></span>
                        <input type="password" class="field-input" name="new_password" placeholder="Min. 6 karakter" id="newPwInput" oninput="checkStrength(this.value)">
                        <button type="button" class="toggle-pw" onclick="togglePw(this)">
                            <svg viewBox="0 0 24 24"><path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/></svg>
                        </button>
                    </div>
                    <div class="strength-bars">
                        <div class="s-bar" id="sb1"></div>
                        <div class="s-bar" id="sb2"></div>
                        <div class="s-bar" id="sb3"></div>
                        <div class="s-bar" id="sb4"></div>
                    </div>
                    <div class="strength-label" id="strengthLabel"></div>
                </div>

                <div class="field-group">
                    <label class="field-label">Új jelszó megerősítése</label>
                    <div class="field-wrap">
                        <span class="field-icon"><svg viewBox="0 0 24 24"><path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z"/></svg></span>
                        <input type="password" class="field-input" name="confirm_password" placeholder="••••••••" id="confirmPwInput">
                        <button type="button" class="toggle-pw" onclick="togglePw(this)">
                            <svg viewBox="0 0 24 24"><path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/></svg>
                        </button>
                    </div>
                    <div class="match-label" id="matchLabel"></div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-save" style="margin-left:auto">
                        <svg viewBox="0 0 24 24"><path d="M17 3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V7l-4-4zm-5 16c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3zm3-10H5V5h10v4z"/></svg>
                        Jelszó mentése
                    </button>
                </div>
            </form>
        </div>

        <!-- fiókbiztonság card -->
        <div class="card card--security">
            <div class="card-header">
                <h3 class="card-title">
                    <svg viewBox="0 0 24 24"><path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z"/></svg>
                    Fiókbiztonság
                </h3>
            </div>
            <div class="security-items">
                <div class="security-item">
                    <div class="security-item-info">
                        <span class="security-item-title">Utolsó bejelentkezés</span>
                        <span class="security-item-value">2025. február 24. – Budapest</span>
                    </div>
                    <span class="security-status security-status--ok">
                        <svg viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
                        OK
                    </span>
                </div>
                <div class="security-item">
                    <div class="security-item-info">
                        <span class="security-item-title">Email megerősítve</span>
                        <span class="security-item-value">pelda@email.hu</span>
                    </div>
                    <span class="security-status security-status--ok">
                        <svg viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
                        Igen
                    </span>
                </div>
                <div class="security-item">
                    <div class="security-item-info">
                        <span class="security-item-title">Kétlépéses azonosítás</span>
                        <span class="security-item-value">Fokozott védelem a fiókodhoz</span>
                    </div>
                    <button class="btn-enable">Bekapcsolás</button>
                </div>
            </div>
        </div>

    </div>
</main>

<!-- értesítés -->
<div class="toast" id="toast">
    <svg viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
    <span id="toastMsg">Adatok sikeresen mentve!</span>
</div>

<script src="assets/js/profile.js"></script>
</body>
</html>