<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin – ZOONIMAL</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/admin.css">
</head>
<body>

<!-- Háttér -->
<div class="bg-layer">
    <div class="bg-orb bg-orb-1"></div>
    <div class="bg-orb bg-orb-2"></div>
</div>


<header class="topbar">
    <div class="topbar-brand">
        <img src="assets/images/monkey.png" alt="ZOONIMAL" class="topbar-logo-img">
        <div class="topbar-brand-text">
            <span class="topbar-brand-name">ZOONIMAL</span>
            <span class="topbar-brand-sub">Admin Page</span>
        </div>
    </div>

    <div class="topbar-right">
        <div class="admin-badge">
            <svg viewBox="0 0 24 24"><path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z"/></svg>
            Admin
        </div>
        <button class="profile-btn" id="profileBtn" aria-label="Admin menü">
            <img src="assets/images/profilepic.png" alt="Admin" class="profile-btn-img">
            <span class="profile-btn-dot"></span>
        </button>
    </div>
</header>

<!-- ── Sidebar overlay ── -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>


<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <div class="sidebar-user">
            <img src="assets/images/profilepic.png" alt="Admin" class="sidebar-avatar">
            <div class="sidebar-user-info">
                <span class="sidebar-user-name">Adminisztrátor</span>
                <span class="sidebar-user-email">admin@zoonimal.hu</span>
            </div>
        </div>
        <button class="sidebar-close" id="sidebarClose" aria-label="Bezárás">
            <svg viewBox="0 0 24 24"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/></svg>
        </button>
    </div>

    <nav class="sidebar-nav">
        <a href="#users" class="sidebar-link active" data-section="users">
            <span class="sidebar-link-icon">
                <svg viewBox="0 0 24 24"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>
            </span>
            <span>Felhasználók</span>
            <svg class="sidebar-link-arrow" viewBox="0 0 24 24"><path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6z"/></svg>
        </a>

        <a href="#notifications" class="sidebar-link" data-section="notifications">
            <span class="sidebar-link-icon">
                <svg viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
            </span>
            <span>Értesítés küldése</span>
            <svg class="sidebar-link-arrow" viewBox="0 0 24 24"><path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6z"/></svg>
        </a>

        <a href="#stats" class="sidebar-link" data-section="stats">
            <span class="sidebar-link-icon">
                <svg viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z"/></svg>
            </span>
            <span>Statisztikák</span>
            <svg class="sidebar-link-arrow" viewBox="0 0 24 24"><path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6z"/></svg>
        </a>
    </nav>

    <div class="sidebar-footer">
        <a href="index.php" class="sidebar-logout">
            <svg viewBox="0 0 24 24"><path d="M17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5zM4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4V5z"/></svg>
            Kijelentkezés
        </a>
    </div>
</aside>






