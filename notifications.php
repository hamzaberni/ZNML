<?php
session_start();
require __DIR__ . "/backend/db.php";
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$stmt = $conn->prepare("SELECT id, subject, message FROM notifications ORDER BY id DESC");
$stmt->execute();
$result = $stmt->get_result();
$notifications = $result->fetch_all(MYSQLI_ASSOC);

$stmt_user = $conn->prepare("SELECT id, email, name FROM users WHERE id = ?");
$stmt_user->bind_param("i", $_SESSION["user_id"]);
$stmt_user->execute();
$user = $stmt_user->get_result()->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Értesítések – ZOONIMAL</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/profile.css">
    <link rel="stylesheet" href="assets/css/notifications.css">
    <link rel="icon" href="assets/images/monkey.png">
</head>
<body>

<div class="bg-layer">
    <div class="bg-orb bg-orb-1"></div>
    <div class="bg-orb bg-orb-2"></div>
</div>

<header class="topbar">
    <a href="index.php" class="topbar-brand">
        <img src="assets/images/monkey.png" alt="ZOONIMAL" class="topbar-logo-img">
        <span class="topbar-brand-name">ZOONIMAL</span>
    </a>
    <button class="profile-btn" id="profileBtn" aria-label="Profil menü">
        <img src="assets/images/profilepic.png" alt="Profilkép" class="profile-btn-img">
        <span class="profile-btn-dot"></span>
    </button>
</header>

<div class="sidebar-overlay" id="sidebarOverlay"></div>

<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <div class="sidebar-user">
            <img src="assets/images/profilepic.png" alt="Profilkép" class="sidebar-avatar">
            <div class="sidebar-user-info">
                <span class="sidebar-user-name"><?php echo htmlspecialchars($user['name']); ?></span>
                <span class="sidebar-user-email"><?php echo htmlspecialchars($user['email']); ?></span>
            </div>
        </div>
        <button class="sidebar-close" id="sidebarClose" aria-label="Bezárás">
            <svg viewBox="0 0 24 24"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/></svg>
        </button>
    </div>
    <nav class="sidebar-nav">
        <a href="profilepage.php" class="sidebar-link">
            <span class="sidebar-link-icon">
                <svg viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
            </span>
            <span>Saját adatok</span>
            <svg class="sidebar-link-arrow" viewBox="0 0 24 24"><path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6z"/></svg>
        </a>
        <a href="notifications.php" class="sidebar-link active">
            <span class="sidebar-link-icon">
                <svg viewBox="0 0 24 24"><path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-6v-5c0-3.07-1.64-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.63 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2z"/></svg>
            </span>
            <span>Értesítések</span>
            <svg class="sidebar-link-arrow" viewBox="0 0 24 24"><path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6z"/></svg>
        </a>
        <a href="assets/documents/ADATKEZELESI_TAJEKOZTATO.pdf" class="sidebar-link">
            <span class="sidebar-link-icon">
                <svg viewBox="0 0 24 24"><path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z"/></svg>
            </span>
            <span>Adatkezelési tájékoztató</span>
            <svg class="sidebar-link-arrow" viewBox="0 0 24 24"><path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6z"/></svg>
        </a>
        <a href="assets/documents/ASZF.pdf" class="sidebar-link">
            <span class="sidebar-link-icon">
                <svg viewBox="0 0 24 24"><path d="M14 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/></svg>
            </span>
            <span>Általános Szerződési Feltételek</span>
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
        <h1 class="page-title">Értesítések</h1>
        <p class="page-subtitle">Rendszerüzenetek és tájékoztatók</p>
    </div>

    <div class="notif-toolbar">
        <p class="notif-count"><span id="unreadCount">0</span> olvasatlan értesítés</p>
        <?php if (!empty($notifications)): ?>
        <button class="btn-mark-all" id="markAllBtn">
            <svg viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
            Összes olvasottnak jelöl
        </button>
        <?php endif; ?>
    </div>

    <div class="notif-list">
        <?php if (empty($notifications)): ?>
            <div class="notif-empty">
                <svg viewBox="0 0 24 24"><path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-6v-5c0-3.07-1.64-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.63 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2z"/></svg>
                <p>Nincsenek értesítések</p>
            </div>
        <?php else: ?>
            <?php foreach ($notifications as $n): ?>
            <div class="notif-card unread"
                 data-id="<?php echo $n['id']; ?>"
                 data-subject="<?php echo htmlspecialchars($n['subject']); ?>"
                 data-message="<?php echo htmlspecialchars($n['message']); ?>">
                <div class="notif-icon">
                    <svg viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                </div>
                <div class="notif-body">
                    <div class="notif-subject"><?php echo htmlspecialchars($n['subject']); ?></div>
                    <div class="notif-preview"><?php echo htmlspecialchars(mb_substr($n['message'], 0, 80)) . (mb_strlen($n['message']) > 80 ? '…' : ''); ?></div>
                </div>
                <div class="notif-meta">
                    <span class="notif-badge new">Új</span>
                    <svg class="notif-arrow" viewBox="0 0 24 24"><path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6z"/></svg>
                </div>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</main>

<div class="notif-modal-overlay" id="notifModalOverlay">
    <div class="notif-modal">
        <button class="notif-modal-close" id="notifModalClose">
            <svg viewBox="0 0 24 24"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/></svg>
        </button>
        <div class="notif-modal-icon">
            <svg viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
        </div>
        <div class="notif-modal-subject" id="notifModalSubject"></div>
        <div class="notif-modal-divider"></div>
        <div class="notif-modal-message" id="notifModalMessage"></div>
        <div class="notif-modal-footer">
            <button class="btn-modal-close" id="notifModalCloseBtn">Bezárás</button>
        </div>
    </div>
</div>

<div class="notif-toast" id="notifToast"></div>

<script src="assets/js/notifications.js"></script>
</body>
</html>