<main class="main-content">

    <!-- ── Statisztika sáv ── -->
    <div class="stats-row" id="stats">
        <div class="stat-card">
            <div class="stat-icon stat-icon--users">
                <svg viewBox="0 0 24 24"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>
            </div>
            <div class="stat-info">
                <span class="stat-value" id="statTotal">–</span>
                <span class="stat-label">Összes felhasználó</span>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon stat-icon--new">
                <svg viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm5 11h-4v4h-2v-4H7v-2h4V7h2v4h4v2z"/></svg>
            </div>
            <div class="stat-info">
                <span class="stat-value" id="statNew">–</span>
                <span class="stat-label">Új tag (30 nap)</span>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon stat-icon--notif">
                <svg viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
            </div>
            <div class="stat-info">
                <span class="stat-value" id="statNotifs">–</span>
                <span class="stat-label">Kiküldött értesítés</span>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon stat-icon--selected">
                <svg viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
            </div>
            <div class="stat-info">
                <span class="stat-value" id="statSelected">0</span>
                <span class="stat-label">Kijelölve</span>
            </div>
        </div>
    </div>

    <!-- ── Felhasználók szekció ── -->
    <section class="card" id="users">
        <div class="card-header">
            <h2 class="card-title">
                <svg viewBox="0 0 24 24"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>
                Regisztrált felhasználók
            </h2>

            <div class="card-actions">
                <!-- Keresés -->
                <div class="search-wrap">
                    <svg viewBox="0 0 24 24"><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg>
                    <input type="text" class="search-input" id="searchInput" placeholder="Keresés név, email alapján...">
                </div>

                <!-- Szűrő -->
                <select class="filter-select" id="sortSelect">
                    <option value="newest">Legújabb előre</option>
                    <option value="oldest">Legrégebbi előre</option>
                    <option value="name">Név szerint</option>
                </select>

                <!-- Exportálás -->
                <button class="btn-outline" id="exportBtn">
                    <svg viewBox="0 0 24 24"><path d="M19 9h-4V3H9v6H5l7 7 7-7zm-8 2V5h2v6h1.17L12 13.17 9.83 11H11zm-6 7h14v2H5z"/></svg>
                    Export CSV
                </button>
            </div>
        </div>

        <!-- Tömeg műveletek -->
        <div class="bulk-bar" id="bulkBar">
            <span class="bulk-info"><span id="bulkCount">0</span> felhasználó kijelölve</span>
            <div class="bulk-actions">
                <button class="btn-bulk btn-bulk--notif" id="bulkNotifBtn">
                    <svg viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                    Értesítés küldése
                </button>
                <button class="btn-bulk btn-bulk--clear" id="bulkClearBtn">
                    <svg viewBox="0 0 24 24"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/></svg>
                    Kijelölés törlése
                </button>
            </div>
        </div>

        <!-- Táblázat -->
        <div class="table-wrap">
            <table class="users-table" id="usersTable">
                <thead>
                    <tr>
                        <th class="col-check">
                            <label class="check-label">
                                <input type="checkbox" id="selectAll" class="check-input">
                                <span class="check-box"></span>
                            </label>
                        </th>
                        <th>Felhasználó</th>
                        <th>Telefonszám</th>
                        <th>Email cím</th>
                        <th>Regisztráció dátuma</th>
                        <th>Státusz</th>
                        <th class="col-actions">Műveletek</th>
                    </tr>
                </thead>
                <tbody id="usersBody">
                </tbody>
            </table>
            <div class="table-empty" id="tableEmpty" style="display:none">
                <svg viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/></svg>
                Nincs találat
            </div>
        </div>

        <div class="pagination" id="pagination"></div>
    </section>

    <!-- ── Értesítés küldés szekció ── -->
    <section class="card" id="notifications">
        <div class="card-header">
            <h2 class="card-title">
                <svg viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                Értesítés küldése
            </h2>
        </div>

        <form class="notif-form" id="notifForm">

            <!-- Sablon gombok -->
            <div class="field-group">
                <label class="field-label">Gyors sablonok</label>
                <div class="template-btns">
                    <button type="button" class="btn-template" data-title="ÁSZF módosítás" data-msg="Tájékoztatjuk, hogy az Általános Szerződési Feltételeinket frissítettük. Kérjük, tekintse át az új feltételeket az Adatkezelési tájékoztató menüpontban.">
                        ÁSZF módosítás
                    </button>
                    <button type="button" class="btn-template" data-title="Rendszerkarbantartás" data-msg="Tájékoztatjuk, hogy tervezett rendszerkarbantartás miatt a weboldal átmenetileg nem lesz elérhető. Kellemetlenségért elnézést kérünk.">
                        Karbantartás
                    </button>
                    <button type="button" class="btn-template" data-title="Üdvözlő üzenet" data-msg="Üdvözöljük a ZOONIMAL közösségében! Örülünk, hogy csatlakozott hozzánk.">
                        Üdvözlő
                    </button>
                    <button type="button" class="btn-template" data-title="Promóció" data-msg="Különleges ajánlattal készültünk Önnek! Látogasson el weboldalunkra a részletekért.">
                        Promóció
                    </button>
                </div>
            </div>

            <!-- Cím -->
            <div class="field-group">
                <label class="field-label" for="notifTitle">Értesítés tárgya</label>
                <div class="field-wrap">
                    <span class="field-icon">
                        <svg viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                    </span>
                    <input type="text" class="field-input" id="notifTitle" name="title" placeholder="pl. ÁSZF módosítás" required>
                </div>
            </div>

            <!-- Üzenet -->
            <div class="field-group">
                <label class="field-label" for="notifMsg">Üzenet szövege</label>
                <textarea class="field-textarea" id="notifMsg" name="message" placeholder="Írja be az értesítés szövegét..." required rows="4"></textarea>
                <div class="char-counter"><span id="charCount">0</span> / 500 karakter</div>
            </div>

            <!-- Címzett -->
            <div class="field-group">
                <label class="field-label">Célcsoport</label>
                <div class="recipient-options">
                    <label class="radio-label">
                        <input type="radio" name="recipients" value="all" checked class="radio-input">
                        <span class="radio-box"></span>
                        <span>Minden felhasználó (<span id="recipientCount">0</span> fő)</span>
                    </label>
                    <label class="radio-label" id="selectedRadioLabel">
                        <input type="radio" name="recipients" value="selected" class="radio-input" id="selectedRadio">
                        <span class="radio-box"></span>
                        <span>Csak kijelöltek (<span id="selectedCount">0</span> fő)</span>
                    </label>
                </div>
            </div>

            <!-- Előnézet -->
            <div class="notif-preview" id="notifPreview" style="display:none">
                <div class="notif-preview-header">
                    <svg viewBox="0 0 24 24"><path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-6v-5c0-3.07-1.64-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.63 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2z"/></svg>
                    Előnézet
                </div>
                <div class="notif-preview-title" id="previewTitle"></div>
                <div class="notif-preview-msg" id="previewMsg"></div>
            </div>

            <div class="form-actions">
                <button type="button" class="btn-cancel" id="previewBtn">
                    <svg viewBox="0 0 24 24"><path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/></svg>
                    Előnézet
                </button>
                <button type="submit" class="btn-save" style="margin-left:auto">
                    <svg viewBox="0 0 24 24"><path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/></svg>
                    Értesítés küldése
                </button>
            </div>
        </form>

        <!-- Küldési előzmények -->
        <div class="notif-history">
            <h4 class="history-title">Korábbi értesítések</h4>
            <div class="history-list" id="historyList">
            </div>
        </div>
    </section>

</main>

<!-- ── Felhasználó részletei modal ── -->
<div class="modal-overlay" id="userModalOverlay">
    <div class="modal" id="userModal">
        <div class="modal-header">
            <h3 class="modal-title" id="modalTitle">Felhasználó adatai</h3>
            <button class="modal-close" id="modalClose">
                <svg viewBox="0 0 24 24"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/></svg>
            </button>
        </div>
        <div class="modal-body" id="modalBody"></div>
        <div class="modal-footer">
            <button class="btn-cancel" id="modalCloseBtn">Bezárás</button>
            <button class="btn-save" id="modalNotifBtn">
                <svg viewBox="0 0 24 24"><path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/></svg>
                Értesítés küldése
            </button>
        </div>
    </div>
</div>

<!-- Toast -->
<div class="toast" id="toast">
    <svg viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
    <span id="toastMsg">Kész!</span>
</div>

<script src="assets/js/admin.js"></script>
</body>
</html>